<?php
	@session_start();
	
	if(isset($_SESSION['myname']) and $_SESSION['priv'] == 2)
	{
		include("dbcon.php");
		$user = $_SESSION['myname'];
		$id = $_GET['id'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
 include("dbcon.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<?php
include("head3.php");
?>

<body>
<div class="clear">
	
<?php
include("sidebar.php");
?>	
	
	
	<div class="main"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<?php
			include("topheader.php");
		?>	
		
		<div class="page clear">
			<?php
			include("lienketnhanh.php");
			?>	
			
			
			
			<div class="content-box">
				<div class="box-header clear">
									
					<h2>Thống kê</h2>
				</div><!-- box-body -->
				
				<div class="box-body clear">
						<div id="container" style="width: 1000px; height: 700px; margin: 0 auto"></div>
				</div><!-- /.box-body -->
			</div><!-- /.content-box -->

			
		</div><!-- end of page -->
		
		<?php
			include("footer.php");
		?>	
	</div>
	</div>
</div>

</body>

<!-- Mirrored from www.ait.sk/uniadmin/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 20 Jul 2010 00:38:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
<?php
}
else
header("location:../app/login.php");
?>