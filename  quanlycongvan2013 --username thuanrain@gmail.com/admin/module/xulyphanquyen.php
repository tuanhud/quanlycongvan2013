<?php
if($_POST)
{
	include("../dbcon.php");
	$truyvan = $_POST['truyvan'];
	$manv = $_POST['manv'];
	$b = mysql_query("delete from chitietphanquyen where manhanvien = '".$manv."'");
	if($b)
	{
	$a = mysql_query($truyvan);
	if($a)
		{
		$c = mysql_query("insert into lichsuhoatdong(manv,noidung) value ('0','Phân quyền cho nhân viên mã số ".$manv."')");
		echo "<center>Phân quyền thành công .</center>";
		}
	}
	else echo "<center>Phân quyền thất bại .</center>";
}
?>