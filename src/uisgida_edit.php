<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_uisgida = $_POST['projectname_uisgida'];
		$barangay_uisgida = $_POST['barangay_uisgida'];
		$project_6 = $_POST['project_6'];
		$aps_uisgida = $_POST['aps_uisgida'];

		$sql = "UPDATE kalibo SET projectname_uisgida = '$projectname_uisgida', barangay_uisgida = '$barangay_uisgida', project_6 = '$project_6', aps_uisgida = '$aps_uisgida' WHERE id = '$id'";
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

	header('location: uisgida.php');

?>