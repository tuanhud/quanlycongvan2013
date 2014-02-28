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
		$a = 5;
		$choxl = 0;
 
?>
<html lang="en">
<head>
<?php 
include("head.php");

?>
<script type="text/javascript" src="../js/dkdv.js"></script>
<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="../CSS/thickbox.css" type="text/css" media="screen" />
<script>
function showtemplate(str,t)
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
xmlhttp.open("GET","../module/gettemplate.php?q="+str,true);
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

</head>

<body>

	<?php
		include("divtopbar.php");
		include("divheader.php");
	?>
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Danh mục </h3>
				<ul>
					<li><a href="#">Công văn chờ xử lý <font color = "red" > (4) </font> </a></li>
					<li><a href="#">Công văn đã xử lý <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn quan trọng <font color = "red" > (2) </font> </a></li>
					<li><a href="#">Công văn tối mật<font color = "red" > (0) </font> </a></li>
					<li><a href="tracuucongvanden.php"> Tra cứu công văn </a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Danh sách </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					<div id = "pro5">
						<table>
						
							<thead>
						
								<tr>
									<th> Mã biểu mẫu </th>
									<th> Tên biểu mẫu </th>
									<th> Ngày ban hành </th>
									<th> Phòng ban </th>
									<th> Nội dung File </th>
									
									
									
								</tr>
							
							</thead>
	
							
							
							<tbody>
								<?php
								$i = 1;
									$congvan = mysql_query("select bieumau.MaBM, bieumau.TenBM, bieumau.NgayBanHanh, phongban.TenPB from bieumau,phongban where bieumau.mapb = phongban.mapb ");
									while ($row = mysql_fetch_array($congvan))
									{
								
									echo '<tr>';
									echo'<td>'.$row[MaBM].'</td>';
									echo'<td><a>'.$row[TenBM].'</a></td>';
									echo'<td>'.$row[NgayBanHanh].'</td>';
									echo'<td>'.$row[TenPB].'</td>';
									echo '<td> <a onclick ="showtemplate('.$row[MaBM].','.$i.')"> Hiển thị nội dung </a>';
									echo '<br><div id="file'.$i.'"> </div></td>';
									echo'<td>';
									
										
									
									
								//	echo'<td>'.$row[tacgia].'</td>';
								
								echo '</tr>'	;
								$i++;
	
									}


								?>
								
							
							</tbody>
							<tfoot>
						<tr>
									
									<td colspan = "4" style = "text-align : right; font-size : 20px; "><br><br> Tổng cộng : </td><td style = "text-align : center; font-size : 20px;"><br><br> <font color = "red"><?php echo $i -1 ;?> </font></td>
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

</body>
</html>
<?php }
else
header("location:login.php");

?>


