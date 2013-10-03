<?php
session_start();ob_start();
require_once("dbcon.php");
?>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


</head>
<?php

  if($_POST) {
      // Đưa dữ liệu vào các biến
		$name 		= $_POST['name']; 
		$email 		= $_POST['email']; 
		
		$name=strip_tags(mysql_real_escape_string($name)); 
		$email=strip_tags(mysql_real_escape_string($email)); 
		IF(isset($_SESSION['login']))
		{
			 unset($_SESSION['login']);
		}
		
      // Phần xử lý của các bạn..
        $sql = "SELECT * FROM user WHERE username='$name' AND password ='$email'"; 
		
		$member = mysql_query($sql);   
	
		while ($row = mysql_fetch_array($member))
		if (mysql_num_rows($member)==1)//Thành công     
		{	
		$_SESSION['login'] = $row[2];
		echo '<p class="success">Chúc mừng bạn <span style="color:blue" >'.$row[0].'</span></p>';
			echo'	<a href="logout.php"> Đăng Xuất </a> !</p>'; 
		}
		else //Thất bại 
				echo '<p class="success">Username hoặc password không đúng !</p>'; 
  }
ob_end_flush();
?>
