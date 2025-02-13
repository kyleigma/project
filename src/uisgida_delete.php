<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM kalibo WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project Name deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: uisgida.php');
	
?>