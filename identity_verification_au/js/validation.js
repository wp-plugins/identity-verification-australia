$(document).ready(function(){
$(".identity_type").change(function(){
  		if($(this).val()=='driver_license'){
  			$(".dl_info").css("display","block");
  			$(".passport_info").css("display","none");
  			$(this).attr("checked","true");
  			$("#p_button").removeAttr("checked");
  		}
  		if($(this).val()=='passport'){
  			$(".dl_info").css("display","none");
  			$(".passport_info").css("display","block");
  			$(this).attr("checked","true");
  			$("#dl_btn").removeAttr("checked");
  		}
  	});
  	$(".btn").click(function(){
        var regex_name=/^([a-zA-Z]+\s)*[a-zA-Z|_|-]+$/;
        var regex_dl_no=/^[A-Za-z0-9]+$/;
        var postdata='';
        var dob= $(".day").val()+"-"+$(".month").val()+"-"+$(".year").val();
        var eod= $(".eday").val()+"-"+$(".emonth").val()+"-"+$(".eyear").val();
  		  if($("#first_name").val()==''){
  				$(".err_fname").text("Please Enter Your Name");
  				$("#first_name").focus();
  				$("#first_name").css("border","1px solid red");
  				return false;
  			}
        if(!regex_name.test($("#first_name").val())){
            $(".err_fname").text("Please Enter Valid Name");
            $("#first_name").focus();
            $("#first_name").css("border","1px solid red");
            return false;
        }
        else{
  					$("#first_name").css("border","1px solid #dfdfdf");

  				$(".err_fname").text("");
  			}

  			if($("#last_name").val()==''){
  				$(".err_lname").text("Please Enter Your Last Name");
  				$("#last_name").focus();
  				$("#last_name").css("border","1px solid red");
  				return false;
  			}
        if(!regex_name.test($("#last_name").val())){
            $(".err_lname").text("Please Enter Valid Name");
            $("#last_name").focus();
            $("#last_name").css("border","1px solid red");
            return false;
        }else{
  					$("#last_name").css("border","1px solid #dfdfdf");

  				$(".err_lname").text("");
  			}
  			if($(".day").val()=='' || $(".month").val()=='' || $(".year").val()==''){
  				$(".err_dob").text("Please Select Your Date of Birth");
  				
  				return false;
  			}else{
  				
  				$(".err_dob").text("");
  			}
  			if($("#country").val()==''){
  				$(".err_country").text("Please Select Your Country");
  				$("#country").focus();
  				$("#country").css("border","1px solid red");
  				return false;
  			}else{
  					$("#country").css("border","1px solid #dfdfdf");

  				$(".err_country").text("");
  			}
  			
  		if($("input[name=identity_type]:checked").val()=='driver_license'){
  			
  			if($("#driving_license").val()==''){
  				$(".err_dl").text("Please Enter Driving Licence");
  				$("#driving_license").focus();
  				$("#driving_license").css("border","1px solid red");
  				return false;
  			}
        if(!regex_dl_no.test($("#driving_license").val())){
            $(".err_dl").text("Please Enter Valid Driving Licence Number");
            $("#driving_license").focus();
            $("#driving_license").css("border","1px solid red");
            return false;
        }
        else{
  					$("#driving_license").css("border","1px solid #dfdfdf");

  				$(".err_dl").text("");
  			}
  			if($("#dl_state").val()==''){
  				$(".err_dl_state").text("Please Enter Driving Licence State");
  				$("#dl_state").focus();
  				$("#dl_state").css("border","1px solid red");
  				return false;
  			}else{
  					$("#dl_state").css("border","1px solid #dfdfdf");

  				$(".err_dl_stae").text("");
  			}
        if($("#dl_state").val()=='NSW'){
          if(!regex_dl_no.test($("#rta").val())){
            $(".rta").text("Please Enter Valid RTA Number");
            $("#rta").focus();
            $("#rta").css("border","1px solid red");
            return false;
          }
        }
        if($("#dl_state").val()=='WA'){
            if($(".eday").val()=='' || $(".emonth").val()=='' || $(".eyear").val()==''){
              $(".err_eod").text("Please Select Your Date of Birth");
              
              return false;
            }
        }
         postdata="first_name="+$("#first_name").val()+"&last_name="+$("#last_name").val()+"&date_of_birth="+dob+"&country="+$("#country").val()+"&driver_license_number="+$("#driving_license").val()+"&driver_license_state="+$("#dl_state").val()+"&rta_card_number="+$("#rta").val()+"&date_of_expiry="+eod+"&identity_type=driver_license";

  		}if($("input[name=identity_type]:checked").val()=='passport'){

  			if($("#p_no").val()==''){
  				$(".err_p_no").text("Please Enter Passport Number");
  				$("#p_no").focus();
  				$("#p_no").css("border","1px solid red");
  				return false;
  			}
        if(!regex_dl_no.test($("#p_no").val())){
            $(".err_p_no").text("Please Enter Valid Passport Number");
            $("#p_no").focus();
            $("#p_no").css("border","1px solid red");
            return false;
        }
        else{
  					$("#p_no").css("border","1px solid #dfdfdf");

  				$(".err_p_no").text("");
  			}
  			if($("#pob").val()==''){
  				$(".err_pob").text("Please Enter Place of Birth ");
  				$("#pob").focus();
  				$("#pob").css("border","1px solid red");
  				return false;
  			}
         if(!regex_name.test($("#pob").val())){
            $(".err_pob").text("Please Enter Valid Passport Birth Place");
            $("#pob").focus();
            $("#pob").css("border","1px solid red");
            return false;
        }
        else{
  					$("#pob").css("border","1px solid #dfdfdf");

  				$(".err_pob").text("");
  			}
  			if($("#passport_birth_country").val()==''){
  				$(".err_p_pbc").text("Please Select Country of Birth Place ");
  				$("#passport_birth_country").focus();
  				$("#passport_birth_country").css("border","1px solid red");
  				return false;
  			}else{
  					$("#passport_birth_country").css("border","1px solid #dfdfdf");

  				$(".err_p_pbc").text("");
  			}
  			if($("#p_sab").val()==''){
  				$(".err_p_sab").text("Please Enter Family Name at Birth");
  				$("#p_sab").focus();
  				$("#p_sab").css("border","1px solid red");
  				return false;
  			}
        if(!regex_name.test($("#p_sab").val())){
            $(".err_p_sab").text("Please Enter Valid Family Name at Birth");
            $("#p_sab").focus();
            $("#p_sab").css("border","1px solid red");
            return false;
        }
        else{
  					$("#p_sab").css("border","1px solid #dfdfdf");

  				$(".err_p_sab").text("");
  			}
  			if($("#p_fac").val()==''){
  				$(".err_p_fac").text("Please Enter  Name at Citizenship ");
  				$("#p_fac").focus();
  				$("#p_fac").css("border","1px solid red");
  				return false;
  			}
        if(!regex_name.test($("#p_fac").val())){
            $(".err_p_fac").text("Please Enter Valid  Name at Citizenship");
            $("#p_fac").focus();
            $("#p_fac").css("border","1px solid red");
            return false;
        }
        else{
  					$("#p_fac").css("border","1px solid #dfdfdf");

  				$(".err_p_fac").text("");
  			}
  			if($("#p_sac").val()==''){
  				$(".err_p_sac").text("Please Enter Family Name at Citizenship ");
  				$("#p_sac").focus();
  				$("#p_sac").css("border","1px solid red");
  				return false;
  			}
        if(!regex_name.test($("#p_sac").val())){
            $(".err_p_sac").text("Please Enter Valid  Family Name at Citizenship");
            $("#p_sac").focus();
            $("#p_sac").css("border","1px solid red");
            return false;
        }
        else{
  					$("#p_sac").css("border","1px solid #dfdfdf");

  				$(".err_p_sac").text("");
  			}
        postdata="first_name="+$("#first_name").val()+"&last_name="+$("#last_name").val()+"&date_of_birth="+dob+"&country="+$("#country").val()+"&passport_number="+$("#p_no").val()+"&passport_placeof_birth="+$("#pob").val()+"&passport_birth_country_name="+$("#passport_birth_country").val()+"&surname_atbirth="+$("#p_sab").val()+"&firstname_atcitizenship="+$("#p_fac").val()+"&surname_atcitizenship="+$("#p_sac").val()+"&identity_type=passport";
  		}
      $(".loader_image").css("display","block");
      $(".row-fluid").css("opacity",'0.5');
      $.ajax({
          url:'http://localhost/staging_identityverification/wp-admin/admin-ajax.php?action=verify_identity',
          type:'post',
          data:postdata,
          success:function(result){
              $(".loader_image").css("display","none");
              $(".row-fluid").css("opacity",'1');
              //result=result.replace('0', '');
              $(".result").html(result);

              $(".ivs-form").slideUp("slow");
          }
      })
  	});
	$("#dl_state").change(function(){
		if($(this).val()=='NSW'){
			$(".state_dl").slideDown("slow");
		}else{
			$(".state_dl").slideUp("slow");
		}
		if($(this).val()=='WA'){
			$(".doe_dl").slideDown("slow");
		}else{
			$(".doe_dl").slideUp("slow");
		}
	});
})