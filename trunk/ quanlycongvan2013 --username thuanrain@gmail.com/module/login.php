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
        $sql = "SELECT * FROM user WHERE username='$name' AND password ='$pass' AND privileged ='1'"; 
		$member = mysql_query($sql);   
		$sql1 = "SELECT * FROM user WHERE username='$name' AND password ='$pass'"; 
		$member1 = mysql_query($sql1); 		
		if (mysql_num_rows($member)==1)//Thành công     
		{	
			$_SESSION['myname'] = $name; // Lưu name vào session
			header("location:../admin/index.php");
		}
		else{
		if (mysql_num_rows($member1)==1)//Thành công     
		{	
			$_SESSION['myname'] = $name; // Lưu name vào session
			header("location:../app/main.php");
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
