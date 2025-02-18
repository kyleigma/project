<?php
    include 'includes/session.php';

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "SELECT f.*, p.name AS project_name, p.id AS project_id
                FROM free_wifi f
                LEFT JOIN free_wifi_projects p ON f.project_id = p.id
                WHERE f.id = '$id'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();

        echo json_encode($row);
    }
?>
