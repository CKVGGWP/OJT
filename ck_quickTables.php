<?php

$sql = "SELECT * FROM ck_table";
$query = $connection->query($sql);
$totalRecords = ($query and $query->num_rows > 0) ? $query->num_rows : 0;
$sqlData = trim(preg_replace('/\s+/', ' ', $sql));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" type="text/css" href="../../Super Quick Table/datatables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../../Super Quick Table/datatables.min.js"></script>
    <style>
        div.dataTables_paginate {
            display: none;
        }
    </style>
</head>

<body>

    <main class="container d-flex justify-content-center align-items-center">
        <div class="col-md-1"></div>
        <div class="col-md-10 justify-content-center align-items-center">
            <div class="card">
                <div class="card-header text-center">
                    <strong>
                        <span class="float-start">Records: <?php echo $totalRecords; ?></span>
                    </strong>
                    <strong>
                        <span class="justify-content-center align-items-center d-flex">Exercise 3</span>
                    </strong>

                    <a href="ck_add.php" class="btn btn-primary float-end mx-3">Add Data</a>
                    <a href="ck_graph.php" class="btn btn-secondary float-end mx-3">View Graph</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="d-flex justify-content-center align-items-center border-secondary border-bottom">
                            <div class="input-group mb-3">
                                <input type="search" class="form-control" name="firstName" placeholder="First Name">
                            </div>
                            <div class="input-group mb-3">
                                <input type="search" class="form-control mx-3" name="lastName" placeholder="Last Name">
                            </div>
                            <div class="input-group mb-3">
                                <input type="submit" name="search" class="btn btn-primary" value="Search">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <form action="./controller/ck_printController.php" method="POST">
                            <button type="submit" class="btn btn-primary w-100 mb-3" name="print">Print</button>
                            <button type="submit" class="btn btn-secondary w-100 mb-3" name="export">Export to CSV</button>

                            <table class="table table-condensed table-bordered" id="mainTableId">

                                <thead class="text-center">

                                    <tr>
                                        <td class="text-center">ID</td>
                                        <td class="text-center">First Name</td>
                                        <td class="text-center">Last Name</td>
                                        <td class="text-center">Birthdate</td>
                                        <td class="text-center">Gender</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/scripts.js"></script>
<script>
    $(document).ready(function() {

        let sqlData = "<?php echo $sqlData; ?>";
        let totalRecords = "<?php echo $totalRecords; ?>";
        let dataTable = $('#mainTableId').DataTable({
            "scrollY": "400px",
            "iDisplayLength": totalRecords,
            "searching": false,
            "processing": true,
            "ordering": false,
            "serverSide": true,
            "bInfo": false,
            "ajax": {
                url: "controller/ck_dataTableController.php", // json datasource
                type: "POST", // method  , by default get
                data: {
                    "sqlData": sqlData, // SQL Query POST
                    "totalRecords": totalRecords
                },
                error: function() { // error handling

                }
            },
            "createdRow": function(row, data, index) {

            },
            "columnDefs": [

            ],
            fixedColumns: true,
            deferRender: true,
            scrollY: 530,
            scrollX: false,
            scroller: {
                loadingIndicator: true,
                displayBuffer: 10,
                rowHeight: "auto",
                columnWidth: "auto",
            },
            stateSave: false
        });
    });
</script>

</html>