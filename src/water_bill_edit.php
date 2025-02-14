<?php
    include 'includes/session.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $month_wb = $_POST['month_wb'];
        $date_receive = $_POST['date_receive'];
        $total_amount_wb = $_POST['total_amount_wb'];

        // Format the month_wb to YYYY-MM-DD if needed
        $month_wb = date('Y-m-d', strtotime($month_wb));

        $sql = "SELECT * FROM water_bill WHERE id = $id";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();

        $sql = "UPDATE water_bill SET month_wb = '$month_wb', date_receive = '$date_receive', total_amount_wb = '$total_amount_wb' WHERE id = '$id'";
        if($conn->query($sql)){
            $_SESSION['success'] = 'Water bill updated successfully';
        }
        else{
            $_SESSION['error'] = $conn->error;
        }
    }
    else{
        $_SESSION['error'] = 'Fill up edit form first';
    }

    header('location: water_bill.php');

?>