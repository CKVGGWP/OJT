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
                    "data": [<?php echo $newData3; ?>],
                    "xAxes": [{
                        "type": "CategoryAxis",
                        "dataFields": {
                            "category": "age_group"
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
                                "tooltipPosition": "pointer",
                                "url": "ck_index.php?ageGroup={categoryX}",
                                "urlTarget": "_blank"
                            }
                        },
                        "dataFields": {
                            "valueY": "age_count",
                            "categoryX": "age_group"
                        },
                        "sequencedInterpolation": true,
                        "sequencedInterpolationDelay": 100,
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