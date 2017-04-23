<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
      data.addRows([
          ['breakfast', 0.78],
          ['launch', 0.21],
          ['dinner', 0.01],
          ['snack', 0.00]
        ?>
      ]);
      var chart = new google.visualization.PieChart(document.getElementById('dietPieChart'));
      chart.draw(data, null);
    }
  </script>
</head>
<body>
  assadasd
  <div id="dietPieChart"/>
  <?php 
  $token = $_GET['token'];
  $uid = $pdo -> query("select uid from user where token = '$token';") -> fetch(); 
  echo $uid;
  ?>
</body>
</html>
