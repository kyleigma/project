<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM tech4ed WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Tech4Ed Center deleted successfully!';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first.';
	}

	header('location: tech4ed.php');
	
?>