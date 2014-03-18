<?php
session_start();ob_start();
include("dbcon.php");
  // Các giá trị dược lưu trong biến $_POST
  // Kiểm tra nếu được post
  if($_POST) {
      // Đưa dữ liệu vào các biến
		$name 		= $_POST['username']; 
		$pass 		= $_POST['password']; 
		
		
      // Phần xử lý của các bạn..
        $sql = "SELECT * FROM user WHERE username='$name' AND password ='$pass' AND privileged ='2'"; 
		$member = mysql_query($sql);   
		$sql1 = "SELECT * FROM user WHERE username='$name' AND password ='$pass'"; 
		$member1 = mysql_query($sql1);
$cacquyen = array();		
		if (mysql_num_rows($member)==1)//Thành công     
		{	
			$_SESSION['myname'] = $name; // Lưu name vào session
			header("location:../admin/index.php");
		}
		else{
		if (mysql_num_rows($member1)==1)//Thành công     
		{	
			$_SESSION['myname'] = $name; // Lưu name vào session
			$quyen = mysql_query("select maquyen from chitietphanquyen where manhanvien = (select manv from user where username = '".$name."')");
			while ($rr = mysql_fetch_array($quyen))
			{
				array_push($cacquyen,(STRING)$rr[maquyen]);
			}
		//	$cacquyen = $cacquyen.'0';
			$_SESSION['cacquyen'] = $cacquyen; 
			
			$info = mysql_query("select nhanvien.manv, nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = '".$name."'");
			while($r = mysql_fetch_array($info))
			{
				$manv = $r[manv];
				$mapb = $r[mapb];
			}
			$_SESSION['phongbanbc']= $mapb;
			$_SESSION['phongban'] = $mapb;
			$_SESSION['manv'] = $manv;
			$c = mysql_query("insert into lichsuhoatdong(manv,noidung) value ('".$manv."','Đăng nhập thành công')");
			header("location:../app/congvanden.php");
		}
		else if($name=="" || $pass=="")
			echo '
				<p class="success">Vui lòng điền tên và mật khẩu</p>
				<a href="logout.php">Quay lại</a>'; 
		else
				echo '<p class="success">Tên hoặc mật khẩu không đúng !</p>
				<a href="logout.php">Quay lại</a>'; 
		}
  }
ob_end_flush();
?>
