<?php

if (isset($_POST['add'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $birthDate = $_POST['birthdate'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $conn = mysqli_connect("localhost", "root", "", "ojtdb");

    if (!empty($firstName) && !empty($lastName) && !empty($birthDate) && !empty($gender)) {

        $check = "SELECT * FROM ck_table WHERE firstname LIKE '%$firstName%' AND lastname LIKE '%$lastName%'";
        $checkQuery = mysqli_query($conn, $check);

        if (mysqli_num_rows($checkQuery) > 0) {
            echo "<div class='alert alert-danger text-center'>Name Already Inserted!</div>";
        } else {
            $sql = "INSERT INTO ck_table (firstname, lastname, birthdate, gender) VALUES ('$firstname', '$lastname', '$birthdate', '$gender')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                header("location : ck_index.php");
            } else {
                echo 'Error';
            }
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Fields Are Empty!</div>";
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

    <main class="container d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <strong>
                    Add Data
                </strong>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <label for="First Name">First Name: </label>
                        <input type="text" class="form-control" name="FirstName">
                        <label for="Last Name">Last Name</label>
                        <input type="text" class="form-control" name="LastName">
                        <label for="Birthdate">Birthdate: </label>
                        <input type="date" class="form-control" name="birthdate">
                        <label for="Gender">Gender: </label>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female
                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</html>