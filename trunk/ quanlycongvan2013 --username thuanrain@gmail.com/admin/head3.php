<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title>UIT DMS ADMIN</title>

<link rel="stylesheet" href="css/screen.css" type="text/css"/>
<link rel="stylesheet" href="css/select2.css" type="text/css" />
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->	
<script type='text/javascript' src="js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type='text/javascript' src='js/menu_jquery.js'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'line',
	                marginLeft: 130,
	                marginBottom: 100
	            },
	            title: {
	                text: 'Thống kê công văn năm 2013',
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
	                    text: 'UIT-DMS'
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
	                line: {
	                    //stacking: 'normal',
	                    dataLabels: {
	                        enabled: true,
	                    //    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
	                    }
	                }
	            },
	            series: []
	        }
	        
	        $.getJSON("module/data_thang.php", function(json) {
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
    
<script type='text/javascript' src="js/quantri.js"></script>	
</head>
