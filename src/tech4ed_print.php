

<?php
    require('assets/vendors/fpdf186/fpdf.php'); 
    include ('includes/conn.php');
    class PDF extends FPDF{
        // Page header
        function Header()
        {
            // Logox
            $this->Image('assets/images/dictlogo.png', 140, 8, 18,18);
            $this->Cell(189 ,17,'',0,1, "L");

            // Arial bold 15
            $this->SetFont('Arial','',10);
            // Title
            $this->Cell(280 ,5,'DEPARTMENT OF INFORMATION AND',0,1, "C");
            $this->Cell(280 ,5,'COMMUNICATIONS TECHNOLOGY',0,1, "C");
            $this->SetFont('Arial','',8);
            $this->Cell(280 ,5,'REGION VI, AKLAN FIELD OFFICE',0,1, "C");

            $this->Cell(280 ,5,'',0,1, "");
            // Arial bold 15
            $this->SetFont('Arial','B',12);
           
            // Title
            $this->Cell(280 ,5,'TECH4ED Centers Summary',0,1, "C");
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
	  
    
    $pdf = new PDF('L','mm','A4');
    $pdf->AddPage();
    
     $rowFont =11;
     $lineBreak = 5;
       
    
    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','',$rowFont);
    
   

    $pdf->Cell(40 ,5,'Project :',0,0);
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(40 ,5,'TECH4ED',0,1);//end of line
    
    //make a dummy empty cell as a vertical spacer
    // $pdf->Cell(189 ,10,'',0,1);//end of line
    
    
  
    $query_room = mysqli_query($conn,"SELECT t.id, t.center_name, t.center_loc, m.name AS municipality_name, t.district_no, t.status
                                                    FROM tech4ed t
                                                    INNER JOIN municipalities m ON t.municipality_id = m.id
                                                    ORDER BY t.id ASC");
  
    // //make a dummy empty cell as a vertical spacer
     $pdf->Cell(280 ,$lineBreak,'',0,1);//end of line 
    
    $pdf->SetFont('Arial','B',$rowFont);
    $pdf->Cell(10 ,5,'No',1,0, 'C');
    $pdf->Cell(70 ,5,'Center Name',1,0,'C');
    $pdf->Cell(105 ,5,'Center Location',1,0,'C');
    $pdf->Cell(50 ,5,'LGU',1,0,'C');
    $pdf->Cell(40 ,5,'District',1,1,'C');//end of line HEADER
    
    // // room CONTENT
     $pdf->SetFont('Arial','',10);
     $i = 1;
    
    while($rooms=mysqli_fetch_array($query_room)){
        $pdf->Cell(10 ,8,$i,1,0, 'C');
        $room = $rooms['center_name'];
        $desc = $rooms['center_loc'];
        $address = $rooms['municipality_name'];
        $room1 = $rooms['district_no'];
     
        
        $pdf->Cell(70 ,8,$room,1,0,'C');
        $pdf->Cell(105 ,8,$desc,1,0,'C');
        $pdf->Cell(50 ,8,$address,1,0,'C');
        $pdf->Cell(40 ,8,$room1,1,1,'C');
       
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