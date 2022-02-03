<?php

include('models/database.php');

$users = new Database();
$selectUser = $users->getData();

$userById = $users->selectData(isset($_GET['id']) ? $_GET['id'] : '');
