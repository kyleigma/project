<?php
    require_once 'includes/conn.php';

    header("Content-Type: application/vnd.ms-excel");    
    header("Content-Disposition: attachment; filename=PNPKI_Report.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $output = "";

    $output .= "
        <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
            <tr>
                <td colspan='6' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
                    DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
                    REGION VI AKLAN FIELD OFFICE<br><br>
                    <strong>PNPKI Report</strong>
                </td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;'>
            <thead>
                <tr>
                    <th style='border: 1px solid black; padding: 5px;'>No.</th>
                    <th style='border: 1px solid black; padding: 5px;'>Application Type</th>
                    <th style='border: 1px solid black; padding: 5px;'>Agency/Name</th>
                    <th style='border: 1px solid black; padding: 5px;'>Address</th>
                    <th style='border: 1px solid black; padding: 5px;'>Municipality</th>
                    <th style='border: 1px solid black; padding: 5px;'>Status</th>
                </tr>
            </thead>
            <tbody>
    ";

    $sql = "SELECT p.*, m.name as municipality_name 
           FROM pnpki p 
           LEFT JOIN municipalities m ON p.municipality_id = m.id";
    $query = $conn->query($sql);
    $counter = 1;
    
    while ($row = $query->fetch_assoc()) {
        $output .= "<tr style='text-align: left; vertical-align: middle;'>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $counter . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . ucfirst($row['application_type']) . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['agency'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['address'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $row['municipality_name'] . "</td>";
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