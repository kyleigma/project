<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $project_name = $_POST['project_name'];
    $municipality = $_POST['municipality_name'];
    $address = $_POST['address'];
    $access_point = (int)$_POST['access_point'];

    if ($access_point === 0) {
        $_SESSION['error'] = 'Access Point cannot be 0.';
        header('location: vsat_undp_core.php');
        exit();
    }

    // Check if the project name exists and get its ID
    $stmt = $conn->prepare("SELECT id FROM free_wifi_projects WHERE name = ? LIMIT 1");
    $stmt->bind_param("s", $project_name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($project_id);
        $stmt->fetch();

        // Set default status as 'active'
        $status = 'active';

        // Insert into free_wifi table
        $stmt = $conn->prepare("INSERT INTO free_wifi (project_id, address, municipality_id, access_point, status) 
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isiss", $project_id, $address, $municipality, $access_point, $status);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Project added successfully!';
        } else {
            $_SESSION['error'] = $stmt->error;
        }
    } else {
        $_SESSION['error'] = 'Project Name does not exist!';
    }
} else {
    $_SESSION['error'] = 'Fill up the form first.';
}

header('location: vsat_undp_core.php');
?>
