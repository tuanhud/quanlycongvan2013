<?php
		session_start();
		
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		
 
?>
<html lang="en">
<head>
<?php 
include("head.php");
?>
</head>
<body>

	<?php
		include("divtopbar.php");
		include("divheader.php");
	?>
	
	
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
					
						<h3 class="fl"> Thêm Người Nhận Công Văn </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							
	
							
							
							<tbody>
							<form action="../module/themnguoinhan.php" method = "post">
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
								$NguoiGui = mysql_query("select nhanvien.hoten,nhanvien.manv from nhanvien,user where nhanvien.manv = user.manv and user.username = '$user'") ;
									while ($row = mysql_fetch_array($NguoiGui))
									{
										echo ''.$row[hoten];
										echo '<input type ="hidden" name = "NguoiGui" id = "NguoiGui" value = "'.$row[manv].'"/>';
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
								<option value = "Hỏa Tốc"> Hỏa Tốc </option>
								<option value = "Khẩn"> Khẩn </option>
								<option value = "Bình Thường"> Bình Thường </option>
								</select>
								</td>
								</tr>
								<tr>
								<td> Tác Giả : </td>
								<td> <input type = "text" name ="TacGia" id = "TacGia"/> </td>
								</tr>
								<tr>
								
									<td colspan="2" class="table-footer">
									
										
										
										<input type = "submit" class="round button blue text-upper small-button" value = "Thêm"/>	
	
									</td>
									
								</tr>
							</form>
							
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
