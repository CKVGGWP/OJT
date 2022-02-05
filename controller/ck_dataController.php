<?php

include('models/database.php');

$users = new Database();
$selectUser = $users->getData();

$userById = $users->selectData(isset($_GET['id']) ? $_GET['id'] : '');

$ageGroupByCategory = $users->displayAgeGroupByCategory(isset($_GET['ageGroup']) ? $_GET['ageGroup'] : '');

$records = $users->countRecords();

$trimmedSQL = $users->returnSQL();

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

$data = '';

$birthMonth = $users->displayBirthdateCount();

while ($row = $birthMonth->fetch_assoc()) {
    $data .= json_encode($row) . ',';
}

$var = $data;
$newData = rtrim($var, ',');

$data2 = '';

$birthByGender = $users->displayBirthdateCountByGender();

while ($rows = $birthByGender->fetch_assoc()) {
    $data2 .= json_encode($rows) . ',';
}

$var2 = $data2;
$newData2 = rtrim($var2, ',');

$data3 = '';

$ageGroup = $users->displayAgeGroup();

while ($row3 = $ageGroup->fetch_assoc()) {
    $data3 .= json_encode($row3) . ',';
}

$var3 = $data3;

$newData3 = rtrim($var3, ',');
