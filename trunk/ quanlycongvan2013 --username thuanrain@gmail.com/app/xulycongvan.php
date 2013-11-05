<?php
	@session_start();
	
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$id = $_GET['id'];
		
 
?>
<!DOCTYPE HTML>
<?php 
	$madk = $_GET[madk];
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>

<link href="../CSS/dk.css" rel="stylesheet" type="text/css">
</head>
<body>
	<table>
						<form action=""  method = "post">
							<?php
								$congvan = mysql_query("select congvan.madk,congvan.soKH, congvan.sotrang, congvan.nguoigui, congvan.ngayVB, congvan.trichyeu, trangthaixuly.trangthai from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.madk = '".$madk."'");
								while ($row = mysql_fetch_array($congvan))
								{
									echo '<tr>';
										echo '<td> Mã Công Văn : </td>';
										echo '<td> <input type = "text" name ="MaCV" disabled = "true" id = "MaCV" value = "'.$row[madk].'"/> <br></td>';
									echo '</tr>';
									echo '<tr>';
										echo '<td> Số kí hiệu : </td>';
										echo '<td> <input type = "text" name ="SOKH" disabled = "true" id = "SOKH" value = "'.$row[soKH].'"/> <br></td>';
									echo '</tr>';
									
									echo'<tr>';
										echo '<td align="left"> Ngày Ban Hành : </td>';
										echo '<td align="left"> <p><input type="text" name="tbxNgay" disabled = "true" size="10" value = "'.$row[ngayVB].'"/></p> </td><br>';
							?>
									</tr>
									<tr>
										<td> Người gửi : </td>
										<td> 
									<?php 
									$NguoiGui1 = mysql_query("select hoten from nhanvien where nhanvien.manv = '".$row[nguoigui]."'");
										while ($row1 = mysql_fetch_array($NguoiGui1))
										{
											
											echo '<input type ="text" name = "NguoiGui" disabled = "true" id = "NguoiGui" value = "'.$row1[hoten].'"/>';
										}
									?>
										</td>
									</tr>
									<tr>
										<td> Người Xử Lý : </td>
										<td align="left">
									
									
									<?php
									$sql1 = mysql_query("select Nhanvien.HoTen from NhanVien,user where nhanvien.manv = user.manv and user.username= '$user'");
									while ($rows2 = mysql_fetch_array($sql1))
									{
										echo  "<font color = 'red'>".$rows2[0]."</font>";	
									}	
																
									?>
		   
										</td>
									</tr>
									<tr>
										<td> Số trang : </td>
									<?php
										echo '<td> <input type = "text" name ="SoTrang" disabled = "true" id = "SoTrang" value = "'.$row[sotrang].'"/> <br></td>';
									?>
									</tr>
									<tr>
										<td> Trích Yếu : </td>
									<?php
										echo '<td><font color = "blue"> V/v '.$row[trichyeu].' ...</font></td>';
									?>
									</tr>
									<tr>
										<td> Trạng Thái Xử Lý : </td>
									<?php
										if($row[trangthai] == 0)
										{
											echo '<td><font color = "red"> Chưa Xử Lý </font></td>';
										}
									?>
									</tr>
									<tr> 
										<td> Chọn trạng thái xử lý :  </td>
										<td>
											<select name = "xuly" ID = "xuly">
												<option value = "0" > Chưa xử Lý </option>
												<option value = "1" > Đang xử Lý </option>
												<option value = "2" > Đã xử Lý </option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2" class="table-footer">
											<input type = "button" id= "button" class="round button blue text-upper small-button" value = "Cập Nhật"/>	
											
											</td>		
									</tr>
					<?php 	
								} 
					?>
						</form>
							
							
							
	</table>
</body>
</html>
<?php 
}
?>