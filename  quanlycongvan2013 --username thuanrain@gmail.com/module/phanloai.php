
<?php
	@session_start();

	$user = $_SESSION['myname'];
   $key=$_GET["q"];
  // $user = $_GET["user"];
   include ('dbcon.php');
   
   if($key == 3)
   {
		?>
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
									$congvan = mysql_query("select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.trichyeu, congvan.tacgia from congvan,chitietnhan where chitietnhan.madk = congvan.madk and chitietnhan.nguoinhan in (select manv from nhanvien where maPB in (select nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = '$user' ))");
									while ($row = mysql_fetch_array($congvan))
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
 <?php
	}
   else
   {
   ?>
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
									$congvan = mysql_query("select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.trichyeu, congvan.tacgia from congvan,chitietnhan,trangthaixuly where trangthaixuly.madk = congvan.madk and trangthaixuly.trangthai = '$key' and chitietnhan.madk = congvan.madk and chitietnhan.nguoinhan in (select manv from nhanvien where maPB in (select nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = '$user' ))");
									while ($row = mysql_fetch_array($congvan))
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

   <?php
   }
 ?> 
