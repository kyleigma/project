<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_batan = $_POST['projectname_batan'];
		$barangay_batan = $_POST['barangay_batan'];
		$project_2 = $_POST['project_2'];
		$aps_batan = $_POST['aps_batan'];

		$sql = "UPDATE batan SET projectname_batan = '$projectname_batan', barangay_batan = '$barangay_batan', project_2 = '$project_2', aps_batan = '$aps_batan' WHERE id = '$id'";
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

	header('location: municipal.php');

?>