<?php
@session_start();
ob_start();
$_SESSION['phongban']= $mapb_i;
header("location:../app/main.php");
ob_clean();
exit();
?> 
