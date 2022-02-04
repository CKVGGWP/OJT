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

    public function displayMale()
    {
        $sql = "SELECT COUNT(id) AS maleCount FROM ck_table WHERE gender = 'Male'";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function displayFemale()
    {
        $sql = "SELECT COUNT(id) AS femaleCount FROM ck_table WHERE gender = 'Female'";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function displayGenderCount()
    {
        $sql = '';
        $sql = "SELECT SUM(CASE gender WHEN 'Male' THEN 1 ELSE 0 END) AS maleCount,";
        $sql .= "SUM(CASE gender WHEN 'Female' THEN 1 ELSE 0 END) AS femaleCount FROM ck_table";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function displayBirthdateCount()
    {
        $sql = "SELECT MONTHNAME(birthdate) AS month, COUNT(id) AS total FROM ck_table GROUP BY MONTHNAME(birthdate)";
        $result = $this->conn->query($sql);

        return $result;
    }
}
