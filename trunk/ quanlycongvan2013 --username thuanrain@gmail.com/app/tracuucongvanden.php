<?php
		@session_start();
		
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		
 
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
				
				<h3>Danh mục </h3>
				<ul>
					<li><a href="#"> Danh sách <font color = "red" > (8) </font></a></li>
					<li><a href="#">Công văn chờ xử lý <font color = "red" > (4) </font> </a></li>
					<li><a href="#">Công văn đã xử lý <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn quan trọng <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn tối mật<font color = "red" > (0) </font> </a></li>
					<li><a href="tracuucongvanden.php"> Tra cứu công văn đến </a></li>
				</ul>
				
			</div> <!-- end side-menu -->
		
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Tra Cứu Công Văn Đến </h3>
						<span class="fr expand-collapse-text"> Thu gọn </span>
						<span class="fr expand-collapse-text initial-expand"> Mở rộng </span>
					
					</div> <!-- end content-module-heading -->
					<div>
					<table>
					<tr>
						<form method="POST" action ="tracuucongvanden.php">
						<td>Nhập từ khóa tìm kiếm : </td>
						<td> <input type = "text" name = "word" id = "word" /> </td>
					</tr>
					<tr> 
					<td> Tìm trong : </td>
					<td>  
						
							<p><input type="checkbox" name="myCheckbox[]" value = "madk"> Mã Đăng Ký </input></p>
							<p><input type="checkbox" name="myCheckbox[]" value = "sokh"> Số kí hiệu </input></p>
							<p><input type="checkbox" name="myCheckbox[]" value = "trichyeu"> Trích yếu </input></p>
							<input type="submit" name="sbMyForm" value="Hoàn thành"></input>
						
					</td> 
						</tr>
					</form>
					</table>
					</div>
					<?php
						if (isset($_POST[sbMyForm]))
						{
						$a = $_POST['word'];
						$h = $_POST[myCheckbox];
						
						//$arr = implode(",",$h);	
			  
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
									$congvan = "select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.trichyeu, congvan.tacgia from congvan,chitietnhan where chitietnhan.madk = congvan.madk and chitietnhan.nguoinhan in (select manv from nhanvien where maPB in (select nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = '$user' )) and (";
									//if (is_array($arr))
									//{
								
									foreach($h as $key)
									 {
										$congvan = $congvan." congvan.".$key." like'%".$a."%' or ";
									 }
						
									$congvan = $congvan." congvan.madk like '%$a%')";
									echo 'Các kết quả cho từ khóa :<font color = "red"><i>'.$a.'</i><font><br>';
									$congvan1 = mysql_query($congvan);
									while ($row = mysql_fetch_array($congvan1))
									{
										echo '<tr>';
									echo'<td><input type="checkbox"></td>';
									echo'<td>'.$row[madk].'</td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td><a>'.$row[trichyeu].' ...</a></td>';
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
			<?php 
			}
			?>	
	

		</div>
		
		
		
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


