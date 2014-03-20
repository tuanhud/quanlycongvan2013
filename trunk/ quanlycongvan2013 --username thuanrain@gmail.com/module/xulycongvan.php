<script>
function aaa()
{
	this.close();
}
</script>
<?php
	//session_start();ob_start();
	include("dbcon.php"); 
	
	If ($_POST)
	{
		$madk = $_POST[MaCV];
		$giaiquyet = $_POST[giaiquyet];
		$phanhoi = $_POST[phanhoi];
		$xuly = $_POST[xuly];
		$NguoiXuLy =  $_POST[NguoiXuLy];
		
		//echo $xuly;
		if($NguoiXuLy == 0)
		{
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
		else
		{
			$t = mysql_query("update congvan set nguoixuly = '".$NguoiXuLy."' where madk = $madk");
			if($t == true)
			{
				  $sql0 = "insert into chitietnhan(Madk,manv,Trangthai) values ('".$madk."','".$NguoiXuLy."','0')"; 
				$t0 = mysql_query($sql0);
				echo "Đã chuyển người xử lý thành công.";
			}
		}
		
	}
	
//header("location:../app/congvanden.php");	
?>

