<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_batan = $_POST['projectname_batan'];
		$barangay_batan = $_POST['barangay_batan'];
		$projetc_2 = $_POST['project_2'];
		$aps_batan = $_POST['aps_batan'];

		$sql = "SELECT * FROM batan ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO batan (projectname_batan, barangay_batan, project_2, aps_batan, priority) VALUES ('$projectname_batan', '$barangay_batan', '$project_2', '$aps_batan','$priority')";
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

	header('location: municipal.php');
?>