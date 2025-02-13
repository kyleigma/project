<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$projectname_altavas = $_POST['projectname_altavas'];
		$locality_altavas = $_POST['locality_altavas'];
		$address_project = $_POST['address_project'];
		$aps_altavas = $_POST['aps_altavas'];

		$sql = "UPDATE altavas SET projectname_altavas = '$projectname_altavas', locality_altavas = '$locality_altavas', address_project = '$address_project', aps_altavas = '$aps_altavas' WHERE id = '$id'";
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

	header('location: iptb.php');

?>