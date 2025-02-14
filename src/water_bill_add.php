<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$month_wb = $_POST['month_wb'];
		$date_receive = $_POST['date_receive'];
		$filename = $_FILES['w_photo']['name'];
		$total_amount_wb = $_POST['total_amount_wb'];
		
		if(!empty($filename)){
			move_uploaded_file($_FILES['w_photo']['tmp_name'], 'assets/images/'.$filename);	
		}

		// Format the month_wb to YYYY-MM-DD if needed
		$month_wb = date('Y-m-d', strtotime($month_wb));

		$sql = "INSERT INTO water_bill (total_amount_wb, month_wb, date_receive, w_photo) VALUES ('$total_amount_wb', '$month_wb', '$date_receive', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Water bill added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: water_bill.php');
?>