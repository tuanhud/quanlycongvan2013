﻿<?php
		
		@session_start();
		$a = 6;
	function date_i($string_i)
	{
		$thang_i = substr($string_i,3,2);
		$ngay_i = substr($string_i,0,2);
		$nam_i = substr($string_i,6,4);
		$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
		return $ngay_format;
	}
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$tenpb = "";
		$mapb = $_SESSION['phongbann'];
		$quyen = array();
		$user = $_SESSION['myname'];
		
		$quyen = $_SESSION['cacquyen'];
		$ngay_bd = date_i($_SESSION['batdau']);
		$ngay_kt = date_i($_SESSION['ketthuc']);
		$sqlcvdi = "";
		$sqlcvden = "";
		if($mapb != 0)
		{
			$phongban = mysql_query("select tenpb from phongban where mapb = '".$mapb."'");
			while($row = mysql_fetch_array($phongban))
			{
			$tenpb = $row[tenpb];
			}
	
		$sqlcvdi = "select distinct congvan.loaicv, congvan.madk,congvan.soKH,trangthaixuly.trangthai,trangthaixuly.ngay, congvan.domat, congvan.ngayVB, congvan.ngayhh, congvan.trichyeu from congvan,nhanvien,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoigui = nhanvien.manv and nhanvien.maPB = '".$mapb."'  and congvan.active = 1";
		
		$sqlcvden = "select distinct congvan.loaicv, congvan.madk,congvan.soKH,trangthaixuly.trangthai,trangthaixuly.ngay, congvan.domat, congvan.ngayVB, congvan.ngayhh, congvan.trichyeu from congvan,nhanvien,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = nhanvien.manv and nhanvien.maPB = '".$mapb."' and congvan.active = 1";
		
		}
		else
		{
			$sqlcvdi = "select distinct congvan.loaicv, congvan.madk,congvan.soKH, congvan.domat, congvan.ngayVB, congvan.ngayhh, congvan.trichyeu from congvan where congvan.nguoigui = '0' and congvan.loaicv = '0'  and congvan.active = 1";
			$sqlcvden = "select distinct congvan.loaicv, congvan.madk,congvan.soKH,trangthaixuly.trangthai,trangthaixuly.ngay, congvan.domat, congvan.ngayVB, congvan.ngayhh, congvan.trichyeu from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoigui <> '0' and congvan.loaicv = '0' and congvan.active = 1";		
		
		}	
		if($ngay_bd != "//" and $ngay_kt != "//" )
		{
			$sqlcvdi = $sqlcvdi." and congvan.ngayvb between '".$ngay_bd."' and '".$ngay_kt."'";
			$sqlcvden = $sqlcvden." and congvan.ngayvb between '".$ngay_bd."' and '".$ngay_kt."'"; 			
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
			
			<center><h1>	CHI TIẾT CÔNG VĂN CỦA  : <font color = "blue"> <?php if($mapb != 0) echo $tenpb; else echo "Trường Đại Học Công Nghệ Thông Tin";?> </font> </h1>
				<br>
				<?php if($ngay_bd != "//" and $ngay_kt != "//" )
				{
				?>
				<h2> TỪ NGÀY : <font color = "red"> <?php echo $_SESSION['batdau'].'  '; ?> </font> ĐẾN NGÀY : <font color = "red"> <?php echo $_SESSION['ketthuc'].' '; ?> </font></h2></center>
			<br>
			<?php } ?>
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Công Văn Đi </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
				
						<div class="content-module-main">
						
						<table>
						
							<thead>
						
								<tr>
									<th> Mã Công Văn </th>
									<th> Tên/Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
								
									<th> File đính kèm </th>
									<th> Độ bảo mật </th>
									<th> Phân Cấp </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
						
								<?php
								
								$i = 1;
								$sqlcvdi = $sqlcvdi . " ORDER BY congvan.madk DESC ";
								$_SESSION['chitietthongkedi'] = $sqlcvdi;
									$congvan = mysql_query($sqlcvdi);
									while ($row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									echo'<td>'.$row[madk].'</td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td width = "20%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td>'.$row[ngayVB].'</td>';
								//	echo'<td>'.$row[tacgia].'</td>';
									//echo'<td> <a href= "../uploads/'.$row[url].'"> download </a></td>';
									
										echo '<td width = "10%"> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
										echo '<br><div id="file'.$i.'"> </div></td>';
									
									//độ mật
									echo '<td> ';
									if($row[domat] == 1)
									{
										echo ' <font color = "green"> Thông thường </font>';
									}
									if($row[domat] == 2)
									{
										echo ' <font color = "orange"> Mật </font>';
									}
									if($row[domat] == 3)
									{
										echo ' <font color = "red"> Tối mật </font>';
									}
									echo '</td>';
									
									// Phân cấp
									
									echo '<td> ';
									if($row[loaicv] == 0)
										echo '<font color = "red"><strong> Trường </strong></font>';
									else
										echo '<font color = "Green"><strong> Phòng Ban </strong></font>';
									
									echo '</td> ';
									
									// xử lý
									
								
								echo '</tr>'	;
									
									
									$i++;
										
									}


								?>
								
						
						
							</tbody>
					<tfoot>
							
								<tr>
								
								<td colspan = "6" style = "text-align : right; font-size : 20px; "> <br> <br>Tổng cộng : </td>
								<td style = "text-align : center; font-size : 20px;"> <font color = "red"><br> <br><?php echo $i -1 ;?> </font></td>
								</tr>
								<tr>
								<td colspan = "9" style "text-align : right; "> <h1> <a href = "../module/PHP_Create_Excel/export_excel.php?q=2"> Export to Excel </a> </h1>
								</td>
								</tr>
					</tfoot>
							
						
						</table>
						</div>
					
				</div> <!-- end content-module-main -->
				
			
				
	

		
		
		
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
		
		<div class="page-full-width cf">

			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Công Văn Đến </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
				
						<div class="content-module-main">
						
						<table>
						
							<thead>
						
								<tr>
									<th> Mã Công Văn </th>
									<th> Tên/Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
								
									<th> File đính kèm </th>
									<th> Độ bảo mật </th>
									<th> Phân Cấp </th>
									<th> Trạng Thái </th>
									<th> Ghi chú </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
						
								<?php
								
								$i = 1;
								$now = date('Y/m/d',time());
								$sqlcvden = $sqlcvden . " ORDER BY congvan.madk DESC ";
								$_SESSION['chitietthongke'] = $sqlcvden;
									$congvanden = mysql_query($sqlcvden);
									while ($rowden = mysql_fetch_array($congvanden))
									{
										echo '<tr>';
									echo'<td>'.$rowden[madk].'</td>';
									echo'<td>'.$rowden[soKH].'</td>';
									echo'<td width = "20%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$rowden[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		echo 'V/v : '.$rowden[trichyeu].' ...</a></td>';
									echo'<td>'.$rowden[ngayVB].'</td>';
									//echo'<td>'.$rowden[tacgia].'</td>';
									//echo'<td> <a href= "../uploads/'.$rowden[url].'"> download </a></td>';
									
										echo '<td width = "10%"> <a onclick ="showfile('.$rowden[madk].','.$i.')"> Show File </a>';
										echo '<br><div id="file'.$i.'"> </div></td>';
									
									//độ mật
									echo '<td> ';
									if($rowden[domat] == 1)
									{
										echo ' <font color = "green"> Thông thường </font>';
									}
									if($rowden[domat] == 2)
									{
										echo ' <font color = "orange"> Mật </font>';
									}
									if($rowden[domat] == 3)
									{
										echo ' <font color = "red"> Tối mật </font>';
									}
									echo '</td>';
									
									// Phân cấp
									
									echo '<td> ';
									if($rowden[loaicv] == 0)
										echo '<font color = "red"><strong> Trường </strong></font>';
									else
										echo '<font color = "Green"><strong> Phòng Ban </strong></font>';
									
									echo '</td> ';
									
									// xử lý
									
								echo'<td>';
									if($rowden[trangthai] == 0)
									{	
										echo "<font color = 'red'> Chưa xử lý </font>";
										echo '</td>';
										$datehh = $rowden[ngayhh];
										$datenow = $now;
										if(strtotime($datehh) < strtotime($datenow))
										{
											echo '<td> <font color = "brown">  Quá Hạn </td> '  ;
										}
										else
											echo '<td> <font color = "green">  Trong Hạn </td> '  ;
										
										
									}
										else 
										if($rowden[trangthai] == 1)
										{
											echo "<font color = 'blue'> Đang xử lý </font>";
											echo '</td>';
											$datehh = $rowden[ngayhh];
										$datenow = $now;
										if(strtotime($datehh) < strtotime($datenow))
										{
											echo '<td> <font color = "brown">  Quá Hạn </td> '  ;
										}
										else
											echo '<td> <font color = "green">  Trong Hạn </td> '  ;
										
											
										}
										else 
											if($rowden[trangthai] == 2)
												{
													echo "<font color = 'green'> Đã xử lý </font>";
													echo '</td>';
													$datehh = $rowden[ngayhh];
													$datexuly = $rowden[ngay];
													if(strtotime($datexuly) > strtotime($datehh))
													{
														echo '<td> <font color = "orange"> Trễ hạn </font> </td>';
													}
													
												}
										
										
										
										
									
									
								//	echo'<td>'.$rowden[tacgia].'</td>';
								
								echo '</tr>'	;
									
									
									$i++;
										
									}


								?>
								
						
						
							</tbody>
						<tfoot>
							
								<tr>
								
								<td colspan = "8" style = "text-align : right; font-size : 20px; "><br> <br> Tổng cộng : </td>
								<td style = "text-align : center; font-size : 20px;"> <font color = "red"><br> <br><?php echo $i -1 ;?> </font></td>
								</tr>
									
								<tr>
								<td colspan = "9" style "text-align : right;"> <h1> <a href = "../module/PHP_Create_Excel/export_excel_tt.php?q=4"> Export to Excel </a> </h1>
								</td>
								</tr>
						</tfoot>
							
						
						</table>
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

