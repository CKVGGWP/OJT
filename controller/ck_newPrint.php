<?php

require('../fpdf/fpdf.php');

class PDF extends FPDF
{
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

if (isset($_POST['print'])) {
    $number = $_POST['number'];
    $copy = $_POST['copy'];
    $column = $_POST['column'];
    $startNumber = 1;
    $startCount = 1;
    $startColumn = 0;
    $size = 190 / $column;



    while ($startNumber <= $number) {

        while ($startCount <= $copy) {
            $pdf->Cell($size, 5, $startNumber, 1, 0, 'C');
            $startCount++;
            $startColumn++;
            if ($startColumn == $column) {
                $pdf->Ln();
                $startColumn = 0;
            }
        }
        $startNumber++;


        $startCount = 1;
    }
}

$pdf->Output();
