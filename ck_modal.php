<?php include('controller/ck_dataController.php'); ?>

<?php

if (isset($_POST['edit'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $birthDate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $id = $_POST['hiddenID'];

    $conn = mysqli_connect("localhost", "root", "", "ojtdb");

    if (!empty($firstName) && !empty($lastName) && !empty($birthDate) && !empty($gender)) {

        $check = "SELECT * FROM ck_table WHERE firstname LIKE '$firstName' AND lastname LIKE '$lastName'";
        $checkQuery = mysqli_query($conn, $check);

        if (mysqli_num_rows($checkQuery) > 0) {
            echo "<script>alert('Name Already Exists!');
            window.location.href='ck_modal.php?id=$id';</script>";
        } else {
            $sql = "UPDATE ck_table SET firstname = '$firstName', lastname = '$lastName', birthdate = '$birthDate', gender = '$gender' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: ck_index.php");
            } else {
                echo "Error";
            }
        }
    } else {
        echo "<script>alert('Fields Are Empty!');
        window.location.href='ck_modal.php?id=$id';</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Modal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>

<body>

    <main class="container d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <strong>
                    Edit Modal
                </strong>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="ck_modal.php" method="POST">
                        <?php foreach ($userById as $key => $data) : ?>
                            <label for="First Name">First Name: </label>
                            <input type="hidden" name="hiddenID" value="<?php echo $data['id']; ?>">
                            <input type="text" class="form-control" name="FirstName" value="<?php echo $data['firstname']; ?>">
                            <label for="Last Name">Last Name</label>
                            <input type="text" class="form-control" name="LastName" value="<?php echo $data['lastname']; ?>">
                            <label for="Birthdate">Birthdate: </label>
                            <input type="date" class="form-control" name="birthdate" value="<?php echo $data['birthdate']; ?>">
                            <label for="Gender">Gender: </label>
                            <input type="radio" name="gender" value="Male" <?php if ($data['gender'] == "Male") echo "checked"; ?>>Male
                            <input type="radio" name="gender" value="Female" <?php if ($data['gender'] == "Female") echo "checked"; ?>>Female
                        <?php endforeach ?>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>

                    </form>
                </div>
            </div>
        </div>
    </main>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</html>