<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Query to fetch the data
    $sql = "SELECT * FROM accounts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode($row); // Return data for all modals
}

?>
