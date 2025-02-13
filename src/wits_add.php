<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_wits = $_POST['projectname_wits'];
		$barangay_wits = $_POST['barangay_wits'];
		$project_8 = $_POST['project_8'];
		$aps_wits = $_POST['aps_wits'];

		$sql = "SELECT * FROM libacao ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO libacao (projectname_wits, barangay_wits, project_8, aps_wits, priority) VALUES ('$projectname_wits', '$barangay_wits','$project_8', '$aps_wits','$priority')";
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

	header('location: wits.php');
?>