
<?php
	@session_start();
	include("../module/dbcon.php");
	function date_i($string_i)
	{
		$thang_i = substr($string_i,3,2);
		$ngay_i = substr($string_i,0,2);
		$nam_i = substr($string_i,6,4);
		$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
		return $ngay_format;
	}
	$loaicv = $_POST['loaicv']; // trường hoặc pb
	$batdau = $_POST['BatDau'];
	//echo $batdau;
	$_SESSION['batdau'] = $batdau;
	$ketthuc = $_POST['KetThuc'];
	$_SESSION['ketthuc'] = $ketthuc;
	
	//$phanloai = $_POST['PhanLoai']; // đến hoặc đi
	$ngay_bd = date_i($_SESSION['batdau']);
	$ngay_kt = date_i($_SESSION['ketthuc']);
	$mapb = "";
	$tenpb = "";
	
		$manv = $_SESSION['manv'];
		if($loaicv == 0)
		{
			$sqlcvden = $_SESSION['sqlcvTR'];
			
			$mapb = 0;
$tenpb = "TRƯỜNG ĐẠI HỌC CÔNG NGHỆ THÔNG TIN";			
			if($ngay_bd != "//" and $ngay_kt != "//" )
			{
				$sqlcvden = $sqlcvden." and congvan.ngayvb between '".$ngay_bd."' and '".$ngay_kt."'";
			}
		}
		else
		{
			$mapb = $_SESSION['phongbanbc'];
			$phongban = mysql_query("select tenpb from phongban where mapb = '".$mapb."'");
			while($row = mysql_fetch_array($phongban))
			{
			$tenpb = $row[tenpb];
			}
			$sqlcvden = $_SESSION['sqlcvPB'];
		if($ngay_bd != "//" and $ngay_kt != "//" )
		{
			$sqlcvden = $sqlcvden." and congvan.ngayvb between '".$ngay_bd."' and '".$ngay_kt."' ";
		}
		}
	/*$date = new DateTime($batdau);
	//$date1 = new DateTime($ketthuc);
	$date = date_create($batdau);
	$Batdau = date_format($date, 'Y-m-d');
	$date1 = date_create($ketthuc);
	$Ketthuc = date_format($date1, 'Y-m-d');
	}
	catch (Exception $e) { echo $e;}*/
	
	
	
	$Batdau = date_i($batdau);
	$Ketthuc = date_i($ketthuc);
   include ('dbcon.php');
?>
<br><br>
<center><h1>	BẢNG BÁO CÁO CÔNG VĂN ĐẾN CỦA  : <font color = "blue"> <?php echo $tenpb;?> </font> </h1>
				<br>
<?php if($ngay_bd != "//" and $ngay_kt != "//" )
				{
				?>
				<h2> TỪ NGÀY : <font color = "red"> <?php echo $_SESSION['batdau'].'  '; ?> </font> ĐẾN NGÀY : <font color = "red"> <?php echo $_SESSION['ketthuc'].' '; ?> </font></h2></center>
			<br>
			<?php } ?>
<table>
						<tr> <td colspan = "7">
									<?php 
										
										
									?>
							<thead>
								
								<tr>
									
									<th> Mã công văn </th>
									<th> Số/ Kí hiệu </th>
									<th> Về việc/ Trích yếu </th>
									<th> Ban Hành </th>
									<th> Độ bảo mật </th>
									<th> Phân Cấp </th>
								</tr>
								
							</thead>
						
<tbody>

								<?php
								$i = 1;
								$_SESSION['exportden'] = $sqlcvden;
								
								$sqlcvden = $sqlcvden . " ORDER BY congvan.madk DESC ";
								$domat = "";	
								$phancap = "";	
								//echo $sqlcvden;
									$congvan = mysql_query($sqlcvden);
									while ($row = mysql_fetch_array($congvan))
									{
									
									echo '<tr>';
									echo'<td><b><font color = "green">'.$row[madk].'</font></b></td>';
									echo'<td align = "center">'.$row[soKH].'</td>';
									echo'<td width = "35%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td width = "9%">'.$row[ngayVB].'</td>';
									
									// độ mật
									echo '<td width = "15%"> ';
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
									
									echo '<td width = "13%"> ';
									if($row[loaicv] == 0)
										echo '<font color = "red"><strong> Trường </strong></font>';
									else
										echo '<font color = "Green"><strong> Phòng Ban </strong></font>';
									
									echo '</td> ';
									
									
									
									
										echo '</tr>'	;
									
									
									$i++;
									}
								?>

								
							
							</tbody>
							<tfoot>
							
							<tr>
								
								<td colspan = "5" style = "text-align : right; font-size : 20px; "> <br> <br>Tổng cộng : </td>
								<td style = "text-align : center; font-size : 20px;"> <font color = "red"><br> <br><?php echo $i -1 ;?> </font></td>
								</tr>
								<tr><td colspan = "5" align = "right"> <h1> <a href = "../module/PHP_Create_Excel/export_excel.php?q=1& <?php echo 'mapb='.$mapb; ?>"> Export to Excel </a> </h1>
								</td>
							</tr>
					</tfoot>							
						</table>

   
