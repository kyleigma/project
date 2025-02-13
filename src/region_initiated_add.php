<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_ibajay = $_POST['projectname_ibajay'];
		$barangay_ibajay = $_POST['barangay_ibajay'];
		$project_5 = $_POST['project_5'];
		$aps_ibajay = $_POST['aps_ibajay'];

		$sql = "SELECT * FROM ibajay ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO ibajay (projectname_ibajay, barangay_ibajay, project_5, aps_ibajay, priority) VALUES ('$projectname_ibajay', '$barangay_ibajay','$project_5', '$aps_ibajay','$priority')";
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

	header('location: region_initiated.php');
?>