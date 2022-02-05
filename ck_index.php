<?php include('controller/ck_dataController.php'); ?>

<?php

if (isset($_POST['search'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $filterUser = $users->filterData($firstName, $lastName);
}

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
</head>

<body>

    <main class="container d-flex justify-content-center align-items-center">
        <div class="col-md-1"></div>
        <div class="col-md-10 justify-content-center align-items-center">
            <div class="card">
                <div class="card-header text-center">
                    <strong>
                        <span class="float-start">Records: <?php echo $records; ?></span>
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
                                        <td class="text-center">Select/Select All <input type="checkbox" id="checkAll"></td>
                                        <td class="text-center">ID</td>
                                        <td class="text-center">First Name</td>
                                        <td class="text-center">Last Name</td>
                                        <td class="text-center">Birthdate</td>
                                        <td class="text-center">Gender</td>
                                        <td class="text-center">Actions</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!isset($_GET['ageGroup'])) : ?>

                                        <?php if (!empty($filterUser)) : ?>

                                            <?php foreach ($filterUser as $key => $list) : ?>
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" class="check" name="check[]" value="<?php echo $list['id']; ?>"></td>
                                                    <td class="text-center"><?php echo $list['id']; ?></td>
                                                    <td class="text-center"><?php echo $list['firstname']; ?></td>
                                                    <td class="text-center"><?php echo $list['lastname']; ?></td>
                                                    <td class="text-center"><?php echo $list['birthdate']; ?></td>
                                                    <td class="text-center"><?php echo $list['gender']; ?></td>
                                                    <td class="text-center">
                                                        <a href="ck_modal.php?id=<?php echo $list['id']; ?>" class="btn btn-warning">Edit</a>
                                                        <button type="button" class="btn btn-danger" onclick="deleteData(<?php echo $list['id']; ?>)">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

                                        <?php else : ?>

                                            <?php foreach ($selectUser as $key => $list) : ?>
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" class="check" name="check[]" value="<?php echo $list['id']; ?>"></td>
                                                    <td class="text-center"><?php echo $list['id']; ?></td>
                                                    <td class="text-center"><?php echo $list['firstname']; ?></td>
                                                    <td class="text-center"><?php echo $list['lastname']; ?></td>
                                                    <td class="text-center"><?php echo $list['birthdate']; ?></td>
                                                    <td class="text-center"><?php echo $list['gender']; ?></td>
                                                    <td class="text-center">
                                                        <a href="ck_modal.php?id=<?php echo $list['id']; ?>" class="btn btn-warning">Edit</a>
                                                        <button type="button" class="btn btn-danger" onclick="deleteData(<?php echo $list['id']; ?>)">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

                                        <?php endif ?>

                                    <?php else : ?>

                                        <?php foreach ($ageGroupByCategory as $key => $ageGroups) : ?>

                                            <tr>
                                                <td class="text-center"><input type="checkbox" class="check" name="check[]" value="<?php echo $ageGroups['id']; ?>"></td>
                                                <td class="text-center"><?php echo $ageGroups['id']; ?></td>
                                                <td class="text-center"><?php echo $ageGroups['firstname']; ?></td>
                                                <td class="text-center"><?php echo $ageGroups['lastname']; ?></td>
                                                <td class="text-center"><?php echo $ageGroups['birthdate']; ?></td>
                                                <td class="text-center"><?php echo $ageGroups['gender']; ?></td>
                                                <td class="text-center">
                                                    <a href="ck_modal.php?id=<?php echo $ageGroups['id']; ?>" class="btn btn-warning">Edit</a>
                                                    <button type="button" class="btn btn-danger" onclick="deleteData(<?php echo $ageGroups['id']; ?>)">Delete</button>
                                                </td>
                                            </tr>

                                        <?php endforeach ?>

                                    <?php endif ?>

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

        let sqlData = "<?php echo $trimmedSQL; ?>";
        let totalRecords = "<?php echo $records; ?>";
        let dataTable = $('#mainTableId').DataTable({
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
                loadingIndicator: true
            },
            stateSave: false
        });
    });
</script>

</html>