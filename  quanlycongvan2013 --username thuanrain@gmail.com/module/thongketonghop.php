
<?php
	@session_start();

	$loaicv = $_POST['loaicv'];
	$batdau = $_POST['BatDau'];
	$ketthuc = $_POST['KetThuc'];
	$mapbnv = $_SESSION['phongbanbc'];
	$quyen = array();
		$quyen = $_SESSION['cacquyen'];
	/*$date = new DateTime($batdau);
	//$date1 = new DateTime($ketthuc);
	$date = date_create($batdau);
	$Batdau = date_format($date, 'Y-m-d');
	$date1 = date_create($ketthuc);
	$Ketthuc = date_format($date1, 'Y-m-d');
	}
	catch (Exception $e) { echo $e;}*/
	
	function date_i($string_i)
	{
		$thang_i = substr($string_i,3,2);
		$ngay_i = substr($string_i,0,2);
		$nam_i = substr($string_i,6,4);
		$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
		return $ngay_format;
	}
	
	$Batdau = date_i($batdau);
	$Ketthuc = date_i($ketthuc);
   include ('dbcon.php');
?>
<table>
						
							<thead>
								
								<tr>
									
									<th rowspan = "2" width = "2%"> STT </th>
									<th rowspan = "2" width = "19%"> Tên phòng ban </th>
									<th rowspan = "2" width = "15%"> Công văn đi </th>
									<th rowspan = "2" width = "15%"> Công văn đến </th>
									<th colspan = "3" width = "20%"> Công văn đã xử lý </th>
									<th colspan = "3" width = "20%"> Công văn chưa xử lý </th>
									<th rowspan = "2" width = "8%"> Chi tiết </th>
								</tr>
								<tr>
									<th> Đúng hạn </th>
									<th> Trễ hạn </th>
									<th>  Tổng </th>
									<th> Còn hạn </th>
									<th> Quá quy định </th>
									<th>  Tổng </th>
								</tr>
							</thead>
						
<tbody>

								<?php
								if($loaicv != 0)
								{
									$STT = 1;
									$di = 0;
									$nhan = 0;
									$da_dung = 0;
									$da_tre = 0;
									$da_tong = 0;
									$chua_con = 0;
									$chua_het = 0;
									$chua_tong = 0;
									$di = 0;
									$now = date('Y/m/d',time());
									//$phongbannv = mysql_query("select tenpb from phongban where mapb = '".$mapbnv."'");
									if(in_array(37, $quyen))
									{
										$phongban = mysql_query("select phongban.tenPB,phongban.mapb from PhongBan 	");
									}
									else
									{
										$phongban = mysql_query("select phongban.tenPB,phongban.mapb from PhongBan where mapb = '".$mapbnv."'");
									}
									
									
							while ($rowss = mysql_fetch_array($phongban))
							{
							echo '<tr>';
								echo '<td>'.$STT.'</td>';
								echo '<td align = "center"> <font color = "blue">'.$rowss[tenPB].'</font></td>';
									$congvan_sql = "select distinct congvan.madk, congvan.ngayhh,trangthaixuly.trangthai, trangthaixuly.ngay from congvan,trangthaixuly,nhanvien where congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = '".$rowss[mapb]."' and congvan.madk = trangthaixuly.madk  and congvan.active = 1";
									
									if($Batdau != "//" and $Ketthuc != "//" )
									{
										$congvan_sql = $congvan_sql." and congvan.ngayvb between '".$Batdau."' and '".$Ketthuc."'";
									}
									$congvan = mysql_query($congvan_sql);
									while ($rowsss = mysql_fetch_array($congvan))
									{
									$nhan++;
									if($rowsss[trangthai] == 2)
										{
											$da_tong++;
											$datehh = $row[ngayhh];
											$datexuly = $row[ngay];
											if(strtotime($datexuly) > strtotime($datehh))
											{
												$da_tre++;
											}
											else
											$da_dung++;
										}
										else
										{
											$datehh = $row[ngayhh];
											$datenow = $now;
											$chua_tong++;
											if(strtotime($datehh) < strtotime($datenow))
											{
												$chua_het++;
											}
											else
											$chua_con++;
										}
										$chua++;
									}
									$cvdi_sql = "select madk from congvan,nhanvien where congvan.nguoigui = nhanvien.manv and nhanvien.mapb = '".$rowss[mapb]."' and congvan.active = 1";
									if($Batdau != "//" and $Ketthuc != "//" )
									{
										$cvdi_sql = $cvdi_sql." and congvan.ngayvb between '".$Batdau."' and '".$Ketthuc."'";
									}
									$cvdi = mysql_query($cvdi_sql);
									while($rowssss = mysql_fetch_array($cvdi))
									{
										$di++;
										
									}
								
							
									echo'<td align = "center"> <font color = "black"><strong>'.$di.'</strong></font></td>';
								echo'<td align = "center"><font color = "black"><strong>'.$nhan.'</strong></font></td>';
								echo'<td align = "center"><font color = "blue">'.$da_dung.'</font></td>';
								echo'<td align = "center"><font color = "red">'.$da_tre.'</font></td>';
								echo'<td align = "center"><font color = "green"><strong>'.$da_tong.'</strong></font></td>';
								echo'<td align = "center"><font color = "blue">'.$chua_con.'</font></td>';
								echo'<td align = "center"><font color = "red">'.$chua_het.'</font></td>';
								echo'<td align = "center"><font color = "green"><strong>'.$chua_tong.'</strong></font></td>';
								echo'<td><a href = "../module/getchitiet.php?batdau='.$batdau.'&ketthuc='.$ketthuc.'&q=1&mapb='.$rowss[mapb].'"> Chi tiết </a></td>';
								echo '</tr>';
								$STT++;
								$di = 0;
									$nhan = 0;
									$da_dung = 0;
									$da_tre = 0;
									$da_tong = 0;
									$chua_con = 0;
									$chua_het = 0;
									$chua_tong = 0;
									$di = 0;
							}
							echo '</tr>';
						
					} //end if
					else
					{
									$STT = 1;
									$di = 0;
									$nhan = 0;
									$da_dung = 0;
									$da_tre = 0;
									$da_tong = 0;
									$chua_con = 0;
									$chua_het = 0;
									$chua_tong = 0;
									$di = 0;
									$now = date('Y/m/d',time());
									
							echo '<tr>';
								echo '<td>'.$STT.'</td>';
								echo '<td align = "center"> <font color = "blue"> Trường Đại Học Công Nghệ Thông Tin </font></td>';
									$congvan_sql = "select distinct congvan.madk, congvan.ngayhh,trangthaixuly.trangthai, trangthaixuly.ngay from congvan,trangthaixuly where congvan.nguoigui <> '0' and congvan.madk = trangthaixuly.madk and congvan.loaicv = '0' and congvan.active = 1";
									
									if($Batdau != "//" and $Ketthuc != "//" )
									{
										$congvan_sql = $congvan_sql." and congvan.ngayvb between '".$Batdau."' and '".$Ketthuc."'";
									}
									echo $congvan_sql;
									$congvan = mysql_query($congvan_sql);
									while ($rowsss = mysql_fetch_array($congvan))
									{
									$nhan++;
									if($rowsss[trangthai] == 2)
										{
											$da_tong++;
											$datehh = $row[ngayhh];
											$datexuly = $row[ngay];
											if(strtotime($datexuly) > strtotime($datehh))
											{
												$da_tre++;
											}
											else
											$da_dung++;
										}
										else
										{
											$datehh = $row[ngayhh];
											$datenow = $now;
											$chua_tong++;
											if(strtotime($datehh) < strtotime($datenow))
											{
												$chua_het++;
											}
											else
											$chua_con++;
										}
										$chua++;
									}
									$cvdi_sql = "select madk from congvan where congvan.nguoigui = '0' and loaicv = '0' and Active = 1 ";
									if($Batdau != "//" and $Ketthuc != "//" )
									{
										$cvdi_sql = $cvdi_sql." and ngayvb between '".$Batdau."' and '".$Ketthuc."'";
									}
									$cvdi = mysql_query($cvdi_sql);
									while($rowssss = mysql_fetch_array($cvdi))
									{
										$di++;
										
									}
								
							
									echo'<td align = "center"> <font color = "black"><strong>'.$di.'</strong></font></td>';
								echo'<td align = "center"><font color = "black"><strong>'.$nhan.'</strong></font></td>';
								echo'<td align = "center"><font color = "blue">'.$da_dung.'</font></td>';
								echo'<td align = "center"><font color = "red">'.$da_tre.'</font></td>';
								echo'<td align = "center"><font color = "green"><strong>'.$da_tong.'</strong></font></td>';
								echo'<td align = "center"><font color = "blue">'.$chua_con.'</font></td>';
								echo'<td align = "center"><font color = "red">'.$chua_het.'</font></td>';
								echo'<td align = "center"><font color = "green"><strong>'.$chua_tong.'</strong></font></td>';
								echo'<td><a href = "../module/getchitiet.php?batdau='.$batdau.'&ketthuc='.$ketthuc.'&q=0&mapb='.$rowss[mapb].'"> Chi tiết </a></td>';
								echo '</tr>';
								$STT++;
								$di = 0;
									$nhan = 0;
									$da_dung = 0;
									$da_tre = 0;
									$da_tong = 0;
									$chua_con = 0;
									$chua_het = 0;
									$chua_tong = 0;
									$di = 0;
							echo '</tr>';
						
					} //end else

								?>

								
								
							
							</tbody>					
						</table>

   
