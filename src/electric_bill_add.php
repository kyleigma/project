<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$month_2 = $_POST['month_2'];
		$month_1 = $_POST['month_1'];
		$date_2 = $_POST['date_2'];
		$gtc = $_POST['gtc'];
		$ur = $_POST['ur'];
		$dr = $_POST['dr'];
		$uc = $_POST['uc'];
		$evax = $_POST['evax'];
		$other_ca = $_POST['other_ca'];
		$filename = $_FILES['e_photo']['name'];
		$annex = $_POST['annex'];
		$total_amount_2 = $gtc + $dr  + $uc  + $evax  + $other_ca  + $annex;
		
		if(!empty($filename)){
			move_uploaded_file($_FILES['e_photo']['tmp_name'], 'assets/images/'.$filename);	
		}

		$sql = "INSERT INTO electric_bill (total_amount_2, month_2, month_1, date_2, gtc, ur, dr, uc, evax, other_ca, e_photo, annex) VALUES ('$total_amount_2', '$month_2', '$month_1', '$date_2', '$gtc', '$ur', '$dr', '$uc', '$evax', '$other_ca', '$filename', '$annex')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Electric bill added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: electric_bill.php');
?>