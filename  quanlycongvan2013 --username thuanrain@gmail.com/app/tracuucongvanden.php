<?php
		@session_start();
		$b[1]="active-tab dashboard-tab";
	if(isset($_POST[phongban1]))
	{
		$_SESSION['phongban'] = $_POST['phong'];
		@header("location:tracuucongvanden.php");	
	}
	include("../module/highlight.php");







	if(isset($_SESSION['myname']) and isset($_SESSION['cacquyen']) )
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		
		$a = 7;
 
?>
<html lang="en">
<head>
<?php 
include("head.php");
?>
<link rel="stylesheet" href="../CSS/jquery-calendar.css"/>
 <script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery-calendar.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.calendarFocus').calendar();
			});
		</script>
<script>
	function a()
	{
		alert(' Thao tác không thể thực hiện !!! ');
	}
</script>
<script>
function phanloaileft(str)
{

if (str=="")
  {
  document.getElementById("pro5").innerHTML="";
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
    document.getElementById("pro5").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../module/phanloaileft.php?q="+str,true);
xmlhttp.send();
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
<script type="text/javascript" src="../js/dkdv.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script> 

<link rel="stylesheet" href="../CSS/thickbox.css" type="text/css" media="screen" />

</head>
<body>

	<?php
		include("divtopbar.php");
		include("divheader.php");
	?>	
	<form class="phong" action="tracuucongvanden.php" method="post">
	<a href="#" id="company-branding-small" class="fl"><img src="../images/company-logo.png" alt="UIT" /></a>
	<?php
		if($_SESSION['phongban'] != 0)
		{
			if(in_array(1, $quyen))
			{
				$sqlcv = "select distinct congvan.isfile,congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,nhanvien where congvan.loaicv = 1 and congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = ".$mapb."";
			}
			if(((in_array(31, $quyen) or in_array(33, $quyen) or in_array(35, $quyen)) and in_array(1, $quyen))  or in_array(37, $quyen) )
			{
			//$sqlkhan = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,nhanvien where congvan.loaicv = '1' and congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = '".$mapb."'";
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
						
				
			?>
				<select name="phong"  > 
				<?php 
				$phongban = mysql_query("select tenpb,mapb from phongban where mapb = '".$mapb."'");
				
				while($rrr = mysql_fetch_array($phongban))
				{
					echo "<option value ='".$rrr[mapb]."'> ".$rrr[tenpb]."</option>" ;
				}
				if(in_array(37,$quyen))
				{
					$phongban1 = mysql_query("select tenpb,mapb from phongban where mapb not in (select mapb from phongban where mapb = '".$mapb."')");
				
					while($rrrr = mysql_fetch_array($phongban1))
					{
						echo "<option value ='".$rrrr[mapb]."'>".$rrrr[tenpb]."</option>" ;
					}
				}
				if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen))
				{
					echo "<option value = '0'> Trường Đại học Công Nghệ Thông Tin </option>";
				}
			
			?> 
			</select>
			<?php
			}	
				else
				{
			?>	
			<select name="phong" onclick ="a();"  > 
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
				
				echo "<option value = '0'> Trường Đại học Công Nghệ Thông Tin </option>";
				
			?>
			</select>
			<?php } ?>
			<input type ="submit"  class="button round blue image-right ic-refresh" name ="phongban1" value =" Chuyển " > </input>
			</form>
	
	<?php } // close công văn cấp phòng ban 
	else // công văn trường
	{
			if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen) )
				{
				
				$sqlcv = "select distinct congvan.isfile,congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan where congvan.loaicv = 0 and congvan.nguoigui != '0'";
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
						
				
			?>
				<select name="phong"  > 
				<?php
				echo "<option value = '0'> Trường Đại học Công Nghệ Thông Tin </option>";
							
				if(in_array(37,$quyen))
				{
					$phongban1 = mysql_query("select tenpb,mapb from phongban ");
					
					while($rrrr = mysql_fetch_array($phongban1))
					{
						echo "<option value ='".$rrrr[mapb]."'>".$rrrr[tenpb]."</option>" ;
					}
				}			
				else
				{
				$phongban = mysql_query("select phongban.tenpb,phongban.mapb from phongban,nhanvien where nhanvien.mapb = phongban.mapb and nhanvien.manv = '".$manv."'");
			
				while($rrr = mysql_fetch_array($phongban))
				{
					echo "<option value ='".$rrr[mapb]."'> ".$rrr[tenpb]."</option>" ;
				}
				}
				
			?> 
			</select>
			<?php
			}	
				else
				{
			?>	
			<select name="phong" onclick ="a();"  > 
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
			<?php } ?>
			<input type ="submit"  class="button round blue image-right ic-refresh" name ="phongban1" value =" Chuyển " > </input>
			</form>
	
	<?php } // close công văn cấp trường
	$choxl = 0;
	$daxl = 0;
	$khan = 0;
	$tongg = 0;
	$khan = 0;
	$mat = 0;
	$ds = 0;
	$sqlleft = "select distinct congvan.madk,congvan.dokhan,trangthaixuly.trangthai from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = '".$manv."' and congvan.active = 1";
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
	$sql = $sqlcv;
	$congvanx = mysql_query($sqlcv);
	while (@$rowxx = mysql_fetch_array($congvanx))
	{
		$ds++;
		if($rowxx[dokhan]==3)
		{
			$khan++;
		}
		if($rowxx[domat]==3)
		{
			$mat++;
		}
	}
	?>
	
	
		</div> <!-- end full-width -->	

	</div> <!-- end header -->	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				
				<h3>Danh mục </h3>
				<ul>
					<li><a href="congvanden.php"> Danh sách <font color = "red" > <?php echo '('.$ds.')'; ?> </font> </a></li>
					<?php 
						if(in_array(2, $quyen))
						{
					?>
					
					<li><a href="themcongvan.php?<?php echo 'q=1';?>"> Soạn thảo công văn đến  </a></li>
					<?php 
						}
						else
						{
							?>
						<li><a href="#" onclick = "a();"> Soạn thảo công văn đến  </a></li>
					<?php
						}
					?>
					<li><a href = "#" onclick = "phanloaileft(1);">Công văn chờ xử lý <font color = "red" > <?php echo '('.$choxl.'/'.$tongg.')'; ?> </font> </a></li>
					<li><a href = "#" onclick = "phanloaileft(2);">Công văn đã xử lý <font color = "red" > <?php echo '('.$daxl.')'; ?> </font> </a></li>
					<li><a href='#' onclick = 'phanloaileft(3);'>Công văn khẩn cấp <font color = "red" > <?php echo '('.$khan.')'; ?> </font> </a></li>
						
					<li><a href="#" onclick = "phanloaileft(4);"> Công văn tối mật <font color = "red" >  <?php echo '('.$mat.')'; ?> </font> </a></li>
					
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
				<div id = "pro5">
						
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Tra cứu công văn đến </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
				
					
					<form method="POST" action ="tracuucongvanden.php">
					<div id = "search" name = "search" class = "search">
					<table align = "center" >
					<tr>
						
						<td>Nhập từ khóa tìm kiếm : </td>
						
						<td> <input type = "text" name = "word" id = "word" /> </td>
					</tr>
					<tr>
					<td >
							Từ ngày : 
							</td>
							<td>
							<p><input type = "text" name = "BatDau" id = "BatDau" size="10" class="calendarFocus" /></p>
							</td>
							<td>
							Đến ngày : 
							</td>
							<td>
							<input type = "text" name = "KetThuc" id = "KetThuc" size="10" class="calendarFocus" />
							</td>			
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
					</table>
					</form>
					</div>
	<br>				
					<?php
						if (isset($_POST[sbMyForm]))
						{
							function date_i($string_i)
							{
								$thang_i = substr($string_i,3,2);
								$ngay_i = substr($string_i,0,2);
								$nam_i = substr($string_i,6,4);
								$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
								return $ngay_format;
							}
						$keyword = $_POST['word'];
						$h = $_POST[myCheckbox];
						$batdau = $_POST['BatDau'];
						$ketthuc = $_POST['KetThuc'];
						$Batdau = 0;
						$Ketthuc = 0;
						
						if($batdau != null && $ketthuc != null )
						{		
							$Batdau = date_i($batdau);
							$Ketthuc = date_i($ketthuc);
						}
						
						
						//$arr = implode(",",$h);	
			  
					?>
					
				
						<table id = "myTable">
					
							
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
									<th> Actions </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
						
								<?php
								
								$i = 1;
								echo '<p> Các kết quả cho từ khóa :<font color = "red"><i> '.$keyword.' </i></font><br><br> </p>';
								$Ma = 0;
								$So = 0;
								$Trich = 0;
								if ($h != null)
								{
								echo " <p> Tìm trong : </p>";
								$sqlcv = $sqlcv. " and ( ";
								foreach($h as $key)
									 {
										$sqlcv = $sqlcv." congvan.".$key." like'%".$keyword."%' or";
										if($key == 'madk' )
										{
											$Ma = 1;
										?>
										<p><input type="checkbox" checked = "true" disabled = "true" name="myCheckbox[]" value = "madk"> Mã Đăng Ký </input></p>
							
										<?php
										}
										if($key == 'sokh')
										{
											$So = 1;
											echo '<p><input type="checkbox" checked = "true" disabled = "true"   name="myCheckbox[]" value = "sokh"> Số kí hiệu </input></p>';
										}
										if($key == 'trichyeu')
										{
											$Trich = 1;
											echo '<p><input type="checkbox" checked = "true" name="myCheckbox[]"  disabled = "true"  value = "sokh"> Trích yếu </input></p>';
										}
									 }
									
								
									$sqlcv = substr($sqlcv,0,-2);
									$sqlcv = $sqlcv. " ) ";
								}
							//	echo $sqlcv;
								//$sqlcv = $sqlcv." congvan.madk like '%$keyword%')";
								//echo 'Các kết quả cho từ khóa :<font color = "red"><i> '.$keyword.' </i></font><br><br>';
								
								if($Batdau != 0 && $Ketthuc != 0 )
								{	
									echo '<p> Từ ngày : <font color = "green">'.$batdau.'</font> đến ngày : <font color = "green">'.$ketthuc.'</font> </p>';
									$sqlcv = $sqlcv." and (congvan.ngayvb between '".$Batdau."' and '".$Ketthuc."')";
								}
								
								//echo $sqlcv;	
								$sqlcv = $sqlcv . " and congvan.active = 1 ORDER BY congvan.madk DESC ";
									$congvan = mysql_query($sqlcv);
										$aaa = new highlight();
									while (@$row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									if($Ma == 1 and $keyword != "")
									{
										$madk = $aaa->toHighLight($row[madk],$keyword);
									echo '<td><b><font color = "green">'.$madk.' </font></b></td>';
									}
									else
									echo'<td><b><font color = "green">'.$row[madk].'</font></b></td>';									
									if($So == 1 and $keyword != "")
									{
										$sokh = $aaa->toHighLight($row[soKH],$keyword);
										echo '<td>'.$sokh.' </td>';
									}
									else
									echo'<td>'.$row[soKH].'</td>';
									
									echo'<td width = "20%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
	//	$css = "searchword";
	//	$trichyeu = hightlight($row[trichyeu],$a,$css);
	//	echo 'V/v : '.$trichyeu.' ...</a></td>';
	
								if($Trich == 1 and $keyword != "")
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
										if($row[isfile] == 0)// kiểm tra cv điện tử
										{
											echo'<td width = "8%"><a href="javascript:tb_show(';
											echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
											echo '" title=';
											echo "'Chi tiết' > ";
											echo ' Nội dung </a></td>';
										}
										else
										{
											echo '<td width = "8%"> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
											echo '<br><div id="file'.$i.'"> </div></td>';
										}
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
									if($mapb == 0)
										echo '<font color = "red"><strong> Cấp Trường </strong></font>';
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
					
<?php } ?>			
			</div>
				</div> <!-- end content-module-main -->
				
			</div> <!-- end content-module -->
				
	

		
		
		
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2013 <a href="#"></a>. All rights reserved.</p>
	
	</div> <!-- end footer -->
<script>$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
</script>
</body>
</html>
<?php }
else
header("location:login.php");
?>


