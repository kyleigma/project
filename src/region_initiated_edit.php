<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_ibajay = $_POST['projectname_ibajay'];
		$barangay_ibajay = $_POST['barangay_ibajay'];
		$project_5 = $_POST['project_5'];
		$aps_ibajay = $_POST['aps_ibajay'];

		$sql = "UPDATE ibajay SET projectname_ibajay = '$projectname_ibajay', barangay_ibajay = '$barangay_ibajay', project_5 = '$project_5', aps_ibajay = '$aps_ibajay' WHERE id = '$id'";
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

	header('location: region_initiated.php');

?>