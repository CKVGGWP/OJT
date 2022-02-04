<?php include('controller/ck_dataController.php'); ?>

<?php

$data = '';

$birthMonth = $users->displayBirthdateCount();

while ($row = $birthMonth->fetch_assoc()) {
    $data .= json_encode($row) . ',';
}

$var = $data;
$newData = rtrim($var, ',');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//www.amcharts.com/lib/4/core.js"></script>
    <script src="//www.amcharts.com/lib/4/charts.js"></script>
    <script src="//www.amcharts.com/lib/4/maps.js"></script>
    <script>
        am4core.ready(function() {
            let chart = am4core.createFromConfig({
                    "type": "PieChart",
                    "data": [<?php echo $newData; ?>],
                    "series": [{
                        "type": "PieSeries",
                        "dataFields": {
                            "value": "total",
                            "category": "month"
                        }
                    }],
                    "radius": "60%"
                },
                document.getElementById('chartdiv')
            );
        });

        am4core.ready(function() {
            let chart = am4core.createFromConfig({
                    "type": "XYChart",
                    "data": [<?php echo $newData; ?>],
                    "xAxes": [{
                        "type": "CategoryAxis",
                        "dataFields": {
                            "category": "month"
                        },
                        "renderer": {
                            "grid": {
                                "template": {
                                    "type": "Grid",
                                    "location": 0
                                }
                            },
                            "minGridDistance": 20
                        }
                    }],
                    "yAxes": [{
                        "type": "ValueAxis",
                        "min": 0,
                        "renderer": {
                            "maxLabelPosition": 0.98
                        }
                    }],
                    "series": [{
                        "type": "ColumnSeries",
                        "columns": {
                            "template": {
                                "type": "Column",
                                "strokeOpacity": 0,
                                "tooltipText": "{categoryX}\n{valueY}",
                                "tooltipPosition": "pointer"
                            }
                        },
                        "dataFields": {
                            "valueY": "total",
                            "categoryX": "month"
                        },
                        "sequencedInterpolation": true,
                        "sequencedInterpolationDelay": 100
                    }]
                },
                document.getElementById('chartdiv2')
            );
        });
    </script>
</head>

<body>

    <div id="chartdiv" style="width:100%; height:500px;"></div>
    <div id="chartdiv2" style="width:100%; height:500px;"></div>



</body>

</html>