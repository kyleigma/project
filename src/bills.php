<?php
    include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <title>Bills Overview - DICT Aklan</title>
</head>
<body>
    <div class="container-scroller">
        <?php include 'includes/navbar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include 'includes/sidebar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mb-3">Bills Overview</h1>
                        <nav style="font-size:85%;" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                                <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                                <li class="active" aria-current="page">Bills Overview</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <div class="ml-auto">
                                            <button onclick="window.print()" class="btn btn-md btn-primary btn-flat">
                                                <i class="mdi mdi-printer-outline"></i> Print
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped datatable" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th class="hidden"></th>
                                                    <th>Billing Period</th>
                                                    <th>Bill Type</th>
                                                    <th>Total Amount</th>
                                                    <th>Usage/Details</th>
                                                    <th>Date Received</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'includes/conn.php';

                                                // Unified query for all bill types using UNION
                                                $sql = "(SELECT 
                                                            month_2 as bill_month,
                                                            month_1 as bill_month_end,
                                                            date_2 as bill_date,
                                                            total_amount_2 as amount,
                                                            CONCAT('Usage Rate: ', ur, ' kWh<br>Gen. & Trans.: ₱', FORMAT(gtc, 2)) as details,
                                                            'Electricity' as bill_type
                                                        FROM electric_bill)
                                                        UNION ALL
                                                        (SELECT 
                                                            month_wb as bill_month,
                                                            month_wb as bill_month_end,
                                                            month_wb as bill_date,
                                                            total_amount_wb as amount,
                                                            'Standard Rate' as details,
                                                            'Water' as bill_type
                                                        FROM water_bill)
                                                        UNION ALL
                                                        (SELECT 
                                                            month_1 as bill_month,
                                                            month_1 as bill_month_end,
                                                            date_1 as bill_date,
                                                            total_amount_1 as amount,
                                                            'Internet Service' as details,
                                                            'WiFi' as bill_type
                                                        FROM wifi_bill)
                                                        ORDER BY bill_month DESC";

                                                $query = $conn->query($sql);
                                                while($row = $query->fetch_assoc()) {
                                                    $billing_period = $row['bill_type'] == 'Electricity' ? 
                                                        date('F Y', strtotime($row['bill_month'])) . ' - ' . date('F Y', strtotime($row['bill_month_end'])) : 
                                                        date('F Y', strtotime($row['bill_month']));
                                                    
                                                    echo "<tr>
                                                        <td class='hidden'></td>
                                                        <td>{$billing_period}</td>
                                                        <td>{$row['bill_type']}</td>
                                                        <td>₱" . number_format($row['amount'], 2) . "</td>
                                                        <td>{$row['details']}</td>
                                                        <td>" . date('M d, Y', strtotime($row['bill_date'])) . "</td>
                                                        <td><span class='badge badge-success'>Paid</span></td>
                                                    </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                "order": [[0, "desc"]],
                "pageLength": 25
            });
        });
    </script>
</body>
</html>