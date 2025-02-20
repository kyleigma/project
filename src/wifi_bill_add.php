<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$month_1 = $_POST['month_1'];
		$date_1 = $_POST['date_1'];
		$filename = $_FILES['wifi_photo']['name'];
		$total_amount_1 = $_POST['total_amount_1'];
		
		if(!empty($filename)){
			move_uploaded_file($_FILES['wifi_photo']['tmp_name'], 'assets/images/'.$filename);	
		}

		// Format the month_1 to YYYY-MM-DD if needed
		$month_1 = date('Y-m-d', strtotime($month_1));

		$sql = "INSERT INTO wifi_bill (total_amount_1, month_1, date_1, wifi_photo) VALUES ('$total_amount_1', '$month_1', '$date_1', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'WiFi bill added successfully!';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first.';
	}

	header('location: wifi_bill.php');
?>