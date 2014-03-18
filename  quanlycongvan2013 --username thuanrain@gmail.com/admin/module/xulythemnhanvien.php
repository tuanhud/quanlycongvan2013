<?php
if($_POST)
{
	include("../dbcon.php");
	ob_start();
	$hoten	= $_POST['hoten'];
	$ngaysinh		= $_POST['ngaysinh'];
	$cmnd		= $_POST['cmnd'];
	$email		= $_POST['email'];
	$diachi		= $_POST['diachi'];
	$mapb		= $_POST['mapb'];
	$macv		= $_POST['macv'];
	$truyvan = "";
	if($hoten==""||$ngaysinh==""||$cmnd==""||$diachi==""||$mapb==""||$email==""||$macv=="")
	{
		echo "Nhập đầy đủ thông tin để thêm mới nhân viên";
	}
	else 
	{
		
				$truyvan = "INSERT INTO nhanvien (hoten,ngaysinh,cmnd,email,diachi,mapb,macv) VALUES('{$hoten}','{$ngaysinh}','{$cmnd}','{$email}','{$diachi}',{$mapb},{$macv})";
				$a = mysql_query($truyvan);
				if($a)
					{
						echo "Thêm mới thành công";
		
					}
				else echo "Thêm thất bại !!!";

	}
}
?>