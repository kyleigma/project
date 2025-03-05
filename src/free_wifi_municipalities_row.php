<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM free_wifi WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $query = $stmt->get_result();
    $row = $query->fetch_assoc();

    echo json_encode($row);
}
?>
