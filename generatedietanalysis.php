<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
	  alert(">>>>>");
	  alert(<?php
		$token = $token = $_GET['token'];
		$uid = $pdo -> query("select uid from user where token = '$token';") -> fetch();
		echo $uid;
	  ?>);
      data.addRows([
        ['Nitrogen', 0.78],
        ['Oxygen', 0.21],
        ['Other', 0.01]
      ]);
      var chart = new google.visualization.PieChart(document.getElementById('dietPieChart'));
      chart.draw(data, null);
    }
  </script>
</head>
<body>
  <div id="dietPieChart"/>
</body>
</html>
