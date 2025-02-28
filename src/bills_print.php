

<?php
    require('assets/vendors/fpdf186/fpdf.php'); 
    include ('includes/conn.php');

    // Get filter parameters
    $bill_type = isset($_GET['bill_type']) ? $_GET['bill_type'] : 'all';
    $date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
    $date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';

    class PDF extends FPDF{
        // Page header
        function Header()
        {
            // Logo
            $this->Image('assets/images/dictlogo.png', 95, 8, 18,18);
            $this->Cell(189 ,17,'',0,1, "L");

            // Arial bold 15
            $this->SetFont('Arial','',10);
            // Title
            $this->Cell(189 ,5,'DEPARTMENT OF INFORMATION AND',0,1, "C");
            $this->Cell(189 ,5,'COMMUNICATIONS TECHNOLOGY',0,1, "C");
            $this->SetFont('Arial','',8);
            $this->Cell(189 ,5,'REGION VI, AKLAN FIELD OFFICE',0,1, "C");

            $this->Cell(189 ,5,'',0,1, "");
            // Arial bold 15
            $this->SetFont('Arial','B',12);
           
            // Title
            $this->Cell(189 ,5,'Bills Overview Report',0,1, "C");
            // Line break
            $this->Ln(10);
        }
        
        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().' / 1',0,0,'C');
        }
    }
      
    $pdf = new PDF('P','mm','A4');
    $pdf->AddPage();
    
    $rowFont = 11;
    $lineBreak = 1;
       
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','',$rowFont);

    // Display filter information
    $pdf->Cell(40 ,5,'Report Type:',0,0);
    $filter_text = 'All Utility Bills';
    if($bill_type != 'all') {
        $filter_text = ucfirst($bill_type) . ' Bills';
    }
    if($date_from && $date_to) {
        $filter_text .= ' (' . date('F Y', strtotime($date_from)) . ' - ' . date('F Y', strtotime($date_to)) . ')';
    }
    $pdf->Cell(150 ,5,$filter_text,0,1);
    
    $pdf->Cell(189 ,$lineBreak,'',0,1);
    
    // Base queries
    $sql_electric = "SELECT 'Electricity' as bill_type, 
                     CONCAT(DATE_FORMAT(month_2, '%M %Y'), ' - ', DATE_FORMAT(month_1, '%M %Y')) as billing_period, 
                     date_2 as date_receive, 
                     (gtc + dr + uc + evax + other_ca + annex) as total_amount 
                     FROM electric_bill";

    $sql_water = "SELECT 'Water' as bill_type, 
                  DATE_FORMAT(month_wb, '%M %Y') as billing_period,
                  date_receive, 
                  total_amount_wb as total_amount 
                  FROM water_bill";

    $sql_wifi = "SELECT 'WiFi' as bill_type, 
                 DATE_FORMAT(month_1, '%M %Y') as billing_period,
                 date_1 as date_receive, 
                 total_amount_1 as total_amount 
                 FROM wifi_bill";

    // Apply date filters if provided
    if($date_from && $date_to) {
        // Format dates for SQL comparison (add day to make it complete date)
        $date_from = $date_from . '-01';
        $date_to = date('Y-m-t', strtotime($date_to . '-01')); // Get last day of the month
        
        $sql_electric .= " WHERE month_1 BETWEEN '$date_from' AND '$date_to'";
        $sql_water .= " WHERE month_wb BETWEEN '$date_from' AND '$date_to'";
        $sql_wifi .= " WHERE month_1 BETWEEN '$date_from' AND '$date_to'";
    }

    // Initialize the final query based on bill type
    $final_query = '';
    if ($bill_type == 'all' || $bill_type == 'electric') {
        $final_query = $sql_electric;
    }
    if ($bill_type == 'all' || $bill_type == 'water') {
        $final_query .= ($final_query ? ' UNION ALL ' : '') . $sql_water;
    }
    if ($bill_type == 'all' || $bill_type == 'wifi') {
        $final_query .= ($final_query ? ' UNION ALL ' : '') . $sql_wifi;
    }
    $final_query .= " ORDER BY date_receive ASC";

    $result = $conn->query($final_query);

    // Table headers
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(50 ,5,'Bill Type',1,0);
    $pdf->Cell(60 ,5,'Billing Period',1,0);
    $pdf->Cell(35 ,5,'Date Received',1,0);
    $pdf->Cell(44 ,5,'Total Amount',1,1);
    
    // Reset font
    $pdf->SetFont('Arial','',$rowFont);
    
    $total = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pdf->Cell(50 ,5,$row['bill_type'],1,0);
            $pdf->Cell(60 ,5,$row['billing_period'],1,0);
            $pdf->Cell(35 ,5,date('m/d/Y', strtotime($row['date_receive'])),1,0);
            $pdf->Cell(44 ,5,'PHP ' . number_format($row['total_amount'], 2),1,1);
            $total += $row['total_amount'];
        }
    }
    
    // Print total
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(145 ,5,'Total:',1,0);
    $pdf->Cell(44 ,5,'PHP ' . number_format($total, 2),1,1);
    
    $pdf->Output();
?>