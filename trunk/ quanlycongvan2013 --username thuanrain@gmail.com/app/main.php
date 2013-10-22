<?php
		session_start();
		
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		
 
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>UIT DMS</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="../css/style2.css">
	
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
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $_SESSION['myname'] ?></strong></a>
					<ul>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">User Settings</a></li>
						<li><a href="#">Change Password</a></li>
						<li><a href="#">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">3 new messages</a></li>
				<li><a href="#" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="main.php" class="active-tab dashboard-tab">Trang chủ</a></li>
				<li><a href="congvanden.php">Công văn đến</a></li>
				<li><a href="congvandi.php">Công văn đi</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="../images/company-logo.png" alt="UIT" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Thông tin </h3>
				<ul>
					<li><a href="#">??????</a></li>
					<li><a href="#">??????</a></li>
					<li><a href="#">??????</a></li>
					<li><a href="#">??????</a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Table design</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all"></th>
									<th> Mã Công Văn </th>
									<th> Tên/Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									<th> Số Trang </th>
									<th> Tác Giả </th>
									<th> File đính kèm </th>
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
									$congvan = mysql_query("select distinct congvan.madk,congvan.soKH, congvan.ngayVB,congvan.sotrang, congvan.trichyeu, congvan.tacgia from congvan,chitietnhan where chitietnhan.madk = congvan.madk and congvan.nguoigui = all(select manv from nhanvien where maPB = all (select nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = 'congtacsinhvien')) or chitietnhan.nguoinhan = all(select manv from nhanvien where maPB = all (select nhanvien.mapb from nhanvien,user where nhanvien.manv = user.manv and user.username = 'congtacsinhvien'))");
									while ($row = mysql_fetch_array($congvan))
									{
										echo '<tr>';
									echo'<td><input type="checkbox"></td>';
									echo'<td>'.$row[madk].'</td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td><a>'.$row[trichyeu].' ...</a></td>';
									echo'<td>'.$row[ngayVB].'</td>';
									echo'<td>'.$row[sotrang].'</td>';
									echo'<td>'.$row[tacgia].'</td>';
									//echo'<td> <a href= "../upload/'.$row[url].'"> download </a></td>';
									echo '<td> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
									echo '<br><div id="file'.$i.'"> </div></td>';
									echo '<td>';
									echo '	<a href="#" class="table-actions-button ic-table-edit"></a>';
									echo '	<a href="#" class="table-actions-button ic-table-delete"></a>';
									echo '</td>';
								echo '</tr>'	;
								$i++;
	
									}


								?>
								
							
							</tbody>
							
						</table>
					
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