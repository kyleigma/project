<?php
include 'includes/session.php';
include 'includes/connection.php';

if(isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $role = $_POST['role'];
    
    $sql = "INSERT INTO accounts (username, password, firstname, lastname, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $password, $firstname, $lastname, $role);
    
    if($stmt->execute()) {
        $_SESSION['success'] = 'Account added successfully';
    } else {
        $_SESSION['error'] = 'Error adding account';
    }
    
    header('location: accounts.php');
    exit();
}

if(isset($_POST['username'])) {
    // Initialize error array
    $errors = [];
    
    // Validate and sanitize inputs
    $firstname = filter_var(trim($_POST['firstname']));
    $lastname = filter_var(trim($_POST['lastname']));
    $username = filter_var(trim($_POST['username']));
    $password = trim($_POST['password']);
    $role = filter_var(trim($_POST['role']));
    
    // Validation checks
    if(empty($firstname)) $errors[] = "First name is required";
    if(empty($lastname)) $errors[] = "Last name is required";
    if(empty($username)) $errors[] = "Username is required";
    if(empty($password)) $errors[] = "Password is required";
    if(empty($role)) $errors[] = "Role is required";
    
    // Username uniqueness check
    $check_sql = "SELECT username FROM accounts WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if($result->num_rows > 0) {
        $errors[] = "Username already exists";
    }
    $check_stmt->close();
    
    // Handle photo upload
    $photo = "default.png";
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB
        
        if(!in_array($_FILES['photo']['type'], $allowed_types)) {
            $errors[] = "Invalid file type. Only JPG, PNG and GIF are allowed";
        } elseif($_FILES['photo']['size'] > $max_size) {
            $errors[] = "File size too large. Maximum size is 5MB";
        } else {
            $photo = time() . '_' . basename($_FILES['photo']['name']);
            $target_dir = "../images/";
            $target_file = $target_dir . $photo;
            
            if(!move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                $errors[] = "Failed to upload photo";
                $photo = "default.png";
            }
        }
    }
    
    if(empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user
        $sql = "INSERT INTO accounts (firstname, lastname, username, password, photo, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $firstname, $lastname, $username, $hashed_password, $photo, $role);
        
        if($stmt->execute()) {
            $_SESSION['success'] = 'New user added successfully';
        } else {
            $_SESSION['error'] = 'Database error: ' . $conn->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM accounts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($row = $result->fetch_assoc()) {
        $response = array(
            'success' => true,
            'data' => $row
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'User not found'
        );
    }
    
    echo json_encode($response);
}

header('location: accounts.php');
exit();
?>