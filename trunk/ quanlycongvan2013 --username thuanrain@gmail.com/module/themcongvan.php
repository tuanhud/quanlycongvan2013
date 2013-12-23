<?php
session_start();ob_start();
include("dbcon.php");

  //Các giá trị dược lưu trong biến $_POST
  // Kiểm tra nếu được post

      // Đưa dữ liệu vào các biến
	 If ($_POST)
	 {
		$SoKH 		= $_POST['SOKH']; 
		$tbxNgay	= $_POST['tbxNgay'];
		$NguoiGui 	= $_POST['NguoiGui']; 
		$NguoiXuLy 	= $_POST['NguoiXuLy'];
		$SoTrang	= $_POST['SoTrang']; 
		$TrichYeu 	= $_POST['TrichYeu']; 
		$MucDo		= $_POST['MucDo'];
		$DoMat		= $_POST['DoMat']; 		
		$TacGia 	= $_POST['TacGia'];
		$LoaiCV 	= $_POST['LoaiCV'];		
		//echo date_format($date, 'Y-m-d H:i:s');
		$date = new DateTime($NgayVB);
		$NgayVB = date_format($date, 'Y-m-d H:i:s');
		
      // Phần xử lý của các bạn..
	    $sql = "insert into CongVan(SoKH,NgayVB,NguoiGui,NguoiXuLy,SoTrang,TrichYeu,DoKhan,DoMat,TacGia,LoaiCV) values ('".$SoKH."','".$NgayVB."','".$NguoiGui."','".$NguoiXuLy."','".$SoTrang."','".$TrichYeu."','".$MucDo."','".$DoMat."','".$TacGia."','".$LoaiCV."')"; 
		$t = mysql_query($sql);
		if($t == true)
		{
			//echo "<script>confirm('Thêm Thành Công');</script>";  
			header("location:../app/upload.php");
		}
  }
ob_end_flush();
?>


	