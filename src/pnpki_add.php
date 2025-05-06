<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $application_type = $_POST['application_type'] ?? '';
    $agency = $_POST['agency'] ?? '';
    $address = $_POST['address'] ?? '';
    $municipality_id = $_POST['municipality_id'] ?? 0;
    $status = 'active'; // Set default status as active

    // Validate required fields
    if (empty($application_type) || empty($agency) || empty($address) || empty($municipality_id)) {
        $_SESSION['error'] = 'All fields are required for PNPKI Certificate!';
        header('location: pnpki.php');
        exit();
    }

    // Validate application type
    if (!in_array($application_type, ['individual', 'organization'])) {
        $_SESSION['error'] = 'Invalid PNPKI Certificate type!';
        header('location: pnpki.php');
        exit();
    }

    // Insert into pnpki table
    $stmt = $conn->prepare("INSERT INTO pnpki (application_type, agency, address, municipality_id, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $application_type, $agency, $address, $municipality_id, $status);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = 'PNPKI Certificate added successfully!';
    } else {
        $_SESSION['error'] = 'Error adding PNPKI Certificate: ' . $stmt->error;
    }
} else {
    $_SESSION['error'] = 'Please fill up all required fields for PNPKI Certificate!';
}

header('location: pnpki.php');
?>