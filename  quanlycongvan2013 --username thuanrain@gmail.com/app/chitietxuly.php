﻿<?php
		
		@session_start();
		$a = 6;
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$manv = $_GET['manv'];
		$q = $_GET['q'];
		$nhanvien = mysql_query("select hoten FROM nhanvien where manv = '$manv'");
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
					<li><a href="#"> Công văn đi </a></li>
					<li><a href="#"> Công văn đến </a></li>
					<li><a href="#"> Tra cứu </a></li>
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
								<td colspan = "8">
							<h1>	TÌNH HÌNH XỬ LÝ CÔNG VĂN CỦA NHÂN VIÊN : <font color = "blue"> <?php echo $tennv;?> </font> </h1> 
								</td>
								</tr>
								<tr>
									<th> STT </th>
									<th> Mã Công Văn </th>
									<th> Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									<th> File </th>
									<th>Trạng Thái </th>
									<th> Phân Cấp </th>
									<th> Ghi chú </th>
									
									
								</tr>
							
							</thead>
	
							
							
							<tbody>
								<?php
								$i = 1;
									$congvan = mysql_query("select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.loaicv, congvan.trichyeu, trangthaixuly.trangthai, congvan.ngayhh, trangthaixuly.ngay from congvan,trangthaixuly,nhanvien where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = nhanvien.manv and nhanvien.manv = '$manv' ORDER BY congvan.madk DESC ");
									while ($row = mysql_fetch_array($congvan))
									{
								
									echo '<tr>';
									echo'<td>'.$i.'</td>';
									echo'<td align ="center"> <font color = "#000080">'.$row[madk].'</font></td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td><a> V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td>'.$row[ngayVB].'</td>';
									echo '<td> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
									echo '<br><div id="file'.$i.'"> </div></td>';
									echo'<td>';
									if($row[trangthai] == 0)
									{	
										echo "<font color = 'red'> Chưa xử lý </font>";
										echo '</td>';
										
										
									}
										else 
										if($row[trangthai] == 1)
										{
											echo "<font color = 'blue'> Đang xử lý </font>";
											echo '</td>';
											
											
										}
										else 
											if($row[trangthai] == 2)
												{
													echo "<font color = 'green'> Đã xử lý </font>";
													echo '</td>';
													$datehh = new DateTime($row[ngayhh]);
													$datexuly = new DateTime($row[ngay]);
													if($datexuly > $datehh)
													{
														echo '<td> <font color = "red"> Trễ hạn </font> </td>';
													}
													
												}
										
										
										
										
									
									
								//	echo'<td>'.$row[tacgia].'</td>';
								
								
								if($row[loaicv] == 0)
								{
									echo '<td> <font color = "red"> Cấp Trường </font> </td>';
								}
								else
								{
									echo '<td> <font color = "green"> Phòng Ban </font> </td>';
								}
								echo "</tr>";
							
								$i++;
	
							}
							



								?>
								
							
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