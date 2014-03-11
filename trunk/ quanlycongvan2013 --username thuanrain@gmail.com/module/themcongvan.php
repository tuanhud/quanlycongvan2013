 <?php
@session_start();ob_start();
include("dbcon.php");

  //Các giá trị dược lưu trong biến $_POST
  // Kiểm tra nếu được post

      // Đưa dữ liệu vào các biến
	 If ($_POST)
	 {
		$phancap = $_POST['R'];
		$phanloai = $_POST['PhanLoai'];
		$SoKH 		= $_POST['SOKH']; 
		$tbxNgay	= $_POST['tbxNgay'];
		$tbxNgayhh	= $_POST['tbxNgayhh'];
		$NguoiGui 	= $_POST['NguoiGui'];
		$CVDT 	= $_POST['CVDT']; 		
		$NguoiXuly = "";
		if($phanloai == 0 && $phancap == 0)
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
		$MaxMadk = 0;
	  
	    if($phanloai == '1') // thêm công văn đến
	    {
		
			$sql = "insert into CongVan(SoKH,NgayVB,NgayHH,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV,Active) values ('".$SoKH."','".$NgayVB."','".$Ngayhh."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','0','1')"; 
				$t = mysql_query($sql);
				if($t == true)
				{
					$sqlmax = "select max(madk) from congvan ";
					$max = mysql_query($sqlmax);
					while($maxx = mysql_fetch_array($max))
					{
						$MaxMadk = $maxx[0];
					}
					$sql0 = "insert into chitietnhan(Madk,manv,Trangthai) values ('".$MaxMadk."','".$NguoiXuLy."','0')"; 
					$t0 = mysql_query($sql0);
					
					$sql1 = "insert into trangthaixuly(Madk,TrangThai,Ngay) values ('".$MaxMadk."','0','".$NgayVB."')"; 
					$t1 = mysql_query($sql1);
					if($t1 == true && $t0 == true)
					{
						header("location:../app/upload.php");
					}
					//echo "<script>confirm('Thêm Thành Công');</script>";  
				}
		}
		else
		{
			if($phancap == 0) // thêm công văn đi của trường
				{
					$sql = "insert into CongVan(SoKH,NgayVB,NgayHH,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV,Active) values ('".$SoKH."','".$NgayVB."','".$Ngayhh."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','0','1')"; 
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
			if($phancap != 0) // thêm công văn đi nội bộ
				{
					if($CVDT == '1')
					{
						$sql = "insert into CongVan(SoKH,NgayVB,NgayHH,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV,isFile,Active) values ('".$SoKH."','".$NgayVB."','".$Ngayhh."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','1','0','1')"; 
					}
					else
					{
						$sql = "insert into CongVan(SoKH,NgayVB,NgayHH,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV,isFile,Active) values ('".$SoKH."','".$NgayVB."','".$Ngayhh."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','1','1','1')"; 
					}
					$t = mysql_query($sql);
					if($t == true)
						{
							$sqlmax = "select max(madk) from congvan ";
							  $max = mysql_query($sqlmax);
							  while($maxx = mysql_fetch_array($max))
							  {
								$MaxMadk = $maxx[0];
							  }
							  $sql0 = "insert into chitietnhan(Madk,manv,Trangthai) values ('".$MaxMadk."','".$NguoiXuLy."','0')"; 
					$t0 = mysql_query($sql0);
					
							$sql1 = "insert into trangthaixuly(Madk,TrangThai,Ngay) values ('".$MaxMadk."','0','".$NgayVB."')"; 
							$t1 = mysql_query($sql1);
							if($t1 == true && $t0 == true)
							{
								if($CVDT == '1')
								{
								//header("locatin:../app/noidung.php");
								//	echo "<script> window.location.href = 'location:../app/noidung.php' ;</script> ";
									echo '<script> window.location = "../app/noidung.php"; </script>';
								}
								else
								{
									//header("location:../app/upload.php");
								//	echo "<script> window.location.href= = 'location:../app/upload.php' ;</script> ";
									echo '<script> window.location = "../app/upload.php"; </script>';
								}
							}
							//echo "<script>confirm('Thêm Thành Công');</script>";  
						}
				}	
		} // end else
		
	} // end if POST
	
ob_end_flush();
?>


	