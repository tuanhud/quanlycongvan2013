<?php
	@session_start();
	
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$manv = $_SESSION['manv'];
		
 
?>
<!DOCTYPE HTML>

<html>
<head>
<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>

<link href="../CSS/thickbox.css" rel="stylesheet" type="text/css">
</head>
<body>
	<table class="thickbox">
							<?php
							$users = "select * from nhanvien,phongban where nhanvien.manv = '".$manv."' and nhanvien.mapb = phongban.mapb ";
						
						//echo $users;
						$congvan = mysql_query($users);
						while ($row = mysql_fetch_array($congvan))
								{
									echo '<tr>';
										echo '<td> Mã nhân viên : </td>';
										echo '<td> <input type = "text" disabled = "true" name ="MaCV" id = "MaCV" value = "'.$row[MaNV].'"/> <br></td>';
										//echo '<input type = "hidden" name = "MaCV" value = "'.$row[madk].'"/>';
									echo '</tr>';
									echo '<tr>';
										echo '<td> Họ và tên : </td>';
										echo '<td> <input type = "text" name ="SOKH" disabled = "true" id = "SOKH" value = "'.$row[HoTen].'"/> <br></td>';
									echo '</tr>';
									
									echo'<tr>';
										echo '<td> Ngày Sinh : </td>';
										echo '<td> <p><input type="text" name="tbxNgay" disabled = "true" size="10" value = "'.$row[NgaySinh].'"/></p> </td><br>';
									echo '</tr>';
									echo '<tr>';
										echo '<td> CMND : </td>';
										echo '<td> <input type = "text" name ="SOKH" disabled = "true" id = "SOKH" value = "'.$row[CMND].'"/> <br></td>';
									echo '</tr>';
									
									echo '<tr>';
										echo '<td> Email : </td>';
										echo '<td> <input type = "text" name ="SOKH" disabled = "true" id = "SOKH" value = "'.$row[Email].'"/> <br></td>';
									echo '</tr>';
									
									echo '<tr>';
										echo '<td> Địa chỉ : </td>';
										echo '<td>  <textarea rows="4" style = "border : none;" name ="SOKH" disabled = "true" id = "SOKH" /> "'.$row[DiaChi].'"</textarea><br></td>';
									echo '</tr>';
									
									
									echo '<tr>';
										echo '<td> Tên phòng ban : </td>';
										echo '<td> <input type = "text" name ="SOKH" disabled = "true" id = "SOKH" value = "'.$row[TenPB].'"/> <br></td>';
									echo '</tr>';
									
									
							}
					?>
						
							
							
							
	</table>
</body>
</html>
<?php 
}
?>