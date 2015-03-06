<?php
	/**
	* Plugin Name: Identity Verification - AU
	* Description:  Plugin to instantly verify Australian users identity with their driver licence or passport. Ideal for membership website or application forms.
	* Author: Identity Verification Services
	* Version:2.0
	* Author URI: https://wordpress.org/plugins/identity-verification-australia/developers/
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
		$verified_users = "IDV_verified_users";
		if($wpdb->get_var("SHOW TABLES LIKE '$verified_users'") != $verified_users) {
		     $verified_users_sql = "CREATE TABLE $verified_users (
		      verification_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
		    dbDelta( $verified_users_sql );
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
 //echo plugins_url('thankyou.php', __FILE__);
 //echo get_template_directory().'/thankyou.php';
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
		

		
	}	


	add_action("wp_ajax_verify_identity",'verify_identity_details');
	add_action("wp_ajax_nopriv_verify_identity",'verify_identity_details');

	function verify_identity_details(){
		global $wpdb;

		$auth_url='https://api.identityverification.com/get_verified/get_auth_token/';
		// Get the Table Data which should be displayed as form
		$api_credentials=$wpdb->get_results("select * from ".$wpdb->prefix."identity_verification_auth");

		$config_credentails['client_id']=$api_credentials[0]->client_id;
		$config_credentails['client_secret']=$api_credentials[0]->client_secret;
		$response=sendPostData_api($auth_url,json_encode($config_credentails));
		
		$identity_verify_url='https://api.identityverification.com/get_verified/identity/';
		$_POST['auth_token']=$response->auth_token;
		$identity_response=sendPostData_api($identity_verify_url,json_encode($_POST));
		$site_url=site_url();
		$redirect_url=$api_credentials[0]->redirect_url;
		$error_url=$api_credentials[0]->error_url;
		
		if($identity_response->is_identity_validated==1){
			$store_user=array(
					'identity_type'=>$identity_response->identity_type,
					'country'=>$identity_response->country,
					'first_name'=>$identity_response->first_name,
					'last_name'=>$identity_response->last_name,
					'date_of_birth'=>$identity_response->date_of_birth
			);
			$wpdb->insert('IDV_verified_users',$store_user);
		}
		include("thankyou.php");
		exit;
	}


	// Style Sheets

	add_action('wp_enqueue_scripts', 'fwds_styles');
	function fwds_styles() {
		//%%KEEPWHITESPACE%%&gt;  
		wp_register_style('style_name', plugins_url('css/style.css', __FILE__));
		wp_enqueue_style('style_name');
		wp_register_style('date_picker', plugins_url('css/datepicker.css', __FILE__));
		wp_enqueue_style('date_picker');
	}

	
	// Admin Styles

	add_action('admin_enqueue_scripts', 'fwds_styles');



	// Javascript and Jquery Libraries 
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

