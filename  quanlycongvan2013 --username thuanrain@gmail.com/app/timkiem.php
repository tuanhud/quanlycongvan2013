<?php
		
		@session_start();
		include("../module/highlight.php");
	
	if(isset($_SESSION['myname']) and isset($_SESSION['cacquyen']) )
		{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		$sqlcv= "";
		$keyword = $_POST[keyword];
		$a = 7;
		
		
?>
<!DOCTYPE html>

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
<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="../CSS/thickbox.css" type="text/css" media="screen" />

</head>
<body>

	
	<?php
		include("divtopbar.php");
		include("divheader.php");
	?>
	
		</div> <!-- end full-width -->	

	</div> <!-- end header -->	
	
	<?php
	if(in_array(37, $quyen))
	{	
		$sqlcv = "select distinct congvan.isfile,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan where ((congvan.loaicv = '1' ";
		
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
		
$sqlcv = "select distinct congvan.isfile,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan where ((congvan.loaicv = '1' and (congvan.nguoigui in (select manv from nhanvien where nhanvien.mapb = (select mapb from nhanvien where nhanvien.manv = '".$manv."')) or  congvan.nguoixuly in (select manv from nhanvien where nhanvien.mapb = (select mapb from nhanvien where nhanvien.manv = '".$manv."'))) ";
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
		
	?>	
		
	
	
	
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Danh mục </h3>
				<ul>
					<li><a href="congvanden.php"> Danh sách <font color = "red" > <?php echo '('.$ds.')'; ?> </font> </a></li>
					
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
					
					
				</ul> 
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Kết quả tìm kiếm </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> 
	<br><br>				
	<br><!-- end content-module-heading -->
				<?php
				echo "Các kết quả tìm kiếm cho từ khóa : <font color = 'red'> ".$keyword. "</font>";
				?>
				<div class="content-module-main">
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
									<th> Xử Lý </th>
								</tr>
							
							</thead>
	
							
							
							<tbody>
						
								<?php
								
								$i = 1;
								$sqlcv = $sqlcv . " and congvan.trichyeu like '%".$keyword."%' and congvan.active = 1 ORDER BY congvan.madk DESC ";
								//echo $sqlcv;
									$congvan = mysql_query($sqlcv);
									
									
									
									while ($row = mysql_fetch_array($congvan))
									{
									
										echo '<tr>';
									echo'<td><b><font color = "green">'.$row[madk].'</font></b></td>';
									echo'<td align = "center">'.$row[soKH].'</td>';
									echo'<td width = "25%"><a href="javascript:tb_show(';
		echo "'Chi tiết công văn','chitietcongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Chi tiết' > ";
		$aaa = new highlight();
								if($keyword != null)
								{
									$trichyeu = $aaa->toHighLight($row[trichyeu],$keyword);
									echo 'V/v : '.$trichyeu.' ...</a></td>';
								}
								else
								echo 'V/v : '.$row[trichyeu].' ...</a></td>';
									echo'<td width = "9%">'.$row[ngayVB].'</td>';
									echo'<td width = "9%">'.$row[tacgia].'</td>';
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


