<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_uisgida = $_POST['projectname_uisgida'];
		$barangay_uisgida = $_POST['barangay_uisgida'];
		$project_6 = $_POST['project_6'];
		$aps_uisgida = $_POST['aps_uisgida'];

		$sql = "SELECT * FROM kalibo ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO kalibo (projectname_uisgida, barangay_uisgida, project_6, aps_uisgida, priority) VALUES ('$projectname_uisgida', '$barangay_uisgida', '$project_6', '$aps_uisgida','$priority')";
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

	header('location: uisgida.php');
?>