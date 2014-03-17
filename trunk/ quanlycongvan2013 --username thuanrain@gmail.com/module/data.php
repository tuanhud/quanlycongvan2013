
<?php
@session_start();
$json = array();
   $jsons = $_SESSION['thongke'];
   
  print json_encode($jsons);
   
 ?>  