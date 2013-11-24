<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
/**
 * PHP User CRUD
 * This file shows the list of users from the database.
 * @File name: user_list.php
 * @Version: 1.0 (September 26, 2013)
 * @copyright Copyright (C) Ardel John Biscaro
 * @license http://www.gnu.org/licenses/gpl.html GNU/GPL, see gpl.txt
 * @link http://ajbiscaro.net84.net
 **/
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Users List</title>
	<script type="text/javascript" src="scripts/scripts.js"></script>
	<link rel="StyleSheet" type="text/css" href="css/style.css" />
</head>
<body>

<div id="mainbody">

<form id="frmUser" name="frmUser" method="post"	action="index.php">

<div class="content-header">
<table width="100%">
	<tbody>
		<tr>
			<td width="50%" valign="bottom" ><h3>Users List</h3></td>
			<td class="txtRight">
				<input class="button" id="add" name="add" type="submit" value="ADD" />
			</td>
		</tr>
	</tbody>
</table>
</div>

<?php if ( $_SESSION['msg'] ){ ?>
	<p><?php echo $_SESSION['msg']; ?></p>	
<?php 
	unset($_SESSION['msg']); 
	} 
?>

	<table class="adminlist" >
		<thead> 	
			<tr>
				<th nowrap="nowrap">Name</th> 
				<th nowrap="nowrap">Country</th>
				<th nowrap="nowrap">Email Address</th>
				<th nowrap="nowrap" colspan ="2">Action</th>
			</tr> 
		</thead> 
		
<?php
		while ($row = mysql_fetch_array($result)) {
			$user_id = $row['user_id'];
			$link_edit = 'index.php?task=edit&uid='.$user_id; 
?>			
			<tr>
				<td><?php echo $row['last_name'].', '.$row['first_name'].' '.$row['middle_name']; ?></td>	
				<td><?php echo $row['country']; ?></td>				
				<td><?php echo $row['email']; ?></td>
				<td><a href="<?php echo $link_edit; ?>">Edit</a></td>
				<td><a href="javascript:confirmation(<?php echo $user_id; ?>)">Delete</a></td>
			</tr>
<?php		
		}
?>
	</table>
	<?php echo $pagination; ?>
	<input type="hidden" id="task" name="task"  value="add" />
	<?php require_once('footer.php'); ?>
</form>

</div>

</body>
</html>