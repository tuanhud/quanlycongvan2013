<?php
$q = intval($_GET['q']);

include ("dbcon.php"); 
$q1 = mysql_query("SELECT manhanvien FROM user where username = '".$q."'");
$sql="SELECT maquyen,tenquyen FROM quyen order by maquyen asc";
$sql2="SELECT maquyen FROM chitietphanquyen where manhanvien = '".$q1."'";
$result = mysql_query($sql);
$result1 = mysql_query($sql2);
$new = array();
while($row1 = mysql_fetch_array($result1))
  {
  $new[] = $row1['maquyen'];
  }
  echo "<span>";
echo $q1;
echo "</span></br></br></br>";
echo "<table border='1'>
<tr>
<th>Mã quyền</th>
<th>Tên quyền</th>
<th>Active</th>
</tr>";


while($row = mysql_fetch_array($result))
  {
  if($new_array[ $row1[$row['maquyen']]] == $row['maquyen']) $ab = "checked";
  else $ab = "";
  echo "<tr>";
  echo "<td>" . $row['maquyen'] . "</td>";
  echo "<td>" . $row['tenquyen'] . "</td>";
  echo "<td><label class='checkbox'> <input type='checkbox' class='uniform' value=" . $row['maquyen'] . ""; echo  $ab; echo"> </label> </td>";
  echo "</tr>";
  }
echo "</table>";
?>