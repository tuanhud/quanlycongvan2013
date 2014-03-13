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
<script language="javascript" type="text/javascript" src="../js/thickbox1.js"></script>

<link href="../CSS/thickbox.css" rel="stylesheet" type="text/css">
</head>
<body>
	<table class="thickbox">
						<form action="../module/xulycongvan.php"  method = "post">
							<?php
								$congvan = mysql_query("select congvan.madk,congvan.soKH, congvan.sotrang, congvan.nguoigui, congvan.ngayVB, congvan.trichyeu, trangthaixuly.trangthai from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.madk = '".$madk."' and congvan.active = 1");
								while ($row = mysql_fetch_array($congvan))
								{
									echo '<tr>';
										echo '<td> Mã Công Văn : </td>';
										echo '<td> <input type = "text" disabled = "true" name ="MaCV" id = "MaCV" value = "'.$row[madk].'"/> <br></td>';
										echo '<input type = "hidden" name = "MaCV" value = "'.$row[madk].'"/>';
									echo '</tr>';
									echo '<tr>';
										echo '<td> Số kí hiệu : </td>';
										echo '<td> <input type = "text" name ="SOKH" disabled = "true" id = "SOKH" value = "'.$row[soKH].'"/> <br></td>';
									echo '</tr>';
									
									echo'<tr>';
										echo '<td> Ngày Ban Hành : </td>';
										echo '<td> <p><input type="text" name="tbxNgay" disabled = "true" size="10" value = "'.$row[ngayVB].'"/></p> </td><br>';
							?>
									</tr>
									<tr>
										<td> Người gửi : </td>
										<td align="center" valign="middle"> 
									<?php 
									if($row[nguoigui] == "0")		
									{
										echo " Trường Đại học Công nghệ Thông Tin ";
									}
									else
									if((int)$row[nguoigui] != 0 )
									{
										$NguoiGui1 = mysql_query("select hoten from nhanvien where manv = '".$row[nguoigui]."'");
										while ($row1 = mysql_fetch_array($NguoiGui1))
										{
											
											echo '<input type ="text" name = "NguoiGui" disabled = "true" id = "NguoiGui" value = "'.$row1[hoten].'"/>';
										}
									}
									else
									{
										echo $row[nguoigui];
									}
									?>
										</td>
									</tr>
									<tr>
										<td> Người Xử Lý : </td>
										<td align="center" valign="middle">
									
									
									<?php
									$sql1 = mysql_query("select Nhanvien.HoTen from NhanVien,user where nhanvien.manv = user.manv and user.username= '$user'");
									while ($rows2 = mysql_fetch_array($sql1))
									{
										echo  "<font color = 'green'>".$rows2[0]."</font>";	
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
									<?php
									echo '<tr>';
											// Ý kiến giải quyết 
											$STT = 1;
											$sqlGQ = "select noidung from ykiengiaiquyet where madk = '".$madk."'";
											$giaiquyet = mysql_query($sqlGQ);
											echo '<td> <strong> Ý kiến giải quyết : </strong></td> ';
											
											
											
											while($rowGQ = mysql_fetch_array($giaiquyet))
											{
												echo '<tr>';
												echo '<td align="center" valign="middle">'.$STT.'</td>';
												echo '<td align="center" valign="middle">'.$rowGQ[noidung].'</td>';
												$STT++;
												echo '</tr>';
											}
											
											
											if($STT == 1)
											{
												echo " <td align='center' valign='middle'> không có </td> ";
											}
											echo '</tr>';
											if($row[trangthai] != 2)
											{
												echo '<tr>';
												echo '<td> Nhập ý kiến giải quyết :  </td>';
												echo '<td> <input type ="text" name = "giaiquyet" id = "giaiquyet"/> </td>' ;
												echo '</tr>';
											}
											echo '<tr>';
											// Ý kiến phản hồi
											
											$STT = 1;
											$sqlPH = "select noidung from ykienphanhoi where madk = '".$madk."'";
											$phanhoi = mysql_query($sqlPH);
											echo '<td>  Ý kiến phản hồi : </td> ';
											
											
											while($rowPH = mysql_fetch_array($phanhoi))
											{
												echo '<tr>';
												echo '<td align="center" valign="middle">'.$STT.'</td>';
												echo '<td align="center" valign="middle">'.$rowPH[noidung].'</td>';
												$STT++;
												echo '</tr>';
											
											}
											
											
											if($STT == 1)
											{
												echo " <td align='center' valign='middle'> không có </td> ";
											}
											echo '</tr>';
											if($row[trangthai] != 2)
											{
												echo '<tr>';
												echo '<td> Nhập ý kiến phản hồi :  </td>';
												echo '<td> <input type ="text" name = "phanhoi" id = "phanhoi"/> </td>' ;
												echo '</tr>';
											}
											 
									?>
									<tr>
										<td> Trạng Thái Xử Lý : </td>
									<?php
										if($row[trangthai] == 0)
										{
											echo '<td><font color = "red"> Chưa Xử Lý </font></td>';
											echo '</tr>';
											echo '<td> Chọn trạng thái xử lý : </td>';
											echo '<td>';
											echo '<select name = "xuly" id = "xuly">';
											echo '<option value = "0" > Chưa xử Lý </option>';
											echo '<option value = "1" > Đang xử Lý </option>';
											echo '<option value = "2" > Đã xử Lý </option>';
											echo '</select>';
											echo '</td>';
											echo '</tr>';
											echo '<tr>';
											echo '<td colspan="2" class="table-footer">';
											echo '<input type = "submit" id= "button" class="button round blue image-right ic-refresh" value = "Cập Nhật"/>';	
											echo'</td>';		
											echo'</tr>';
											echo '<tr>';
											//echo '<td colspan = "2" align = "right"> <a href = "xulykhac.php"><font color = "red"><i> Chuyển quyền xử lý </i></font></a></td>';
											echo '</tr>';
										}
										else
										if($row[trangthai] == 1)
										{
											echo '<td><font color = "blue"> Đang Xử Lý </font></td>';
											echo '</tr>';
											echo '<td> Chọn trạng thái xử lý : </td>';
											echo '<td>';
											echo '<select name = "xuly" id = "xuly">';
											//echo '<option value = "0" > Chưa xử Lý </option>';
											echo '<option value = "1" > Đang xử Lý </option>';
											echo '<option value = "2" > Đã xử Lý </option>';
											echo '</select>';
											echo '</td>';
											echo '</tr>';
											
											
											// Nút cập nhật
											
											echo '<tr>';
											echo '<td colspan="2" class="table-footer">';
											echo '<input type = "submit" id= "button" class="button round blue image-right ic-refresh" value = "Cập Nhật"/>';	
											echo'</td>';		
											echo'</tr>';
											echo '<tr>';
											//echo '<td colspan = "2" align = "left"> <a href = "xulykhac.php"><font color = "red"><i> Chuyển quyền xử lý </i></font></a></td>';
											echo '</tr>';
											
										}
										else
										if($row[trangthai] == 2)
										{
										$sql11 = mysql_query("select Ngay from trangthaixuly where madk = '".$madk."'");
										while ($rows22 = mysql_fetch_array($sql11))
									{
										echo '<td><font color = "red"> Đã Xử Lý Ngày : '.$rows22[0].' </font></td>';	
									}	
											
											
										}
											
									?>

									
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