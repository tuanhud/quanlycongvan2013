<?php
@session_start();
	
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		
		$a = $_GET["q"];
		
?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php 
include("head.php");
?> 

  <link rel="stylesheet" type="text/css" href="../css/jquery.bsmselect.css" />
  <link rel="stylesheet" type="text/css" href="../css/example.css" />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="../CSS/jquery-calendar.css"/>

		</script>
		  <style type="text/css">
    form {
      width: 400px;
      position: relative;
    }

    #changes3 {
      position: absolute;
      width: 200px;
      left: 430px;
      background: #fff;
    }
  </style>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/jquery.bsmselect.js"></script>
  <script type="text/javascript" src="../js/jquery.bsmselect.sortable.js"></script>
  <script type="text/javascript" src="../js/jquery.bsmselect.compatibility.js"></script>

  <script type="text/javascript">//<![CDATA[

    jQuery(function($) {

      // Initialize options
      var cities = ['Atlanta'];

      $.each(cities, function(index, city)
      {
        $(".sminit").each(function() {
          $(this).append($("<option>").html(city));
        });
      });

      $("option:nth-child(7n)").attr('selected', 'selected');
	  $("#cities5").bsmSelect({
        showEffect: function($el){ $el.fadeIn(); },
        hideEffect: function($el){ $el.fadeOut(function(){ $(this).remove();}); },
        plugins: [$.bsmSelect.plugins.sortable()],
        title: 'Chọn người nhận',
        highlight: 'highlight',
        addItemTarget: 'original',
        removeLabel: '<strong>X</strong>',
        containerClass: 'bsmContainer',                // Class for container that wraps this widget
        listClass: 'bsmList-custom',                   // Class for the list ($ol)
        listItemClass: 'bsmListItem-custom',           // Class for the <li> list items
        listItemLabelClass: 'bsmListItemLabel-custom', // Class for the label text that appears in list items
        removeClass: 'bsmListItemRemove-custom',       // Class given to the "remove" link
        extractLabel: function($o) {return $o.parents('optgroup').attr('label') + "&nbsp;>&nbsp;" + $o.html();}
      });

    });

</script>
 
<script>
	function a()
	{
		alert(' Thao tác không thể thực hiện !!! ');
	}
</script>
<script>
function phanloai(str)
{

if (str=="")
  {
  document.getElementById("divphanloai").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("divphanloai").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../module/phanloai.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function phanloaileft(str)
{

if (str=="")
  {
  document.getElementById("pro5").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("pro5").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../module/phanloaileft.php?q="+str,true);
xmlhttp.send();
}
</script>	
</head>
<body>

	<?php
		include("divtopbar.php");
		include("divheader.php");
		
	?>
	
		</div> <!-- end full-width -->	

	</div> <!-- end header -->	

	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Danh mục </h3>
				<ul>
					<li><a href="congvanden.php"> Công văn đến </a></li>
					
					
					<li><a href="themcongvan.php?<?php echo 'q=1';?>"> Công văn đi  </a></li>
					
					<li><a href = "timkiemcongvan.php" onclick = "phanloaileft(1);"> Tìm kiếm  </a></li>
					
					
				</ul> 
				
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					<?php
						if($a == 0)
						{
					?>
						<h3 class="fl"> Thêm người nhận </h3>
						<?php 
						}
						if($a == 1)
						{
						
						echo '<h3 class="fl"> Thêm công văn đến </h3>';
						}
						?>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
					<form action="../module/themnguoinhan.php" method = "post" name = "aa" class = "form">
						
									 <label for="cities5"> Thêm người nhận </label>
    <select id="cities5" multiple="multiple" name="cities[]">
	<?php
		$max = mysql_query("select max(madk) from chitietnhan");
		$ngnhan = array();
		while($row0 = mysql_fetch_array($max))
		{
			$maxdk = $row0[0];
		}
		
		$nguoinhan = mysql_query("select manv from chitietnhan where madk = '".$maxdk."'");
		while($rowr = mysql_fetch_array($nguoinhan))
		{
			array_push($ngnhan,(STRING)$rowr[manv]);
		}
		$sql = "select mapb,tenpb from phongban";
		$pb = mysql_query($sql);
		while ($row1 = mysql_fetch_array($pb))
		{
			echo '<optgroup label="'.$row1[tenpb].'">';
			$pb2 = mysql_query("select hoten,manv from nhanvien where mapb ='".$row1['mapb']."'");
			while($row2 = mysql_fetch_array($pb2))
			{
				if(in_array($row2['manv'], $ngnhan))
				{
					echo "<option label='Elsewhere' disabled='disabled' value = '".$row2['manv']."'>".$row2['hoten']."</option>";
				}
				else
				{
					echo "<option value = '".$row2['manv']."'>".$row2['hoten']."</option>";
				}
			}
		}
	?>


    </select>
	<?php
	echo '<input type = "hidden" name = "maxdk" id = "maxdk" value = "'.$maxdk.'"/>';
    ?>
	<p style="clear:both;"><input type="submit" name="submit" value="Thêm" /></p>
  </form>
									
							
							</form>
							
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
	

		
		
		
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2013 <a href="#"></a>. All rights reserved.</p>
	
	</div> <!-- end footer -->
<script type="text/javascript" src="../js/slDropFile.js"></script>
</body>
</html>

