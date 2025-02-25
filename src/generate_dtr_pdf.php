<?php
require('assets/vendors/fpdf186/fpdf.php');

/**
 * Custom PDF class that extends the FPDF library.
 */
class PDF extends FPDF {
    /**
     * Header method to create the header of the PDF document.
     */
    function Header() {
        // Logo
        $this->Image('assets/images/dictlogo.png', 95, 4, 20, 20);
        $this->Cell(189, 14, '', 0, 1, "C");

        // Header text
        $this->SetFont('Arial', '', 10);
        $this->Cell(189, 4, 'Republic of the Philippines', 0, 1, "C");
        $this->Cell(189, 4, 'Department of Information &', 0, 1, "C");
        $this->Cell(189, 4, 'Communications Technology', 0, 1, "C");
        
        // Add extra space after department header
        $this->Cell(189, 8, '', 0, 1, "C");
        
        // Month and Year with underline
        $this->SetFont('Arial', 'B', 11);
        $month = isset($_POST['month']) ? $_POST['month'] : date('F');
        $year = isset($_POST['year']) ? $_POST['year'] : date('Y');
        $this->Cell(189, 4, $month . ' ' . $year, 0, 1, "C");
        
        // Add underline
        $this->SetLineWidth(0.2);
        $this->Line(85, $this->GetY(), 125, $this->GetY());
        
        // Add Date label
        $this->SetFont('Arial', '', 10);
        $this->Cell(189, 4, 'Date', 0, 1, "C");
    }

    /**
     * Footer method to create the footer of the PDF document.
     */
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / 1', 0, 0, 'C');
    }
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create PDF object
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AddPage();

    // Remove duplicate month/year display
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(189, 4, '', 0, 1, "C");
    $pdf->Ln(2);

    // Employee Information
    $pdf->SetFont('Arial', '', 10);
    $employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : '';
    $position = isset($_POST['position']) ? $_POST['position'] : '';
    $division = isset($_POST['division']) ? $_POST['division'] : '';

    $pdf->Cell(25, 5, 'Name:', 0, 0);
    $pdf->Cell(164, 5, $employeeName, 'B', 1);

    $pdf->Cell(25, 5, 'Position:', 0, 0);
    $pdf->Cell(164, 5, $position, 'B', 1);

    $pdf->Cell(25, 5, 'Division:', 0, 0);
    $pdf->Cell(164, 5, $division, 'B', 1);
    $pdf->Ln(2);

    // Table Header
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(20, 6, 'Date', 1, 0, 'C');
    $pdf->Cell(50, 3, 'A.M.', 1, 0, 'C');
    $pdf->Cell(50, 3, 'P.M.', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Late/UT', 1, 0, 'C');
    $pdf->Cell(39, 6, 'Remarks', 1, 1, 'C');

    // Sub-header for time records
    $pdf->Cell(20, 3, '', 0, 0);
    $pdf->Cell(25, 3, 'IN', 1, 0, 'C');
    $pdf->Cell(25, 3, 'OUT', 1, 0, 'C');
    $pdf->Cell(25, 3, 'IN', 1, 0, 'C');
    $pdf->Cell(25, 3, 'OUT', 1, 0, 'C');
    $pdf->Cell(69, 3, '', 0, 1);

    // Table Content
    $pdf->SetFont('Arial', '', 8);
    for ($i = 1; $i <= 31; $i++) {
        $pdf->Cell(20, 5, $i, 1, 0, 'C');
        
        // Format and display time values
        $am_in = formatTime($_POST["am_in_$i"]);
        $am_out = formatTime($_POST["am_out_$i"]);
        $pm_in = formatTime($_POST["pm_in_$i"]);
        $pm_out = formatTime($_POST["pm_out_$i"]);
        
        // Use manually input Late/UT value
        $late_ut = isset($_POST["late_ut_$i"]) ? $_POST["late_ut_$i"] : '';
        
        $pdf->Cell(25, 5, $am_in, 1, 0, 'C');
        $pdf->Cell(25, 5, $am_out, 1, 0, 'C');
        $pdf->Cell(25, 5, $pm_in, 1, 0, 'C');
        $pdf->Cell(25, 5, $pm_out, 1, 0, 'C');
        $pdf->Cell(30, 5, $late_ut, 1, 0, 'C');
        $pdf->Cell(39, 5, isset($_POST["remarks_$i"]) ? $_POST["remarks_$i"] : '', 1, 1, 'C');
    }

    // Footer Section
    $pdf->Ln(3);
    $verifierName = isset($_POST['verifierName']) ? $_POST['verifierName'] : '';
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(189, 5, $verifierName, 0, 1, 'C');
    $pdf->SetX(($pdf->GetPageWidth() - 50) / 2);
    $pdf->Cell(50, 0, '', 'T', 1, 'C');
    $pdf->Cell(189, 5, 'Verified as to the prescribed office hours.', 0, 1, 'C');
    
    $pdf->Ln(3);
    $pdf->Cell(189, 5, '', 0, 1, 'C');
    $pdf->SetX(($pdf->GetPageWidth() - 50) / 2);
    $pdf->Cell(50, 0, '', 'T', 1, 'C');
    $pdf->Cell(189, 5, 'MARVIN L. MANUEL', 0, 1, 'C');
    $pdf->Cell(189, 5, 'Immediate Supervisor', 0, 1, 'C');

    // Output PDF
    $pdf->Output('D', 'DTR - ' . $employeeName . '.pdf');
    exit;
}

/**
 * Formats the time from the input string.
 * IF YOU SEE THIS COMMENT THEN ASTIG IKAW, SABI NI KEANU IDOL IGOP ASTIG
 * @param string $timeString The time input string.
 * @return string The formatted time or an empty string if invalid.
 */
function formatTime($timeString) {
    return isset($timeString) && $timeString ? 
        (strtotime($timeString) !== false ? date('h:i A', strtotime($timeString)) : '') : '';
}
