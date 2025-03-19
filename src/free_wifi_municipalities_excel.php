<?php
    require_once 'includes/conn.php';

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("No municipality selected!");
    }

    $municipality_id = (int)$_GET['id'];

    // Get municipality name
    $stmt = $conn->prepare("SELECT name FROM municipalities WHERE id = ?");
    $stmt->bind_param("i", $municipality_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $municipality = $result->fetch_assoc();
    $municipality_name = $municipality['name'];

    header("Content-Type: application/vnd.ms-excel");    
    header("Content-Disposition: attachment; filename=Free_Wifi_".str_replace(' ', '_', $municipality_name).".xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $output = "";

    $output .= "
        <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
            <tr>
                <td colspan='6' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
                    DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
                    REGION VI AKLAN FIELD OFFICE<br><br>
                    <strong>Free WiFi Municipalities Report</strong><br>
                    Municipality: ".$municipality_name."
                </td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;'>
            <thead>
                <tr>
                    <th style='border: 1px solid black; padding: 5px;'>No.</th>
                    <th style='border: 1px solid black; padding: 5px;'>Project Name</th>
                    <th style='border: 1px solid black; padding: 5px;'>Municipality</th>
                    <th style='border: 1px solid black; padding: 5px;'>Address</th>
                    <th style='border: 1px solid black; padding: 5px;'>APs</th>
                    <th style='border: 1px solid black; padding: 5px;'>Status</th>
                </tr>
            </thead>
            <tbody>
    ";

    $sql = "SELECT fw.id, fw.address, fw.access_point, m.name AS municipality_name,
            fp.name AS project_name, fw.status
            FROM free_wifi fw
            INNER JOIN free_wifi_projects fp ON fw.project_id = fp.id
            INNER JOIN municipalities m ON fw.municipality_id = m.id
            WHERE fw.municipality_id = ?
            ORDER BY fw.address ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $municipality_id);
    $stmt->execute();
    $query = $stmt->get_result();
    $counter = 1;
    
    while ($row = $query->fetch_assoc()) {
        $output .= "<tr style='text-align: left; vertical-align: middle;'>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $counter . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['project_name'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['municipality_name'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['address'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['access_point'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . ucfirst($row['status']) . "</td>";
        $output .= "</tr>";

        $counter++;
    }

    $output .= "
            </tbody>
        </table>
        <br><br>
        <table style='width: 100%; text-align: left; font-family: Arial, sans-serif;'>
            <tr>
                <td>Prepared by: </td>
            </tr>
        </table>
        <br>
        <table style='width: 100%; text-align: left; font-family: Arial, sans-serif;'>
            <tr>
                <td><b>DICT - Student Interns</b></td>
            </tr>
        </table>
    ";

    echo $output;
?>