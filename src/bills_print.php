<?php
require('assets/vendors/fpdf186/fpdf.php'); 
include ('includes/conn.php');

// Get filter parameters
$bill_type = isset($_GET['bill_type']) ? $_GET['bill_type'] : 'all';
$date_from = isset($_GET['date_from']) && !empty($_GET['date_from']) ? $_GET['date_from'] : null;
$date_to = isset($_GET['date_to']) && !empty($_GET['date_to']) ? $_GET['date_to'] : null;

class PDF extends FPDF {
    function Header() {
        $this->Image('assets/images/dictlogo.png', 95, 8, 18,18);
        $this->Cell(189 ,17,'',0,1, "L");
        $this->SetFont('Arial','',10);
        $this->Cell(0 ,5,'DEPARTMENT OF INFORMATION AND',0,1, "C");
        $this->Cell(0 ,5,'COMMUNICATIONS TECHNOLOGY',0,1, "C");
        $this->SetFont('Arial','',8);
        $this->Cell(0 ,5,'REGION VI, AKLAN FIELD OFFICE',0,1, "C");
        $this->Cell(0 ,5,'',0,1, "");
        $this->SetFont('Arial','B',12);
        $this->Cell(0 ,5,'Bills Overview Report',0,1, "C");
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().' / 1',0,0,'C');
    }
}

// Create PDF
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

// Report Type Header
$pdf->Cell(40 ,5,'Report Type:',0,0);
$filter_text = ($bill_type != 'all') ? ucfirst($bill_type) . ' Bills' : 'All Utility Bills';
if ($date_from && $date_to) {
    $filter_text .= ' (' . date('F Y', strtotime($date_from)) . ' - ' . date('F Y', strtotime($date_to)) . ')';
}
$pdf->Cell(150 ,5,$filter_text,0,1);
$pdf->Cell(189 ,1,'',0,1);

// Format date range
if ($date_from && $date_to) {
    $date_from = date('Y-m-d', strtotime($date_from));
    $date_to = date('Y-m-d', strtotime($date_to));
}

// Electricity Bill Query
$sql_electric = "SELECT 'Electricity' as bill_type, 
                 CONCAT(DATE_FORMAT(month_2, '%M %Y'), ' - ', DATE_FORMAT(month_1, '%M %Y')) as billing_period, 
                 date_2 as date_receive,  
                 COALESCE((gtc + dr + uc + evax + other_ca + annex), 0) as total_amount 
                 FROM electric_bill";

if ($date_from && $date_to) {
    $sql_electric .= " WHERE date_2 >= '$date_from' AND date_2 <= '$date_to'";
}

// Water Bill Query
$sql_water = "SELECT 'Water' as bill_type, 
              DATE_FORMAT(month_wb, '%M %Y') as billing_period,
              date_receive as date_receive,  
              COALESCE(total_amount_wb, 0) as total_amount 
              FROM water_bill";

if ($date_from && $date_to) {
    $sql_water .= " WHERE date_receive >= '$date_from' AND date_receive <= '$date_to'";
}

// WiFi Bill Query
$sql_wifi = "SELECT 'WiFi' as bill_type, 
             DATE_FORMAT(month_1, '%M %Y') as billing_period,
             date_1 as date_receive,  
             COALESCE(total_amount_1, 0) as total_amount 
             FROM wifi_bill";

if ($date_from && $date_to) {
    $sql_wifi .= " WHERE date_1 >= '$date_from' AND date_1 <= '$date_to'";
}

// Construct final query based on bill type
$queries = [];
if ($bill_type == 'all' || $bill_type == 'electric') {
    $queries[] = $sql_electric;
}
if ($bill_type == 'all' || $bill_type == 'water') {
    $queries[] = $sql_water;
}
if ($bill_type == 'all' || $bill_type == 'wifi') {
    $queries[] = $sql_wifi;
}

$final_query = !empty($queries) ? implode(' UNION ALL ', $queries) . " ORDER BY date_receive ASC" : '';

$result = ($final_query) ? $conn->query($final_query) : false;

// Table Headers
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50 ,7,'Bill Type',1,0,'C');
$pdf->Cell(60 ,7,'Billing Period',1,0,'C');
$pdf->Cell(35 ,7,'Date Received',1,0,'C');
$pdf->Cell(44 ,7,'Total Amount',1,1,'C');

// Reset Font
$pdf->SetFont('Arial','',11);
$total = 0;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(50 ,7,$row['bill_type'],1,0,'C');
        $pdf->Cell(60 ,7,$row['billing_period'],1,0,'C');
        $pdf->Cell(35 ,7,date('m/d/Y', strtotime($row['date_receive'])),1,0,'C');
        $pdf->Cell(44 ,7,'PHP ' . number_format($row['total_amount'], 2),1,1,'C');
        $total += $row['total_amount'];
    }
} else {
    // No Data Message
    $pdf->Cell(189 ,7,'No Data Available',1,1,'C');
}

// Print Total
$pdf->SetFont('Arial','B',11);
$pdf->Cell(145 ,7,'Total:',1,0,'R');
$pdf->Cell(44 ,7,'PHP ' . number_format($total, 2),1,1,'C');

$pdf->Output();
?>
