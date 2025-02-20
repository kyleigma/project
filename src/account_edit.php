<?php
include 'includes/session.php';
include 'includes/connection.php';

if(isset($_POST['edit'])) {
    // Initialize error array
    $errors = [];
    
    // Validate and sanitize inputs
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
    $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $password = trim($_POST['password']);
    $role = filter_var(trim($_POST['role']), FILTER_SANITIZE_STRING);
    
    // Validation checks
    if(empty($firstname)) $errors[] = "First name is required";
    if(empty($lastname)) $errors[] = "Last name is required";
    if(empty($username)) $errors[] = "Username is required";
    if(empty($role)) $errors[] = "Role is required";
    
    // Username uniqueness check (excluding current user)
    $check_sql = "SELECT username FROM accounts WHERE username = ? AND id != ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("si", $username, $id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if($result->num_rows > 0) {
        $errors[] = "Username already exists";
    }
    $check_stmt->close();
    
    if(empty($errors)) {
        if(!empty($password)) {
            // Update with new password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE accounts SET username=?, password=?, firstname=?, lastname=?, role=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $username, $hashed_password, $firstname, $lastname, $role, $id);
        } else {
            // Update without changing password
            $sql = "UPDATE accounts SET username=?, firstname=?, lastname=?, role=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $username, $firstname, $lastname, $role, $id);
        }
        
        if($stmt->execute()) {
            if($stmt->affected_rows > 0) {
                $_SESSION['success'] = 'User information updated successfully';
            } else {
                $_SESSION['error'] = 'No changes made or user not found';
            }
        } else {
            $_SESSION['error'] = 'Database error: ' . $conn->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
} else {
    $_SESSION['error'] = 'Fill up edit form first';
}

header('location: userAccounts.php');
exit();
?>