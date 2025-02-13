<?php
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=Electric_Bill_Report.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    require_once 'includes/conn.php';
    
    $output = "";

    $output .= "
        <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
            <tr>
                <td colspan='11' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
                    DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
                    REGION VI AKLAN FIELD OFFICE<br><br>
                    <strong>Electric Bill Report</strong>
                </td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;'>
            <thead>
                <tr>
                    <th style='border: 1px solid black; padding: 5px; width: 30px; text-align: center; vertical-align: middle; white-space: nowrap;'>No.</th>
                    <th style='border: 1px solid black; padding: 5px;'>Inclusive Months</th>
                    <th style='border: 1px solid black; padding: 5px;'>Date OR Received</th>
                    <th style='border: 1px solid black; padding: 5px;'>Generation and Transmission Charges</th>
                    <th style='border: 1px solid black; padding: 5px;'>Usage Rate</th>
                    <th style='border: 1px solid black; padding: 5px;'>Distribution Revenues</th>
                    <th style='border: 1px solid black; padding: 5px;'>Universal Charges</th>
                    <th style='border: 1px solid black; padding: 5px;'>Expanded Value Added Tax</th>
                    <th style='border: 1px solid black; padding: 5px;'>Other Charges/ Adjustments</th>
                    <th style='border: 1px solid black; padding: 5px;'>Annex</th>
                    <th style='border: 1px solid black; padding: 5px;'>Total Amount</th>
                </tr>
            </thead>
            <tbody>
    ";

    $query = $conn->query("SELECT * FROM electric_bill") or die(mysqli_errno($conn));
    $counter = 1;
    while ($fetch = $query->fetch_array()) {
        $inclusive_months = date("M Y", strtotime($fetch['month_2'])) . " - " . date("M Y", strtotime($fetch['month_1']));

        $output .= "<tr style='text-align: center; vertical-align: middle;'>";
        $output .= "<td style='border: 1px solid black; padding: 5px; white-space: nowrap;'>" . $counter . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif; text-align: center; white-space: nowrap;'>"
                    . $inclusive_months . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['date_2'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['gtc'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['ur'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['dr'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['uc'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['evax'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['other_ca'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $fetch['annex'] . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px;'>" . number_format($fetch['total_amount_2'], 2) . "</td>";
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
                <td><b>DICT - Student Interns<.b></td>
            </tr>
        </table>
    ";

    echo $output;
?>
