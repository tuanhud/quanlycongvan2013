<?php
session_start();ob_start();
include("dbcon.php");

  //Các giá trị dược lưu trong biến $_POST
  // Kiểm tra nếu được post

      // Đưa dữ liệu vào các biến
	 If ($_POST)
	 {
		$phanloai = $_POST['PhanLoai'];
		$SoKH 		= $_POST['SOKH']; 
		$tbxNgay	= $_POST['tbxNgay'];
		$tbxNgayhh	= $_POST['tbxNgayhh'];
		$NguoiGui 	= $_POST['NguoiGui']; 
		$NguoiXuly = "";
		if($NguoiGui == '0')
		{
				$NguoiXuLy 	= $_POST['NguoiXuLy1'];
		
		}
		else
		{
			$NguoiXuLy 	= $_POST['NguoiXuLy'];
		}
		$SoTrang	= $_POST['SoTrang']; 
		$TrichYeu 	= $_POST['TrichYeu']; 
		$MucDo		= $_POST['MucDo'];
		$DoMat		= $_POST['DoMat']; 		
		$TacGia 	= $_POST['TacGia'];
		function date_i($string_i)
	{
		$thang_i = substr($string_i,3,2);
		$ngay_i = substr($string_i,0,2);
		$nam_i = substr($string_i,6,4);
		$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
		return $ngay_format;
	}
		//echo date_format($date, 'Y-m-d H:i:s');
		//$date = new DateTime($tbxNgay);
		$NgayVB = date_i($tbxNgay);
		//$date1 = new DateTime($tbxNgayhh);
		$Ngayhh = date_i($tbxNgayhh);
      // Phần xử lý của các bạn..
	  $MaxMadk = 0;
	  
	    if($NguoiGui == '0')
	    {
			$sql = "insert into CongVan(SoKH,NgayVB,NgayHH,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV) values ('".$SoKH."','".$NgayVB."','".$Ngayhh."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','".$NguoiGui."')"; 
			$t = mysql_query($sql);
			if($t == true)
				{
					$sqlmax = "select max(madk) from congvan ";
					  $max = mysql_query($sqlmax);
					  while($maxx = mysql_fetch_array($max))
					  {
						$MaxMadk = $maxx[0];
					  }
					$sql1 = "insert into trangthaixuly(Madk,TrangThai,Ngay) values ('".$MaxMadk."','3','".$NgayVB."')"; 
					$t1 = mysql_query($sql1);
					if($t1 == true)
					{
						header("location:../app/upload.php");
					}
					//echo "<script>confirm('Thêm Thành Công');</script>";  
				}
		}
		else
		if($NguoiGui != 0)
		{
			if($phanloai == 0)
			{
				$sql = "insert into CongVan(SoKH,NgayVB,NgayHH,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV) values ('".$SoKH."','".$NgayVB."','".$Ngayhh."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','1')"; 
				$t = mysql_query($sql);
				if($t == true)
				{
					$sqlmax = "select max(madk) from congvan ";
					  $max = mysql_query($sqlmax);
					  while($maxx = mysql_fetch_array($max))
					  {
						$MaxMadk = $maxx[0];
					  }
					$sql1 = "insert into trangthaixuly(Madk,TrangThai,Ngay) values ('".$MaxMadk."','0','".$NgayVB."')"; 
					$t1 = mysql_query($sql1);
					if($t1 == true)
					{
						header("location:../app/upload.php");
					}
					//echo "<script>confirm('Thêm Thành Công');</script>";  
				}
			}
			else
			{
				$sql = "insert into CongVan(SoKH,NgayVB,NgayHH,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV) values ('".$SoKH."','".$NgayVB."','".$Ngayhh."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','0')"; 
				$t = mysql_query($sql);
				if($t == true)
				{
					$sqlmax = "select max(madk) from congvan ";
					$max = mysql_query($sqlmax);
					while($maxx = mysql_fetch_array($max))
					{
						$MaxMadk = $maxx[0];
					}
					$sql1 = "insert into trangthaixuly(Madk,TrangThai,Ngay) values ('".$MaxMadk."','0','".$NgayVB."')"; 
					$t1 = mysql_query($sql1);
					if($t1 == true)
					{
						header("location:../app/upload.php");
					}
					//echo "<script>confirm('Thêm Thành Công');</script>";  
				}
			}
		}
	}
ob_end_flush();
?>


	