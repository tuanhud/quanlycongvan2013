<?php
		@session_start();
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
		$sqltt = mysql_query("update chitietnhan set trangthai = 1 ");
	$sqlcv = "select distinct congvan.dokhan,congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.domat, congvan.trichyeu, congvan.tacgia,congvan.loaicv, congvan.nguoixuly from congvan,chitietnhan where chitietnhan.madk = congvan.madk and chitietnhan.manv = '".$manv."'";
	
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
				<div id = "pro5">
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Danh sách </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
				
					<div class="content-module-main">
						
						
						
						<div id ="divphanloai">
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
									if($row[loaicv] == 0)
										echo '<font color = "red"><strong> Trường </strong></font>';
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


