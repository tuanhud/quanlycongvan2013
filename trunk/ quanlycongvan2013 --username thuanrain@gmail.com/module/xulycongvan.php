<?php
	//session_start();ob_start();
	include("dbcon.php"); 
	
	If ($_POST)
	{
		$madk = $_POST[MaCV];
		$xuly = $_POST[xuly];
		
		
		//echo $xuly;
		$sqldate = mysql_query("select now()");
		while($date = mysql_fetch_array($sqldate))
		   {
			   $dates = $date[0];
 			}
		
		mysql_query("update trangthaixuly set trangthai = $xuly, ngay = '".$dates."' where madk = $madk");
			echo "Cập nhật thành công.";
		
	}
	
	
?>
