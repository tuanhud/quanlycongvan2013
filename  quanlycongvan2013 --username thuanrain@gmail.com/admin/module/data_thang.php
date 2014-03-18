<?php
$con = mysql_connect("localhost","root","",false,65536);
mysql_query("set names 'utf8'"); 

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("dms", $con);

$query = mysql_query("Select min(ngayVB), max(ngayVB) from congvan ");
while($r = mysql_fetch_array($query)) {
    $min = substr($r[0],0,4);
	$max = substr($r[1],0,4);
}


$query = mysql_query("SELECT madk FROM congvan");
$category = array();
$category['name'] = 'nam';

$series1 = array();
$series1['name'] = 'Công văn đến';

$series2 = array();
$series2['name'] = 'Công văn đi';

$series3 = array();
$series3['name'] = 'Công văn nội bộ';
$den = 0;
$di = 0;
$noibo = 0;
for($i = 1 ; $i <= 9 ; $i++)
{
	/*switch ($i)
{
case 1:
  $category['data'][] = 'Tháng 1';
  break;
case 2:
  $category['data'][] = 'Tháng 2';
  break;
case 3:
  $category['data'][] = 'Tháng 3';
  break;  
case 4:
  $category['data'][] = 'Tháng 4';
  break;
case 5:
  $category['data'][] = 'Tháng 5';
  break;
case 6:
  $category['data'][] = 'Tháng 6';
  break;
case 7:
  $category['data'][] = 'Tháng 7';
  break;
case 8:
  $category['data'][] = 'Tháng 8';
  break;
case 9:
  $category['data'][] = 'Tháng 9';
  break;
case 10:
  $category['data'][] = 'Tháng 10';
  break;
case 11:
  $category['data'][] = 'Tháng 11';
  break;
case 12:
  $category['data'][] = 'Tháng 12';
  break;
default:
  echo "sai cmnr";
}*/
	$category['data'][] = int($i);
	$query = mysql_query("SELECT madk,loaicv,nguoigui FROM congvan where ngayvb between '".(int)($max)."-".(int)($i)."-01' and '".(int)($max)."-".(int)($i)."-31'");
		while($rr = mysql_fetch_array($query)) {
			if($rr[loaicv] == 0 and $rr[nguoigui] == '0')
			{
				$di++;
			}
			if($rr[loaicv] == 0 and $rr[nguoigui] <> '0')
			{
				$den++;
			}
			if($rr[loaicv] == 1)
			{
				$noibo++;
			}
		}
	$series1['data'][] = (int)$den;
    $series2['data'][] = (int)$di;
	$series3['data'][] = (int)$noibo;  
	$den = 0;
	$di = 0;
	$noibo = 0;
}	

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);


print json_encode($result);

mysql_close($con);
?> 
