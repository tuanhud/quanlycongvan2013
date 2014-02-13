<?php
	//session_start();ob_start();
	include("dbcon.php"); 
	
	If ($_POST)
	{
		$madk = $_POST[MaCV];
		$giaiquyet = $_POST[giaiquyet];
		$phanhoi = $_POST[phanhoi];
		$xuly = $_POST[xuly];
		
		
		//echo $xuly;
		$sqldate = mysql_query("select now()");
		while($date = mysql_fetch_array($sqldate))
		   {
			   $dates = $date[0];
 			}
		
		mysql_query("update trangthaixuly set trangthai = $xuly, ngay = '".$dates."' where madk = $madk");
		if($giaiquyet != "")
		{
			mysql_query("insert into ykiengiaiquyet values (' ', '".$madk."', '".$giaiquyet."')");
		}
		if($phanhoi != "")
		{
			mysql_query("insert into ykienphanhoi values (' ', '".$madk."', '".$phanhoi."')");
		}
			echo "Cập nhật thành công.";
		
	}
	
	
?>
