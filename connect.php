<?php
//Database Configurations
$DbHost='localhost';
$DbUser='root';
$DbPassword='';
$DbName='users_info';

//Connect to the database
$dbc = mysql_connect($DbHost, $DbUser, $DbPassword);
mysql_select_db($DbName);

?>