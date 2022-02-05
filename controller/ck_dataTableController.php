<?php
include('models/database.php');

$requestData = $_REQUEST;
$sqlData = isset($requestData['sqlData']) ? $requestData['sqlData'] : '';
$totalRecords = isset($requestData['totalRecords']) ? $requestData['totalRecords'] : '';

$totalData = $totalRecords;
$totalFiltered = $totalRecords;

$data = [];
$sql = $sqlData . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";

$query = $db->query($sql);
if ($query and $query->num_rows > 0) {
    while ($result = $query->fetch_assoc()) {
        extract($result);

        $data[] = [
            $id,
            $firstname,
            $lastname,
            $birthdate,
            $gender,
        ];
    }
}

$json_data = array(
    "draw"            => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
    "recordsTotal"    => intval($totalData),  // total number of records
    "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
    "data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format
