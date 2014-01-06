<?php
		
		@session_start();
		if(isset($_POST[phongban1]))
	{
		$_SESSION['phongban'] = $_POST['phong'];
		@header("location:thongke.php");	
	}
		$a = 6;
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		$phongbann = mysql_query("select tenpb from phongban where mapb = '".$mapb."'");
				while($rrr1 = mysql_fetch_array($phongbann))
				{
					$tenpb = $rrr1[tenpb];
				}
?>	
<!DOCTYPE html>

<html lang="en">
<head>

<?php 
include("head.php");
?>
<link rel="stylesheet" href="../CSS/jquery-calendar.css"/>
 <script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery-calendar.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.calendarFocus').calendar();
			});
		</script>
<script type = "text/javascript">
$(document).ready(function(){
$("#form_TK").submit(function(){ // id form
		var loaicv = $("#loaicv").val();	// tên combobox
		var BatDau = $("#BatDau").val();
		var KetThuc = $("#KetThuc").val();
		 
		
		$.ajax({
				type: "POST",
				url: "../module/thongketonghop.php", // file xử lý
				data: "loaicv="+loaicv+"&BatDau="+BatDau+"&KetThuc="+KetThuc, 
				success: function(result){$('#pro5').html(result);}
			});
		return false;
	});
	}); 
</script>

</head>
<body>

	
	<?php
		include("divtopbar.php");
		include("divheader.php");
	?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3> Danh Mục </h3>
				<ul>
					<li><a href="#"> Xử lý công văn </a></li>
					<li><a href="#"> Thống kê tổng hợp </a></li>
					<li><a href="#"> Công văn </a></li>
					<li><a href="#"> Tra cứu </a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Thống kê tổng hợp </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					<form id = "form_TK" name = "form_TK">
					<table>
					<tr>
					<td>
							<h1>	Loại thống kê :
							</h1>
							</td>
							<td align = "center">							
							<select name = "loaicv" id = "loaicv">
								<option value = "0"> 
								Cấp Trường
								</option>
								<option value = "1"> 
								Cấp Phòng Ban
								</option>
							</select>
							</td>
							<td >
							Từ ngày : 
							</td>
							<td>
							<p><input type = "text" name = "BatDau" id = "BatDau" size="10" class="calendarFocus" /></p>
							</td>
							<td>
							Đến ngày : 
							</td>
							<td>
							<input type = "text" name = "KetThuc" id = "KetThuc" size="10" class="calendarFocus" />
							</td>
							<td>
							 <input type = "submit" name = "submit" id = "submit" value= " Xác nhận "/>
							</td>							
								</tr>
					</form>
					</table>	
					<div id = "pro5">
							
					</div>	
					
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