<?php
session_start();

try {
    include 'includes/conn.php'; // Database connection file
    
    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Please enter both username and password';
            header('Location: loginpage.php');
            exit;
        }

        // Check in admin table first
        $sql_admin = "SELECT * FROM admin WHERE username = ?";
        $stmt_admin = $conn->prepare($sql_admin);
        if (!$stmt_admin) {
            throw new Exception('Failed to prepare admin statement: ' . $conn->error);
        }

        $stmt_admin->bind_param("s", $username);
        if (!$stmt_admin->execute()) {
            throw new Exception('Failed to execute admin query: ' . $stmt_admin->error);
        }

        $result_admin = $stmt_admin->get_result();
        if ($result_admin->num_rows > 0) {
            $row = $result_admin->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin'] = $row['id'];
                $stmt_admin->close();
                header('Location: home.php');
                exit;
            } else {
                $_SESSION['error'] = 'Incorrect password';
                $stmt_admin->close();
                header('Location: loginpage.php');
                exit;
            }
        }
        $stmt_admin->close();

        // Check in user table
        $sql_user = "SELECT * FROM user WHERE username = ?";
        $stmt_user = $conn->prepare($sql_user);
        if (!$stmt_user) {
            throw new Exception('Failed to prepare user statement: ' . $conn->error);
        }

        $stmt_user->bind_param("s", $username);
        if (!$stmt_user->execute()) {
            throw new Exception('Failed to execute user query: ' . $stmt_user->error);
        }

        $result_user = $stmt_user->get_result();
        if ($result_user->num_rows > 0) {
            $row = $result_user->fetch_assoc();
            if ($password == $row['password']) {
                $_SESSION['user'] = $row['id'];
                $stmt_user->close();
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['error'] = 'Incorrect username or password';
                $stmt_user->close();
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
} catch (Exception $e) {
    $_SESSION['error'] = 'System error: ' . $e->getMessage();
    header('Location: loginpage.php');
    exit;
}
?>
