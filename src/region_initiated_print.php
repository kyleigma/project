<?php
require('assets/vendors/fpdf186/fpdf.php'); 
include ('includes/conn.php');

class PDF extends FPDF {
    // Page header
    function Header() {
        $this->Image('assets/images/dictlogo.png', 95, 8, 18, 18);
        $this->Cell(189, 17, '', 0, 1, "L");

        $this->SetFont('Arial', '', 10);
        $this->Cell(189, 5, 'DEPARTMENT OF INFORMATION AND', 0, 1, "C");
        $this->Cell(189, 5, 'COMMUNICATIONS TECHNOLOGY', 0, 1, "C");
        $this->SetFont('Arial', '', 8);
        $this->Cell(189, 5, 'REGION VI, AKLAN FIELD OFFICE', 0, 1, "C");

        $this->Cell(189, 5, '', 0, 1, "");
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(189, 5, 'Free Wi-Fi Project Summary', 0, 1, "C");
        $this->Ln(10);
    }
    
    // Page footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / 1', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();

$rowFont = 11;
$lineBreak = 1;

// Set font
$pdf->SetFont('Arial', '', $rowFont);

$pdf->Cell(40, 5, 'Project :', 0, 0);
$pdf->Cell(40, 5, 'Free WiFi For All', 0, 1);

// Space before table
$pdf->Cell(189, $lineBreak, '', 0, 1);

// Query from free_wifi table with municipality name
$query = mysqli_query($conn, "SELECT fwp.name AS project_name, fw.address, m.name AS municipality, fw.access_point, fw.status 
                              FROM free_wifi fw 
                              JOIN free_wifi_projects fwp ON fw.project_id = fwp.id 
                              JOIN municipalities m ON fw.municipality_id = m.id 
                              WHERE fw.project_id = 6
                              ORDER BY fw.id ASC");

$pdf->SetFont('Arial', 'B', $rowFont);
$pdf->Cell(10, 5, 'No', 1, 0, 'C');
$pdf->Cell(30, 5, 'Project Name', 1, 0, 'C'); // Adjusted width
$pdf->Cell(30, 5, 'Municipality', 1, 0, 'C'); // Adjusted width
$pdf->Cell(90, 5, 'Address', 1, 0, 'C'); // Adjusted width
$pdf->Cell(10, 5, 'APs', 1, 0, 'C');
$pdf->Cell(20, 5, 'Status', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$i = 1;

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $pdf->Cell(10, 8, $i, 1, 0, 'C');
        $pdf->Cell(30, 8, $row['project_name'], 1, 0, 'C'); // Centered
        $pdf->Cell(30, 8, $row['municipality'], 1, 0, 'C'); // Centered
        $pdf->Cell(90, 8, $row['address'], 1, 0, 'L'); // Left aligned
        $pdf->Cell(10, 8, $row['access_point'], 1, 0, 'C');
        $pdf->Cell(20, 8, ucfirst($row['status']), 1, 1, 'C');
        ++$i;
    }
} else {
    $pdf->Cell(189, 8, 'No records found', 1, 1, 'C');
}

// Space before signatories
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', '', $rowFont);
$pdf->Cell(20, 5, 'Prepared by:', 0, 1, 'L');

$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', $rowFont);
$pdf->Cell(90, 5, 'DICT Student-Interns', 0, 1);

$pdf->Output();
?>
