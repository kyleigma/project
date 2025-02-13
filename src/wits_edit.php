<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_wits = $_POST['projectname_wits'];
		$barangay_wits = $_POST['barangay_wits'];
		$project_8 = $_POST['project_8'];
		$aps_wits = $_POST['aps_wits'];

		$sql = "UPDATE libacao SET projectname_wits = '$projectname_wits', barangay_wits = '$barangay_wits', project_8 = '$project_8', aps_wits = '$aps_wits' WHERE id = '$id'";
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

	header('location: wits.php');

?>