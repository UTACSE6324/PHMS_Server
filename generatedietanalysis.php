<?php
	echo "<html>";
	echo "<head>";
	echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
	echo "<script type='text/javascript'>";
	echo "google.charts.load('current', {packages: ['corechart']});";
	echo "google.charts.setOnLoadCallback(drawChart);"
	echo "function drawChart() {
			  var data = new google.visualization.DataTable();
			  data.addColumn('string', 'Element');
			  data.addColumn('number', 'Percentage');
			  data.addRows([
				['Nitrogen', 0.78],
				['Oxygen', 0.21],
				['Other', 0.01]
			  ]);
			  var chart = new google.visualization.PieChart(document.getElementById('dietPieChart'));
			  chart.draw(data, null);
		}";
	echo "</script>"
	echo "</head>";
	echo "<body>";
	echo "</body>";
	echo "</html>";
?>
