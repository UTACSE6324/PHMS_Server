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
        var breakfast = 0;
        var launch = 0;
        var dinner = 0;
        var snack = 0;
        
        for (var i=0; i < res.length; i++) {
            switch(res[i].type){
              case '0':
                breakfast += parseInt(res[i].calorie);
                break;
              case '1':
                launch += parseInt(res[i].calorie);
                break;
              case '2':
                dinner += parseInt(res[i].calorie);
                break;
              case '3':
                snack += parseInt(res[i].calorie);
                break;
            }        
        }
        
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
       
        var section = "";
        section += "<table rules='all' width= '80%' style='margin:20px; padding: 10px; border-color: #666;' cellpadding='10'>";
        
        section += "<tr style='background: #eee;'><td>Date</td><td>Type</td><td>Name</td><td>Quantity</td><td>Calorie</td></tr>";
        for (var i=0; i < res.length; i++){
          section += "<tr><td>"+res[i].date+"</td><td>"+res[i].type+"</td>"
                      +res[i].name+"<td>"+res[i].quantity+"</td><td>"+res[i].calorie+"</td></tr>";
        }
        
        section += "</table>";
        
        document.getElementById('diet_table').innerHTML = section;
      }
    </script>
  </head>

  <body>
    <div id="chart_div"></div>
    <div id="diet_table"></div>
  </body>
</html>
