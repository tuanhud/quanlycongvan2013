<?php
		@session_start();
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
		
		$a = 1;
 
?>
<html lang="en">
<head>
<?php 
include("head.php");
?>

<script>
	function a()
	{
		alert(' Thao tác không thể thực hiện !!! ');
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
	<form action="tracuucongvanden.php" method="post">
	<?php
		if($_SESSION['phongban'] != 0)
		{
			if(in_array(1, $quyen))
			{
				$sqlcv = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,nhanvien where congvan.loaicv = 1 and congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = ".$mapb."";
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
			<input type ="submit" name ="phongban1" value =" Chuyển " > </input>
			</form>
	
	<?php } // close công văn cấp phòng ban 
	else // công văn trường
	{
			if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen) )
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
			<input type ="submit" name ="phongban1" value =" Chuyển " > </input>
			</form>
	
	<?php } // close công văn cấp trường
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
					
					<li><a href="themcongvan.php?<?php echo 'q='.$a;?>"> Soạn thảo công văn đến  </a></li>
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
						$keyword = $_POST['word'];
						$h = $_POST[myCheckbox];
						
						//$arr = implode(",",$h);	
			  
					?>
					
				
						<table>
					
							
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
								if ($h != null)
								{
								$sqlcv = $sqlcv. " and ( ";
								foreach($h as $key)
									 {
										$sqlcv = $sqlcv." congvan.".$key." like'%".$keyword."%' or ";
									 }
						
									
								}
								$sqlcv = $sqlcv." congvan.madk like '%$keyword%')";
								echo 'Các kết quả cho từ khóa :<font color = "red"><i> '.$keyword.' </i><font><br><br>';
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
									if($mapb == 0)
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
<?php }
else
header("location:login.php");
?>


