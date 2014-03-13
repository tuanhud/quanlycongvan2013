<?php
		
		@session_start();
		$a = 6;
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$manvxl = $_GET['manv'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$q = $_GET['q'];
		$nhanvien = mysql_query("select hoten FROM nhanvien where manv = '$manvxl'");
		$tennv = "";
		while ($rows = mysql_fetch_array($nhanvien))
		{
			$tennv = $rows[hoten];
		}
		
		
?>	
<html lang="en">
<head>
<?php 
include("head.php");
?>
<script>
function clicking1()
{
 window.history.back(-1);
}
</script>
<script type="text/javascript" src="../js/dkdv.js"></script>

<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="../CSS/thickbox.css" type="text/css" media="screen" />
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
				
				<h3> Danh Mục </h3>
				<ul>
					<li><a href="thongke.php"> Thống kê theo người dùng </a></li>
					<?php
					if(in_array(9, $quyen) and in_array(20, $quyen) and in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen) and in_array(32, $quyen)and in_array(34, $quyen) and in_array(36, $quyen)  )
					{
					?>
					<li><a href="thongketonghop.php"> Thống kê theo cấp </a></li>
					<?php
					}
					else
					echo '<li><a href="#" onclick = "a();"> Thống kê theo cấp </a></li>'
					?>
					<li><a href="thongkephongban.php"> Thống kê theo phòng ban </a></li>
					
					<li><a href="#"> Thống kê theo tình trạng </a></li>
					<li><a href="#"> Thống kê theo thời gian </a></li>
				</ul>
				
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Tình hình xử lý công văn </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							<thead>
								<tr>
								<td>
								<a onclick = "clicking1();"> Quay lại </a>
								</td>
								<td colspan = "7">
								<br>
							<center><h1>	TÌNH HÌNH XỬ LÝ CÔNG VĂN CỦA : <font color = "blue"> <?php echo $tennv;?> </font> </h1>  </center><br>
								</td>
								</tr>
								<tr>
									<th> STT </th>
									<th> Mã Công Văn </th>
									<th> Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									<th> File </th>
									<th> Phân Cấp </th>
									<th> Trạng Thái </th>
									<th> Ghi chú </th>
									
									
								</tr>
							
							</thead>
	
							
							
							<tbody>
								<?php
								$i = 1;
								$now = date('Y/m/d',time());
								
								$sql = "select distinct congvan.isfile,congvan.madk,congvan.soKH,congvan.domat, congvan.ngayVB,congvan.loaicv, congvan.trichyeu, trangthaixuly.trangthai, congvan.ngayhh, trangthaixuly.ngay from congvan,trangthaixuly,nhanvien where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = nhanvien.manv and nhanvien.manv = '$manvxl' and congvan.active = 1 ORDER BY congvan.madk DESC ";
								$_SESSION['chitietxuly'] = $sql;
								$_SESSION['nhanvienxuly'] = $manvxl; 	
								//echo $sql;
									$congvan = mysql_query($sql);
									while ($row = mysql_fetch_array($congvan))
									{
								
									echo '<tr>';
									echo'<td>'.$i.'</td>';
									echo'<td align ="center"> <font color = "#000080">'.$row[madk].'</font></td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td width = "25%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td>'.$row[ngayVB].'</td>';
									if($row[isfile] == 0)// kiểm tra cv điện tử
										{
											echo'<td width = "8%"><a href="javascript:tb_show(';
											echo "'Chi tiết công văn','chitietnoidung.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
											echo '" title=';
											echo "'Chi tiết' > ";
											echo ' Nội dung </a></td>';
										}
										else
										{
											echo '<td width = "8%"> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
											echo '<br><div id="file'.$i.'"> </div></td>';
										}
									if($row[loaicv] == 0)
								{
									echo '<td> <font color = "red"> Cấp Trường </font> </td>';
								}
								else
								{
									echo '<td> <font color = "green"> Phòng Ban </font> </td>';
								}
									echo'<td>';
									if($row[trangthai] == 0)
									{	
										echo "<font color = 'red'> Chưa xử lý </font>";
										echo '</td>';
										$datehh = $row[ngayhh];
										$datenow = $now;
										if(strtotime($datehh) < strtotime($datenow))
										{
											echo '<td> <font color = "brown">  Quá Hạn </td> '  ;
										}
										else
											echo '<td> <font color = "green">  Trong Hạn </td> '  ;
										
										
									}
										else 
										if($row[trangthai] == 1)
										{
											echo "<font color = 'blue'> Đang xử lý </font>";
											echo '</td>';
											$datehh = $row[ngayhh];
										$datenow = $now;
										if(strtotime($datehh) < strtotime($datenow))
										{
											echo '<td> <font color = "brown">  Quá Hạn </td> '  ;
										}
										else
											echo '<td> <font color = "green">  Trong Hạn </td> '  ;
										
											
										}
										else 
											if($row[trangthai] == 2)
												{
													echo "<font color = 'green'> Đã xử lý </font>";
													echo '</td>';
													$datehh = $row[ngayhh];
													$datexuly = $row[ngay];
													if(strtotime($datexuly) > strtotime($datehh))
													{
														echo '<td> <font color = "orange"> Trễ hạn </font> </td>';
													}
													
												}
										
										
										
										
										
									
									
								//	echo'<td>'.$row[tacgia].'</td>';
								
								
								
								echo "</tr>";
							
								$i++;
	
							}
							



								?>
								
							
							</tbody>
								
						<tfoot>
							
								<tr>
								
								<td colspan = "8" style = "text-align : right; font-size : 20px; "><br> <br> Tổng cộng : </td>
								<td style = "text-align : center; font-size : 20px;"> <font color = "red"><br> <br><?php echo $i -1 ;?> </font></td>
								</tr>
									
								<tr><td colspan = "9" style "text-align : right;"> <h1> <a href = "../module/PHP_Create_Excel/export_excel_tt.php?q=3"> Export to Excel </a> </h1>
							</td></tr>
						</tfoot>
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