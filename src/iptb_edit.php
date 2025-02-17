<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $project_name = $_POST['project_name'];  // Project name is now ID from the dropdown
    $municipality = $_POST['municipality_name']; 
    $address = $_POST['address'];
    $access_point = $_POST['access_point'];  // Access point number

    // Ensure access_point is valid
    if (empty($access_point) || !is_numeric($access_point) || (int)$access_point === 0) {
        $_SESSION['error'] = 'Access Point cannot be 0 or empty';
        header('location: iptb.php');
        exit();
    }

    $access_point = (int)$access_point;  // Casting to integer to avoid issues with type comparison

    // Check if the project exists by ID
    $stmt = $conn->prepare("SELECT id FROM free_wifi_projects WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $project_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update project details
        $stmt = $conn->prepare("UPDATE free_wifi SET project_id = ?, address = ?, municipality_id = ?, access_point = ? WHERE id = ?");
        $stmt->bind_param("isiii", $project_name, $address, $municipality, $access_point, $id);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Project updated successfully';
        } else {
            $_SESSION['error'] = 'Failed to execute the update query: ' . $stmt->error;
        }
    } else {
        $_SESSION['error'] = 'Project ID does not exist';
    }

} else {
    $_SESSION['error'] = 'Fill up the edit form first';
}

header('location: iptb.php');
?>
