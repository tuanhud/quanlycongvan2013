<?php
$q = $_GET['q'];

include ("dbcon.php"); 
$q1 = mysql_query("SELECT chitietphanquyen.maquyen FROM user,nhanvien,chitietphanquyen where user.manv = nhanvien.manv and nhanvien.manv = chitietphanquyen.manhanvien and user.username = '".$q."'");
while($row1 = mysql_fetch_array($q1))
{
$quyen[] = $row1['maquyen'];
}
$sql="SELECT maquyen,tenquyen FROM quyen order by maquyen asc";
$result = mysql_query($sql);


echo "</br></br></br>";
echo "<table border='1'>
<tr>
<th>Mã quyền</th>
<th>Tên quyền</th>
<th>Active</th>
</tr>";


while($row = mysql_fetch_array($result))
  {
  echo "<tr>";  echo "<td>" . $row['maquyen'] . "</td>";  echo "<td>" . $row['tenquyen'] . "</td><td><input type='checkbox' name='cbox[]'"; if(in_array($row['maquyen'],$quyen)) echo"checked=checked"; else echo""; echo "value=" . $row['maquyen'] . "></input> </td>";
  echo "</tr>";
  }
echo "</table>";
?>