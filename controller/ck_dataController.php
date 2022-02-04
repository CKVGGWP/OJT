<?php

include('models/database.php');

$users = new Database();
$selectUser = $users->getData();

$userById = $users->selectData(isset($_GET['id']) ? $_GET['id'] : '');

if (isset($_POST['getData'])) {
    $birth = $users->displayBirthdateCount();
    $data = array();

    foreach ($birth as $key => $row) {
        $data[] = array(
            'birthdate' => $row['Month'],
            'count' => $row['Total']
        );
    }

    echo json_encode($data);
}
