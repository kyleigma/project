<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'] ?? '';
    $project_id = $_POST['project_name'] ?? '';
    $municipality_id = $_POST['municipality_name'] ?? '';
    $address = $_POST['address'] ?? '';
    $access_point = $_POST['access_point'] ?? '';
    $status = $_POST['status'] ?? '';

    $prev_id = $_POST['prev_id'] ?? ''; // Retrieve prev_id from hidden field

    // Validation Checks
    if (empty($status)) {
        $_SESSION['error'] = 'Status field is required!';
    } elseif (empty($access_point) || (int)$access_point === 0) {
        $_SESSION['error'] = 'Access Point cannot be 0.';
    } else {
        // Prepare Update Query
        $stmt = $conn->prepare("UPDATE free_wifi SET project_id = ?, address = ?, municipality_id = ?, access_point = ?, status = ? WHERE id = ?");
        $stmt->bind_param("isiisi", $project_id, $address, $municipality_id, $access_point, $status, $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'Project updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update project: ' . $stmt->error;
        }
    }
}

// Redirect to the correct municipality page
$redirect_url = "free_wifi_municipalities.php" . (!empty($prev_id) ? "?id=$prev_id" : "");
header("Location: $redirect_url");
exit();
?>
