<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$projectname_altavas = $_POST['projectname_altavas'];
		$locality_altavas = $_POST['locality_altavas'];
		$address_project = $_POST['address_project'];
		$aps_altavas = $_POST['aps_altavas'];

		$sql = "SELECT * FROM altavas ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO altavas (projectname_altavas, locality_altavas,address_project, aps_altavas, priority) VALUES ('$projectname_altavas', '$locality_altavas','$address_project', '$aps_altavas','$priority')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project Name added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: iptb.php');
?>