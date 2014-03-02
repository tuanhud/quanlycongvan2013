
<?php
	@session_start();

	$user = $_SESSION['myname'];
   $key=$_GET["q"];
   $quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
  // $user = $_GET["user"];
   include ('dbcon.php');
	if($_SESSION['phongban'] != 0)
	{
		
		if((in_array(31, $quyen) or in_array(33, $quyen) or in_array(35, $quyen)) and in_array(1, $quyen) )
		{
		
		$sqlcv = "select distinct congvan.madk,congvan.soKH, congvan.domat, congvan.ngayVB,congvan.loaicv, congvan.sotrang, congvan.trichyeu, congvan.tacgia, congvan.nguoixuly from congvan,nhanvien,trangthaixuly  where trangthaixuly.madk = congvan.madk  and nhanvien.manv = congvan.nguoixuly and congvan.loaicv = '1' and nhanvien.mapb = '".$mapb."'";
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
		   if($key != 3)
		   {
				$sqlcv = $sqlcv . " and trangthaixuly.trangthai = '".$key."' ";
		   }
		}
	}
	else
	{
		if((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen) )
		{
		
		$sqlcv = "select distinct congvan.madk,congvan.soKH, congvan.domat, congvan.ngayVB,congvan.sotrang, congvan.trichyeu, congvan.loaicv congvan.tacgia, congvan.nguoixuly from congvan,trangthaixuly  where trangthaixuly.madk = congvan.madk and congvan.loaicv = '0' and congvan.nguoigui <> '0' ";
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
		   if($key != 3)
		   {
				$sqlcv = $sqlcv . " and trangthaixuly.trangthai = '".$key."' ";
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
									<th> File đính kèm </th>
									<th> Độ bảo mật </th>
									<th> Phân Cấp </th>
									<th> Actions </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
						
								<?php
								
								$i = 1;
								$sqlcv = $sqlcv . " ORDER BY congvan.madk DESC ";
								
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
									echo'<td width = "9%">'.$row[tacgia].'</td>';
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
		
	
?>
						

   
