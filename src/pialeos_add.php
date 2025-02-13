<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_banga = $_POST['projectname_banga'];
		$barangay_banga = $_POST['barangay_banga'];
		$project_3= $_POST['project_3'];
		$aps_banga = $_POST['aps_banga'];

		$sql = "SELECT * FROM banga ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO banga (projectname_banga, barangay_banga, project_3, aps_banga, priority) VALUES ('$projectname_banga', '$barangay_banga', '$project_3', '$aps_banga','$priority')";
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

	header('location: pialeos.php');
?>