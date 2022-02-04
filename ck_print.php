<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>

    <main class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-sm-3 col-md-3"></div>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Exercise 4</strong>
                </div>
                <div class="card-body">
                    <div class="col-sm-12 col-md-12">
                        <form action="controller/ck_newPrint.php" method="POST">
                            <label for="Number">Number: </label>
                            <input type="number" class="form-control" name="number">
                            <label for="Copy">Copy: </label>
                            <input type="number" class="form-control" name="copy">
                            <label for="Column">Column: </label>
                            <input type="number" class="form-control" name="column">
                            <div class="my-3">
                                <button type="submit" name="print" class="w-100 btn btn-primary">Print</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3"></div>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</html>