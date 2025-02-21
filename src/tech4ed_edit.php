<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$center_name = $_POST['center_name'];
		$center_loc = $_POST['center_loc'];
		$municipal = $_POST['municipal'];
		$district = $_POST['district_no'];

		$sql = "UPDATE tech4ed SET center_name = '$center_name', center_loc = '$center_loc', municipality_id = '$municipal', district_no = '$district' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Tech4Ed Center updated successfully!';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first.';
	}

	header('location: tech4ed.php');

?>