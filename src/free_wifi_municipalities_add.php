<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $project_id = $_POST['project_name'];
    $municipality_id = $_POST['municipality_name'];
    $address = $_POST['address'];
    $access_point = $_POST['access_point'];
    $status = $_POST['status'];
    $prev_id = $_POST['prev_id'] ?? '';

    // Validate Project ID
    $sql = "SELECT * FROM free_wifi_projects WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['error'] = "Selected project does not exist.";
        header("Location: index.php");
        exit();
    }

    // Validate Municipality ID
    $sql = "SELECT * FROM municipalities WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $municipality_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['error'] = "Selected municipality does not exist.";
        header("Location: index.php");
        exit();
    }

    // Insert data into the database
    $sql = "INSERT INTO free_wifi (project_id, municipality_id, address, access_point, status) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisis", $project_id, $municipality_id, $address, $access_point, $status);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Project added successfully!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }

    // Redirect based on prev_id
    header("Location: free_wifi_municipalities.php" . ($prev_id ? "?id=$prev_id" : ""));
    exit();
}
?>
