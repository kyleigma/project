

<?php
    require('assets/vendors/fpdf186/fpdf.php'); 
    include ('includes/conn.php');
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
            $this->Cell(189 ,5,'Free Wi-Fi Project Summary',0,1, "C");
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
    
     $rowFont =11;
     $lineBreak = 1;
       
    
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','',$rowFont);
    
   

    $pdf->Cell(40 ,5,'Project :',0,0);
    $pdf->Cell(40 ,5,'Free WiFi For All',0,1);//end of line
    
    //make a dummy empty cell as a vertical spacer
    // $pdf->Cell(189 ,10,'',0,1);//end of line
    
    
  
    $query_room = mysqli_query($conn,"SELECT * FROM buruanga ORDER BY priority ASC");
  
    // //make a dummy empty cell as a vertical spacer
     $pdf->Cell(189 ,$lineBreak,'',0,1);//end of line 
    
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(10 ,5,'No',1,0, 'C');
    $pdf->Cell(35 ,5,'Project Name',1,0,'C');
    $pdf->Cell(95 ,5,'Location',1,0,'C');
    $pdf->Cell(35 ,5,'Address',1,0,'C');
    $pdf->Cell(10 ,5,'APs',1,1,'C');//end of line HEADER
    
    // // room CONTENT
     $pdf->SetFont('Arial','',10);
     $i = 1;
    
    while($rooms=mysqli_fetch_array($query_room)){
        $pdf->Cell(10 ,8,$i,1,0, 'C');
        $room = $rooms['projectname_buruanga'];
        $desc = $rooms['barangay_buruanga'];
        $address = $rooms['project_4'];
        $room1 = $rooms['aps_buruanga'];
     
        
        $pdf->Cell(35 ,8,$room,1,0,'L');
        $pdf->Cell(95 ,8,$desc,1,0,'L');
        $pdf->Cell(35 ,8,$address,1,0,'L');
        $pdf->Cell(10 ,8,$room1,1,1,'L');
       
        ++$i;
    }
       
    //make a dummy empty cell as a vertical spacer   ---------------------- SIGNATORIES ------------------
    $pdf->Cell(189 ,10,'',0,1);//end of line
    
    $pdf->SetFont('Arial','',$rowFont);
    $pdf->Cell(20 ,5,'Prepared by:',0,1, 'L');
    
    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189 ,10,'',0,1);//end of line
    
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(90 ,5,'DICT Student-Interns',0,0);
    $pdf->Cell(90 ,5,'',0,1);
    // $pdf->SetFont('Arial','',$rowFont);
    // $pdf->Cell(90 ,5,'Chairperson, Computer Science Program',0,0);
    // $pdf->Cell(90 ,5,'',0,0);

    $pdf->Output();


	

?>