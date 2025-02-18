<?php
include 'includes/conn.php';
include 'includes/session.php';

if(isset($_POST['add'])){
    $month_1 = $_POST['month_1'];
    $date_1 = $_POST['date_1'];
    $total_amount_1 = $_POST['total_amount_1'];

    $sql = "INSERT INTO wifi_bill (month_1, date_1, total_amount_1) VALUES ('$month_1', '$date_1', '$total_amount_1')";
    if($conn->query($sql)){
        $_SESSION['success'] = 'WiFi bill added successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}

header('location: wifi_bill.php');
?>