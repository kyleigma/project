<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_vsat_undp_core = $_POST['projectname_vsat_undp_core'];
		$barangay_vsat_undp_core = $_POST['barangay_vsat_undp_core'];
		$project_7 = $_POST['project_7'];
		$aps_vsat_undp_core = $_POST['aps_vsat_undp_core'];

		$sql = "SELECT * FROM lezo ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO lezo (projectname_vsat_undp_core, barangay_vsat_undp_core, project_7, aps_vsat_undp_core, priority) VALUES ('$projectname_vsat_undp_core', '$barangay_vsat_undp_core','$project_7', '$aps_vsat_undp_core','$priority')";
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

	header('location: vsat_undp_core.php');
?>