<?php
$q = $_GET['q'];
if(isset($_POST['lol'])){
  if (is_array($_POST['lol'])) {
    foreach($_POST['lol'] as $value){
      query here
    }
  } else {
      echo "nothing checked";
  }
}
?>
