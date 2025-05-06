<?php
    header("Content-Type: application/vnd.ms-excel");    
    header("Content-Disposition: attachment; filename=VSAT_UNDP_CoRe_Report.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    require_once 'includes/conn.php';

    $output = "";

    $output .= "
        <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
            <tr>
                <td colspan='6' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
                    DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
                    REGION VI AKLAN FIELD OFFICE<br><br>
                    <strong>VSAT UNDP CoRe Report</strong>
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

    $sql = "SELECT 
            fw.id, fw.address, fw.access_point, 
            fp.name AS project_name, fw.status, m.name AS municipality_name
            FROM free_wifi fw
            INNER JOIN free_wifi_projects fp ON fw.project_id = fp.id
            INNER JOIN municipalities m ON fw.municipality_id = m.id
            WHERE fw.project_id IN (8, 'VSAT UNDP CoRe')
            ORDER BY fw.address ASC";
    $query = $conn->query($sql);
    $counter = 1;
    
    while ($fetch = $query->fetch_array()) {
        $output .= "<tr style='text-align: left; vertical-align: middle;'>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $counter . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $fetch['project_name'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $fetch['municipality_name'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $fetch['address'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $fetch['access_point'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . ucfirst($fetch['status']) . "</td>";
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