
<?php

@session_start();
//ob_start(); 
	include ('dbcon.php');
   $q=$_GET["q"];
   $mapb=$_GET["mapb"];
   $batdau=$_GET["batdau"];
   $ketthuc=$_GET["ketthuc"];
   
   if($q != 0)
   {
		$_SESSION['phongbann'] = $mapb;
		$_SESSION['batdau'] = $batdau;
		$_SESSION['ketthuc'] = $ketthuc;
		//header("location: ../app/chitietthongke.php");
		//require("../app/chitietthongke.php");
   }
   else
   {
		$_SESSION['phongbann'] = 0;
		$_SESSION['batdau'] = $batdau;
		$_SESSION['ketthuc'] = $ketthuc;
		//header("location: ../app/chitietthongke.php");
		//require("../app/chitietthongke.php");
   }
	
   

 //
 ?>  
 
		<script> window.location = "../app/chitietthongke.php"; </script>