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

echo "</br></br>";
echo '<center>';
echo"<a id='capnhat' class='round button blue' ";
echo 'href="javascript:quyenthuky();" >Quyền thư ký</a>';
echo"&nbsp&nbsp&nbsp<a id='capnhat' class='round button blue' ";
echo 'href="javascript:quyentruongphong();" >Quyền trưởng phòng</a>';
echo"&nbsp&nbsp&nbsp<a id='capnhat' class='round button blue' ";
echo 'href="javascript:toanquyen();" >Chọn tất cả</a>';
echo"&nbsp&nbsp&nbsp<a id='capnhat' class='round button blue' ";
echo 'href="javascript:bochon();" >Bỏ chọn tất cả</a>';
echo "<table class='phanquyen' border='1'><thead>
<tr>
<th>Mã quyền</th>
<th>Tên quyền</th>
<th>Active</th>
</tr><thead>";

$i=0;
while($row = mysql_fetch_array($result))
  {
echo "<tbody><tr>";  echo "<td>" . $row['maquyen'] . "</td>";  echo "<td>" . $row['tenquyen'] . "</td><td>";
echo '<div class="onoffswitch">';
echo"<input type='checkbox' class='onoffswitch-checkbox' name='cbox[$i]'"; 
  if(@in_array($row['maquyen'],$quyen)) echo"checked='checked'"; 
  else echo""; 
  echo "value=" . $row['maquyen'] . " id='pq" .$i. "' >";
  echo '<label class="onoffswitch-label" for="pq' .$i. '">
        <div class="onoffswitch-inner"></div>
        <div class="onoffswitch-switch"></div>
		</label></div> </td>';
  echo "</tr>";
  $i++;
  }
echo "</tbody></table></br></br>";

echo"<a id='capnhat' class='round button blue' ";
echo 'href="javascript:capnhatquyen();" >Cập nhật</a>

</center>';

echo "<input type='hidden' id='tongquyen' value='".$i."'>";
echo "</br></br><div id='kqpq'></div></br>";
?>