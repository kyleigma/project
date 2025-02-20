<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Check if the accounts exists by ID
    $stmt = $conn->prepare("SELECT id FROM accounts WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the account
        $stmt = $conn->prepare("DELETE FROM accounts WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Account deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to execute the delete query: ' . $stmt->error;
        }
    } else {
        $_SESSION['error'] = 'Account ID does not exist.';
    }

} else {
    $_SESSION['error'] = 'Select an account to delete first.';
}

header('location: accounts.php');
?>
