<?php
include 'includes/session.php';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=bills_report_' . (isset($_GET['date_from']) ? date('F_Y', strtotime($_GET['date_from'])) : date('F_Y')) . '_to_' . (isset($_GET['date_to']) ? date('F_Y', strtotime($_GET['date_to'])) : date('F_Y')) . '.xls');

// Get and sanitize date range and bill type
$date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
$date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';
$bill_type = isset($_GET['bill_type']) ? $_GET['bill_type'] : 'all';

if($date_from && $date_to) {
    // Format dates for SQL comparison (add day to make it complete date)
    $date_from = $date_from . '-01';
    $date_to = date('Y-m-t', strtotime($date_to . '-01')); // Get last day of the month
}

// Electric Bills
$sql_electric = "SELECT 'Electricity' as bill_type, 
               CONCAT(DATE_FORMAT(month_2, '%M %Y'), ' - ', DATE_FORMAT(month_1, '%M %Y')) as billing_period, 
               date_2 as date_receive, 
               (gtc + dr + uc + evax + other_ca + annex) as total_amount 
               FROM electric_bill"
               . ($date_from && $date_to ? " WHERE month_1 BETWEEN '$date_from' AND '$date_to'" : "");

// Water Bills
$sql_water = "SELECT 'Water' as bill_type, 
             DATE_FORMAT(month_wb, '%M %Y') as billing_period,
             date_receive, 
             total_amount_wb as total_amount 
             FROM water_bill"
             . ($date_from && $date_to ? " WHERE month_wb BETWEEN '$date_from' AND '$date_to'" : "");

// WiFi Bills
$sql_wifi = "SELECT 'WiFi' as bill_type, 
            DATE_FORMAT(month_1, '%M %Y') as billing_period,
            date_1 as date_receive, 
            total_amount_1 as total_amount 
            FROM wifi_bill"
            . ($date_from && $date_to ? " WHERE month_1 BETWEEN '$date_from' AND '$date_to'" : "");

// Initialize the final query based on bill type
$final_query = '';
if ($bill_type == 'all' || $bill_type == 'electric') {
    $final_query = $sql_electric;
}
if ($bill_type == 'all' || $bill_type == 'water') {
    $final_query .= ($final_query ? ' UNION ALL ' : '') . $sql_water;
}
if ($bill_type == 'all' || $bill_type == 'wifi') {
    $final_query .= ($final_query ? ' UNION ALL ' : '') . $sql_wifi;
}
$final_query .= " ORDER BY date_receive DESC";

$sql = $final_query;
$query = $conn->query($sql);

$output = "";

$output .= "
    <table style='width: 100%; text-align: center; font-family: Arial, sans-serif; border-collapse: collapse;'>
        <tr>
            <td colspan='5' style='font-weight: bold; font-size: 16px; text-align: center; vertical-align: middle; height: 80px;'>
                DEPARTMENT OF INFORMATION AND COMMUNICATIONS TECHNOLOGY<br>
                REGION VI AKLAN FIELD OFFICE<br><br>
                <strong>Bills Overview Report</strong><br>
                <span style='font-size: 14px;'>" . 
                ($date_from && $date_to ? date('F Y', strtotime($date_from)) . ' - ' . date('F Y', strtotime($date_to)) : 'All Time') . "</span><br>
                <span style='font-size: 14px;'>" . 
                ($bill_type != 'all' ? ucfirst($bill_type) . ' Bills' : 'All Utility Bills') . "</span>
            </td>
        </tr>
    </table>
    <br>
    <table style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;'>
        <thead>
            <tr>
                <th style='border: 1px solid black; padding: 5px; width: 30px;'>No.</th>
                <th style='border: 1px solid black; padding: 5px;'>Bill Type</th>
                <th style='border: 1px solid black; padding: 5px;'>Billing Period</th>
                <th style='border: 1px solid black; padding: 5px;'>Date OR Receive</th>
                <th style='border: 1px solid black; padding: 5px;'>Total Amount</th>
            </tr>
        </thead>
        <tbody>";

$counter = 1;
$total = 0;
while ($row = $query->fetch_assoc()) {
    $output .= "<tr style='text-align: center; vertical-align: middle;'>";
    $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $counter . "</td>";
    $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $row['bill_type'] . "</td>";
    $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $row['billing_period'] . "</td>";
    $output .= "<td style='border: 1px solid black; padding: 5px;'>" . $row['date_receive'] . "</td>";
    $output .= "<td style='border: 1px solid black; padding: 5px;'>" . number_format($row['total_amount'], 2) . "</td>";
    $output .= "</tr>";
    $total += $row['total_amount'];
    $counter++;
}

$output .= "<tr>";
$output .= "<td colspan='4' style='border: 1px solid black; padding: 5px; text-align: right;'><b>Total:</b></td>";
$output .= "<td style='border: 1px solid black; padding: 5px; text-align: center;'><b>" . number_format($total, 2) . "</b></td>";
$output .= "</tr>";
$output .= "</tbody></table>";

$output .= "
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
    </table>";

echo $output;
?>