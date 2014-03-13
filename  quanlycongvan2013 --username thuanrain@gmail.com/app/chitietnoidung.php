<?php
	@session_start();
	
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$id = $_GET['id'];
		
 
?>
<!DOCTYPE HTML>
<?php 
	$madk = $_GET[madk];
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="../js/thickbox.js"></script>

<link href="../CSS/thickbox.css" rel="stylesheet" type="text/css">
</head>
<body>
	
							<?php
						$congvan = mysql_query("select noidung from noidung where madk = '".$madk."' ");
								while ($row = mysql_fetch_array($congvan))
								{
									echo $row[noidung];						
					
								} 
					?>
						
							
							
							
</body>
</html>
<?php 
}
?>