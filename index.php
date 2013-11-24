<?php
/**
 * PHP User CRUD
 * This file controls the different of actions of the CRUD.
 * @File name: index.php
 * @Version: 1.0 (September 26, 2013)
 * @copyright Copyright (C) Ardel John Biscaro
 * @license http://www.gnu.org/licenses/gpl.html GNU/GPL, see gpl.txt
 * @link http://ajbiscaro.net84.net
 **/

session_start();

require_once ('connect.php');

$task = $_REQUEST['task'];

switch($task)
{
	case "add": 
	case "edit": 
	editUser();
		break;
		
	case 'save':
	saveUser();
		break;
	
	case 'delete':
	deleteUser();
		break;

	case "show":
	default: 
	showUser();
		break; 
}

//Retrieve user data for listing
function showUser()
{	
	$query = 'SELECT * from users';
	
	$result = mysql_query($query );
	
	require_once ('user_list.php');	
}

//Retrieve selected user data for update
function editUser()
{
	if ( $_REQUEST['task'] == 'edit' ){
		if ( $_REQUEST['uid'] ){
			$user_id = $_REQUEST['uid'];
		
			$query = "select * from users where user_id = $user_id"; 
			$result = mysql_query($query); 	
			while ($row = mysql_fetch_array($result)){  
    
				$user_id 			= $row['user_id'];
				$last_name			= $row['last_name'];
				$first_name			= $row['first_name'];
				$middle_name		= $row['middle_name'];
				$country 			= $row['country'];
				$email				= $row['email'];
   
			}
		}
	}
	
	require_once ('user_form.php');
}

//Saves user data
function saveUser()
{	
		
	$user_id 			= $_POST['user_id'];
	$last_name 			= $_POST['txtLastname'];
	$first_name 		= $_POST['txtFirstname'];
	$middle_name 		= $_POST['txtMiddlename'];
	$country 			= $_POST['txtCountry'];
	$email				= $_POST['txtEmail'];
	
	if( $user_id == null ){
		$query = "INSERT INTO users (last_name, first_name, middle_name, country, email) ".
			"VALUES ('$last_name', '$first_name','$middle_name', '$country', '$email' )";
	}else{
		$query = 'UPDATE users SET'
			. ' last_name = "'.$last_name.'",'
			. ' first_name = "'.$first_name.'",'
			. ' middle_name = "'.$middle_name.'",'
			. ' country = "'.$country.'",'
			. ' email = "'.$email.'"'
			. ' WHERE user_id = "'.$user_id.'" ';
	}
		
	$result = mysql_query($query );
			
	if($result){
		header('location: index.php');
		$_SESSION['msg'] = "User Saved"; 	
	}
					
}

//Delete selected user data
function deleteUser()
{
	if( $_REQUEST['uid'] ){

		$user_id = $_REQUEST['uid'];
		
		$query = "delete from users where user_id = $user_id";  
		$result = mysql_query($query); 
		if($result){
			header('location: index.php');
			$_SESSION['msg'] = "User/s Deleted";
		}	
	}
}

mysql_close($dbc);
?>