<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_buruanga = $_POST['projectname_buruanga'];
		$barangay_buruanga = $_POST['barangay_buruanga'];
		$project_4 = $_POST['project_4'];
		$aps_buruanga = $_POST['aps_buruanga'];

		$sql = "UPDATE buruanga SET projectname_buruanga = '$projectname_buruanga', barangay_buruanga = '$barangay_buruanga', project_4 ='$project_4', aps_buruanga = '$aps_buruanga' WHERE id = '$id'";
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

	header('location: pics_pp.php');

?>