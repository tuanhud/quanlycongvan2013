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
							<?php
								$congvan = mysql_query("select congvan.madk,congvan.soKH, congvan.sotrang, congvan.nguoigui, congvan.ngayVB, congvan.trichyeu, trangthaixuly.trangthai from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.madk = '".$madk."'");
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
												echo '<td>'.$STT.'</td>';
												echo '<td>'.$rowGQ[noidung].'</td>';
												$STT++;
												echo '</tr>';
											}
											
											
											if($STT == 1)
											{
												echo " <td> không có </td> ";
											}
											echo '</tr>';
											
											echo '<tr>';
											// Ý kiến phản hồi
											
											$STT = 1;
											$sqlPH = "select noidung from ykienphanhoi where madk = '".$madk."'";
											$phanhoi = mysql_query($sqlPH);
											echo '<td>  Ý kiến phản hồi : </td> ';
											
											
											while($rowPH = mysql_fetch_array($phanhoi))
											{
												echo '<tr>';
												echo '<td>'.$STT.'</td>';
												echo '<td>'.$rowPH[noidung].'</td>';
												$STT++;
												echo '</tr>';
											
											}
											
											
											if($STT == 1)
											{
												echo " <td> không có </td> ";
											}
											echo '</tr>';
											
											 
									?>
									<tr>
										<td> Trạng Thái Xử Lý : </td>
									<?php
										if($row[trangthai] == 0)
										{
											echo '<td><font color = "red"> Chưa Xử Lý </font></td>';
											echo '</tr>';
										}
										else
										if($row[trangthai] == 1)
										{
											echo '<td><font color = "blue"> Đang Xử Lý </font></td>';
											echo '</tr>';
											
										}
										else
										if($row[trangthai] == 2)
										{
										$sql11 = mysql_query("select Ngay from trangthaixuly where madk = '".$madk."'");
										while ($rows22 = mysql_fetch_array($sql11))
									{
										echo '<td><font color = "orange"> Đã Xử Lý Ngày : '.$rows22[0].' </font></td>';	
									}	
											
											
										}
											
									?>

									
					<?php 	
								} 
					?>
						
							
							
							
	</table>
</body>
</html>
<?php 
}
?>