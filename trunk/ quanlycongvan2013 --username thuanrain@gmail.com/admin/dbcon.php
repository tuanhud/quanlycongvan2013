<?php 
$host="localhost"; 
$username="root"; 
$password=""; 
$database="dms"; 
mysql_connect($host,$username,$password,false,65536); 
mysql_query("set names 'utf8'"); 
mysql_select_db($database);     
?>