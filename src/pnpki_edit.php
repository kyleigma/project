<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'] ?? 0;
    $application_type = $_POST['application_type'] ?? '';
    $agency = $_POST['agency'] ?? '';
    $address = $_POST['address'] ?? '';
    $municipality_id = $_POST['municipality_id'] ?? 0;
    $status = $_POST['status'] ?? '';

    // Validate required fields
    if (empty($application_type) || empty($agency) || empty($address) || empty($municipality_id) || empty($status)) {
        $_SESSION['error'] = 'All fields are required for PNPKI Certificate!';
        header('location: pnpki.php');
        exit();
    }

    // Check if the PNPKI Certificate exists
    $stmt = $conn->prepare("SELECT id FROM pnpki WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Validate application type and status
        if (!in_array($application_type, ['individual', 'organization'])) {
            $_SESSION['error'] = 'Invalid PNPKI Certificate type!';
            header('location: pnpki.php');
            exit();
        }

        if (!in_array($status, ['active', 'inactive'])) {
            $_SESSION['error'] = 'Invalid PNPKI Certificate status!';
            header('location: pnpki.php');
            exit();
        }

        // Update the PNPKI record
        $stmt = $conn->prepare("UPDATE pnpki SET application_type = ?, agency = ?, address = ?, municipality_id = ?, status = ? WHERE id = ?");
        $stmt->bind_param("sssisi", $application_type, $agency, $address, $municipality_id, $status, $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'PNPKI Certificate updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update PNPKI Certificate: ' . $stmt->error;
        }
    } else {
        $_SESSION['error'] = 'PNPKI Certificate not found.';
    }

} else {
    $_SESSION['error'] = 'Fill up the edit form first for PNPKI Certificate!';
}

header('location: pnpki.php');
?>