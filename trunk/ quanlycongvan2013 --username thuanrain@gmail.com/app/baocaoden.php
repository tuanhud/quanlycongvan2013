<?php
		
		@session_start();
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		//$a = $_GET["q"];
		//$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$tenpb = "";		
		$manv = $_SESSION['manv'];
		$a = 1;
		
		
?>	
<!DOCTYPE html>

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
<script type = "text/javascript">
$(document).ready(function(){
$("#form_TK").submit(function(){ // id form
		var loaicv = $("#loaicv").val();	// tên combobox
		var BatDau = $("#BatDau").val();
		var KetThuc = $("#KetThuc").val();
		$.ajax({
				type: "POST",
				url: "../module/baocaoden.php", // file xử lý
				data: "loaicv="+loaicv+"&BatDau="+BatDau+"&KetThuc="+KetThuc, 
				success: function(result){$('#pro5').html(result);}
			});
		return false;
	});
	}); 
</script>

</head>
<body>

	
	<?php
		include("divtopbar.php");
		include("divheader.php");
		$choxl = 0;
	$daxl = 0;
	$sqlleft = "select distinct congvan.madk,trangthaixuly.trangthai from congvan,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = '".$manv."'";
	$query = mysql_query($sqlleft);
	while ($rowx = mysql_fetch_array($query))
	{
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
					<li><a href="congvanden.php"> Danh sách <font color = "red" > (8) </font></a></li>
					<li><a href="themcongvan.php?<?php echo 'q='.$a;?>"> Soạn thảo công văn đến </a></li>
					<li><a href="choxuly.php">Công văn chờ xử lý <font color = "red" > <?php echo '('.$choxl.')'; ?> </font> </a></li>
					<li><a href="daxuly.php">Công văn đã xử lý <font color = "red" > <?php echo '('.$daxl.')'; ?> </font> </a></li>
					<li><a href="#">Công văn quan trọng <font color = "red" > (2) </font> </a></li>
					<?php 
						if(in_array(35, $quyen))
						{
					?>
							<li><a href="#"> Công văn tối mật <font color = "red" > (0) </font> </a></li>
					<?php
						} 
						else
						{
							echo '<li><a onclick ="a();"> Công văn tối mật <font color = "red" > (0) </font> </a></li>';
						}
						if(in_array(7, $quyen))
						{
					?>
					<li><a href="tracuucongvanden.php"> Tra cứu công văn đến </a></li>
						<?php 
						} 
						else
						{
							echo '<li><a onclick ="a();"> Tra cứu công văn đến </a></li>';
						}
					if(in_array(9, $quyen) or in_array(37, $quyen))
						{
					?>
					<li><a href="baocaoden.php"> Thiết lập báo cáo </a></li>
					<?php
					}
					else
					echo '<li><a href="#" onclick ="a();"> Thiết lập báo cáo </a></li>';
					?>
				</ul> 
				
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Thiết lập báo cáo </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					<form id = "form_TK" name = "form_TK">
					<table>
					<tr>
					<td>
							<h1>	Loại báo cáo :
							</h1>
							</td>
							<td align = "center">
								
							<select name = "loaicv" id = "loaicv" onclick ="checkbox();">
								<?php
								if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen))
								{
								?>
								<option value = "0"> 
								Cấp Trường
								</option>
								<?php
								}
								?>
								<option value = "1"> 
								Cấp Phòng Ban
								</option>
							</select>
							</td>
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
							
							<td>
							 <input type = "submit" name = "submit" id = "submit" value= " Xác nhận "/>
							</td>							
								</tr>
								
								
					</form>
					</table>	
					<div id = "pro5">
							
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