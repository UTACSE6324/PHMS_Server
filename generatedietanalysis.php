<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    <?php echo ">>>>>>"; ?>
    function drawChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
      data.addRows([
        <?php
          $token = $_GET['token'];
          $startdate = $_GET['startdate'];
          $enddate = $_GET['enddate'];

          $uid = $pdo -> query("select uid from user where token = '$token';") -> fetch();
          $res = $pdo -> query("select * from diethistory 
                                where uid = '$uid' and date >= '$startdate' and date <= '$enddate';") -> fetchAll();

          $num = count($ins);

          $breakfast = 0;
          $lanuch = 0;
          $dinner = 0;
          $snack = 0;
          for ($i = 0; $i < $num; ++$i) {
              $col = $ins[$i];

              switch($col['type']){
                case 0:
                  $breakfast += $col['calorie'];
                  break;
                case 1:
                  $launch += $col['calorie'];
                  break;
                case 2:
                  $dinner += $col['calorie'];
                  break;
                case 3:
                  $snack += $col['calorie'];
                  break;
              }
          }
          $total = $breakfast + $launch + $dinner + $snack;

          echo "['breakfast', $breakfast],";
          echo "['launch', $launch],";
          echo "['dinner', $dinner],";
          echo "['snack', $snack]";
        ?>
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
