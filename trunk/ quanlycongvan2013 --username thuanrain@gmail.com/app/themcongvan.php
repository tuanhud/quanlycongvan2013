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
                }
             if(frm.R[1].checked == true)
				{
                    frm.NguoiGui.value = frm.R[1].value;
					frm.NguoiXuLy.hidden = true;
					frm.NguoiXuLy1.hidden = false;
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
					<li><a href="congvanden.php"> Danh sách </a></li>
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
					
					
					<div class="content-module-main">
					<form action="../module/themcongvan.php" method = "post" name = "aa">
						<table width = "250px">
						
							
	
							
							
							<tbody>
								<?php 
								if($a == 0)
								{
								?>
								<tr>
								<td>  Phân Cấp : </td>
								<td> 
								<input type ="radio" id = "R" name ="R" value = "<?php echo $manv; ?>" size ="10" checked = "true" onclick = "val_gui(aa,0);"> Phòng Ban
								     
								<input type ="radio" id = "R" name ="R" size ="10" value = "0" onclick = "val_gui(aa,1);"> Trường
                				</td>
								</tr>
								<?php
								}
								else
								{
								?>
									<tr>
									<td>  Phân Cấp : </td>
									<td>	<input type ="radio" id = "R" name ="R" size ="10" value = "0" checked = "true" > Trường
                				
									</td>
									</tr>
									<?php
								}
								?>
								
								<tr>
								<td> Số kí hiệu : </td>
								<td> <input type = "text" name ="SOKH" id = "SOKH"/> <br></td>
								</tr>
								
								<tr>
								<td align="left"> Ngày Ban Hành : </td>
								<td align="left"> <p><input type="text" name="tbxNgay" id ="tbxNgay" size="10" class="calendarFocus"/></p> </td><br>
								</tr>
								<tr>
								
								<tr>
								<td align="left"> Ngày Hết Hạn : </td>
								<td align="left"> <p><input type="text" name="tbxNgayhh" id ="tbxNgayhh" size="10" class="calendarFocus"/></p> </td><br>
									</tr>
								
								<?php 
								if($a == 0)
								{
								?>
									<input type ="hidden" name = "NguoiGui" id = "NguoiGui" value = "<?php echo $manv; ?>"/>
								<?php
								}
								else
								{
								?>
								<tr>
								<td> Người Gửi : </td>
								<td> <input type = "text" name = "NguoiGui" id = "NguoiGui" />
								</td>
								</tr>
								<?php
								}
								?>
 								<tr>
								<td> Người Xử Lý : </td>
								<td align="left">
								<select name = "NguoiXuLy" id = "NguoiXuLy" >
								<option value = "0"> Chọn Người Xử Lý </option>
								<?php
								$sql1 = mysql_query("select MaNV,HoTen from NhanVien where manv not in (select manv from nhanvien where mapb = '$mapb')");
								while ($rows1 = mysql_fetch_array($sql1))
								{
									echo "<option value='$rows1[0]'> $rows1[1] </option>";	
								}		
								?>
								</select>
								
								<input type ="text" name = "NguoiXuLy1" id = "NguoiXuLy1" hidden = "true" />
								<br><br>
								
								</td>
								</tr>
								<tr>
								<td> Số trang : </td>
								<td> <input type = "text" name ="SoTrang" id = "SoTrang"/> </td>
								</tr>
								<tr>
								<td> Trích Yếu : </td>
								<td> <input type = "text" name ="TrichYeu" id = "TrichYeu"/> </td>
								</tr>
								<tr>
								<td> Mức độ khẩn : </td>
								<td> 
								<select name = "MucDo" id = "MucDo" >
								<option value = "1"> Bình thường </option>
								<option value = "2"> Khẩn </option>
								<option value = "3"> Hỏa Tốc </option>
								</select>
								</td>
								</tr>
								<tr>
								<td> Mức độ mật : </td>
								<td> 
								<select name = "DoMat" id = "DoMat" >
								<option value = "1"> Thông thường </option>
								<option value = "2"> Mật </option>
								<option value = "3"> Tối mật </option>
								</select>
								</td>
								</tr>
								<tr>
								<td> Tác Giả : </td>
								<td> <input type = "text" name ="TacGia" id = "TacGia"/> 
								<input type = "hidden" name ="PhanLoai" id = "PhanLoai" value = "<?php echo $a; ?>"/></td>
								</tr>
								<tr>
								
									<td colspan="2" class="table-footer">
									
										<input type = "submit" class="round button blue text-upper small-button" value = "Thêm"/>	
										
									</td>
									
								</tr>
							
							
							</tbody>
							
						</table>
					</form>
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