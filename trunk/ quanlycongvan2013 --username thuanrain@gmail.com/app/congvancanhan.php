<?php
	@session_start();
	
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$id = $_GET['id'];
		
 
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

<script type="text/javascript">
		$(document).ready(function(){
			$("#tutorial").validate({
				errorElement: "span",
				submitHandler: function(form) {
					var name        = $('#name').attr('value');
					var email       = $('#email').attr('value');
					$.ajax({
						type: "POST", 
						url: "xulydangnhap.php", 
						data: "name="+ name +"&email="+ email,
						success: function(answer){ 
							$('form#tutorial').hide();
							$('div.success').fadeIn(); 
							$('div.success').html(answer);
						}
					});
					return false;
				 }
			});
		});
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
					<li><a href="#">Công văn chờ xử lý</a></li>
					<li><a href="#">Công văn đã xử lý</a></li>
					<li><a href="#">Công văn quan trọng</a></li>
					<li><a href="#">Công văn tối mật</a></li>
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
						<form id="tutorial" action="xulydangnhap.php" method="post">
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all"></th>
									<th> Mã Công Văn </th>
									<th> Tên/Số/Ký Hiệu </th>
									<th> Về việc/Trích Yếu </th>
									<th> Ban Hành </th>
									<th> File </th>
									<th> Trạng Thái </th>
									<th> Xử Lý </th>
									
									
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
									$congvan = mysql_query("select distinct congvan.madk,congvan.soKH, congvan.ngayVB, congvan.trichyeu, trangthaixuly.trangthai from congvan,user,trangthaixuly where congvan.madk = trangthaixuly.madk and congvan.nguoixuly = user.manv and user.username = '$user' ");
									while ($row = mysql_fetch_array($congvan))
									{
								
									echo '<tr>';
									echo'<td><input type="checkbox"></td>';
									echo'<td>'.$row[madk].'</td>';
									echo'<td>'.$row[soKH].'</td>';
									echo'<td><a>'.$row[trichyeu].' ...</a></td>';
									echo'<td>'.$row[ngayVB].'</td>';
									echo '<td> <a onclick ="showfile('.$row[madk].','.$i.')"> Show File </a>';
									echo '<br><div id="file'.$i.'"> </div></td>';
									echo'<td>';
									if($row[trangthai] == 0)
									{	
										echo "<font color = 'red'> Chưa xử lý </font>";
										echo '</td>';
										echo '<td>';
										echo '<a href="javascript:tb_show(';
		echo "'Xử lý công văn','xulycongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Action' class='table-actions-button ic-table-edit'></a>  ";
		
									echo '</td>';
										
									}
										else 
										if($row[trangthai] == 1)
										{
											echo "<font color = 'blue'> Đang xử lý </font>";
											echo '</td>';
											echo '<td>';
											echo '<a href="javascript:tb_show(';
		echo "'Xử lý công văn','xulycongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Action' class='table-actions-button ic-table-edit'></a>  ";
											echo '</td>';
											
										}
										else 
											if($row[trangthai] == 2)
												{
													echo "<font color = 'green'> Đã xử lý </font>";
													echo '</td>';
													echo '<td>';
													echo '<a href="javascript:tb_show(';
		echo "'Xử lý công văn','xulycongvan.php?madk=$row[madk]&KeepThis=true&amp;TB_iframe=true&amp;width=450&amp;height=520&amp;scrollbar=0',false);";
		echo '" title=';
		echo "'Action' class='table-actions-button ic-table-edit'></a> ";
										
													echo '</td>';
												}
										
										
										
										
									
									
								//	echo'<td>'.$row[tacgia].'</td>';
								
								echo '</tr>'	;
								$i++;
	
									}


								?>
								
							
							</tbody>
							</form>
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


