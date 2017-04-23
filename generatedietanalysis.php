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
        <?php
          echo "['breakfast', 0.78],";
          echo "['launch', 0.21],";
          echo "['dinner', 0.01],";
          echo "['snack', 0.00]";
        ?>
      ]);
      var chart = new google.visualization.PieChart(document.getElementById('dietPieChart'));
      chart.draw(data, null);
    }
  </script>
</head>
<body>
  <?php 
  $token = $_GET['token'];
  $uid = $pdo -> query("select uid from user where token = '$token';") -> fetch(); 
  echo $uid;
  ?>
  assadasd
  <div id="dietPieChart"/>
</body>
</html>
