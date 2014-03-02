
<?php

   $q=$_GET["q"];
   include ('dbcon.php');
   $sql1 = "select url from file where madk = $q ";
   $file = mysql_query($sql1);
   $i = 1;
   while ($down = mysql_fetch_array($file))
	{
		
		echo '<a href = "../uploads/'.$down[url].'"> File '.$i.'</a><br>';
		$i++;
    }
   
 ?>  