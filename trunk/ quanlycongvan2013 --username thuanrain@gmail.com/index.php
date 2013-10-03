<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Đăng nhập</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" href="css/style.css" rel="stylesheet">
	

</head>
<body>
<div id="mainlogin">
<div id="toplogin">
<h2></h2>
<div id="login">
<div id="top">
<h2>Đăng nhập</h2>
<h3>Mời bạn cung cấp thông tin để đăng nhập hệ thống</h3>
</div>
<div id="bot">
<form id="tutorial" action="module/test.php" method="post">
    <label for="name">Tên truy cập:</label>
    <input type="text" name="name" id="name" class="required" minlength="6"/>
    <p><label for="email">Mật khẩu:</label>
    <input type="password" name="email" id="email" class="required" /></p>
    <p class="submit"><input id="submit" type="submit" value="Đăng nhập" /></p>
</form>

</div>
</div>
</div>
<div id="botlogin">
</div>
</div>

</body>
</html>