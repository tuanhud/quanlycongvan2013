<?php
	@session_start();
	
	if(isset($_SESSION['myname']))
	{
		include("dbcon.php");
		$user = $_SESSION['myname'];
		$id = $_GET['id'];
	}
 include("dbcon.php");
?>
<?php include("module/qlchucvu.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<?php
include("head2.php");
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
					<h2>Thông tin chức vụ</h2>
				</div><!-- box-body -->
				
				<div class="box-body clear">
				  
				     <?php echo $out?>
				
				</div><!-- /.box-body -->
			</div><!-- /.content-box -->

		</div><!-- end of page -->
		
		<?php
			include("footer.php");
		?>	
	</div>
	</div>
</div>
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>	
</body>

<!-- Mirrored from www.ait.sk/uniadmin/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 20 Jul 2010 00:38:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
