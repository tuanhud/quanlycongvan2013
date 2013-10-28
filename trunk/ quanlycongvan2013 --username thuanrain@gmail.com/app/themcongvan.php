<?php
		session_start();
		
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		
 
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>UIT DMS</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="../css/style2.css">
	<link rel="stylesheet" href="../css/jquery-calendar.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		
	<script src="../js/jquery-1.7.2.min.js"></script>  
	<script src="../js/script.js"></script>  
	<script>
function showfile(str,t)
{
var s = "file"+t;
if (str=="")
  {
  document.getElementById(""+s).innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(""+s).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../module/getfile.php?q="+str,true);
xmlhttp.send();
}
</script>

 <script type="text/javascript" src="../CSS/jquery.js"></script>
		<script type="text/javascript" src="../CSS/jquery-calendar.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.calendarFocus').calendar();
			});
		</script>

</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $user ?></strong></a>
					<ul>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">User Settings</a></li>
						<li><a href="#">Change Password</a></li>
						<li><a href="#">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">3 new messages</a></li>
				<li><a href="#" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="main.php" class="active-tab dashboard-tab">Trang chủ</a></li>
				<li><a href="congvanden.php">Công văn đến</a></li>
				<li><a href="congvandi.php">Công văn đi</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="../images/company-logo.png" alt="UIT" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Danh mục</h3>
				<ul>
					<li><a href="#">Thêm mới</a></li>
					<li><a href="#">Danh sách công văn đi</a></li>
					<li><a href="#">??????</a></li>
					<li><a href="#">??????</a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Thêm Mới Công Văn </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							
	
							<tfoot>
							
								<tr>
								
									<td colspan="6" class="table-footer">
									
										<label for="table-select-actions">With selected:</label>
	
										<select id="table-select-actions">
											<option value="option1">Delete</option>
											<option value="option2">Export</option>
											<option value="option3">Archive</option>
										</select>
										
										<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	
	
									</td>
									
								</tr>
							
							</tfoot>
							
							<tbody>
								<tr>
								<td> Số kí hiệu : </td>
								<td> <input type = "text" name ="SOKH" id = "SOKH"/> <br></td>
								</tr>
								
								<tr>
								<td align="left"> Ngày Ban Hành : </td>
								<td align="left"> <p><input type="text" name="tbxNgay" size="10" class="calendarFocus"/></p> </td><br>
								</tr>
								<tr>
								<td> Người gửi : </td>
								<td> 
								<?php 
								$NguoiGui = mysql_query("select nhanvien.hoten from nhanvien,user where nhanvien.manv = user.manv and user.username = '$user'") ;
									while ($row = mysql_fetch_array($NguoiGui))
									{
										echo ''.$row[hoten];
									}
								?>
								</td>
								</tr>
								<tr>
								<td> Người Xử Lý : </td>
								<td align="left">
								<select name = "NguoiXuLy" id = "NguoiXuLy" >
								<option value = "0"> Chọn Người Xử Lý </option>  
								<?php
								$sql1 = mysql_query("select MaNV,HoTen from NhanVien where manv not in (select manv from user where username = '$user')");
								while ($rows1 = mysql_fetch_array($sql1))
								{
									echo "<option value='$rows1[0]'> $rows1[1] </option>";	
								}		
								?>
								</select><br><br>
       
								</td>
								</tr>
								<tr>
								<td> Số trang : </td>
								<td> <input type = "text" name ="SoTrang" id = "SoTrang"/> </td>
								</tr>
								<tr>
								<td> Trích Yếu : </td>
								<td> <input type = "text" name ="TrichYeu" id = "TrichYeu"/> </td>
								</tr>
								<tr>
								<td> Mức độ : </td>
								<td> 
								<select name = "MucDo" id = "MucDo" >
								<option value = "0"> Chọn Mức Độ </option>
								<option value = "1"> Hỏa Tốc </option>
								<option value = "0"> Khẩn </option>
								<option value = "0"> Bình Thường </option>
								</select>
								</td>
								</tr>
								<tr>
								<td> Tác Giả : </td>
								<td> <input type = "text" name ="TacGia" id = "TacGia"/> </td>
								</tr>
								
							
							</tbody>
							
						</table>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
	

		
		
		
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2013 <a href="#"></a>. All rights reserved.</p>
	
	</div> <!-- end footer -->

</body>
</html>
<?php }
else
header("location:login.php");
?>
