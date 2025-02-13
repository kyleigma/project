<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_buruanga = $_POST['projectname_buruanga'];
		$barangay_buruanga = $_POST['barangay_buruanga'];
		$project_4 = $_POST['project_4'];
		$aps_buruanga = $_POST['aps_buruanga'];

		$sql = "SELECT * FROM buruanga ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO buruanga (projectname_buruanga, barangay_buruanga, project_4, aps_buruanga, priority) VALUES ('$projectname_buruanga', '$barangay_buruanga','$project_4', '$aps_buruanga','$priority')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project Name added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: pics_pp.php');
?>