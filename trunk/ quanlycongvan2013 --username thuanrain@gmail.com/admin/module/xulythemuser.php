<?php
if($_POST)
{
	include("../dbcon.php");
	ob_start();
	$tendn		= $_POST['tendn'];
	$mk		= $_POST['mk'];
	$nlmk		= $_POST['nlmk'];
	$quyen		= $_POST['quyen'];
	$manv		= $_POST['manv'];
	$truyvan = "";
	if($tendn==""||$mk==""||$nlmk==""||$quyen==""||$manv=="")
	{
		echo "Nhập đầy đủ thông tin để thêm mới tài khoản";
	}
	else 
	{
		if($mk!=$nlmk)
			{
				echo "Nhập lại mật khẩu không đúng";
			}
			else
			{
				$truyvan = "INSERT INTO user (username,password,privileged,manv) VALUES('{$tendn}', '{$mk}',{$quyen}, '{$manv}')";
				$a = mysql_query($truyvan);
				if($a)
					{
						echo "Thêm mới thành công";
		
					}
				else echo "Thêm thất bại !!!";
			}
	}
}
?>