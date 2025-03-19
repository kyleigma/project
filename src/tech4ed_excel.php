<?php
    require_once 'includes/conn.php';

    header("Content-Type: application/vnd.ms-excel");    
    header("Content-Disposition: attachment; filename=Tech4Ed_Report.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $output = "";

    $output .= "
        <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
            <tr>
                <td colspan='6' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
                    DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
                    REGION VI AKLAN FIELD OFFICE<br><br>
                    <strong>Tech4Ed Centers Report</strong>
                </td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;'>
            <thead>
                <tr>
                    <th style='border: 1px solid black; padding: 5px;'>No.</th>
                    <th style='border: 1px solid black; padding: 5px;'>Center Name</th>
                    <th style='border: 1px solid black; padding: 5px;'>Center Location</th>
                    <th style='border: 1px solid black; padding: 5px;'>LGU</th>
                    <th style='border: 1px solid black; padding: 5px;'>District</th>
                    <th style='border: 1px solid black; padding: 5px;'>Status</th>
                </tr>
            </thead>
            <tbody>
    ";

    $sql = "SELECT t.id, t.center_name, t.center_loc, m.name AS municipality_name, t.district_no, t.status
            FROM tech4ed t
            INNER JOIN municipalities m ON t.municipality_id = m.id
            ORDER BY t.id ASC";
    $query = $conn->query($sql);
    $counter = 1;
    
    while ($row = $query->fetch_assoc()) {
        $output .= "<tr style='text-align: left; vertical-align: middle;'>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $counter . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['center_name'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['center_loc'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['municipality_name'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>District " . $row['district_no'] . "</td>";
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