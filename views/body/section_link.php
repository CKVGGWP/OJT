<section class="vh-100 border border-primary">
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
</section>