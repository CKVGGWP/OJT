<?php

class Database
{
    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "ojtdb");
    }

    public function getData()
    {
        $sql = "SELECT * FROM ck_table";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function filterData($firstName = '', $lastName = '')
    {
        $sql = "SELECT * FROM ck_table WHERE firstname LIKE '%$firstName%' AND lastname LIKE '%$lastName%'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM ck_table WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function selectData($id)
    {
        $sql = "SELECT * FROM ck_table WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function editData($firstName, $lastName, $birthDate, $gender, $id)
    {
        $sql = "UPDATE ck_table SET firstname = '$firstName', lastname = '$lastName', birthdate = '$birthDate', gender = '$gender' WHERE id = '$id'";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function addData($firstName, $lastName, $birthDate, $gender)
    {
        $sql = '';
        $sql = "INSERT INTO ck_table (firstname, lastname, birthdate, gender)";
        $sql .= "VALUES ('$firstName', '$lastName', '$birthDate', '$gender')";
        $result = $this->conn->query($sql);

        return $result;
    }
}
