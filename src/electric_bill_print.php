<?php
        require('assets/vendors/fpdf186/fpdf.php'); 
        include ('includes/conn.php');
        class PDF extends FPDF{
            // Page header
            function Header()
            {
            // Logo
            $this->Image('assets/images/dictlogo.png', 145, 8, 18,18);
            $this->Cell(189 ,17,'',0,1, "L");

                // Arial bold 15
                $this->SetFont('Arial','',10,);
                // Title
                $this->Cell(189 ,5,'DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY',0,1, "R");
                $this->Cell(189 ,5,'Mabini Street, Poblacion, Kalibo, Aklan',0,1, "R");

                $this->Cell(189 ,5,'',0,1, "");
                // Arial bold 15
                $this->SetFont('Arial','B',12);
            
                // Title
                $this->Cell(189 ,5,'Electric Bill Reports',0,1, "R");
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
        
    

        $pdf->Cell(40 ,5,'AKELCO :',0,0);
        $pdf->Cell(40 ,5,'Electric Bill',0,1);//end of line
        
    
        
    
        
    
        
        //make a dummy empty cell as a vertical spacer
        // $pdf->Cell(189 ,10,'',0,1);//end of line
        
        
    
        $query_electric_bill = mysqli_query($conn,"SELECT * 
                                                        FROM electric_bill");
    
        // //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189 ,$lineBreak,'',0,1);//end of line 

        $gtcHeader = 'Generation and Transmission Charges';
        
        $pdf->SetFont('Arial','B', '7', $rowFont);
        $pdf->Cell(5 ,5,'No',1,0, 'C');
        $pdf->Cell(35 ,5,'Inclusive Months',1,0,'C');
        $pdf->Cell(25 ,5,'Date OR Received',1,0,'C');
        $pdf->Cell(30, 5, 'GTC', 1, 0, 'C');
        $pdf->Cell(19 ,5,'Usage Rate',1,0,'C');
        $pdf->Cell(28 ,5,'Distribution Revenues',1,0,'C');
        $pdf->Cell(24 ,5,'Universal Charges',1,0,'C');
        $pdf->Cell(35 ,5,'Expanded Value Added Tax',1,0,'C');
        $pdf->Cell(35 ,5,'Other Charges/Adjustments',1,0,'C');
        $pdf->Cell(14 ,5,'Annex',1,0,'C');
        $pdf->Cell(23 ,5,'Total Amount',1,1,'C');//end of line HEADER
        
        // // electric_bill CONTENT
        $pdf->SetFont('Arial','',7);
        $i = 1;
        
        while($electric_bill=mysqli_fetch_array($query_electric_bill)){
            $pdf->Cell(5 ,8,$i,1,0, 'C');
            $month_2 = $electric_bill['month_2'] . " - " . $electric_bill['month_1'];
            $date_2 = $electric_bill['date_2'];
            $gtc = $electric_bill['gtc'];
            $ur = $electric_bill['ur'];
            $dr = $electric_bill['dr'];
            $uc = $electric_bill['uc'];
            $evax = $electric_bill['evax'];
            $other_ca = $electric_bill['other_ca'];
            $annex = $electric_bill['annex'];
            $total_amount_2 = $electric_bill['total_amount_2'];

          
            $pdf->Cell(35 ,8,$month_2,1,0,'L');
            $pdf->Cell(25 ,8,$date_2,1,0,'C');
            $pdf->Cell(30 ,8,$gtc,1,0,'C');
            $pdf->Cell(19, 8,$ur,1,0,'C');
            $pdf->Cell(28, 8,$dr,1,0,'C');
            $pdf->Cell(24 ,8,$uc,1,0,'C');
            $pdf->Cell(35 ,8,$evax,1,0,'C');
            $pdf->Cell(35 ,8,$other_ca,1,0,'C');
            $pdf->Cell(14 ,8,$annex,1,0,'C');
            $pdf->Cell(23 ,8,$total_amount_2,1,1,'C');
        
            ++$i;
        }
        
        //make a dummy empty cell as a vertical spacer   ---------------------- SIGNATORIES ------------------
        $pdf->Cell(189 ,10,'',0,1);//end of line
        
        $pdf->SetFont('Arial','',$rowFont);
        $pdf->Cell(20 ,5,'Noted:',0,1, 'L');
        
        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189 ,10,'',0,1);//end of line
        
        $pdf->SetFont('Arial','B',$rowFont);
        $pdf->Cell(90 ,5,'MARVIN L. MANUEL',0,0);
        $pdf->Cell(90 ,5,'',0,1);
        $pdf->SetFont('Arial','',$rowFont);
        $pdf->Cell(90 ,5,'Provincial Officer, DICT',0,0);
        $pdf->Cell(90 ,5,'',0,0);

    



        $pdf->Output();


        

    ?>