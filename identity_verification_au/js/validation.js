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
  		if($("#first_name").val()==''){
  				$(".err_fname").text("Please Enter Your Name");
  				$("#first_name").focus();
  				$("#first_name").css("border","1px solid red");
  				return false;
  			}else{
  					$("#first_name").css("border","1px solid #dfdfdf");

  				$(".err_fname").text("");
  			}
  			if($("#last_name").val()==''){
  				$(".err_lname").text("Please Enter Your Last Name");
  				$("#last_name").focus();
  				$("#last_name").css("border","1px solid red");
  				return false;
  			}else{
  					$("#last_name").css("border","1px solid #dfdfdf");

  				$(".err_lname").text("");
  			}
  			if($("#dob").val()==''){
  				$(".err_dob").text("Please Select Your Date of Birth");
  				$("#dob").focus();
  				$("#dob").css("border","1px solid red");
  				return false;
  			}else{
  					$("#dob").css("border","1px solid #dfdfdf");

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
  				$(".err_dl").text("Please Enter Driving License");
  				$("#driving_license").focus();
  				$("#driving_license").css("border","1px solid red");
  				return false;
  			}else{
  					$("#driving_license").css("border","1px solid #dfdfdf");

  				$(".err_dl").text("");
  			}
  			if($("#dl_state").val()==''){
  				$(".err_dl_state").text("Please Enter Driving License State");
  				$("#dl_state").focus();
  				$("#dl_state").css("border","1px solid red");
  				return false;
  			}else{
  					$("#dl_state").css("border","1px solid #dfdfdf");

  				$(".err_dl_stae").text("");
  			}
  		}if($("input[name=identity_type]:checked").val()=='passport'){

  			if($("#p_no").val()==''){
  				$(".err_p_no").text("Please Enter Passport Number");
  				$("#p_no").focus();
  				$("#p_no").css("border","1px solid red");
  				return false;
  			}else{
  					$("#p_no").css("border","1px solid #dfdfdf");

  				$(".err_p_no").text("");
  			}
  			if($("#pob").val()==''){
  				$(".err_pob").text("Please Enter Place of Birth ");
  				$("#pob").focus();
  				$("#pob").css("border","1px solid red");
  				return false;
  			}else{
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
  				$(".err_p_sab").text("Please Select Country of Birth Place ");
  				$("#p_sab").focus();
  				$("#p_sab").css("border","1px solid red");
  				return false;
  			}else{
  					$("#p_sab").css("border","1px solid #dfdfdf");

  				$(".err_p_sab").text("");
  			}
  			if($("#p_fac").val()==''){
  				$(".err_p_fac").text("Please Select Country of Birth Place ");
  				$("#p_fac").focus();
  				$("#p_fac").css("border","1px solid red");
  				return false;
  			}else{
  					$("#p_fac").css("border","1px solid #dfdfdf");

  				$(".err_p_fac").text("");
  			}
  			if($("#p_sac").val()==''){
  				$(".err_p_sac").text("Please Select Country of Birth Place ");
  				$("#p_sac").focus();
  				$("#p_sac").css("border","1px solid red");
  				return false;
  			}else{
  					$("#p_sac").css("border","1px solid #dfdfdf");

  				$(".err_p_sac").text("");
  			}
  		}
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