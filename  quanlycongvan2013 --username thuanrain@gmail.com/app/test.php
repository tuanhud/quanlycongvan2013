

<html>
<head>
<title>Demo: checkbox</title>
</head>
<body>
<form method="POST" action ="test.php">
    <p><input type="checkbox" name="myCheckbox[]" value = "TrangTron">B�nh tr�ng tr?n</input></p>
    <p><input type="checkbox" name="myCheckbox[]" value = "BapXao"> B?p x�o </input></p>
    <p><input type="checkbox" name="myCheckbox[]" value = "TrangNuong">B�nh tr�ng nu?ng </input></p>
    <input type="submit" name="sbMyForm" value="Ho�n th�nh"></input>
</form>

<?php

include("../module/dbcon.php");
$congvan = mysql_query("select ngayVB, ngayHH from congvan where madk = 8");
$date ="";
$date1 = "";
			while ($row = mysql_fetch_array($congvan))
			{
					$date = $row[ngayVB];
					$date1 = $row[ngayHH];
			}
			echo "<br>Ngay van ban :".$date;
			echo "<br>Ngay het han :".$date1;
			$date2 = new DateTime($date);
		$date3 = new DateTime($date1);
		if($date2 < $date3)
		{
			echo "<br> Ng�y van ban nho hon ngay hh";
		}
		else
			echo "<br> ngay van ban lon hon ngay hh";
?>
<?php
$arr = array('Hello','World!','Beautiful','Day!');
echo implode(" ",$arr);	
// For processing
if (isset($_POST[sbMyForm]))
{
    //echo "<pre>";
    $h = $_POST[myCheckbox];
	foreach($h as $key=>$value)
{
		echo $h[$key].'<br>';
		
	}
	echo implode(",",$h);	
  

}
?>
</body>
</html>