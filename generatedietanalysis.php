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
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        chart.draw(data, options);
       
        
        var data1 = new google.visualization.DataTable();
        data1.addColumn('date', 'Date');
        data1.addColumn('number', 'Calories');
        
        var dataArray = new Array();
        var newArray,flag;
        for (var i=0; i < res.length; i++){
          var year = parseInt(res[i].date.substring(0,3));
          var month = parseInt(res[i].date.substring(5,6));
          var day = parseInt(res[i].date.substring(8,9));
          var calorie = parseInt(res[i].calorie);
          
          if(flag != null && flag==day){
            newArray.calorie += calorie;
          }else{
            if(flag!=null)
                dataArray.push(newArray);
            newArray = new Array();
            newArray.push(new Date(year, month, day));
            newArray.push(calorie);
            flag = day;
          }
        }
        dataArray.push(newArray);
        document.write(dataArray);
        data1.addRows(dataArray);
        
        var chart1 = new google.visualization.AnnotationChart(document.getElementById('linechart_div'));

        var options1 = {
          displayAnnotations: true
        };

        chart1.draw(data1, options1);
        
        
        var section = "";
        var total = 0;
        
        section += "<table rules='all' width= '90%' style='margin:20px; padding: 10px; border-color: #666;' cellpadding='10'>";
        
        section += "<tr style='background: #eee;'><td>Date</td><td>Type</td><td>Name</td><td>Quantity</td><td>Calorie</td></tr>";
        for (var i=0; i < res.length; i++){
          var type;
          switch(res[i].type){
              case '0':
                type = "breakfast";
                break;
              case '1':
                type = "launch";
                break;
              case '2':
                type = "dinner";
                break;
              case '3':
                type = "snack";
                break;
            }      
          total += parseInt(res[i].calorie);
          section += "<tr><td>"+res[i].date+"</td><td>"+type+"</td><td>"
                      +res[i].name+"</td><td>"+res[i].quantity+"</td><td>"+res[i].calorie+"</td></tr>";
        }
        average = total / 30;
        section += "<tr><td colspan='3'>Total : "+total+"</td><td colspan='2'>Average : "+average+"</td></tr>";
        section += "</table>";
        
        document.getElementById('diet_table').innerHTML = section;
      }
    </script>
  </head>

  <body>
    <div>
      <div id="piechart_div"></div>
      <div id="linechart_div"></div>
    </div>
    <div id="diet_table"></div>
  </body>
</html>
