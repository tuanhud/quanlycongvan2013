<?php
		
		@session_start();
		$b[1]="active-tab dashboard-tab";
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		//$a = $_GET["q"];
		//$user = $_SESSION['myname'];
				$user = $_SESSION['myname'];
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
				success: function(result){$('#pro6').html(result);}
			});
		return false;
	});
	}); 
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
		
	</div> <!-- end full-width -->	

	</div> <!-- end header -->	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
			
				<h3>Danh mục </h3>
				<ul>
					<li><a href="congvanden.php"> Danh sách  </a></li>
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
					
						<h3 class="fl"> Thiết lập báo cáo </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					<form id = "form_TK" name = "form_TK">
					<fieldset>
					
					<p>
					<label for="dropdown-actions">
								Loại báo cáo :
							
							</label>
							
					
							<select name ="loaicv" id ="loaicv">
							<?php
							if(((in_array(32, $quyen) or in_array(34, $quyen) or in_array(36, $quyen)) and in_array(1, $quyen)) or in_array(37, $quyen))
							{	
								echo'<option value = "0"> Cấp Trường </option>';
							}
							?>
								<option value = "1"> 
								Cấp Phòng Ban
								</option>
							</select>
							</p></br>
							<p>
							<label for="simple-input">
					
							Từ ngày : 
							</label>
							
							<input type = "text" name = "BatDau" id="BatDau"  class="calendarFocus" />
							</p><br>
							<p>
							<label for="simple-input">
							Đến ngày : 
							</label>
							
							<input type = "text" name = "KetThuc" id="KetThuc"  class="calendarFocus" />
								</p><br>
								
								<center><input type = "submit" name = "submit" id = "submit" value= " Xác nhận "/></center>
								
								</fieldset>
					</form>
					
					<div id = "pro6">
							
					</div>	
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
		</div>

		
		
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