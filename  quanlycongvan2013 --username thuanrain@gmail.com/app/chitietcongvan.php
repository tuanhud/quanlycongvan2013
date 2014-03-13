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

<link href="../CSS/thickbox.css" rel="stylesheet" type="text/css">
</head>
<body>
	<table class="thickbox">
							<?php
						$congvan = mysql_query("select distinct congvan.madk,congvan.soKH, congvan.ngayhh,congvan.sotrang, congvan.nguoigui, congvan.ngayVB, congvan.trichyeu, trangthaixuly.trangthai, congvan.nguoixuly from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.madk = '".$madk."' and congvan.active = 1");
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
								//	echo 'người gửi : '.$row[nguoigui];
									//echo 'người xử lý : '. $row[nguoixuly];
									if($row[nguoigui] == "0")
									{
										echo $row[nguoixuly];
									}							
									
									else
									{
										$sql1 = mysql_query("select  distinct HoTen from NhanVien where nhanvien.manv = '$row[nguoixuly]'");
										while ($rows2 = mysql_fetch_array($sql1))
										{
											echo  "<font color = 'red'>".$rows2[0]."</font>";	
										}	
										echo '</td></tr><tr>';
										echo '<td> Ngày hết hạn : </td> ';
										echo '<td> <p><input type="text" name="tbxNgay" disabled = "true" size="10" value = "'.$row[ngayhh].'"/></p> </td><br>';
									}
									
									?>
								
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
												echo " <td align='center' valign='middle' > không có </td> ";
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
										echo '<td><font color = "red"> Đã Xử Lý Ngày : '.$rows22[0].' </font></td>';	
									}	
											
											
										}
										else
										if($row[trangthai] == 3)
										{
										
										echo '<td><font color = "red">  Không có </font></td>';				
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