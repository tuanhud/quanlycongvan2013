
<?php
	@session_start();

	$user = $_SESSION['myname'];
   $key=$_GET["q"];
   $sqlcv="";
   $quyen = $_SESSION['cacquyen'];
//		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
  // $user = $_GET["user"];
  $mapb = $_SESSION['phongban'];
		
   include ('dbcon.php');
	 if($key == 1)
	 {
		$sqlcv = "select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu,trangthaixuly.trangthai, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = '".$manv."'";
		?>
		<div class="content-module-heading cf">
					
						<h3 class="fl"> Công văn chờ xử lý </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
				
					<div class="content-module-main">
		<table>
					
							<thead>
						
								<tr>
									<th> Mã Công Văn </th>
									<th> Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									
									<th> Tác Giả </th>
									<th> File </th>
									<th> Độ bảo mật </th>
									<th> Phân Cấp </th>
									<th> Trạng Thái </th>
									
									<th> Xử Lý </th>
								</tr>
							
							</thead>
	
							<tfoot>
							
								
							</tfoot>
							
							<tbody>
						
								<?php
								
								$i = 1;
								$sqlcv = $sqlcv . " and congvan.active = 1 ORDER BY trangthaixuly.trangthai ASC ";
								
									$congvan = mysql_query($sqlcv);
									while (@$row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									echo'<td><b><font color = "green">'.$row[madk].'</font></b></td>';
									echo'<td align = "center">'.$row[soKH].'</td>';
									echo'<td width = "25%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td width = "9%">'.$row[ngayVB].'</td>';
									echo'<td width = "7%">'.$row[tacgia].'</td>';
									//echo'<td> <a href= "../uploads/'.$row[url].'"> download </a></td>';
									if(in_array(3, $quyen))
									{
										echo '<td width = "8%"> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
										echo '<br><div id="file'.$i.'"> </div></td>';
									}
									else
									{
										echo '<td> <a onclick ="a(); width = "8%""> Show File </a></td>';
									}
									// độ mật
									echo '<td width = "10%"> ';
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
									
									echo '<td width = "8%"> ';
									if($row[loaicv] == 0)
										echo '<font color = "red"><strong> Trường </strong></font>';
									else
										echo '<font color = "Green"><strong> Phòng Ban </strong></font>';
									
									echo '</td> ';
									
									
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
													
												}
										
									
									// Xử lý
									echo '<td width = "8%" align = "center">';
									if($manv != $row[nguoixuly])
									{
										echo '	<a  onClick="a();" class="table-actions-button ic-table-edit"></a>';
										//echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
										echo '</td>';
										echo '</tr>'	;
									}
									else
									{
											echo '<a href="javascript:tb_show(';
		echo "'Xử lý công văn','xulycongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Xử lý' class='table-actions-button ic-table-edit'></a> ";
										
										echo '</td>';
										echo '</tr>'	;
									}
									
									
									$i++;
										
									}

								
								
								?>
								
						
						
							</tbody>
					
							<tfoot>
								
									<tr>
									
									<td colspan = "9" style = "text-align : right; font-size : 20px; "><br><br> Tổng cộng : </td><td style = "text-align : center; font-size : 20px;"><br><br> <font color = "red"><?php echo $i -1 ;?> </font></td>
									</tr>
								
							</tfoot>

						
						</table>
	<?php	
	 }
	 else
	 if($key == 2)
	 {
		$sqlcv = "select distinct congvan.madk,congvan.soKH, trangthaixuly.trangthai, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = '".$manv."' and trangthaixuly.trangthai = '2'";
	?>
	<div class="content-module-heading cf">
					
						<h3 class="fl"> Công văn đã xử lý </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
				
					<div class="content-module-main">
	<table>
					
							<thead>
						
								<tr>
									<th> Mã Công Văn </th>
									<th> Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									
									<th> Tác Giả </th>
									<th> File </th>
									<th> Độ bảo mật </th>
									<th> Phân Cấp </th>
									<th> Trạng Thái </th>
									<th> Xử Lý </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
						
								<?php
								
								$i = 1;
								$sqlcv = $sqlcv . " and congvan.active = 1 ORDER BY congvan.madk DESC ";
								
									$congvan = mysql_query($sqlcv);
									while (@$row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									echo'<td><b><font color = "green">'.$row[madk].'</font></b></td>';
									echo'<td align = "center">'.$row[soKH].'</td>';
									echo'<td width = "25%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td width = "9%">'.$row[ngayVB].'</td>';
									echo'<td width = "7%">'.$row[tacgia].'</td>';
									//echo'<td> <a href= "../uploads/'.$row[url].'"> download </a></td>';
									if(in_array(3, $quyen))
									{
										echo '<td width = "8%"> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
										echo '<br><div id="file'.$i.'"> </div></td>';
									}
									else
									{
										echo '<td> <a onclick ="a(); width = "8%""> Show File </a></td>';
									}
									// độ mật
									echo '<td width = "10%"> ';
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
									
									echo '<td width = "8%"> ';
									if($row[loaicv] == 0)
										echo '<font color = "red"><strong> Trường </strong></font>';
									else
										echo '<font color = "Green"><strong> Phòng Ban </strong></font>';
									
									echo '</td> ';
									
									
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
													
												}
										
									
									// Xử lý
									echo '<td width = "8%" align = "center">';
									if($manv != $row[nguoixuly])
									{
										echo '	<a  onClick="a();" class="table-actions-button ic-table-edit"></a>';
										//echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
										echo '</td>';
										echo '</tr>'	;
									}
									else
									{
											echo '<a href="javascript:tb_show(';
		echo "'Xử lý công văn','xulycongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Xử lý' class='table-actions-button ic-table-edit'></a> ";
										
										echo '</td>';
										echo '</tr>'	;
									}
									
									
									$i++;
										
									}

								
								
								?>
								
						
						
							</tbody>
					
							<tfoot>
								
									<tr>
									
									<td colspan = "9" style = "text-align : right; font-size : 20px; "><br><br> Tổng cộng : </td><td style = "text-align : center; font-size : 20px;"><br><br> <font color = "red"><?php echo $i -1 ;?> </font></td>
									</tr>
								
							</tfoot>
						
						</table>
	<?php
		}
		else
		{
			if($_SESSION['phongban'] != 0)
			{
			if((in_array(31, $quyen) or in_array(33, $quyen) or in_array(35, $quyen)) and in_array(1, $quyen) )
			{
			//$sqlkhan = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,nhanvien where congvan.loaicv = '1' and congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = '".$mapb."'";
				$sqlcv = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,nhanvien where congvan.loaicv = 1 and congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = ".$mapb."";
				if((in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen)))
				{
					$sqlcv = $sqlcv ." and (congvan.domat = 1 or congvan.domat = 2 or congvan.domat = 3 ) "; 
				}
				else
				{	
					if(in_array(31, $quyen) and in_array(33, $quyen))
					{
						$sqlcv = $sqlcv . " and (congvan.domat = 1 or congvan.domat = 2) ";
					}
					else
					{
						if(in_array(31, $quyen) and in_array(35, $quyen))
						{
							$sqlcv = $sqlcv ." and (congvan.domat = 1 or congvan.domat = 3) ";
						}
						else
						{
							if(in_array(33, $quyen) and in_array(35, $quyen))
							{
								$sqlcv = $sqlcv . " and (congvan.domat = 2 or congvan.domat = 3) ";
							}
							else
							{
									if(in_array(31, $quyen))
									{
										$sqlcv = $sqlcv . " and congvan.domat = 1 ";
									}
									if(in_array(33, $quyen))
									{
										$sqlcv = $sqlcv . " and congvan.domat = 2 ";
									}
									if(in_array(35, $quyen))
									{
										$sqlcv = $sqlcv . " and congvan.domat = 3 ";
									}
							}
						}
					}
				}

						
				if($key == 3)
				{
					$sqlcv = $sqlcv." and congvan.dokhan = '3'";
				
				echo '<div class="content-module-heading cf">';
					
						echo '<h3 class="fl"> Công văn khẩn cấp </h3>';
						echo '<span class="fr expand-collapse-text">Click to collapse</span>';
						echo '<span class="fr expand-collapse-text initial-expand">Click to expand</span>';
					
					echo '</div> <!-- end content-module-heading -->';
					
				
					echo '<div class="content-module-main">';
					
				}
				else
				if($key == 4)
				{
					$sqlcv = $sqlcv." and congvan.domat = '3'";	
						
						echo '<div class="content-module-heading cf">';
					
						echo '<h3 class="fl"> Công văn tối mật </h3>';
						echo '<span class="fr expand-collapse-text">Click to collapse</span>';
						echo '<span class="fr expand-collapse-text initial-expand">Click to expand</span>';
					
					echo '</div> <!-- end content-module-heading -->';
					
				
					echo '<div class="content-module-main">';
					
				}
			}
		}
		else
		{
			if((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen) )
			{
				
				$sqlcv = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan where congvan.loaicv = 0 and congvan.nguoigui != '0'";
				if((in_array(32, $quyen) and in_array(34, $quyen) and in_array(36, $quyen)))
				{
					$sqlcv = $sqlcv ." and (congvan.domat = 1 or congvan.domat = 2 or congvan.domat = 3 ) "; 
				}
				else
				{	
					if(in_array(32, $quyen) and in_array(34, $quyen))
					{
						$sqlcv = $sqlcv . " and (congvan.domat = 1 or congvan.domat = 2) ";
					}
					else
					{
						if(in_array(32, $quyen) and in_array(36, $quyen))
						{
							$sqlcv = $sqlcv ." and (congvan.domat = 1 or congvan.domat = 3) ";
						}
						else
						{
							if(in_array(34, $quyen) and in_array(36, $quyen))
							{
								$sqlcv = $sqlcv . " and (congvan.domat = 2 or congvan.domat = 3) ";
							}
							else
							{
									if(in_array(32, $quyen))
									{
										$sqlcv = $sqlcv . " and congvan.domat = 1 ";
									}
									if(in_array(34, $quyen))
									{
										$sqlcv = $sqlcv . " and congvan.domat = 2 ";
									}
									if(in_array(36, $quyen))
									{
										$sqlcv = $sqlcv . " and congvan.domat = 3 ";
									}
							}
						}
					}
				}
				if($key == 3)
				{
					$sqlcv = $sqlcv." and congvan.dokhan = '3'";
				
				echo '<div class="content-module-heading cf">';
					
						echo '<h3 class="fl"> Công văn khẩn cấp </h3>';
						echo '<span class="fr expand-collapse-text">Click to collapse</span>';
						echo '<span class="fr expand-collapse-text initial-expand">Click to expand</span>';
					
					echo '</div> <!-- end content-module-heading -->';
					
				
					echo '<div class="content-module-main">';
					
				}
				else
				if($key == 4)
				{
					$sqlcv = $sqlcv." and congvan.domat = '3'";	
						
						echo '<div class="content-module-heading cf">';
					
						echo '<h3 class="fl"> Công văn tối mật </h3>';
						echo '<span class="fr expand-collapse-text">Click to collapse</span>';
						echo '<span class="fr expand-collapse-text initial-expand">Click to expand</span>';
					
					echo '</div> <!-- end content-module-heading -->';
					
				
					echo '<div class="content-module-main">';
					
				}
			}
		}
		?>
		
	<table>
					
							<thead>
						
								<tr>
									<th> Mã Công Văn </th>
									<th> Tên/Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									
									<th> Tác Giả </th>
									<th> File </th>
									<th> Độ bảo mật </th>
									<th> Phân Cấp </th>
									<th> Xử Lý </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
						
								<?php
								
								$i = 1;
								$sqlcv = $sqlcv." and congvan.active = 1 ORDER BY congvan.madk DESC ";
								
									$congvan = mysql_query($sqlcv);
									while (@$row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									echo'<td><b><font color = "green">'.$row[madk].'</font></b></td>';
									echo'<td align = "center">'.$row[soKH].'</td>';
									echo'<td width = "25%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td width = "9%">'.$row[ngayVB].'</td>';
									echo'<td width = "7%">'.$row[tacgia].'</td>';
									//echo'<td> <a href= "../uploads/'.$row[url].'"> download </a></td>';
									if(in_array(3, $quyen))
									{
										echo '<td width = "8%"> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
										echo '<br><div id="file'.$i.'"> </div></td>';
									}
									else
									{
										echo '<td> <a onclick ="a(); width = "8%""> Show File </a></td>';
									}
									// độ mật
									echo '<td width = "10%"> ';
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
									
									echo '<td width = "8%"> ';
									if($row[loaicv] == 0)
										echo '<font color = "red"><strong> Trường </strong></font>';
									else
										echo '<font color = "Green"><strong> Phòng Ban </strong></font>';
									
									echo '</td> ';
									
									
									
									
									// Xử lý
									echo '<td width = "8%" align = "center">';
									if($manv != $row[nguoixuly])
									{
										echo '	<a  onClick="a();" class="table-actions-button ic-table-edit"></a>';
										//echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
										echo '</td>';
										echo '</tr>'	;
									}
									else
									{
											echo '<a href="javascript:tb_show(';
		echo "'Xử lý công văn','xulycongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Xử lý' class='table-actions-button ic-table-edit'></a> ";
										
										echo '</td>';
										echo '</tr>'	;
									}
									
									
									$i++;
										
									}

								
								
								?>
								
						
						
							</tbody>
					<tfoot>
								
									<tr>
									
									<td colspan = "8" style = "text-align : right; font-size : 20px; "><br><br> Tổng cộng : </td><td style = "text-align : center; font-size : 20px;"><br><br> <font color = "red"><?php echo $i -1 ;?> </font></td>
									</tr>
								
							</tfoot>
						
							
						
						</table>
		<?php
		}
	?>
	
	