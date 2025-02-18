<?php
    require('assets/vendors/fpdf186/fpdf.php'); 
    include ('includes/conn.php');
    
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
            $this->Cell(189 ,5,'WiFi Bill Report',0,1, "C");
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
    
    $pdf->Cell(40 ,5,'Utility :',0,0);
    $pdf->Cell(40 ,5,'WiFi Bill',0,1);//end of line
    
    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189 ,$lineBreak,'',0,1);//end of line 
    
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(10 ,5,'No',1,0, 'C');
    $pdf->Cell(35 ,5,'Month',1,0,'C');
    $pdf->Cell(35 ,5,'Date OR Receive',1,0,'C');
    $pdf->Cell(55 ,5,'Picture Attachment',1,0,'C');
    $pdf->Cell(50 ,5,'Total Amount',1,1,'C');//end of line HEADER
    
    // Content
    $pdf->SetFont('Arial','',10);
    $i = 1;
    
    $query_wifi = mysqli_query($conn,"SELECT * FROM wifi_bill");
    
    while($wifi = mysqli_fetch_array($query_wifi)){
        $pdf->Cell(10 ,8,$i,1,0, 'C');
        $month = $wifi['month_1'];
        $date = $wifi['date_1'];
        $photo = $wifi['wifi_photo'];
        $amount = $wifi['total_amount_1'];
     
        $pdf->Cell(35 ,8,$month,1,0,'L');
        $pdf->Cell(35 ,8,$date,1,0,'L');
        $pdf->Cell(55 ,8,$photo,1,0,'L');
        $pdf->Cell(50 ,8,number_format($amount,2),1,1,'L');
        $i++;
    }

    $pdf->Output();
?>