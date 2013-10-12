<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<meta charset=utf-8 />
<title>Trang đăng nhập</title>

  <script>
    $(function(){
      center()
        $(window).resize(function(){center()})
      function center(){
        $('div').css({left:($(window).width()-$('div').width())/2,top:($(window).height()-$('div').height())/2})
      }
    })
  </script>
</head>
<body>
  <div id="div">
	<h2>Đăng nhập</h2>
	<h3>Mời bạn cung cấp thông tin để đăng nhập hệ thống</h3>
	<form id="tutorial" action="test.php" method="post">
    <label for="name">Tên truy cập:</label>
    <input type="text" name="name" id="name" class="required" minlength="6"/>
    <p><label for="email">Mật khẩu:</label>
    <input type="password" name="email" id="email" class="required" /></p>
    <p class="submit"><input id="submit" type="submit" value="Đăng nhập" /></p>
	</form>
  </div>
</body>
</html>