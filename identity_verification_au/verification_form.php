
<div style="width:45%;float:left;margin:5px"> 
	<h2 class="update-nag">Identity Verification - AU</h2>

	<h3> Client Key & Client Secret</h3>

	<form action="" method="post"> 
		<input type="hidden" name="action" value="getVerified">
		<table >
			<tbody>
				<tr>
					<td>
						Client Id		
					</td>
				
					<td>
						<input name="setting_id" value="<?php echo (count($table_fields)>0?$table_fields[0]->setting_id:'')?>" type="hidden"/> 
						<input name="client_id" placeholder="Client Id" type="text" style="width:500px" value="<?php echo (count($table_fields)>0?$table_fields[0]->client_id:'')?>"/> 
					</td>
				</tr>
				<tr>
					<td>
						Client Secret		
					</td>
				
					<td>
						<input name="client_secret" placeholder="Client Secret" type="text" style="width:500px" required value="<?php echo (count($table_fields)>0?$table_fields[0]->client_secret:'')?>"/> 
					</td>
				</tr>
				<tr>
					<td>
						 Identity Verification Redirect Url
					</td>
				
					<td>
						
						<input name="redirect_url" placeholder="Enter Redirect Url to where user need to redirect once Email is verified" type="text" style="width:500px" value="<?php echo (count($table_fields)>0?$table_fields[0]->redirect_url:'')?>"> 
					</td>
				</tr>
				<tr>
					<td>
						 Identity Verification Error Url
					</td>
				
					<td>
						
						<input name="error_url" placeholder="Enter Error Url to where user need to redirect once Email is verified" type="text" style="width:500px" value="<?php  echo (count($table_fields)>0?$table_fields[0]->error_url:'')?>"/> 
					</td>
				</tr>
			</tbody>
		</table>
		<tr>
			
			<td colspan=2 align="right">
				<input  type="submit" value="Save" class="btn"/> 
			</td>
		</tr>

	</form>
	<div class="update-nag">
	<?php
	if(count($table_fields)>0 && $table_fields[0]->client_id!=''){
	?>
	ShortCode [IVS_IDENTITY_AU]
	<?php
	}else{

		echo "Please Provide Client API Credentials to get Short Code";
	}
	?>
	</div>
</div>
<div style="width:30%;background:#fff;height:675px;float:left;">
	<div style="width:100%;text-align:center;float:left">
	<img src="https://identityverification.com/wp-content/uploads/2015/02/imgo.jpg" style="width:400px;height:auto;margin:5px;text-align:center">
	<p class="description">
		No Setup Fees & No Long term contract
	</p>
	<p class="description">
		One Place for all your verification needs
	</p>
	<p class="description">
		Instant Deployment
	</p>
	</div>
	<p class="verification_list">
		kyc - aml - age verification - fraud management - citizen authentication - customer on - boarding mobile phone verification - email verification - identity verification - document verification - biometric face match - voice biometric authentication
	</p>
	<p class="verification_list">
		Next Step

	</p>
	<ol type="1">
		<li> 
			Click <a href="http://identityverification.com/" target="_blank">Here</a> to go to the IVS Website	
		</li>
		<li>
			Select your quantity
		</li>
		<li>
			Receive your Client Id and Client Secret Codes
		</li>
		<li>
			Copy the Short Code on your page
		</li>
		<li>
			Start Verifying users in your country
		</li>
	</ol>
	<a href="http://identityverification.com/product/identity-verification-australia/" target="_blank" ><button class="btn" style="margin-left:24px"> Start Now</button> </a>
	
</div>
