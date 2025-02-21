<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$center_name = $_POST['center_name'];
		$center_loc = $_POST['center_loc'];
		$municipality = $_POST['municipal'];
		$district = $_POST['district_no'];

		$sql = "SELECT * FROM tech4ed ORDER BY id ASC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		
		$sql = "INSERT INTO tech4ed (center_name, center_loc, municipality_id, district_no) VALUES ('$center_name', '$center_loc','$municipality', '$district')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Tech4Ed Center added successfully!';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first.';
	}

	header('location: tech4ed.php');
?>