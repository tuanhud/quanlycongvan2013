<?php
		
		@session_start();
		$a = 6;
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$phongban = mysql_query("select phongban.tenpb,phongban.mapb FROM phongban,user,nhanvien where phongban.mapb = nhanvien.mapb and nhanvien.manv = user.manv and user.username = '$user'");
		$tenpb = "";
		$mapb = "";
		while ($rows = mysql_fetch_array($phongban))
		{
			$tenpb = $rows[tenpb];
			$mapb = $rows[mapb];
		}
?>	
<!DOCTYPE html>

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
								<td colspan = "7">
							<h1>	TÌNH HÌNH XỬ LÝ CÔNG VĂN CỦA PHÒNG BAN : <font color = "blue"> <?php echo $tenpb;?> </font> </h1> 
								</td>
								</tr>
								<tr>
									
									<th> STT </th>
									<th> Họ và tên </th>
									<th> Công văn đã nhận </th>
									<th> Công văn đã xử lý </th>
									<th> Công văn chưa xử lý </th>
									<th> Công văn xử lý trễ hạn </th>
									<th> Chi tiết </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
								<?php
								$STT = 1;
								$nhan = 0;
								$da = 0;
								$chua = 0;
								$tre = 0;
								$nhanvien = mysql_query("select hoten,manv from nhanvien where nhanvien.mapb = $mapb");
							while ($rowss = mysql_fetch_array($nhanvien))
							{
								echo '<tr>';
								echo '<td>'.$STT.'</td>';
								echo '<td>'.$rowss[hoten].'</td>';
								
								$congvan = mysql_query("select distinct congvan.madk, congvan.ngayhh, trangthaixuly.trangthai, trangthaixuly.ngay,nhanvien.hoten from congvan,trangthaixuly,phongban,nhanvien where congvan.madk = trangthaixuly.madk and nhanvien.mapb = phongban.mapb and  nhanvien.manv = congvan.nguoixuly  and congvan.nguoixuly = $rowss[manv]");
									while ($row = mysql_fetch_array($congvan))
									{
										$nhan++;
										if($row[trangthai] == 2)
										{
											$da++;
											$datehh = new DateTime($row[ngayhh]);
											$datexuly = new DateTime($row[ngay]);
											if($datexuly > $datehh)
											{
												$tre++;
											}
										}
										else
										$chua++;
									}
									
								echo '<td align = "center"><font color = "red">'.$nhan.'</font></td>';
								echo '<td align = "center"><font color = "red">'.$da.'</font></td>';
								echo '<td align = "center"> <font color = "red">'.$chua.'</font></td>';
								echo '<td align = "center"><font color = "red">'.$tre.'</font></td>';
								echo '<td align = "center"><a href = "chitietxuly.php?q=1&manv='.$rowss[manv].'"> Chi tiết </a></td>';
								echo '</tr>';
								$STT++;
								$nhan = 0;
									$tre = 0;
									$chua = 0;
									$da = 0;
								
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