<?php

require('../fpdf/fpdf.php');

$conn = mysqli_connect("localhost", "root", "", "ojtdb");


if (isset($_POST['export'])) {

    $checkbox = isset($_POST['check']) ? $_POST['check'] : '';

    $sql = '';

    if (empty($checkbox)) {
        $sql = "SELECT * FROM ck_table";
    } else {
        $newVal = implode("','", $checkbox);

        $sql = "SELECT * FROM ck_table WHERE id IN ('$newVal')";
    }

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

if (isset($_POST['print'])) {

    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont('Arial', 'B', 12);

            $this->SetFillColor(180, 180, 255);
            $this->SetDrawColor(50, 50, 100);

            $this->Cell(25, 5, '#', 1, 0, 'C', true);
            $this->Cell(40, 5, 'First Name', 1, 0, 'C', true);
            $this->Cell(40, 5, 'Last Name', 1, 0, 'C', true);
            $this->Cell(30, 5, 'Birthdate', 1, 0, 'C', true);
            $this->Cell(25, 5, 'Gender', 1, 0, 'C', true);
            $this->Ln();
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

    $pdf->SetFont('Arial', '', '10');

    $pdf->SetY(10);


    function staticCount()
    {
        static $count = 0;
        $count++;
        return $count;
    }


    $checkbox = isset($_POST['check']) ? $_POST['check'] : '';

    $sql = '';

    if (empty($checkbox)) {
        $sql = "SELECT * FROM ck_table";
    } else {
        $newVal = implode("','", $checkbox);

        $sql = "SELECT * FROM ck_table WHERE id IN ('$newVal')";
    }


    $query = mysqli_query($conn, $sql);

    $pdf->SetFillColor(235, 236, 236);

    $fill = false;

    while ($data = mysqli_fetch_array($query)) {
        $fill = !$fill;
        $pdf->Ln(5);
        $pdf->Cell(25, 5, staticCount(), 1, 0, 'C', $fill);
        $pdf->Cell(40, 5, $data['firstname'], 1, 0, 'C', $fill);
        $pdf->Cell(40, 5, $data['lastname'], 1, 0, 'C', $fill);
        $pdf->Cell(30, 5, $data['birthdate'], 1, 0, 'C', $fill);
        $pdf->Cell(25, 5, $data['gender'], 1, 0, 'C', $fill);
    }

    $pdf->Output();
}
