<?php include('controller/ck_dataController.php'); ?>

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
                    "type": "XYChart",
                    "data": [<?php echo $newData2; ?>],
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
                        "renderer": {
                            "maxLabelPosition": 0.98
                        }
                    }],
                    "series": [{
                        "type": "ColumnSeries",
                        "name": "Series 1",
                        "columns": {
                            "template": {
                                "type": "Column",
                                "strokeOpacity": 0,
                                "tooltipText": "{categoryX}\n{valueY}"
                            }
                        },
                        "dataFields": {
                            "valueY": "male",
                            "categoryX": "male"
                        },
                        "sequencedInterpolation": true,
                        "sequencedInterpolationDelay": 100
                    }, {
                        "type": "ColumnSeries",
                        "name": "Series 2",
                        "columns": {
                            "template": {
                                "type": "Column",
                                "strokeOpacity": 0,
                                "tooltipText": "{categoryX}\n{valueY}"
                            }
                        },
                        "dataFields": {
                            "valueY": "female",
                            "categoryX": "month"
                        },
                        "sequencedInterpolation": true,
                        "sequencedInterpolationDelay": 100
                    }]
                },
                document.getElementById('chartdiv')
            );
        });
    </script>
</head>

<body>

    <div id="chartdiv" style="width:100%; height:500px;"></div>

</body>

</html>