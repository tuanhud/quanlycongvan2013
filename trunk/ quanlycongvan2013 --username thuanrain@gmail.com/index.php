<?php ob_start(); session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>

<title>Document management system</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link type="text/css" href="css/style.css" rel="stylesheet">

</head>
<body>

<?php
$URL="app/login.php";
header ("Location: $URL");
?>
</body>
</html>

<?php ob_end_flush(); ?>