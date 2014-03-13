<?php
include("dbcon.php");
if(!empty($_POST['submit'])) 
{
$max = mysql_query("select max(madk) from congvan");
		//$ngnhan = array();
		while($row0 = mysql_fetch_array($max))
		{
			$maxdk = $row0[0];
		}
  $editor_data = $_POST['editor1'];


    

      mysql_query("insert into noidung values ('','".$maxdk."','".$editor_data."')");
    }
	

header("location:../app/themnguoinhan.php");
