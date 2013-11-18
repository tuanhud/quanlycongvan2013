
<?php

   $q=$_GET["q"];
   include ('dbcon.php');
   $sql1 = "select File from bieumau where mabm = $q ";
   $file = mysql_query($sql1);
   
   while ($down = mysql_fetch_array($file))
	{
		echo '<a href = "../template/'.$down[File].'">'.$down[File].'</a><br>';
    }
   
 ?>  