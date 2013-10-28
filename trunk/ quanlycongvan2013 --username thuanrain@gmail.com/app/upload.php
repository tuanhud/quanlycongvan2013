<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <title>HTML5 Upload Demo</title>
    
    
    <link href='../CSS/html5_uploader.css' rel='stylesheet' type='text/css'>
    
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="../js/uploader.js"></script>
	<script type="text/javascript">
		$(document).ready( function() {
			$('#dropable').uploader({
				shorturl : {
					login : 'phamphu',
					apiKey : '123456'
				}
			});
		});
	</script>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo"><img src="../images/logo.png" alt="Logo" width="214" height="43" /></div>
				<ul id="buttons">
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Documentation</a></li>
				</ul>
			<div style="clear:both"></div>
		</div>
		<div id="content">
			<div id="dropable"></div>
		</div>
		<a href = "main.php"> Hoàn Tất </a>
		<div id="footer">
			
			
		</div>
	</div>
	<script type="text/javascript" src="../js/slDropFile.js"></script>
</body>
</html>
