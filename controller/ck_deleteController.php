<?php

if (isset($_GET['delete'])) {

    $id = $_GET['id'];

    $conn = mysqli_connect("localhost", "root", "", "ojtdb");

    $sql = "DELETE FROM ck_table WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);


    if ($query) {
        echo "success";
    } else {
        echo "Error";
    }
}
