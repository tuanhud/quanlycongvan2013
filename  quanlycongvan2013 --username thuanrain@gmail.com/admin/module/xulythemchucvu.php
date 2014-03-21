<?php
if($_POST)
{
	include("../dbcon.php");
	ob_start();
	$tencv	= $_POST['tencv'];
	$truyvan = "";
	if($tencv=="")
	{
		echo "Nhập đầy đủ thông tin để thêm mới chức vụ";
	}
	else 
	{
		
				$truyvan = "INSERT INTO chucvu (macv,tenchucvu) VALUES('','{$tencv}')";
				$a = mysql_query($truyvan);
				if($a)
					{
						echo "Thêm mới thành công";
		
					}
				else echo "Thêm thất bại !!!";

	}
}
?>