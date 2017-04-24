<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      var res = 
      <?php
        $uid = $_GET['uid'];
        $startdate = $_GET['startdate'];
        $enddate = $_GET['enddate'];
      
        $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
        $res = $pdo -> query("select * from diethistory where uid = '$uid' 
            and date >= '$startdate' and date <= '$enddate';") -> fetchAll();
          
        $arr = array();
        
        foreach($res as $col){
          array_push($arr,
            array(
              "dietid" => $col['dietid'],
              "date" => $col['date'],
              "type" => $col['type'],
              "name" => $col['name'],
              "quantity" => $col['quantity'],
              "unit" => $col['unit'],
              "calorie" => $col['calorie']
            )
          );
        }
          
        echo json_encode($arr);
      ?>;
      
      function drawChart() {
       
        var breakfast = <?php echo "3"; ?>;
        var launch = <?php echo "3"; ?>;
        var dinner = <?php echo "3"; ?>;
        var snack = <?php echo "3"; ?>;
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Breakfast', breakfast],
          ['Launch', breakfast],
          ['Dinner', dinner],
          ['Snack', snack]
        ]);

        var options = {'title':'Percentage of intake',
                       'width':400,
                       'height':300};
        
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
       
        document.getElementById('test').innerHTML = res[0].name;
      }
    </script>
  </head>

  <body>
    <div id="chart_div"></div>
    <div id="test" style="background-color:#787878; width:100%; height:50px;"></div>
  </body>
</html>
