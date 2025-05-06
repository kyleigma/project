<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'] ?? 0;

    if (empty($id)) {
        $_SESSION['error'] = 'Invalid PNPKI Certificate ID.';
        header('location: pnpki.php');
        exit();
    }

    // Check if the PNPKI Certificate exists
    $stmt = $conn->prepare("SELECT id FROM pnpki WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the PNPKI Certificate
        $stmt = $conn->prepare("DELETE FROM pnpki WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = 'PNPKI Certificate deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete PNPKI Certificate: ' . $stmt->error;
        }
    } else {
        $_SESSION['error'] = 'PNPKI Certificate not found.';
    }
} else {
    $_SESSION['error'] = 'Select a PNPKI Certificate to delete first.';
}

header('location: pnpki.php');
?>