<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_balete = $_POST['projectname_balete'];
		$locality_balete = $_POST['locality_balete'];
		$address_project = $_POST['address_project'];
		$aps_balete = $_POST['aps_balete'];

		$sql = "UPDATE balete SET projectname_balete = '$projectname_balete', locality_balete = '$locality_balete', address_project = '$address_project', aps_balete = '$aps_balete' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Locality updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: mis_aklan.php');

?>