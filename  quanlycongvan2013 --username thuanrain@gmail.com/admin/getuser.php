<?php
$q = $_GET['q'];

include ("dbcon.php"); 
$q1 = mysql_query("SELECT chitietphanquyen.maquyen FROM user,nhanvien,chitietphanquyen where user.manv = nhanvien.manv and nhanvien.manv = chitietphanquyen.manhanvien and user.username = '".$q."'");
while($row1 = mysql_fetch_array($q1))
{
$quyen[] = $row1['maquyen'];
}
$q2 = mysql_query("SELECT manv FROM user where username = '".$q."'");
while($row2 = mysql_fetch_array($q2))
{
$manv = $row2['manv'];
}
echo"<input type='hidden' id='manv' value='".$manv."'>";
$sql="SELECT maquyen,tenquyen FROM quyen order by maquyen asc";
$result = mysql_query($sql);

echo "</br></br></br>";
echo '<center>';
echo "<table border='1'>
<tr>
<th>Mã quyền</th>
<th>Tên quyền</th>
<th>Active</th>
</tr>";

$i=0;
while($row = mysql_fetch_array($result))
  {
echo "<tr>";  echo "<td>" . $row['maquyen'] . "</td>";  echo "<td>" . $row['tenquyen'] . "</td><td><input type='checkbox' name='cbox[$i]'"; 
  if(@in_array($row['maquyen'],$quyen)) echo"checked='checked'"; 
  else echo""; 
  echo "value=" . $row['maquyen'] . " id='pq" .$i. "' ></input> </td>";
  echo "</tr>";
  $i++;
  }
echo "</table></br></br><a id='capnhat' class='round button blue' ";
echo 'href="javascript:capnhatquyen();" >Cập nhật</a>

</center>';
echo "<input type='hidden' id='tongquyen' value='".$i."'>";
echo "<div id='kqpq'></div></br>";
?>