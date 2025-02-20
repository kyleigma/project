<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Check if the project exists by ID
    $stmt = $conn->prepare("SELECT id FROM free_wifi WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the project
        $stmt = $conn->prepare("DELETE FROM free_wifi WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Project deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to execute the delete query: ' . $stmt->error;
        }
    } else {
        $_SESSION['error'] = 'Project ID does not exist.';
    }

} else {
    $_SESSION['error'] = 'Select a project to delete first.';
}

header('location: pics_pp.php');
?>
