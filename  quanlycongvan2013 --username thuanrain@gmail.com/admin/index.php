<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<?php
include("head.php");
?>

<body>
<div class="clear">
	
<?php
include("sidebar.php");
?>	
	
	
	<div class="main"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<?php
			include("topheader.php");
		?>	
		
		<div class="page clear">
			<?php
			include("lienketnhanh.php");
			?>	
			
			
			
			<div class="content-box">
				<div class="box-header clear">
					<ul class="tabs clear">
						<li><a href="#chart-bar">Pie</a></li>
						<li><a href="#chart-pie">Bar</a></li>
						<li><a href="#chart-line">Line</a></li>
						<li><a href="#chart-area">Area</a></li>
					</ul>
					
					<h2>Charts</h2>
				</div><!-- box-body -->
				
				<div class="box-body clear">
					<div id="chart-bar" class="chart">
						<div class="chart-wrap">
								<table class="visualize1">
									<caption>Pie Chart Title</caption>
									<thead>
										<tr>
											<td></td>
											<th scope="col">food</th>
											<th scope="col">auto</th>
											<th scope="col">household</th>
											<th scope="col">furniture</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Mary</th>
											<td>120</td>
											<td>140</td>
											<td>40</td>
											<td>100</td>
										</tr>
										<tr>
											<th scope="row">Tom</th>
											<td>3</td>
											<td>40</td>
											<td>30</td>
											<td>45</td>
										</tr>
										<tr>
											<th scope="row">Laura</th>
											<td>80</td>
											<td>40</td>
											<td>80</td>
											<td>1</td>
										</tr>
									</tbody>
								</table>				
							</div><!-- /.chart-wrap -->
					</div>
					<div id="chart-pie">
						<div class="chart-wrap">
								<table class="visualize2">
									<caption>Bar Chart Title</caption>
									<thead>
										<tr>
											<td></td>
											<th scope="col">food</th>
											<th scope="col">auto</th>
											<th scope="col">household</th>
											<th scope="col">furniture</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Mary</th>
											<td>120</td>
											<td>140</td>
											<td>40</td>
											<td>100</td>
										</tr>
										<tr>
											<th scope="row">Tom</th>
											<td>3</td>
											<td>40</td>
											<td>30</td>
											<td>45</td>
										</tr>
										<tr>
											<th scope="row">Laura</th>
											<td>80</td>
											<td>40</td>
											<td>80</td>
											<td>1</td>
										</tr>
									</tbody>
								</table>				
							</div><!-- /.chart-wrap -->
						</div>
					<div id="chart-line">
						<div class="chart-wrap">
								<table class="visualize3">
									<caption>Line Chart Title</caption>
									<thead>
										<tr>
											<td></td>
											<th scope="col">food</th>
											<th scope="col">auto</th>
											<th scope="col">household</th>
											<th scope="col">furniture</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Mary</th>
											<td>120</td>
											<td>140</td>
											<td>40</td>
											<td>100</td>
										</tr>
										<tr>
											<th scope="row">Tom</th>
											<td>3</td>
											<td>40</td>
											<td>30</td>
											<td>45</td>
										</tr>
										<tr>
											<th scope="row">Laura</th>
											<td>80</td>
											<td>40</td>
											<td>80</td>
											<td>1</td>
										</tr>
									</tbody>
								</table>
							</div><!-- /.chart-wrap -->
						</div>
					<div id="chart-area">
						<div class="chart-wrap">
								<table class="visualize4">
									<caption>Area Chart Title</caption>
									<thead>
										<tr>
											<td></td>
											<th scope="col">food</th>
											<th scope="col">auto</th>
											<th scope="col">household</th>
											<th scope="col">furniture</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Mary</th>
											<td>120</td>
											<td>140</td>
											<td>40</td>
											<td>100</td>
										</tr>
										<tr>
											<th scope="row">Tom</th>
											<td>3</td>
											<td>40</td>
											<td>30</td>
											<td>45</td>
										</tr>
										<tr>
											<th scope="row">Laura</th>
											<td>80</td>
											<td>40</td>
											<td>80</td>
											<td>1</td>
										</tr>
									</tbody>
								</table>				
							</div><!-- /.chart-wrap -->
						</div>															
				</div><!-- /.box-body -->
			</div><!-- /.content-box -->

			
		</div><!-- end of page -->
		
		<?php
			include("footer.php");
		?>	
	</div>
	</div>
</div>

</body>

<!-- Mirrored from www.ait.sk/uniadmin/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 20 Jul 2010 00:38:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
