<?php
session_start();
 $madk=$_GET["tid"];
 include ('dbcon.php');
 $sql_active = "update congvan set active = '0' where madk = $madk";
 $t_active = mysql_query($sql_active);
 if($t_active == 1)
 {
	header('Location: ../app/congvandi.php');
 }
 
 /* XÓA CÔNG VĂN
 $sql0 = "select url from file where madk = $madk";
 $t0 = mysql_query($sql0);
 while ($row = mysql_fetch_array($t0))
 {
	unlink("../uploads/".$row[url]);
 }
 $sql1 = "delete from file where madk = $madk ";
   $t1 = mysql_query($sql1);
$sql2 = "delete from chitietnhan where madk = $madk ";	
   $t2 = mysql_query($sql2);
$sql3 = "delete from trangthaixuly where madk = $madk ";	
   $t3 = mysql_query($sql3);
$sql4 = "delete from ykiengiaiquyet where madk = $madk ";	
   $t4 = mysql_query($sql4);
 $sql5 = "delete from ykienphanhoi where madk = $madk ";	
   $t5 = mysql_query($sql5);
$sql6 = "delete from congvan where madk = $madk ";	
   $t6 = mysql_query($sql6);
*/
 
 

?>