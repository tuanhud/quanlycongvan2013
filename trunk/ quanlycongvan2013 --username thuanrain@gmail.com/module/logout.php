<?php
session_start();
include("dbcon.php");
$manv = $_SESSION['manv'];
if (isset($_SESSION['myname'])) {
	unset($_SESSION['myname']); // Hủy sessionk
	$c = mysql_query("insert into lichsuhoatdong(manv,noidung) value ('".$manv."','Đăng xuất thành công')");
}

// trở về trang chủ
header('Location: ../app/login.php');
?>