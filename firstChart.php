  <html>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['City', 'Population'],
          <?php
          include 'db.php';
          $sql = "SELECT * FROM `MOCK_DATA` ";
          $search = mysqli_query($conn, $sql);
          while ($data = mysqli_fetch_array($search)) {
            $city = $data['city'];
            $population = $data['population'];
          ?>

            ['<?php echo $city ?>', <?php echo $population ?>],


          <?php } ?>
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: {
            position: 'bottom'
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>

  </html>