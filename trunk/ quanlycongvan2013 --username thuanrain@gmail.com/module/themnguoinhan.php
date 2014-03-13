<?php
include("dbcon.php");
if(!empty($_POST['submit'])) 
{
 if(!empty($_POST['cities'])) 
  {

	$maxdk = $_POST['maxdk'];
    foreach($_POST['cities'] as $city) {

      
      if(!preg_match('/^[-A-Z0-9\., ]+$/iD', $city)) continue;

      mysql_query("insert into chitietnhan values ('".$maxdk."','".$city."','0')");
    }
	
    

  } 
}
header("location:../app/congvanden.php");
