<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_vsat_undp_core = $_POST['projectname_vsat_undp_core'];
		$barangay_vsat_undp_core = $_POST['barangay_vsat_undp_core'];
		$project_7 = $_POST['project_7'];
		$aps_vsat_undp_core = $_POST['aps_vsat_undp_core'];

		$sql = "UPDATE lezo SET projectname_vsat_undp_core = '$projectname_vsat_undp_core', barangay_vsat_undp_core = '$barangay_vsat_undp_core', project_7 = '$project_7', aps_vsat_undp_core = '$aps_vsat_undp_core' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project Name updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: vsat_undp_core.php');

?>