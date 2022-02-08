<?php

$sql = "SELECT * FROM ck_table";
$query = $connection->query($sql);
$totalRecords = ($query and $query->num_rows > 0) ? $query->num_rows : 0;
$sqlData = trim(preg_replace('/\s+/', ' ', $sql));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('views/head/head.php'); ?>
</head>

<body>

    <header class="container-fluid">
        <?php include('views/header/header_link.php'); ?>
    </header>

    <main class="row">
        <?php include('views/body/section_link.php'); ?>
    </main>

</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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