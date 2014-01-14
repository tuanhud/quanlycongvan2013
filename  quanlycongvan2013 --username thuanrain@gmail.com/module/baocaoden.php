
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
	$_SESSION['batdau'] = $batdau;
	$ketthuc = $_POST['KetThuc'];
	$_SESSION['ketthuc'] = $ketthuc;
	
	//$phanloai = $_POST['PhanLoai']; // đến hoặc đi
	$ngay_bd = date_i($_SESSION['batdau']);
	$ngay_kt = date_i($_SESSION['ketthuc']);
	$mapb = "";
	
		$manv = $_SESSION['manv'];
		$sqlcvden = "select distinct congvan.loaicv, congvan.madk,congvan.soKH, congvan.domat, congvan.ngayVB, congvan.ngayhh, congvan.trichyeu from congvan ";
		if($loaicv == 0)
		{
			$mapb = 0;
			$sqlcvden = $sqlcvden." where congvan.nguoigui <> '0' and congvan.loaicv = '0' and congvan.ngayvb between '".$ngay_bd."' and '".$ngay_kt."'";
		}
		else
		{
			$mapb = $_SESSION['phongbanbc'];
		$sqlcvden = $sqlcvden.",nhanvien where congvan.nguoixuly = nhanvien.manv and nhanvien.maPB = '".$mapb."' and congvan.ngayvb between '".$ngay_bd."' and '".$ngay_kt."' and congvan.loaicv = '1'";
		
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
<table>
						<tr> <td colspan = "7">
									<?php 
										
										
									?>
							<thead>
								
								<tr>
									
									<th> STT </th>
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
								$STT = 1;
								
								$sqlcvden = $sqlcvden . " ORDER BY congvan.madk DESC ";
								$domat = "";	
								$phancap = "";	
									$congvan = mysql_query($sqlcvden);
									while ($row = mysql_fetch_array($congvan))
									{
									if($row[domat] == 1)
									{
										$domat = "Thông Thường";
									}
									if($row[domat] == 2)
									{
										$domat = "Mật";
										
									}
									if($row[domat] == 3)
									{
										$domat = "Tối Mật";
									}
									if($row[loaicv] == 0)
										$phancap = "Cấp Trường";
									else
										$phancap = "Phòng Ban";
									echo '<tr>';
									echo '<td>'.$STT.'</td>';
									echo '<td>'.$row[madk].'</td>';
									echo '<td>'.$row[soKH].'</td>';
									echo '<td>'.$row[trichyeu].'</td>';
									echo '<td>'.$row[ngayVB].'</td>';
									echo '<td>'.$domat.'</td>';
									echo '<td>'.$phancap.'</td>';
									echo '</tr>';
									$STT++;
									}
								?>

								
							<tr><td colspan = "7" align = "right"> <h1> <a href = "../module/PHP_Create_Excel/export_excel.php?q=1& <?php echo 'mapb='.$mapb; ?>"> Export to Excel </a> </h1>
							
							</tbody>					
						</table>

   
