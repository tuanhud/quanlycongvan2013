<?php
@session_start();
	if(isset($_SESSION['myname']) and isset($_SESSION['cacquyen']) )
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		
		$a = $_GET["q"];
		
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
<script>
 function val_gui(frm,index)
{
            frm.R[index].checked = true;
             if(frm.R[0].checked == true)
                {
                    frm.NguoiGui.value = frm.R[0].value;
					frm.NguoiXuLy.hidden = false;
					frm.NguoiXuLy1.hidden = true;
					frm.CVDT.value = '0';
                }
             if(frm.R[1].checked == true)
				{
                    frm.NguoiGui.value = frm.R[1].value;
					frm.NguoiXuLy.hidden = true;
					frm.NguoiXuLy1.hidden = false;
					frm.CVDT.value = '0';
				}
			if(frm.R[2].checked == true)
            {
					frm.NguoiGui.value = frm.R[0].value;
					frm.NguoiXuLy.hidden = false;
					frm.NguoiXuLy1.hidden = true;
					frm.CVDT.value = '1';
			}
}
</script>	
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
</head>
<body>

	<?php
		include("divtopbar.php");
		include("divheader.php");
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
				<?php
					if($a == 1)
					{
				?>
				<h3>Danh mục </h3>
				<ul>
					<li><a href="congvanden.php"> Danh sách </a></li>
					<?php 
						if(in_array(2, $quyen) and in_array(37, $quyen) )
						{
					?>
					
					<li><a href="themcongvan.php?<?php echo 'q=1';?>"> Thêm công văn đến  </a></li>
					<?php 
						}
						else
						{
							?>
						<li><a href="#" onclick = "a();"> Thêm công văn đến  </a></li>
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
				<?php
				}
				else
				{
				?>
				<h3>Danh mục </h3>
				<ul>
					<li><a href="congvandi.php"> Danh sách </a></li>
					<?php 
						if(in_array(12, $quyen))
						{
					?>
					<li><a href="themcongvan.php?<?php echo 'q=0';?>"> Thêm công văn đi </a></li>
					<?php } 
						else
						echo '<li><a onclick ="a();"> Thêm công văn đi </a></li>';
					
					?>
					<?php 
						if(in_array(17, $quyen))
						{
					?>
					<li><a href="tracuucongvandi.php"> Tra cứu công văn đi </a></li>
					<?php } 
						else
						echo '<li><a onclick ="a();"> Tra cứu công văn đến </a></li>';
					
					?>
					<li><a href="baocaodi.php"> Thiết lập báo cáo </a></li>
				</ul>
				<?php
				}
				?>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
					<div id = "pro5">
					<div class="content-module-heading cf">
					
					<?php
						if($a == 0)
						{
					?>
						<h3 class="fl"> Thêm công văn đi </h3>
						<?php 
						}
						if($a == 1)
						{
						
						echo '<h3 class="fl"> Thêm công văn đến </h3>';
						}
						?>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
					
						<form action="../module/themcongvan.php" method = "post" class="form" name = "aa">
							<div class="half-size-column fl">
								<fieldset>
								<?php 
								if($a == 0)
								{
								?>
									<p>
										<label class="label">Phân Cấp :</label>
										<label for="R"><input type ="radio" id = "R" name ="R" value = "<?php echo $manv; ?>"  checked = "true" onclick = "val_gui(aa,0);"> Phòng Ban</label>
										<label for="R"><input type ="radio" id = "R" name ="R" value = "0" onclick = "val_gui(aa,1);">Trường</label>
										<label for="R"><input type ="radio" id = "R" name ="R" value = "<?php echo $manv; ?>"  onclick = "val_gui(aa,2);"> Công văn điện tử </label>

									</p>
								<?php
								}
								else
								{
								?>
									<p>
										<label class="label">Phân Cấp :</label>
										<label for="R"><input type ="radio" id = "R" name ="R" size ="10" value = "0" checked = "true" >Trường</label>
									</p>
								<?php
								}
								?>
									<p>
										<br><label for="simple-input"  class="label">Số kí hiệu :</label>
										<input type="text" name ="SOKH" id="simple-input" class="round default-width-input"required=""/>								
									</p></br>
	
									<p>
										<label for="simple-input" class="label">Ngày Ban Hành :</label>
										<input type="text" name="tbxNgay" id="simple-input" class="calendarFocus"required=""/>							
									</p></br>
									<p>
										<label for="simple-input" class="label">Ngày Hết Hạn :</label>
										<input type="text" name="tbxNgayhh" id="simple-input" class="calendarFocus" required="" />							
									</p></br>
								<?php 
								if($a == 0) // cv đi
								{
								?>
								<input type ="hidden" name = "CVDT" id = "CVDT" value = "0"/>
								<input type ="hidden" name = "NguoiGui" id = "NguoiGui" value = "<?php echo $manv; ?>"/>
								<?php
								}
								else
								{
								?>
									<p>
										<label for="simple-input" class="label">Người Gửi :</label>
										<input type="text"  name = "NguoiGui" id="simple-input" class="round default-width-input" required="" />							
									</p></br>
								<?php
								}
								?>
									<p>
										<label for="dropdown-actions" class="label">Người Xử Lý :</label>
										
										
							<select name = "NguoiXuLy">
							<optgroup >
							</optgroup>
							<option value= "0"> Chọn người xử lý </option>
							<?php
							$ngnhan = array();
							if($a == 0)
							{
							$nguoinhan = mysql_query("select manv from nhanvien where mapb = (select mapb from nhanvien where nhanvien.manv = '".$manv."') ");
		while($rowr = mysql_fetch_array($nguoinhan))
		{
			array_push($ngnhan,(STRING)$rowr[manv]);
		}
							}
		$sql = "select mapb,tenpb from phongban";
		$pb = mysql_query($sql);
		while ($row1 = mysql_fetch_array($pb))
		{
			echo '<optgroup label="'.$row1[tenpb].'">';
			$pb2 = mysql_query("select hoten,manv from nhanvien where mapb ='".$row1['mapb']."'");
			while($row2 = mysql_fetch_array($pb2))
			{
				if(in_array($row2['manv'], $ngnhan))
				{
					echo "<option disabled='true' value = '".$row2['manv']."'>".$row2['hoten']."</option>";
				}
				else
				{
					echo "<option value = '".$row2['manv']."'>".$row2['hoten']."</option>";
				}
			}
		}
							?>

							</select>
								
								<input type ="text" name = "NguoiXuLy1" id = "NguoiXuLy1" hidden = "true" />								
									</p></br>
									<p>
										<label for="simple-input" class="label">Tác Giả : </label>
										<input type="text" name ="TacGia"  id="simple-input" class="round default-width-input" required=""/>								
									</p></br>
							</div>
							<div class="half-size-column fr">
									<p>
										<label for="simple-input" class="label">Số trang :</label>
										<input type="text"  name ="SoTrang" id="simple-input" class="round default-width-input" required="" />							
									</p></br>
									<p>
										<label for="simple-input" class="label">Trích Yếu : </label>
										<textarea name ="TrichYeu"  id="textarea" class="round full-width-textarea" required="" ></textarea>							
									</p></br>
									<p>
										<label for="simple-input" class="label">Mức độ khẩn :</label>
										<select name = "MucDo" id="dropdown-actions">
											<option value = "1"> Bình thường </option>
											<option value = "2"> Khẩn </option>
											<option value = "3"> Hỏa Tốc </option>
								</select>		
									</p></br>
									<p>
										<label for="simple-input" class="label">Mức độ mật :</label>
										<select name = "DoMat" id="dropdown-actions">
											<option value = "1"> Thông thường </option>
											<option value = "2"> Mật </option>
											<option value = "3"> Tối mật </option>
								</select>		
									</p></br>
									
									<input type = "hidden" name ="PhanLoai" id = "PhanLoai" value = "<?php echo $a; ?>"/></td>
								
									<center><input type = "submit" value="Thêm" class="round blue ic-right-arrow"/></center>	
									
								</fieldset>
							</div>
							</form>
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
