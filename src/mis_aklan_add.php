<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_balete = $_POST['projectname_balete'];
		$locality_balete = $_POST['locality_balete'];
		$address_project = $_POST['address_project'];
		$aps_balete = $_POST['aps_balete'];

		$sql = "SELECT * FROM balete ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO balete (projectname_balete, locality_balete, address_project, aps_balete, priority) VALUES ('$projectname_balete', '$locality_balete', '$address_project', '$aps_balete',$priority)";
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

	header('location: mis_aklan.php');
?>