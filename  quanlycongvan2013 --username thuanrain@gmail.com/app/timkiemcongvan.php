﻿<?php
		@session_start();
	
	if(isset($_SESSION['myname']) and isset($_SESSION['cacquyen']) )
	{
		include("../module/highlight.php");
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		$sqlcv= "";
		//$keyword = $_POST[keyword];
		$a = 7;
		
		
?>

<html lang="en">
<head>


	<meta charset="utf-8">
	<title>UIT DMS</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		
	<script src="../js/jquery-1.7.2.min.js"></script>  
	<script src="../js/script.js"></script>  
	<script>
function showfile(str,t)
{
var s = "file"+t;
if (str=="")
  {
  document.getElementById(""+s).innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(""+s).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../module/getfile.php?q="+str,true);
xmlhttp.send();
}
</script>

<script type="text/javascript" src="../js/dkdv.js"></script>
<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="../CSS/thickbox.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="../CSS/styledaterange.css" /> 
 <link rel="stylesheet" href="../CSS/daterangepicker.css" />
		<script src="../js/jquery-1.5.1.min.js"></script>
		<script src="../js/moment.min.js"></script>
		<script src="../js/daterangepicker.js"></script>
		<script src="../js/demo.js"></script> 
<script>
	function a()
	{
		alert(' Thao tác không thể thực hiện !!! ');
	}
</script>
<script>
 function checkloaicv()
{
            if(timkiem.phong.value == '9999')
             {
				timkiem.loaicv.disabled = true;
			}
				else
				timkiem.loaicv.disabled = false;
}
</script>	

<script>
function phanloai(str)
{

if (str=="")
  {
  document.getElementById("divphanloai").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("divphanloai").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../module/phanloai.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>
<body>
	<?php
		include("divtopbar.php");
		include("divheader.php");
	
	if(in_array(37, $quyen))
	{	
		$sqlcv = "select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan where ((congvan.loaicv = '1' ";
		
			$sqlcv = $sqlcv ." and (congvan.domat = 1 or congvan.domat = 2 or congvan.domat = 3 ) "; 
		
				$sqlcv = $sqlcv. "  ) or ( congvan.loaicv = '0' ";
					$sqlcv = $sqlcv ." and (congvan.domat = 1 or congvan.domat = 2 or congvan.domat = 3 ) "; 
					//echo $sqlcv;
					$sqlcv = $sqlcv. " )) ";
	}
		
	
	else
	{	
		if((in_array(31, $quyen) or in_array(33, $quyen) or in_array(35, $quyen)) and in_array(1, $quyen) and in_array(11, $quyen) )
		{
		
$sqlcv = "select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan where ((congvan.loaicv = '1' and (congvan.nguoigui in (select manv from nhanvien where nhanvien.mapb = (select mapb from nhanvien where nhanvien.manv = '".$manv."')) or  congvan.nguoixuly in (select manv from nhanvien where nhanvien.mapb = (select mapb from nhanvien where nhanvien.manv = '".$manv."'))) ";
		if(in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen))
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
		
		if(in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen))
			{
				$sqlcv = $sqlcv. "  ) or ( congvan.loaicv = '0' ";
				if((in_array(32, $quyen) and in_array(34, $quyen) and in_array(36, $quyen)) or in_array(37, $quyen))
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
					$sqlcv = $sqlcv. " )) ";
		}
		else
		{
			$sqlcv = $sqlcv. " )) ";
		}		
		
		
		}
	}
		$choxl = 0;
	$daxl = 0;
	$khan = 0;
	$tongg = 0;
	$khan = 0;
	$mat = 0;
	$ds = 0;
	$sqlleft = "select distinct congvan.madk,congvan.dokhan,trangthaixuly.trangthai from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = '".$manv."'";
	$query = mysql_query($sqlleft);
	while ($rowx = mysql_fetch_array($query))
	{
		$tongg++;
		if($rowx[trangthai] == 2)
		{
			$daxl++;
		}
		else
		$choxl++;
		
	}
	
	?>	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				
				<h3>Danh mục </h3>
				<ul>
					<li><a href="congvanden.php"> Danh sách  </a></li>
					
					<li><a href = "#" onclick = "phanloaileft(1);">Công văn chờ xử lý <font color = "red" > <?php echo '('.$choxl.'/'.$tongg.')'; ?> </font> </a></li>
					<li><a href = "#" onclick = "phanloaileft(2);">Công văn đã xử lý <font color = "red" > <?php echo '('.$daxl.')'; ?> </font> </a></li>
					
					<?php
						if(in_array(7, $quyen))
						{
					?>
					<li><a href="tracuucongvanden.php"> Tra cứu công văn đến </a></li>
						<?php } 
						else
						echo '<li><a onclick ="a();"> Tra cứu công văn đến </a></li>';
					
					?>
					<li><a href="baocaoden.php"> Thiết lập báo cáo </a></li>
					
				</ul> 
				
				
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Tra cứu công văn </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
				
					
					<form method="POST" action ="timkiemcongvan.php" name ="timkiem" id = "timkiem">
					<div id = "search" name = "search" class = "search">
					<table class="table" align = "center" >
					<tr>
						
						<td> Từ khóa : </td>
						
						<td> <input type = "text" name = "word" id = "word" /> </td>
					</tr>
					<tr>
					<td >
							Thời gian ban hành :  
						
					</td>
					<td>
					<input name="reservation" id="date-range0" size="40" value="">
							 
							 </td>	
					</tr>
					<tr> 
					<td> Phân Cấp (Phòng ban/Trường) : </td>
					<td>
						<select name="phong" id = "phong" onclick = "checkloaicv();" > 
				<?php 
				if(in_array(37,$quyen))
				{
					
					$phongban1 = mysql_query("select tenpb,mapb from phongban");
				
					while($rrrr = mysql_fetch_array($phongban1))
					{
						echo "<option value ='".$rrrr[mapb]."'>".$rrrr[tenpb]."</option>" ;
					}
					echo "<option value = '9999' > Tất cả </option>";
				}
				else
				{
					$phongban = mysql_query("select tenpb,mapb from phongban where mapb = '".$mapb."'");
				
					while($rrr = mysql_fetch_array($phongban))
					{
						echo "<option value ='".$rrr[mapb]."'> ".$rrr[tenpb]."</option>" ;
					}
				}
				if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen))
				{
					echo "<option value = '0'> Trường Đại học Công Nghệ Thông Tin </option>";
				}
			
			?> 
			</select>
			</td>
			</tr>
			<tr>
				<td> Loại Công Văn : </td>
					<td>  
						<select name = "loaicv" id = "loaicv" >
							<option value = "2"> Tất cả </option>
							<option value = "0"> Công văn đi </option>
							<option value = "1"> Công văn đến </option>
						</select>		
					</td> 
			</tr>
			
			<tr>
				<td>
					<input type="submit" name="sbMyForm" value="Hoàn thành"></input>
				</td>	
			</tr>
					</table>
					</form>
					</div>
	<br>				
					<?php
						if (isset($_POST[sbMyForm]))
					{
							function date_i_start($string_i)
							{
								$ngay_format = substr($string_i,0,10);
								return $ngay_format;
							}
							function date_i_end($string_i)
							{
								$ngay_format = substr($string_i,13,10);
								return $ngay_format;
							}
							function date_i($string_i)
							{
								$ngay_i = substr($string_i,3,2);
								$thang_i = substr($string_i,0,2);
								$nam_i = substr($string_i,6,4);
								$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
								return $ngay_format;
							}
							function date_ii($string_i)
							{
								$ngay_i = substr($string_i,3,2);
								$thang_i = substr($string_i,0,2);
								$nam_i = substr($string_i,6,4);
								//$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
								$ngay_format = $ngay_i."/".$thang_i."/".$nam_i;
								return $ngay_format;
							}
						$keyword = $_POST['word'];
						//$h = $_POST[myCheckbox];
						$ngay = $_POST['reservation'];
						//$ketthuc = $_POST['KetThuc'];
						$batdau = date_i_start($ngay);
						$ketthuc = date_i_end($ngay);
							
						$Batdau = 0;
						$Ketthuc = 0;
						$Phong = $_POST['phong'];
						$LoaiCV = $_POST['loaicv'];
					//	$TinhTrang  = $_POST['tinhtrang'];
						
					//	echo $Phong.'<br>'.$LoaiCV.'<br>'.$TinhTrang.'<br>';
						if($ngay != null )
						{		
							$Batdau = date_i($batdau);
							$Ketthuc = date_i($ketthuc);
							$batdau = date_ii($batdau);
							$ketthuc = date_ii($ketthuc);
						}
						
						
						//$arr = implode(",",$h);	
			  
					?>
					
				
						<table class="table">
					
							
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all"></th>
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
								$sqlcv = $sqlcv." and (congvan.trichyeu like '%$keyword%')";
								echo 'Các kết quả cho từ khóa :<font color = "red"><i> '.$keyword.' </i></font><br><br>';
								
								if($Batdau != 0 && $Ketthuc != 0 )
								{	
									echo 'Từ ngày : <font color = "green">'.$batdau.'</font> đến ngày : <font color = "green">'.$ketthuc.'</font>';
									$sqlcv = $sqlcv." and (congvan.ngayvb between '".$Batdau."' and '".$Ketthuc."')";
								}
								if($Phong == 0)
								{
									$sqlcv = $sqlcv. " and (congvan.loaicv = 0)";
								}
								if($Phong != 0 and $Phong != 9999)
								{
									$sqlcv = $sqlcv. " and (congvan.loaicv = 1)";
									if(in_array(37, $quyen))
									{
										
										$sqlcv = $sqlcv. " and (congvan.nguoigui in (select manv from nhanvien where nhanvien.mapb = '".$Phong."') or  congvan.nguoixuly in (select manv from nhanvien where nhanvien.mapb = '".$Phong."'))";
									}
								}
								if($LoaiCV == 0 and $Phong == 0)
								{
									$sqlcv = $sqlcv. " and (congvan.nguoigui = '0')";
								}
								if($LoaiCV == 1 and $Phong == 0)
								{
									$sqlcv = $sqlcv. " and (congvan.nguoigui <> '0')";
								}
								if($LoaiCV == 0 and $Phong != 0 and $Phong != 9999)
								{
									$sqlcv = $sqlcv. " and (congvan.nguoigui in (select manv from nhanvien where nhanvien.mapb = '".$Phong."'))";
								}
								if($LoaiCV == 1 and $Phong != 0 and $Phong != 9999)
								{
									$sqlcv = $sqlcv. " and (congvan.nguoixuly in (select manv from nhanvien where nhanvien.mapb = '".$Phong."'))";
								}
								
								
								//echo $sqlcv;	
								$sqlcv = $sqlcv . " ORDER BY congvan.madk DESC ";
									$congvan = mysql_query($sqlcv);
									while (@$row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									echo'<td><input type="checkbox"></td>';
									echo'<td>'.$row[madk].'</td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td width = "20%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
	//	$css = "searchword";
	//	$trichyeu = hightlight($row[trichyeu],$a,$css);
	//	echo 'V/v : '.$trichyeu.' ...</a></td>';
	$aaa = new highlight();
								if($keyword != null)
								{
									$trichyeu = $aaa->toHighLight($row[trichyeu],$keyword);
									echo 'V/v : '.$trichyeu.' ...</a></td>';
								}
								else
								echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td>'.$row[ngayVB].'</td>';
									echo'<td>'.$row[tacgia].'</td>';
									//echo'<td> <a href= "../uploads/'.$row[url].'"> download </a></td>';
									if(in_array(3, $quyen))
									{
										echo '<td width = "10%"> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
										echo '<br><div id="file'.$i.'"> </div></td>';
									}
									else
									{
										echo '<td> <a onclick ="a();"> Show File </a></td>';
									}
									// độ mật
									echo '<td> ';
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
									
									echo '<td> ';
									if($row['loaicv'] == 0)
										echo '<font color = "red"><strong> Cấp Trường </strong></font>';
									else
										echo '<font color = "Green"><strong> Phòng Ban </strong></font>';
									
									echo '</td> ';
									
									
									
									// Xử lý
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
		echo "'Xử lý' class='table-actions-button ic-table-edit'></a> ";
										echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
										echo '</td>';
										echo '</tr>'	;
									}
									
									$i++;
										
									}

								
								
								?>
								
						
						
							</tbody>
					
							
						
						</table>
					
<?php } ?>					
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

