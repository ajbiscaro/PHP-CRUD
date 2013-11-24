<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
/**
 * PHP User CRUD
 * This file shows the user form for adding and updating data.
 * @File name: user_form.php
 * @Version: 1.0 (September 26, 2013)
 * @copyright Copyright (C) Ardel John Biscaro
 * @license http://www.gnu.org/licenses/gpl.html GNU/GPL, see gpl.txt
 * @link http://ajbiscaro.net84.net
 **/
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>User</title>
	<script type="text/javascript" src="scripts/scripts.js"></script>
	<link rel="StyleSheet" type="text/css" href="css/style.css" />
</head>

<body onload="setFocus();">

<div id="mainbody">

<form id="frmUser" name="frmUser" method="post" action="index.php">

	<div class="content-header">
			<table width="100%">
				<tbody>
					<tr>
						<td width="50%" valign="bottom" ><h3>Add User</h3></td>
						<td class="txtRight">
							<input class="button" id="saveButton" name="saveButton" type="button" value="Save"  onclick="javascript:submitform('save');" />
							<input class="button" id="cancelButton" name="cancelButton" type="button" value="Cancel" onClick="javascript:submitform('cancel');" />				
						
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	
	<fieldset>
			<legend class="txtFormLegend">User Form </legend>
			
				<div class="form_item">
					<label for="name">First Name: *</label>
					<input class="inputbox" type="text"  id="txtName" name="txtFirstname" value="<?php echo $first_name; ?>" />	
				</div>
			
				<div class="form_item">
					<label for="name">Middle Name: *</label>
					<input class="inputbox" type="text"  id="txtName" name="txtMiddlename" value="<?php echo $middle_name; ?>" />	
				</div>
				
				<div class="form_item">
					<label for="name">Last Name: *</label>
					<input class="inputbox" type="text"  id="txtName" name="txtLastname" value="<?php echo $last_name; ?>" />	
				</div>
							
				<div class="form_item">
					<label for="username">Country: </label>
					<input class="inputbox" type="text" id="txtUsername" name="txtCountry" value="<?php echo $country; ?>" />
				</div>
									
				<div class="form_item">
					<label for="email">Email: </label>
					<input class="inputbox" type="text" id="txtEmail" name="txtEmail" value="<?php echo $email; ?>" />
				</div>
									
				<p class="txtSmall">Note: Fields marked with * are required.</p>
				
				
				
				
				
		</fieldset>
		
		<input type="hidden" id="task" name="task"  value="" />
		<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
		
		<?php require_once('footer.php'); ?>
	
</form>

</div>	
	
 </body>
 </html>