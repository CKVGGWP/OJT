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

    public function displayBirthdateCountByGender()
    {
        $sql = "SELECT MONTHNAME(birthdate) AS month, COUNT(*) AS total, 
        COUNT(CASE WHEN gender = 'MALE' THEN id END) AS male, 
        COUNT(CASE WHEN gender = 'Female' THEN id END) AS female 
        FROM ck_table GROUP BY MONTHNAME(birthdate) 
        ORDER BY MONTHNAME(birthdate) ASC";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function displayAgeGroup()
    {
        $sql = "SELECT t.age_group, COUNT(*) AS age_count
        FROM
        (
            SELECT
                CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 0 AND 12
                    THEN 'Children'
                    WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 13 AND 17
                    THEN 'Teens'
                    WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 18 AND 30
                    THEN 'Young Adult'
                    WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 31 AND 59
                    THEN 'Adult'
                    ELSE 'Senior'
                END AS age_group
            FROM ck_table
        ) t
        GROUP BY t.age_group";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function displayAgeGroupByCategory($cat = '')
    {
        $sql = "SELECT *
        FROM
        (
            SELECT *,
                CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 0 AND 12
                    THEN 'Children'
                    WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 13 AND 17
                    THEN 'Teens'
                    WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 18 AND 30
                    THEN 'Young Adult'
                    WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 31 AND 59
                    THEN 'Adult'
                    ELSE 'Senior'
                END AS age_group
            FROM ck_table
        ) AS t WHERE age_group = '$cat'";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function countRecords()
    {
        $sql = "SELECT COUNT(*) AS total FROM ck_table";
        $result = $this->conn->query($sql);
        $data = '';

        while ($row = $result->fetch_assoc()) {
            $data = $row['total'];
        }

        return $data;
    }

    public function returnSQL()
    {
        $sql = "SELECT * FROM ck_table";
        $sqlData = trim(preg_replace('/\s+/', ' ', $sql));
        return $sqlData;
    }
}
