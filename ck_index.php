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
</head>

<body>

    <main class="container d-flex justify-content-center align-items-center">
        <div class="col-md-1"></div>
        <div class="col-md-10 justify-content-center align-items-center">
            <div class="card">
                <div class="card-header text-center">
                    <strong>
                        <span class="justify-content-center align-items-center d-flex">Exercise 3</span>
                    </strong>

                    <a href="ck_add.php" class="btn btn-primary float-end mx-3">Add Data</a>
                    <a href="ck_graph.php" class="btn btn-secondary float-end mx-3">View Graph</a>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table table-condensed table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <div class="d-flex mb-3">
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <input type="search" class="form-control" name="firstName" placeholder="First Name">
                                            <input type="search" class="form-control mx-3" name="lastName" placeholder="Last Name">
                                            <input type="submit" name="search" class="btn btn-primary" value="Search">
                                        </form>
                                    </div>
                                </tr>
                            </thead>
                            <form action="./controller/ck_printController.php" method="POST">

                                <thead class="text-center">
                                    <tr>
                                        <td class="text-center" colspan="7"><button type="submit" class="btn btn-primary w-100" name="print">Print</button></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="7"><button type="submit" class="btn btn-secondary w-100" name="export">Export to CSV</button></td>
                                    </tr>
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

                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/scripts.js"></script>

</html>