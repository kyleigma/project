<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_banga = $_POST['projectname_banga'];
		$barangay_banga = $_POST['barangay_banga'];
		$project_3= $_POST['project_3'];
		$aps_banga = $_POST['aps_banga'];

		$sql = "UPDATE banga SET projectname_banga = '$projectname_banga', barangay_banga = '$barangay_banga', project_3 = '$project_3', aps_banga = '$aps_banga' WHERE id = '$id'";
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

	header('location: pialeos.php');

?>