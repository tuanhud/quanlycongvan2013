<?php
		@session_start();
		$b[1]="active-tab dashboard-tab";
	if(isset($_POST[phongban1]))
	{
		$_SESSION['phongban'] = $_POST['phong'];
		@header("location:congvanden.php");	
	}
	
	if(isset($_SESSION['myname']) and isset($_SESSION['cacquyen']) )
		{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		$sqlcv= "";
		$a = 1;
		$choxl = 0;
	
 
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

<script type="text/javascript" src="../js/dkdv.js"></script>

<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="../CSS/thickbox.css" type="text/css" media="screen" />

</head>
<body>

	<?php
		include("divtopbar.php");
		include("divheader.php");
	?>	
	<form class="phong" action="congvanden.php" method="post">
	
			<a href="#" id="company-branding-small" class="fl"><img src="../images/company-logo.png" alt="UIT" /></a>
	<?php
	//sql phòng ban
	$sqlcvPB = "";
	$sqlcvTR = "";
	if(((in_array(31, $quyen) or in_array(33, $quyen) or in_array(35, $quyen)) and in_array(1, $quyen))  or in_array(37, $quyen) )
	{
				$sqlcvPB = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,nhanvien where congvan.loaicv = 1 and congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = ".$mapb."";
			
			//$sqlkhan = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,nhanvien where congvan.loaicv = '1' and congvan.nguoixuly = nhanvien.manv and nhanvien.mapb = '".$mapb."'";
				if((in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen)))
				{
					$sqlcvPB = $sqlcvPB ." and (congvan.domat = 1 or congvan.domat = 2 or congvan.domat = 3 ) "; 
				}
				else
				{	
					if(in_array(31, $quyen) and in_array(33, $quyen))
					{
						$sqlcvPB = $sqlcvPB . " and (congvan.domat = 1 or congvan.domat = 2) ";
					}
					else
					{
						if(in_array(31, $quyen) and in_array(35, $quyen))
						{
							$sqlcvPB = $sqlcvPB ." and (congvan.domat = 1 or congvan.domat = 3) ";
						}
						else
						{
							if(in_array(33, $quyen) and in_array(35, $quyen))
							{
								$sqlcvPB = $sqlcvPB . " and (congvan.domat = 2 or congvan.domat = 3) ";
							}
							else
							{
									if(in_array(31, $quyen))
									{
										$sqlcvPB = $sqlcvPB . " and congvan.domat = 1 ";
									}
									if(in_array(33, $quyen))
									{
										$sqlcvPB = $sqlcvPB . " and congvan.domat = 2 ";
									}
									if(in_array(35, $quyen))
									{
										$sqlcvPB = $sqlcvPB . " and congvan.domat = 3 ";
									}
							}
						}
					}
				}
				$sqlcvPB = $sqlcvPB . " and congvan.active = 1 ";	
	
				$_SESSION['sqlcvPB'] = $sqlcvPB;	
		$sqlcvPB = $sqlcvPB . " ORDER BY congvan.madk DESC ";	
			
	}
	// sqlcvTR
	
	if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen) )
	{
				
				$sqlcvTR = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan where congvan.loaicv = 0 and congvan.nguoigui != '0'";
				if((in_array(32, $quyen) and in_array(34, $quyen) and in_array(36, $quyen)))
				{
					$sqlcvTR = $sqlcvTR ." and (congvan.domat = 1 or congvan.domat = 2 or congvan.domat = 3 ) "; 
				}
				else
				{	
					if(in_array(32, $quyen) and in_array(34, $quyen))
					{
						$sqlcvTR = $sqlcvTR . " and (congvan.domat = 1 or congvan.domat = 2) ";
					}
					else
					{
						if(in_array(32, $quyen) and in_array(36, $quyen))
						{
							$sqlcvTR = $sqlcvTR ." and (congvan.domat = 1 or congvan.domat = 3) ";
						}
						else
						{
							if(in_array(34, $quyen) and in_array(36, $quyen))
							{
								$sqlcvTR = $sqlcvTR . " and (congvan.domat = 2 or congvan.domat = 3) ";
							}
							else
							{
									if(in_array(32, $quyen))
									{
										$sqlcvTR = $sqlcvTR . " and congvan.domat = 1 ";
									}
									if(in_array(34, $quyen))
									{
										$sqlcvTR = $sqlcvTR . " and congvan.domat = 2 ";
									}
									if(in_array(36, $quyen))
									{
										$sqlcvTR = $sqlcvTR . " and congvan.domat = 3 ";
									}
							}
						}
					}
				} 
				$sqlcvTR = $sqlcvTR . " and congvan.active = 1 ";	
	
				$_SESSION['sqlcvTR'] = $sqlcvTR;
			$sqlcvTR = $sqlcvTR . " ORDER BY congvan.madk DESC ";	
		
		}// end sqlcvTR
		if($_SESSION['phongban'] != 0)
		{
			if(((in_array(31, $quyen) or in_array(33, $quyen) or in_array(35, $quyen)) and in_array(1, $quyen))  or in_array(37, $quyen) )
			{
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
			<select  name="phong" onclick ="a();"  > 
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
			<?php } 
			?>
			<input type ="submit" class="button round blue image-right ic-refresh" name ="phongban1" value =" Chuyển " > </input>
			</form>
	<?php 
	$sql = $sqlcvPB;
	$congvanx = mysql_query($sqlcvPB);
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
	} // // end cbb phong ban 
	else // công văn trường
	{
	if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen) )
	{
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
			<input type ="submit" class="button round blue image-right ic-refresh" name ="phongban1" value =" Chuyển " > </input>
			</form>
	
	<?php 
	$sql = $sqlcvTR;
	$congvanx = mysql_query($sqlcvTR);
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
	
	} // close công văn cấp trường
	
	
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
					<?php
					if(in_array(9, $quyen) or in_array(37, $quyen) )
					{
					?>
					<li><a href="baocaoden.php"> Thiết lập báo cáo </a></li>
					<?php
					}
					else
					echo '<li><a  onclick = "a();"> Thiết lập báo cáo </a></li>';
					?>
					
				</ul> 
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
					<div id = "pro5">
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Công văn đến </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
				
					<div class="content-module-main">
						
						<div class="menu_ngang"> 
						<li><input type = "radio" name = "x" value = "3" onclick = "phanloai(this.value)" checked = "true"/> Tất cả </li>
						<li><input type = "radio" name = "x" value = "0" onclick = "phanloai(this.value);"/> Chưa Xử Lý </li>
						<li><input type = "radio" name = "x" value = "1" onclick = "phanloai(this.value);"/> Đang Xử Lý </li>
						<li><input type = "radio" name = "x" value = "2" onclick = "phanloai(this.value);"/> Đã hoàn tất </li>
						</div>	
						
						<div id ="divphanloai">
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
									<th> Xử Lý </th>
								</tr>
							
							</thead>
	
							
							<tbody>
						
								<?php
								
								$i = 1;
								
									if($_SESSION['phongban'] != 0)
									{
										$congvan = mysql_query($sqlcvPB);
										
									}
									else
									{
										$congvan = mysql_query($sqlcvTR);
									}
									while (@$row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
								//	echo'<td><input type="checkbox"></td>';
									//echo '<td>'.$i.'</td>';
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
						</div>
					</div> 
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


