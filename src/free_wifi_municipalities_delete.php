<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'] ?? '';
    $prev_id = $_POST['prev_id'] ?? ''; // Retrieve prev_id from hidden field

    if (!empty($id)) {
        // Check if the project exists before deleting
        $stmt = $conn->prepare("SELECT id FROM free_wifi WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            // Proceed with deletion
            $stmt = $conn->prepare("DELETE FROM free_wifi WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                $_SESSION['success'] = 'Project deleted successfully!';
            } else {
                $_SESSION['error'] = 'Failed to delete: ' . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['error'] = 'Project ID does not exist.';
        }
    } else {
        $_SESSION['error'] = 'Invalid Project ID.';
    }
}

// Redirect to the correct municipality page
$redirect_url = "free_wifi_municipalities.php" . (!empty($prev_id) ? "?id=$prev_id" : "");
header("Location: $redirect_url");
exit();
?>
