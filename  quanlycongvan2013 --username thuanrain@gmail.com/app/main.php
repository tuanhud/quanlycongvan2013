<?php
		
		@session_start();
		$a = 0;
	if(isset($_POST[phongban1]))
	{
		$_SESSION['phongban'] = $_POST['phong'];
		@header("location:main.php");
		
		
	}
	if(isset($_SESSION['myname']) and isset($_SESSION['cacquyen']) )
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
?>
<!DOCTYPE html>

<html lang="en">
<head>
<?php 
include("head.php");

?>
<script>
	function notselect()
	{
		alert("Bạn không đủ quyền ! ");
		location.reload(true);
	}
</script>
</head>
<body>

	
	<?php
		include("divtopbar.php");
		include("divheader.php");
		
		/*if(in_array(34, $quyen))
		{
			
		}
		else*/
	
			
		?>
		<form action="main.php" method="post">
		<select name="phong"  > 
		<?php 
		$phongban = mysql_query("select tenpb,mapb from phongban where mapb = '".$mapb."'");
		while($rrr = mysql_fetch_array($phongban))
		{
			echo "<option value ='".$rrr[mapb]."'> ".$rrr[tenpb]."</option>" ;
		}
		$phongban1 = mysql_query("select tenpb,mapb from phongban where mapb not in (select mapb from phongban where mapb = '".$mapb."')");
		
		while($rrrr = mysql_fetch_array($phongban1))
		{
			echo "<option value ='".$rrrr[mapb]."'>".$rrrr[tenpb]."</option>" ;
		}
	
	
	?> 
	
	
	</select>
	
	<input type ="submit" name ="phongban1" value ="phongban" > </input>
	</form>
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3> Danh Mục </h3>
				<ul>
					<li><a href="#"> Danh sách <font color = "red" > (10) </font></a></li>
					<li><a href="#">Công văn chờ xử lý <font color = "red" > (4) </font> </a></li>
					<li><a href="#">Công văn đã xử lý <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn quan trọng <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn tối mật<font color = "red" > (0) </font> </a></li>
					<li><a href="tracuucongvanden.php"> Tra cứu công văn </a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Danh sách </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
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
									$congvan = mysql_query("select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.trichyeu, congvan.tacgia from congvan,chitietnhan where chitietnhan.madk = congvan.madk and (congvan.nguoigui in (select manv from nhanvien 	where maPB in (select nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = '$user')) or chitietnhan.mapb in (select mapb from nhanvien where maPB in (select nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = '$user' ))) ORDER BY congvan.madk DESC");
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
									echo '<td> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
									echo '<br><div id="file'.$i.'"> </div></td>';
									echo '<td>';
									echo '	<a href="#" class="table-actions-button ic-table-edit"></a>';
									echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
									echo '</td>';
								echo '</tr>'	;
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
<?php 
}
else
header("location:login.php");
?>