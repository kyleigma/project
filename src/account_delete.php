<?php
include 'includes/session.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM accounts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        $_SESSION['success'] = 'Account deleted successfully';
    } else {
        $_SESSION['error'] = 'Error deleting account';
    }
}
?>