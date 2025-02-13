<?php
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=Water_Bill_Report.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    require_once 'includes/conn.php';

    $output = "";

    $output .= "
        <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
			<tr>
				<td colspan='4' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
					DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
					REGION VI AKLAN FIELD OFFICE<br><br>
					<strong>Water Bill Report</strong>
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
                    <th style='border: 1px solid black; padding: 5px;'>Total Amount</th>
                </tr>
            </thead>
            <tbody>
    ";

    $query = $conn->query("SELECT * FROM water_bill") or die(mysqli_errno($conn));
    $counter = 1;
    
    while ($fetch = $query->fetch_array()) {
        $output .= "<tr style='text-align: left; vertical-align: middle;'>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . $counter . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . (!empty($fetch['month_wb']) ? $fetch['month_wb'] : '') . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . (!empty($fetch['date_receive']) ? $fetch['date_receive'] : '') . "</td>";
        $output .= "<td style='border: 1px solid black; padding: 5px; font-family: Arial, sans-serif;'>" . (!empty($fetch['total_amount_wb']) ? number_format($fetch['total_amount_wb'], 2) : '') . "</td>";
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
