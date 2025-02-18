<?php
include 'includes/conn.php';
include 'includes/session.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $month_1 = $_POST['month_1'];
    $date_1 = $_POST['date_1'];
    $total_amount_1 = $_POST['total_amount_1'];

    $sql = "UPDATE wifi_bill SET month_1 = '$month_1', date_1 = '$date_1', total_amount_1 = '$total_amount_1' WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'WiFi bill updated successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}

header('location: wifi_bill.php');
?>