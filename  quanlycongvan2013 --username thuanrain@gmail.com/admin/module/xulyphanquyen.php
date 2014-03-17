<?php
if($_POST)
{
	include("../dbcon.php");
	$truyvan = $_POST['truyvan'];
	$manv = $_POST['manv']
	$b = mysql_query("delete from chitietphanquyen where manhanvien = ".$manv."");
	$a = mysql_query($truyvan);
	if($a)
		echo "Thành công .";
	else echo "Thất bại .";
}
?>