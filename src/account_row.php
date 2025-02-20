<?php
include 'includes/session.php';
include 'includes/connection.php';

header('Content-Type: application/json');

try {
    if(!isset($_POST['id'])) {
        throw new Exception('ID parameter is required');
    }

    // Validate and sanitize the ID
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    if($id === false) {
        throw new Exception('Invalid ID format');
    }

    // Prepare and execute the query
    $sql = "SELECT * FROM accounts WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    if(!$stmt) {
        throw new Exception('Database prepare error: ' . $conn->error);
    }

    $stmt->bind_param("i", $id);
    if(!$stmt->execute()) {
        throw new Exception('Database execute error: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    if($result->num_rows === 0) {
        throw new Exception('User not found');
    }

    $row = $result->fetch_assoc();
    
    echo json_encode([
        'success' => true,
        'data' => $row
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
} finally {
    if(isset($stmt)) {
        $stmt->close();
    }
}
?>