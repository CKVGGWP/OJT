<section class="col">
    <div class="content">
        <div class="card text-center">
            <div class="card-header">
                Table
            </div>
            <div class="notif m-2">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
                                    <div class='alert alert-danger alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h5><i class='icon fa fa-warning'></i> Error!</h5>
                                    <small>" . $_SESSION['error'] . "</small>
                                    </div>";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
                                    <div class='alert alert-success alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h5><i class='icon fa fa-check'></i> Success!</h5>
                                    <small>" . $_SESSION['success'] . "</small>
                                    </div>";
                    unset($_SESSION['success']);
                }
                ?>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="p-2">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="firstname">FIRSTNAME:</label>
                            <input type="search" class="form-control" id="firstname" name="firstname">
                        </div>
                        <div class="col">
                            <label for="lastname">LASTNAME:</label>
                            <input type="search" class="form-control" id="lastname" name="lastname">
                        </div>
                        <button style="margin-top: 30px;" type="submit" class="btn btn-sm mr-2" id="filter" name="filter">Filter</button>
                        <button style="margin-top: 30px;" type="button" data-toggle="modal" data-target="#addModal" class="btn btn-outline-info btn-sm add">Add</button>
                    </div>
                </form>
                <form method="POST" action="./controller/ck_printController.php" class="p-3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" name="print" class="btn btn-danger btn-sm print mb-2">PRINT PDF</button>
                        <button type="submit" name="export" class="btn btn-success btn-sm print mb-2">PRINT CSV</button>
                    </div>
                    <br>
                    <label>Records : <?php echo $totalRecords; ?></label>
                    <table class="table table-bordered table-striped" id="mainTableId">
                        <thead>
                            <th>#</th>
                            <th><input type="checkbox" id="checkAll" title="Mark All"></th>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
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
</section>