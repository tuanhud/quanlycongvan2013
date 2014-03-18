<?php
$con = mysql_connect("localhost","root","",false,65536);

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("demo", $con);

$result = mysql_query("SELECT name, val FROM web_marketing");

$rows = array();
while($r = mysql_fetch_array($result)) {
	$row[0] = (int)$r[0];
	$row[1] = (int)$r[1];
	array_push($rows,$row);
}

print json_encode($rows);

mysql_close($con);
?> 
