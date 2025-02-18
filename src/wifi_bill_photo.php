<?php
include 'includes/conn.php';
include 'includes/session.php';

if(isset($_POST['upload'])){
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];
    
    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/images/'.$filename);    
    }
    
    $sql = "UPDATE wifi_bill SET wifi_photo = '$filename' WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'WiFi bill photo updated successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}

header('location: wifi_bill.php');
?>