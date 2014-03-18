<?php
		
		@session_start();
		if(isset($_POST[phongban1]))
	{
		$_SESSION['phongban'] = $_POST['phong'];
		@header("location:thongke.php");	
	}
		$a = 6;
		$b[4]="active-tab dashboard-tab";
	if(isset($_SESSION['myname']))
	{
		include("../module/dbcon.php");
		$user = $_SESSION['myname'];
		$quyen = array();
		$cacquyen = array();
		$quyen_qr = mysql_query("select maquyen from chitietphanquyen where manhanvien = (select manv from user where username = '".$user."')");
			while ($rr = mysql_fetch_array($quyen_qr))
			{
				array_push($cacquyen,(STRING)$rr[maquyen]);
			}
		//	$cacquyen = $cacquyen.'0';
			$_SESSION['cacquyen'] = $cacquyen; 
		$quyen = $_SESSION['cacquyen'];
		$mapb = $_SESSION['phongban'];
		$manv = $_SESSION['manv'];
		$nhanvien = mysql_query("select hoten FROM nhanvien where manv = '$manv'");
		$tennv = "";
		while ($rows = mysql_fetch_array($nhanvien))
		{
			$tennv = $rows[hoten];
		}
		$phongbann = mysql_query("select tenpb from phongban where mapb = '".$mapb."'");
				while($rrr1 = mysql_fetch_array($phongbann))
				{
					
					$tenpb = $rrr1[tenpb];
				}
?>	
<!DOCTYPE html>

<html lang="en">
<head>
<?php 
include("head.php");
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'column',
	                marginLeft: 130,
	                marginBottom: 100
	            },
	            title: {
	                text: 'Thống kê công văn',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'UIT - DMS'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },
	             plotOptions: {
	                bar: {
	                    //stacking: 'normal',
	                    dataLabels: {
	                        enabled: true,
	                    //    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
	                    }
	                }
	            },
	            series: []
	        }
	        
	        $.getJSON("../module/data_nam.php", function(json) {
				options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
	        	options.series[2] = json[3];
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
	    <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
	function a()
	{
		alert(' Thao tác không thể thực hiện !!! ');
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
				
				<h3> Danh Mục </h3>
				<ul>
				<li><a href="thongke.php"> Thống kê theo người dùng </a></li>
					<?php
					
					if(in_array(9, $quyen) and in_array(20, $quyen) and in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen) and in_array(32, $quyen)and in_array(34, $quyen) and in_array(36, $quyen)  )
					{
					?>
					<li><a href="thongketonghop.php"> Thống kê theo cấp </a></li>
					<?php
					}
					else
					echo '<li><a href="#" onclick = "a();"> Thống kê theo cấp </a></li>';
					if(in_array(9, $quyen) and in_array(20, $quyen) and in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen) and in_array(32, $quyen)and in_array(34, $quyen) and in_array(36, $quyen)  )
					{
					?>
					<li><a href="thongkephongban.php"> Thống kê theo phòng ban </a></li>
					<?php
					}
					else
					echo '<li><a href="#" onclick = "a();"> Thống kê theo phòng ban </a></li>';
					if(in_array(9, $quyen) and in_array(20, $quyen) and in_array(31, $quyen) and in_array(33, $quyen) and in_array(35, $quyen) and in_array(32, $quyen)and in_array(34, $quyen) and in_array(36, $quyen)  )
					{
					?>
					<li><a href="thongketheothoigian.php"> Thống kê theo thời gian </a></li>
					<?php
					}
					else
					echo '<li><a href="#" onclick = "a();"> Thống kê theo thời gian </a></li>';
					
					?>
					
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"> Thống kê theo thời gian </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					<div id = "pro5">
						<div id="container" style="width: 1000px; height: 700px; margin: 0 auto"></div>
						
					</div>	
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
	

		
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2013 <a href="#"></a>. All rights reserved.</p>
	
	</div> <!-- end footer -->

</body>
</html>
<?php }
else
header("location:login.php");
?>