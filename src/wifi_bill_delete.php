<?php
include 'includes/conn.php';
include 'includes/session.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $sql = "DELETE FROM wifi_bill WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'WiFi bill deleted successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}

header('location: wifi_bill.php');
?>