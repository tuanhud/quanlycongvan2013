
<?php

   $q=$_GET["q"];
   include ('dbcon.php');
   $sql1 = "select url from file where madk = $q ";
   $file = mysql_query($sql1);
   
   while ($down = mysql_fetch_array($file))
	{
		echo '<a href = "../uploads/'.$down[url].'">'.$down[url].'</a><br>';
    }
   
 ?>  