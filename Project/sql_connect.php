<?php 
//Make a connection with mysql
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
 
//Select data base
$selected = mysql_select_db("mails",$link)
    or die("Could not selected db2");

?> 