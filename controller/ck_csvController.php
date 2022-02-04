<?php

if (isset($_POST['export'])) {
    $conn = mysqli_connect("localhost", "root", "", "ojtdb");
    $sql = "SELECT * FROM ck_table";
    $result = mysqli_query($conn, $sql);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=ck_export.csv');
    $output = fopen('php://output', 'w');

    fputcsv($output, array('#', 'First Name', 'Last Name', 'Birthdate', 'Gender'));

    foreach ($result as $key => $report) {
        fputcsv($output, $report);
    }

    fclose($output);
}
