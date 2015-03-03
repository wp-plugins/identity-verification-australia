<?php
	/**
	* Plugin Name: Identity Verification - AU
	* Description: Plugin to Verify Identity Verificaion for Australia Using Driving License/Passport
	* Author: Identityverification.com
	* Version:1.0
	* Author URI: http://identityverification.com
	* 
	*/
// Plugin Activation Code
	register_activation_hook( __FILE__, 'identity_verification_activate' );
	function identity_verification_activate() {
	
		global $wpdb;
		$table_name = $wpdb->prefix . "identity_verification_auth";
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		     $sql = "CREATE TABLE $table_name (
		      setting_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		      client_id VARCHAR(200) NOT NULL,
		      client_secret VARCHAR(200) NOT NULL,
		      auth_token VARCHAR(150),
		      redirect_url VARCHAR(200),
		      error_url VARCHAR(200),
		      identity_type VARCHAR(50),
		      first_name VARCHAR(50),
		      last_name VARCHAR(50),
		      date_of_birth VARCHAR(50),
		      country VARCHAR(50),
		      driver_license_number VARCHAR(100),
		      driver_license_state VARCHAR(100),
		      rta_card_number VARCHAR(100),
		      date_of_expiry varchar(50)
		    );";
		    //reference to upgrade.php file
		    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		    dbDelta( $sql );
		}
		 $new_page_title = 'Identity Verification Response';
	    $new_page_content = 'Identity Verification Response';
	    $new_page_template = 'thankyou.php'; //ex. template-custom.php. Leave blank if you don't want a custom page template.

	    //don't change the code bellow, unless you know what you're doing

	    $page_check = get_page_by_title($new_page_title);
	    $new_page = array(
	        'post_type' => 'page',
	        'post_title' => $new_page_title,
	        'post_content' => $new_page_content,
	        'post_status' => 'publish',
	        'post_author' => 1,
	    );
	    if(!isset($page_check->ID)){
	        $new_page_id = wp_insert_post($new_page);
	        if(isset($new_page_template)){
	            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
	        }
	    }

    
	}
	
	


// Plugin Deactivation Code
	
	function identity_verification_deactivate(){
		global $wpdb;
		$table_name = $wpdb->prefix . "identity_verification_auth";
		$sql = "DROP TABLE ".$table_name;
		$e = $wpdb->query($sql);
		

	}
	register_deactivation_hook( __FILE__, 'identity_verification_deactivate' );

	// Function to Display Out Plugin Name in Admin Left Side
	
	add_action( 'admin_menu', 'identity_verification_menu' );

	
	function identity_verification_menu() {
		add_menu_page( 'Identity Verification ', 'Identity Verification - AU', 'manage_options', 'my-unique-identifier', 'identity_verification_options' );
		add_options_page( '', '', 'manage_options', 'my-unique-identifier', 'getVerified' );

	}
	

	// Function which will be called on Click of Left Side Menu

	function identity_verification_options(){
			global $wpdb;
			
			// Get the Table Structure which should be displayed as form

			$table_fields=$wpdb->get_results("select * from ".$wpdb->prefix."identity_verification_auth");
			
			//echo "<pre>";print_r($table_fields);
			//  Moving the First Array Element to an array
			//$setting_id=array_shift($table_fields);

		include("verification_form.php");
	}

	add_action( 'admin_post_getVerified', 'getVerified' );

	function  getVerified(){
		global $wpdb;
		
		if($_POST){

			$action=array_shift($_POST);	
			$setting_id=array_shift($_POST);

			$client_config['client_id']=array_shift($_POST);
			$client_config['client_secret']=array_shift($_POST);
			$client_config['redirect_url']=$_POST['redirect_url'];
			$client_config['error_url']=$_POST['error_url'];

			if($setting_id!='')
			$wpdb->query("update ".$wpdb->prefix."identity_verification_auth set client_id='".$client_config['client_id']."',client_secret='".$client_config['client_secret']."',redirect_url='".$client_config['redirect_url']."',error_url='".$client_config['error_url']."' where setting_id=".$setting_id);
			else
			$wpdb->insert($wpdb->prefix."identity_verification_auth",$client_config,array('%s','%s','%s','%s','%s'));
			wp_redirect('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			
		}
	}



	function sendPostData_api($url, $post){
		  $ch = curl_init($url);
		  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
		  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		  $resulty = curl_exec($ch);
		  curl_close($ch);  // Seems like good practice
		  return json_decode($resulty);
		}

	function identityInfoForm( $atts ){
		global $wpdb;
		// Get the Table Data which should be displayed as form

		$table_fields=$wpdb->get_results("select * from ".$wpdb->prefix."identity_verification_auth");
		
		

		include("information_form.php");
		

		// Posting Data to Api Call

		if($_POST){
			
		//	$_POST['auth_token']=base64_decode($_POST['auth_token']);
			$url='http://staging-api.identityverification.com/get_verified/get_auth_token ';
			$client_config['client_id']=$_POST['client_id'];
			$client_config['client_secret']=$_POST['client_secret'];
			$result=sendPostData_api($url,json_encode($client_config));
			// Check whether Passport Selected or Driving Licence Selected

			$url='http://staging-api.identityverification.com/get_verified/identity ';
			$config_details_array=array(
					'auth_token'=>$result->auth_token,
					'identity_type'=>$_POST['identity_type'],
					'first_name'=>$_POST['first_name'],
					'last_name'=>$_POST['last_name'],
					'date_of_birth'=>$_POST['date_of_birth'],
					'country'=>$_POST['country'],
				);
			if($_POST['identity_type']=='driver_license'){

				$config_details_array['driver_license_number']=$_POST['driver_license_number'];
				$config_details_array['driver_license_state']=$_POST['driver_license_state'];
				$config_details_array['rta_card_number']=$_POST['rta_card_number'];
				$config_details_array['date_of_expiry']=$_POST['date_of_expiry'];
			}
			if($_POST['identity_type']=='passport'){
				$config_details_array['passport_number']=$_POST['passport_number'];
				$config_details_array['passport_placeof_birth']=$_POST['passport_placeof_birth'];
				$config_details_array['passport_birth_country_name']=$_POST['passport_birth_country_name'];
				$config_details_array['surname_atbirth']=$_POST['surname_atbirth'];
				$config_details_array['firstname_atcitizenship']=$_POST['firstname_atcitizenship'];
				$config_details_array['surname_atcitizenship']=$_POST['surname_atcitizenship'];
			}

			
			$config_details=json_encode($config_details_array);
			$result=sendPostData_api($url,$config_details);
			$_SESSION['identity']=$_POST['identity_type'];
			$_SESSION['response']=json_encode($result);
			$_SESSION['redirect_url']=$_POST['redirect_url'];
			
			$_SESSION['error_url']=$_POST['error_url'];
	//echo "<pre>";print_r($result);
	//exit;
			wp_redirect(site_url()."/identity-verification-response");
			
			
		}
	}	


	
	add_action('wp_enqueue_scripts', 'fwds_styles');
	function fwds_styles() {
		//%%KEEPWHITESPACE%%&gt;  
		wp_register_style('style_name', plugins_url('css/style.css', __FILE__));
		wp_enqueue_style('style_name');
		wp_register_style('date_picker', plugins_url('css/datepicker.css', __FILE__));
		wp_enqueue_style('date_picker');
	}

	add_action('admin_enqueue_scripts', 'fwds_styles');
	add_action('wp_enqueue_scripts', 'fwds_scripts');
	function fwds_scripts() {
		wp_enqueue_script('jquery');

		wp_register_script('slidesjs_core', plugins_url('js/my_jquery.js', __FILE__));

		wp_enqueue_script('slidesjs_core');

		wp_register_script('validation', plugins_url('js/validation.js', __FILE__));

		wp_enqueue_script('validation');

		
		
		wp_register_script('custom_jquery', plugins_url('js/custom-jquery.js', __FILE__));

		wp_enqueue_script('custom_jquery');
	}

	add_shortcode( 'IVS_IDENTITY_AU', 'identityInfoForm' );
