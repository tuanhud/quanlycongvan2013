
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>UIT DMS - Website quản lý công văn</title>
<link rel="stylesheet" type="text/css" href="CSS/styleindex.css">
<link rel='stylesheet' id='style-css'  href='CSS/diapo.css' type='text/css' media='all'> 
<script type='text/javascript' src='js/jquery.min.js'></script>
<!--[if !IE]><!--><script type='text/javascript' src='js/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
<script type='text/javascript' src='js/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='js/diapo.js'></script> 
<script>
$(function(){
$('.pix_diapo').diapo();
});
</script>
</head>

<body>

<div id="divContainer">
  <div id="divHeader">
			<div id="divBanner">
			<img src="index/logo-header.png" alt="http://localhost/QuanLyCongVan/index.php" style="float:left" width="465px" height="90px">
			</div>

			<div id="divMenu">
	<ul>

                <li>
                     <a href="" title="Trang chủ" class="active" ><b>Trang chủ</b></a>
                </li>
				<li>
                     <a href="" title="Giới thiệu" class="" ><b>Giới thiệu</b></a>
                </li>
				<li>
                     <a href="" title="Sản phẩm" class="" ><b>Thông báo</b></a>
                </li>
				<li>
                     <a href="" title="Dịch vụ" class="" ><b>Hành chính</b></a>
                </li>
				
				<li>
                     <a href="" title="Bản đồ" class="" ><b>Tuyển dụng</b></a>
                </li>
				<li>
                     <a href="" title="Liên hệ" class="" ><b>Liên hệ</b></a>
                </li>


			<span style="float: right; padding-left:120px; padding-top:7px;">
			<form action ="timkiem.php" method = "post">
			<input type="text" name="txtWord" />
			<input type="submit" value="Tìm kiếm" name="btnSearch" />
			</span>
						      
  </ul>
  </form>
    </div>
  </div>
			
		<div class="clr"></div>
				
<?php 	include('index/divLeft.php');
		include('index/divMid.php');

 ?>
<div class="clr"></div>
<div id="divFooter">
<center>Copyright 2013</center>
</div> 

</div> 
</body>
</html>