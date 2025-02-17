<?php
session_start();
include 'includes/conn.php'; // Database connection file

/**
 * Admin Login Script
 * 
 * This script handles admin authentication by verifying the username and password
 * against the database. If credentials are valid, the admin is redirected to the home page.
 * Otherwise, appropriate error messages are set in session and the user is redirected back to login.
 */


if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check in admin table first
    $sql_admin = "SELECT * FROM admin WHERE username = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
        $row = $result_admin->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $row['id'];
            header('Location: home.php'); // Redirect to admin dashboard
            exit;
        } else {
            $_SESSION['error'] = 'Incorrect password';
            header('Location: loginpage.php');
            exit;
        }
    }
    $stmt_admin->close();

    // Check in user table
    $sql_user = "SELECT * FROM user WHERE username = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("s", $username);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows > 0) {
        $row = $result_user->fetch_assoc();
        if ($password == $row['password']) { // Consider hashing user passwords for security
            $_SESSION['user'] = $row['id'];
            header('Location: index.php'); // Redirect to user dashboard
            exit;
        } else {
            $_SESSION['error'] = 'Incorrect username or password';
            header('Location: loginpage.php');
            exit;
        }
    }
    $stmt_user->close();

    // If no match was found
    $_SESSION['error'] = 'Cannot find an account with the given username';
    header('Location: loginpage.php');
    exit;
} else {
    $_SESSION['error'] = 'Please enter your credentials';
    header('Location: loginpage.php');
    exit;
}
?>
