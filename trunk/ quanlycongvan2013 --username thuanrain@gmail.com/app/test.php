
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
	
   // echo "</pre>";

}
?>
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

</body>
</html>