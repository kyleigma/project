<?php
require('assets/vendors/fpdf186/fpdf.php'); 
include ('includes/conn.php');

// Get filter parameters from URL
$selectedProject = isset($_GET['project']) ? $_GET['project'] : '';
$selectedMunicipality = isset($_GET['municipality']) ? $_GET['municipality'] : '';

class PDF extends FPDF {
    function Header() {
        // Logo
        $this->Image('assets/images/dictlogo.png', 95, 8, 18, 18);
        $this->Cell(189, 17, '', 0, 1, "L");

        // Arial bold 15
        $this->SetFont('Arial', '', 10);
        // Title
        $this->Cell(189, 5, 'DEPARTMENT OF INFORMATION AND', 0, 1, "C");
        $this->Cell(189, 5, 'COMMUNICATIONS TECHNOLOGY', 0, 1, "C");
        $this->SetFont('Arial', '', 8);
        $this->Cell(189, 5, 'REGION VI, AKLAN FIELD OFFICE', 0, 1, "C");

        $this->Cell(189, 5, '', 0, 1, "");
        // Arial bold 15
        $this->SetFont('Arial', 'B', 12);
        // Title
        $this->Cell(189, 5, 'Free Wi-Fi Project Summary', 0, 1, "C");
        // Line break
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

// Get project name for display
$projectName = 'Free WiFi For All';
if (!empty($selectedProject)) {
    $projectQuery = "SELECT name FROM free_wifi_projects WHERE id = " . (int)$selectedProject;
    $projectResult = $conn->query($projectQuery);
    if ($projectResult && $projectResult->num_rows > 0) {
        $projectRow = $projectResult->fetch_assoc();
        $projectName = $projectRow['name'];
    }
}

$pdf->Cell(40, 5, 'Project :', 0, 0);
$pdf->Cell(40, 5, $projectName, 0, 1);

// Get municipality name if selected
$municipalityInfo = '';
if (!empty($selectedMunicipality)) {
    $muniQuery = "SELECT name FROM municipalities WHERE id = " . (int)$selectedMunicipality;
    $muniResult = $conn->query($muniQuery);
    if ($muniResult && $muniResult->num_rows > 0) {
        $muniRow = $muniResult->fetch_assoc();
        $pdf->Cell(40, 5, 'Municipality :', 0, 0);
        $pdf->Cell(40, 5, $muniRow['name'], 0, 1);
    }
}

// Query to get filtered data
$sql = "SELECT 
        fw.id, fw.address, fw.access_point, 
        fp.name AS project_name, fw.status, m.name AS municipality_name
        FROM free_wifi fw
        INNER JOIN free_wifi_projects fp ON fw.project_id = fp.id
        INNER JOIN municipalities m ON fw.municipality_id = m.id
        WHERE 1=1";

if (!empty($selectedProject)) {
    $sql .= " AND fw.project_id = " . (int)$selectedProject;
}
if (!empty($selectedMunicipality)) {
    $sql .= " AND fw.municipality_id = " . (int)$selectedMunicipality;
}

$sql .= " ORDER BY fw.address ASC";
$query = $conn->query($sql);

// Space before table
$pdf->Cell(189, $lineBreak, '', 0, 1);

// Table headers
$pdf->SetFont('Arial', 'B', $rowFont);
$pdf->Cell(10, 5, 'No', 1, 0, 'C');
$pdf->Cell(35, 5, 'Project Name', 1, 0, 'C');
$pdf->Cell(35, 5, 'Municipality', 1, 0, 'C');
$pdf->Cell(75, 5, 'Address', 1, 0, 'C');
$pdf->Cell(15, 5, 'APs', 1, 0, 'C');
$pdf->Cell(20, 5, 'Status', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$i = 1;

// Function to capitalize first letter if ucfirst is not available
if (!function_exists('ucfirst')) {
    function ucfirst($str) {
        return strtoupper(substr($str, 0, 1)) . substr($str, 1);
    }
}

// Check if query was successful
if ($query && $query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $pdf->Cell(10, 8, $i, 1, 0, 'C');
        $pdf->Cell(35, 8, $row['project_name'], 1, 0, 'C');
        $pdf->Cell(35, 8, $row['municipality_name'], 1, 0, 'C');
        $pdf->Cell(75, 8, $row['address'], 1, 0, 'L');
        $pdf->Cell(15, 8, $row['access_point'], 1, 0, 'C');
        $pdf->Cell(20, 8, ucfirst($row['status']), 1, 1, 'C');
        ++$i;
    }
} else {
    $pdf->Cell(190, 8, 'No records found', 1, 1, 'C');
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