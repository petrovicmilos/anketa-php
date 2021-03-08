<?php  
    include 'header.php';
    include 'db.php';

    if(isset($_SESSION['user_id']) || isset($_SESSION['user_admin'])){
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Grafikon</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
// Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart1);
        google.charts.setOnLoadCallback(drawChart2);
        google.charts.setOnLoadCallback(drawChart3);
        google.charts.setOnLoadCallback(drawChart4);
        google.charts.setOnLoadCallback(drawChart5);
        google.charts.setOnLoadCallback(drawChart6);
        google.charts.setOnLoadCallback(drawChart7);
        google.charts.setOnLoadCallback(drawChart8);
        google.charts.setOnLoadCallback(drawChart9);

        // Draw the chart and set the chart values

        /* PRVI GRAFIKON */

        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

                    $sql = "SELECT pitanje1, COUNT(*) FROM odgovori GROUP BY pitanje1";
                    $sql_run = $pdo->query($sql);
            
                        while($row=$sql_run->fetch()){
                            echo "['".$row['pitanje1']."',".$row['COUNT(*)']."],";

                        }   
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '1. Pol',
                            is3D: true,
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }

        /* DRUGI GRAFIKON */

        function drawChart1() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

                $sql = "SELECT pitanje2, COUNT(*) FROM odgovori GROUP BY pitanje2";
                
                $sql_run = $pdo->query($sql);

                    while($row=$sql_run->fetch()){
                        echo "['".$row['pitanje2']."',".$row['COUNT(*)']."],";

                    }   
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '2. Koliko imate godina?',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
        }

        /* TRECI GRAFIKON */

        function drawChart2() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

                $sql = "SELECT pitanje3, COUNT(*) FROM odgovori GROUP BY pitanje3";
                $sql_run = $pdo->query($sql);

                    while($row=$sql_run->fetch()){
                        echo "['".$row['pitanje3']."',".$row['COUNT(*)']."],";

                    }
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '3. Na kojoj platformi najvise igrate?',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
        }
         /* CETVRTI GRAFIKON */

         function drawChart3() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

            $sql = "SELECT pitanje4, COUNT(*) FROM odgovori GROUP BY pitanje4";
            $sql_run = $pdo->query($sql);

                while($row=$sql_run->fetch()){
                    echo "['".$row['pitanje4']."',".$row['COUNT(*)']."],";

                }          
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '4. Koliko sati nedeljno provodite igrajuci video igre?',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart.draw(data, options);
         }
        /* PETI GRAFIKON */

        function drawChart4() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

                $sql = "SELECT pitanje5, COUNT(*) FROM odgovori GROUP BY pitanje5";
                $sql_run = $pdo->query($sql);

                    while($row=$sql_run->fetch()){
                        echo "['".$row['pitanje5']."',".$row['COUNT(*)']."],";

                    } 
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '5. Da li mislite da igranje video igara negativno utice na ponasanje?',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart.draw(data, options);
        }
         /* SESTI GRAFIKON */

         function drawChart5() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

                $sql = "SELECT pitanje6, COUNT(*) FROM odgovori GROUP BY pitanje6";
                $sql_run = $pdo->query($sql);

                    while($row=$sql_run->fetch()){
                        echo "['".$row['pitanje6']."',".$row['COUNT(*)']."],";

                    }
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '6. Objasnite nam zasto mislite da utice ili ne utice na ponasanje..',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
        chart.draw(data, options);
         }
        /* SEDMI GRAFIKON */

        function drawChart6() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

                $sql = "SELECT pitanje7, COUNT(*) FROM odgovori GROUP BY pitanje7";
                $sql_run = $pdo->query($sql);

                    while($row=$sql_run->fetch()){
                        echo "['".$row['pitanje7']."',".$row['COUNT(*)']."],";

                    }
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '7. Da li je igranje video igara uticalo na vase performanse na fakultetu/poslu?',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
        chart.draw(data, options);
        }
        /* OSMI GRAFIKON */

        function drawChart7() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

            $sql = "SELECT pitanje8, COUNT(*) FROM odgovori GROUP BY pitanje8";
            $sql_run = $pdo->query($sql);

                while($row=$sql_run->fetch()){
                    echo "['".$row['pitanje8']."',".$row['COUNT(*)']."],";

                }  
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '8. Objasnite nam kako mislite da je to uticalo na Vas..',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart7'));
        chart.draw(data, options);
        }
          /* DEVETI GRAFIKON */

          function drawChart8() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

            $sql = "SELECT pitanje9, COUNT(*) FROM odgovori GROUP BY pitanje9";
            $sql_run = $pdo->query($sql);

                while($row=$sql_run->fetch()){
                    echo "['".$row['pitanje9']."',".$row['COUNT(*)']."],";

                }  
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '9. Da li je igranje video igara uticalo na Vase zdravlje?',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart8'));
        chart.draw(data, options);
          }
         /* DESETI GRAFIKON */

         function drawChart9() {
        var data = google.visualization.arrayToDataTable([
        ['Odgovori', 'Broj odgovora'],

        <?php

            $sql = "SELECT pitanje10, COUNT(*) FROM odgovori GROUP BY pitanje10";
            $sql_run = $pdo->query($sql);

                while($row=$sql_run->fetch()){
                    echo "['".$row['pitanje10']."',".$row['COUNT(*)']."],";

                }
                    
                    ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 
                            title: '10. Otkako igram video igre ja sam..',
                            is3D: true
                        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart9'));
        chart.draw(data, options);

         }


</script>
    

</head>
<body>

<h1>My Web Page</h1>
<div class="row">
    <div class="pc" id="piechart" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart1" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart2" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart3" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart4" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart5" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart6" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart7" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart8" style="width: 900px; height: 500px;"></div>
    <div class="pc" id="piechart9" style="width: 900px; height: 500px;"></div> 
</div>


   
    <?php include 'footer.php'; ?>

</body>
</html>

<?php } else {
    header("Location: index.php?error=notLoggedIn");
    exit();
}