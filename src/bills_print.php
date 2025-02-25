

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
            // Logox
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
        $filter_text .= ' (' . date('M d, Y', strtotime($date_from)) . ' - ' . date('M d, Y', strtotime($date_to)) . ')';
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
        $sql_electric .= " WHERE month_1 BETWEEN '$date_from' AND '$date_to'";
        $sql_water .= " WHERE month_wb BETWEEN '$date_from' AND '$date_to'";
        $sql_wifi .= " WHERE month_1 BETWEEN '$date_from' AND '$date_to'";
    }

    // Combine queries based on bill type filter
    if($bill_type == 'all') {
        $sql = "($sql_electric) UNION ALL ($sql_water) UNION ALL ($sql_wifi)";
    } else {
        switch($bill_type) {
            case 'electricity':
                $sql = $sql_electric;
                break;
            case 'water':
                $sql = $sql_water;
                break;
            case 'wifi':
                $sql = $sql_wifi;
                break;
            default:
                $sql = "($sql_electric) UNION ALL ($sql_water) UNION ALL ($sql_wifi)";
        }
    }

    $sql .= " ORDER BY date_receive DESC";
    $query_room = mysqli_query($conn, $sql);
    
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(10 ,5,'No',1,0, 'C');
    $pdf->Cell(40 ,5,'Bill Type',1,0,'C');
    $pdf->Cell(60 ,5,'Billing Period',1,0,'C');
    $pdf->Cell(40,5,'Date OR Receive',1,0,'C');
    $pdf->Cell(40 ,5,'Total Amount',1,1,'C');
    
    $pdf->SetFont('Arial','',10);
    $i = 1;
    $total_amount = 0;

    while($rooms=mysqli_fetch_array($query_room)){
        $pdf->Cell(10 ,8,$i,1,0, 'C');
        $pdf->Cell(40 ,8,$rooms['bill_type'],1,0,'C');
        $pdf->Cell(60 ,8,$rooms['billing_period'],1,0,'C');
        $pdf->Cell(40 ,8,$rooms['date_receive'],1,0,'C');
        $pdf->Cell(40 ,8,number_format($rooms['total_amount'], 2),1,1,'C');
        
        $total_amount += $rooms['total_amount'];
        ++$i;
    }
    
    // Add total row
    $pdf->SetFont('Arial','',$rowFont);
    $pdf->Cell(150 ,8,'Total Amount: ',0,0,'R');
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(40 ,8,number_format($total_amount, 2),0,1,'C');
    
    // Draw outer border for total row
    $pdf->Line($pdf->GetX(), $pdf->GetY()-8, $pdf->GetX()+190, $pdf->GetY()-8);
    $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX()+190, $pdf->GetY());
    $pdf->Line($pdf->GetX(), $pdf->GetY()-8, $pdf->GetX(), $pdf->GetY());
    $pdf->Line($pdf->GetX()+190, $pdf->GetY()-8, $pdf->GetX()+190, $pdf->GetY());
       
    $pdf->Cell(189 ,10,'',0,1);
    
    $pdf->SetFont('Arial','',$rowFont);
    $pdf->Cell(20 ,5,'Prepared by:',0,1, 'L');
    
    $pdf->Cell(189 ,10,'',0,1);
    
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(90 ,5,'DICT Student-Interns',0,0);
    $pdf->Cell(90 ,5,'',0,1);

    $pdf->Output();
?>