<?php
if($_POST)
{
	include("../dbcon.php");
	ob_start();
	$tenpb	= $_POST['tenpb'];
	$chucnang		= $_POST['chucnang'];
	$truyvan = "";
	if($tenpb==""||$chucnang=="")
	{
		echo "Nhập đầy đủ thông tin để thêm mới phòng ban";
	}
	else 
	{
		
				$truyvan = "INSERT INTO phongban (tenpb,chucnang) VALUES('{$tenpb}','{$chucnang}')";
				$a = mysql_query($truyvan);
				if($a)
					{
						echo "Thêm mới thành công";
		
					}
				else echo "Thêm thất bại !!!";

	}
}
?>