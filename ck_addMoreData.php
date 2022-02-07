<?php

if (isset($_POST['add'])) {

    for ($i = 0; $i < 5000; $i++) {
        $firstName = trim($_POST['FirstName']) . $i;
        $lastName = trim($_POST['LastName']) . $i;
        $birthDate = date('Y-m-d', mt_rand(strtotime('1/1/1900'), strtotime('1/1/2000')));

        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

        $conn = mysqli_connect("localhost", "root", "", "ojtdb");

        $sql = "INSERT into ck_table (firstname, lastname, birthdate, gender) VALUES 
        ('$firstName', '$lastName', '$birthDate', '$gender')";

        $query = mysqli_query($conn, $sql);
    }
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
</head>

<body>

    <main class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <strong>
                        Add Data
                    </strong>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <label for="First Name">First Name: </label>
                            <input type="text" class="form-control" name="FirstName">
                            <label for="Last Name">Last Name</label>
                            <input type="text" class="form-control" name="LastName">
                            <label for="Birthdate">Birthdate: </label>
                            <input type="date" class="form-control" name="birthdate">
                            <label for="Gender">Gender: </label>
                            <input type="radio" name="gender" value="Male">Male
                            <input type="radio" name="gender" value="Female">Female
                            <div class="d-flex justify-content-center align-items-center mx-5 my-2">
                                <button type="submit" name="add" class="btn btn-primary">Add</button>
                                <a href="ck_index.php" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</html>