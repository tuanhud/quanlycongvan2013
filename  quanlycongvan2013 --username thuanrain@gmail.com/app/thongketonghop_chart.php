<?php
		
		@session_start();
		$loaicv = $_GET["q"];
		$quyen = $_SESSION['cacquyen'];
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Bar chart with data from MySQL using Highcharts</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container',
                    type: 'bar'
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
                    min: 0,
                    title: {
                        text: 'UIT - DMS'
                    },
                    labels: {
                        overflow: 'justify'
                    }
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
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: []
            }
            
            $.getJSON("../module/data.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                      chart = new Highcharts.Chart(options);
            });
        });
        </script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
    </head>
    <body>
	<?php
		if(in_array(37, $quyen) and $loaicv != 0)
		{
			echo'<div id="container" style="min-width: 400px; height: 2000px; margin: 0 auto"></div>';
    	}
		else
			echo'<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>';
		?>
        </body>
</html>