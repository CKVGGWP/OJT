<?php

require('../fpdf/fpdf.php');

$conn = mysqli_connect("localhost", "root", "", "ojtdb");

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);

        $this->Cell(12);

        $this->Ln(5);

        $this->Cell(100, 0, 'Exercise 3', 0, 1);

        $this->Cell(25, 5, 'ID', 1, 0);
        $this->Cell(40, 5, 'First Name', 1, 0);
        $this->Cell(40, 5, 'Last Name', 1, 0);
        $this->Cell(30, 5, 'Birthdate', 1, 0);
        $this->Cell(25, 5, 'Gender', 1, 0);
    }

    function Footer()
    {
        $this->SetY(-15);

        $this->SetFont('Arial', '', 8);

        $this->Cell(0, 10, 'Page ' . $this->PageNo() . " / {pages}", 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4');

$pdf->AliasNbPages('{pages}');

$pdf->AddPage();

function staticCount()
{
    static $count = 0;
    $count++;
    return $count;
}

if (isset($_POST['print'])) {
    $checkbox = isset($_POST['check']) ? $_POST['check'] : '';

    $sql = '';

    if (empty($checkbox)) {
        $sql = "SELECT * FROM ck_table";
    } else {
        $newVal = implode("','", $checkbox);

        $sql = "SELECT * FROM ck_table WHERE id IN ('$newVal')";
    }


    $query = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_array($query)) {
        $pdf->Ln(5);
        $pdf->Cell(25, 5, staticCount(), 1, 0);
        $pdf->Cell(40, 5, $data['firstname'], 1, 0);
        $pdf->Cell(40, 5, $data['lastname'], 1, 0);
        $pdf->Cell(30, 5, $data['birthdate'], 1, 0);
        $pdf->Cell(25, 5, $data['gender'], 1, 0);
    }
}

$pdf->Output();
