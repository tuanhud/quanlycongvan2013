<?php
session_start();
ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Thông Báo</title>
    <link href="../CSS/dk.css" rel="stylesheet" type="text/css">
</head>
    <body>
<?php include("../module/dbcon.php");
if($_POST)
{
	$mkcu		= $_POST['mkcu'];
	$mkmoi		= $_POST['password'];
	$a=mysql_fetch_array(mysql_query("select * from user where username = '".$_SESSION['myname']."'"));
	if($mkcu==$a['password'])
	{
		if(mysql_query("update user set password='{$mkmoi}' where username='".$_SESSION['myname']."'"))
		{
			echo '<div class="bgdk">Thay đổi mật khẩu thành công .</div>';
			$c = mysql_query("insert into lichsuhoatdong(manv,noidung) value ('".$manv."','Đổi mật khẩu thành công')");

		}
		else echo '<div class="bgdk">Thay đổi mật khẩu thất bại .</div>';
	}
	else echo  '<div class="bgdk">Mật khẩu cũ không đúng . </div>';
}
ob_end_flush();
?>
</body>
</html>
