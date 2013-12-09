<?php
		
		@session_start();
		
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		$keyword = $_POST[keyword];
		include("head.php");
		
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
	
	
	
	<?php
		if((in_array(31, $quyen) or in_array(33, $quyen) or in_array(35, $quyen)) and in_array(1, $quyen) )
		{
		
		$sqlcv = "select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.trichyeu, congvan.tacgia, congvan.nguoixuly from congvan,chitietnhan,nhanvien where congvan.madk = chitietnhan.madk and nhanvien.manv = chitietnhan.manv and nhanvien.mapb = '".$mapb."'";
		if((in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen)))
		{
			$sqlcv = $sqlcv ." and (congvan.dokhan = 1 or congvan.dokhan = 2 or congvan.dokhan = 3 ) "; 
		}
		else
		{	
			if(in_array(31, $quyen) and in_array(33, $quyen))
			{
				$sqlcv = $sqlcv . " and (congvan.dokhan = 1 or congvan.dokhan = 2) ";
			}
			else
			{
				if(in_array(31, $quyen) and in_array(35, $quyen))
				{
					$sqlcv = $sqlcv ." and (congvan.dokhan = 1 or congvan.dokhan = 3) ";
				}
				else
				{
					if(in_array(33, $quyen) and in_array(35, $quyen))
					{
						$sqlcv = $sqlcv . " and (congvan.dokhan = 2 or congvan.dokhan = 3) ";
					}
					else
					{
							if(in_array(31, $quyen))
							{
								$sqlcv = $sqlcv . " and congvan.dokhan = 1 ";
							}
							if(in_array(33, $quyen))
							{
								$sqlcv = $sqlcv . " and congvan.dokhan = 2 ";
							}
							if(in_array(35, $quyen))
							{
								$sqlcv = $sqlcv . " and congvan.dokhan = 3 ";
							}
					}
				}
			}
		}
				
		
	?>
	<?php
	}	
	?>	
		
	
	
	
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Danh mục </h3>
				<ul>
					<li><a href="#"> Danh sách <font color = "red" > (8) </font></a></li>
					<li><a href="#">Công văn chờ xử lý <font color = "red" > (4) </font> </a></li>
					<li><a href="#">Công văn đã xử lý <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn quan trọng <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn tối mật<font color = "red" > (0) </font> </a></li>
					<?php 
						if(in_array(7, $quyen))
						{
					?>
					<li><a href="tracuucongvanden.php"> Tra cứu công văn đến </a></li>
					<?php } 
						else
						echo '<li><a onclick ="a();"> Tra cứu công văn đến </a></li>';
					
					?>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Danh sách </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> 
	<br><br>				<?php 
		$phongban = mysql_query("select tenpb,mapb from phongban where mapb = '".$mapb."'");
		while($rrr = mysql_fetch_array($phongban))
		{
			echo "<center><font color = 'blue'> Phòng ban : ".$rrr[tenpb]." </font></center>" ;
		}
		
	?>
	<br><!-- end content-module-heading -->
				<?php
				echo "Các kết quả tìm kiếm cho từ khóa : <font color = 'red'> ".$keyword. "<font>";
				?>
				<div class="content-module-main">
						<table>
						
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all"></th>
									<th> Mã Công Văn </th>
									<th> Tên/Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									<th> Số Trang </th>
									<th> Tác Giả </th>
									<th> File đính kèm </th>
									<th> Actions </th>
								</tr>
							
							</thead>
	
							<tfoot>
							
								<tr>
								
									<td colspan="6" class="table-footer">
									
										<label for="table-select-actions">With selected:</label>
	
										<select id="table-select-actions">
											<option value="option1">Delete</option>
											<option value="option2">Export</option>
											<option value="option3">Archive</option>
										</select>
										
										<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	
	
									</td>
									
								</tr>
							
							</tfoot>
							
							<tbody>
						
								<?php
								
								$i = 1;
								$sqlcv = $sqlcv . " and congvan.trichyeu like '%".$keyword."%' ORDER BY congvan.madk DESC ";
									$congvan = mysql_query($sqlcv);
									while ($row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									echo'<td><input type="checkbox"></td>';
									echo'<td>'.$row[madk].'</td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td><a> V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td>'.$row[ngayVB].'</td>';
									echo'<td>'.$row[sotrang].'</td>';
									echo'<td>'.$row[tacgia].'</td>';
									//echo'<td> <a href= "../uploads/'.$row[url].'"> download </a></td>';
									if(in_array(3, $quyen))
									{
										echo '<td> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
										echo '<br><div id="file'.$i.'"> </div></td>';
									}
									else
									{
										echo '<td> <a onclick ="a();"> Show File </a></td>';
									}
									echo '<td>';
									if($manv != $row[nguoixuly])
									{
										echo '	<a  onClick="a();" class="table-actions-button ic-table-edit"></a>';
										echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
										echo '</td>';
										echo '</tr>'	;
									}
									else
									{
											echo '<a href="javascript:tb_show(';
		echo "'Xử lý công văn','xulycongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Action' class='table-actions-button ic-table-edit'></a> ";
										echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
										echo '</td>';
										echo '</tr>'	;
									}
									
									$i++;
										
									}


								?>
								
						
						
							</tbody>
					
							
						
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


