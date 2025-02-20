<?php
    include 'includes/conn.php';

    // Set headers for Excel download
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=wifi_bill_report.xls');

    $output = "";

    $output .= "
        <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
            <tr>
                <td colspan='5' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
                    DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
                    REGION VI, AKLAN FIELD OFFICE<br><br>
                    <strong>WiFi Bill Report</strong>
                </td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;'>
            <thead>
                <tr>
                    <th style='border: 1px solid black; padding: 5px;'>No.</th>
                    <th style='border: 1px solid black; padding: 5px;'>Month</th>
                    <th style='border: 1px solid black; padding: 5px;'>Date OR Received</th>
                    <th style='border: 1px solid black; padding: 5px;'>Picture Attachment</th>
                    <th style='border: 1px solid black; padding: 5px;'>Total Amount</th>
                </tr>
            </thead>
            <tbody>
    ";

    $query = $conn->query("SELECT * FROM wifi_bill") or die(mysqli_errno($conn));
    $counter = 1;
    
    while ($fetch = $query->fetch_array()) {
        $output .= "<tr style='text-align: left; vertical-align: middle;'>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif; text-align: center;'>" . $counter . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . (!empty($fetch['month_1']) ? $fetch['month_1'] : '') . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . (!empty($fetch['date_1']) ? $fetch['date_1'] : '') . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . (!empty($fetch['wifi_photo']) ? $fetch['wifi_photo'] : '') . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif; text-align: right;'>" . (!empty($fetch['total_amount_1']) ? number_format($fetch['total_amount_1'], 2) : '') . "</td>";
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