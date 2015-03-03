<?php
/**
* Template Name:Thank You Page
* Description:This will page return the result
*/
global $wpdb;
get_header();

$response=json_decode($_SESSION['response']);
//echo "<pre>";print_r($response);
$table_name = $wpdb->prefix . "identity_verification_auth";
?>

	<div class="content-element-1">
		<div id="content">
			<h3>Your Identity Verification details for Australia </h3>
			<?php
			if($response->status=='Invalid'){
			?>
			
				Sorry ! Your Identity Verification with <?php echo ucwords(str_replace("_"," ",$_SESSION['identity']))?> Failed.<br/>
				Please have the reason here <a href="<?php echo $_SESSION['error_url']?>">Continue</a>
			<?php
			}if($response->status=='valid'){
			?>
			<table>
					<tr>
						<th> Parameter</th>
						<th> Value</th>
						<th> Status</th>
					</tr>
					<tr>
						<td>Identity Type</td>
						<td><?php echo ucwords(str_replace("_"," ",$response->identity_type))?></td>
						<td><?php echo ($response->is_identity_validated==1?'Verified':'Not Verified')?></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><?php echo ucfirst($response->country)?></td>
						<td><?php echo ($response->is_country_verified==1?'Verified':'Not Verified')?></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $response->first_name?></td>
						<td><?php echo ($response->is_first_name_verified==1?'Verified':'Not Verified')?></td>
					</tr>
					<tr>
						<td>Family Name</td>
						<td><?php echo $response->last_name?></td>
						<td><?php echo ($response->is_last_name_verified==1?'Verified':'Not Verified')?></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><?php echo $response->date_of_birth?></td>
						<td><?php echo ($response->is_date_of_birth_verified==1?'Verified':'Not Verified')?></td>
					</tr>
					<tr>
						<td>Verification Status</td>
						<td><?php echo $response->status?></td>
						<td><?php echo $response->message?></td>
					</tr>
				</table>			
			<?php
			}
			?>
		</div>
	</div>
<div>
<form action="<?php echo $_SESSION['redirect_url']?>" method="post">
<input type="hidden" value='<?php echo $_SESSION['response']?>' name="response">
<input type="submit" value="Continue" style="float:right;background:rgb(78,159,216) !important;color:#fff !important;">
</form>
</div>
<?php
get_footer();
?>
