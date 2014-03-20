<?php
$con = mysql_connect("localhost","root","",false,65536);
mysql_query("set names 'utf8'"); 

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("dms", $con);

$query = mysql_query("Select madk,mapb from thongso ");

$category = array();
$category['name'] = 'nam';

$series1 = array();
$series1['name'] = 'Công văn đi cấp trường';

$count = 0;
while($rowx = mysql_fetch_array($query))
{
	$s = mysql_query("select tenpb from phongban where mapb = '".$rowx[mapb]."'");
	while($rowxx = mysql_fetch_array($s))
	{
		$count++;
			$category['data'][] = $rowxx['tenpb'];

	}
	$series1['data'][] = (int)$count;
		$count = 0;
}

/*//$query = mysql_query("SELECT tenpb FROM phongban where mapb in (17,12,3)");
$category = array();
$category['name'] = 'hoten';

$series1 = array();
$series1['name'] = 'Chưa xử lý';

$series2 = array();
$series2['name'] = 'Xử lý trễ hạn';

$series3 = array();
$series3['name'] = 'Xử lý đúng hạn';


while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['hoten'];
 
}
 	
	$series1['data'][] = 5;
    $series2['data'][] = 10;
    $series3['data'][] = 3;  
   $series1['data'][] = 5;
    $series2['data'][] = 10;
    $series3['data'][] = 3;  
   $series1['data'][] = 5;
    $series2['data'][] = 10;
    $series3['data'][] = 3;  
   
	*/
$result = array();
array_push($result,$category);
array_push($result,$series1);



print json_encode($result);

mysql_close($con);
?> 
