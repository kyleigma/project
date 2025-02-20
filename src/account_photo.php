<?php
include 'includes/session.php';
include 'includes/connection.php';

if(isset($_POST['upload'])) {
    // Initialize error array
    $errors = [];
    
    // Validate ID
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    if($id === false) {
        $_SESSION['error'] = 'Invalid user ID';
        header('location: userAccounts.php');
        exit();
    }

    // Handle photo upload
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB
        
        // Validate file type and size
        if(!in_array($_FILES['photo']['type'], $allowed_types)) {
            $errors[] = "Invalid file type. Only JPG, PNG and GIF are allowed";
        } elseif($_FILES['photo']['size'] > $max_size) {
            $errors[] = "File size too large. Maximum size is 5MB";
        } else {
            // Generate unique filename
            $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $new_filename = time() . '_' . uniqid() . '.' . $file_extension;
            $target_dir = "../images/";
            $target_file = $target_dir . $new_filename;
            
            // Create directory if it doesn't exist
            if(!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            
            // Delete old photo if exists
            $sql = "SELECT photo FROM accounts WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if($row = $result->fetch_assoc()) {
                if($row['photo'] != 'default.png') {
                    $old_photo = $target_dir . $row['photo'];
                    if(file_exists($old_photo)) {
                        unlink($old_photo);
                    }
                }
            }
            $stmt->close();
            
            // Upload new photo
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                // Update database using prepared statement
                $sql = "UPDATE accounts SET photo = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $new_filename, $id);
                
                if($stmt->execute()) {
                    $_SESSION['success'] = 'Photo updated successfully';
                } else {
                    $errors[] = "Database error: " . $conn->error;
                    // Remove uploaded file if database update fails
                    if(file_exists($target_file)) {
                        unlink($target_file);
                    }
                }
                $stmt->close();
            } else {
                $errors[] = "Failed to upload photo";
            }
        }
    } else {
        $errors[] = "No photo uploaded or upload error occurred";
    }
    
    if(!empty($errors)) {
        $_SESSION['error'] = implode("<br>", $errors);
    }
} else {
    $_SESSION['error'] = 'Select photo to update first';
}

header('location: userAccounts.php');
exit();
?>