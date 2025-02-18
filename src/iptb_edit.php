<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'] ?? 0;
    $project_name = $_POST['project_name']; 
    $municipality = $_POST['municipality_name']; 
    $address = $_POST['address'];
    $access_point = $_POST['access_point'];  
    $status = $_POST['status'] ?? '';  

    // Debugging: Check if form data is received properly
    if (empty($status)) {
        $_SESSION['error'] = 'Status field is required!';
        header('location: iptb.php');
        exit();
    }

    if (empty($access_point) || !is_numeric($access_point) || (int)$access_point === 0) {
        $_SESSION['error'] = 'Access Point cannot be 0 or empty.';
        header('location: iptb.php');
        exit();
    }

    $access_point = (int)$access_point;  

    // Check if the project ID exists
    $stmt = $conn->prepare("SELECT id FROM free_wifi_projects WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $project_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ensure status is being passed correctly
        if (!in_array($status, ['active', 'inactive'])) {
            $_SESSION['error'] = 'Invalid status selected.';
            header('location: iptb.php');
            exit();
        }

        // Corrected binding types (isiisi)
        $stmt = $conn->prepare("UPDATE free_wifi SET project_id = ?, address = ?, municipality_id = ?, access_point = ?, status = ? WHERE id = ?");
        $stmt->bind_param("isiisi", $project_name, $address, $municipality, $access_point, $status, $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'Project updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update project: ' . $stmt->error;
        }
    } else {
        $_SESSION['error'] = 'Project ID does not exist.';
    }

} else {
    $_SESSION['error'] = 'Fill up the edit form first.';
}

header('location: iptb.php');
?>
