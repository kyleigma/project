<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<style>
.datatable th {
    white-space: normal;
    word-break: break-word;
    text-align: center;
    max-width: 80px;
    min-width: 80px;
    overflow-wrap: break-word;
    padding: 5px;
}
.bill-images {
    width: 30px;
    height: auto;
    cursor: pointer;
}

#modal-container {
    display: none;
    position: fixed;
    z-index: 1060;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

#modal-container.active {
    display: flex;
}

#modal-content {
    max-width: 90vw;
    max-height: 90vh;
    border-radius: 5px;
    position: relative;
    z-index: 1061;
}

.close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 35px;
    color: white;
    cursor: pointer;
    z-index: 1062;
}

.close:hover {
    color: skyblue;
}

body.modal-open {
    overflow: hidden;
}
</style>

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

                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "
                            <div class='alert alert-danger alert-dismissible fade show d-flex align-items-center' role='alert'>
                                <i class='mdi mdi-alert-circle mdi-24px me-2'></i> 
                                <span>".$_SESSION['error']."</span>
                                <button type='button' class='btn-close ms-auto' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        ";
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success'])) {
                        echo "
                            <div class='alert alert-success alert-dismissible fade show d-flex align-items-center' role='alert'>
                                <i class='mdi mdi-check-circle mdi-24px me-2'></i> 
                                <span>".$_SESSION['success']."</span>
                                <button type='button' class='btn-close ms-auto' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        ";
                        unset($_SESSION['success']);
                    }
                    ?>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-primary addnew"><i class="mdi mdi-plus"></i> New</button>
                        <div class="ml-auto d-flex align-items-center">
                            <div class="dropdown me-2">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="printOptionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-printer"></i> Print
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="printOptionsDropdown">
                                    <li><a class="dropdown-item" href="bills_print.php" target="_blank">All Bills</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><h6 class="dropdown-header">By Type</h6></li>
                                    <li><a class="dropdown-item" href="bills_print.php?bill_type=electricity" target="_blank">Electricity Bills</a></li>
                                    <li><a class="dropdown-item" href="bills_print.php?bill_type=water" target="_blank">Water Bills</a></li>
                                    <li><a class="dropdown-item" href="bills_print.php?bill_type=wifi" target="_blank">WiFi Bills</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><h6 class="dropdown-header">By Date Range</h6></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#dateRangeModal">Custom Date Range</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="excelOptionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-file-excel"></i> Excel
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="excelOptionsDropdown">
                                    <li><a class="dropdown-item" href="bills_excel.php" target="_blank">All Bills</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><h6 class="dropdown-header">By Type</h6></li>
                                    <li><a class="dropdown-item" href="electric_bill_excel" target="_blank">Electricity Bills</a></li>
                                    <li><a class="dropdown-item" href="water_bill_excel" target="_blank">Water Bills</a></li>
                                    <li><a class="dropdown-item" href="wifi_bill_excel" target="_blank">WiFi Bills</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><h6 class="dropdown-header">By Date Range</h6></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#dateRangeModal">Custom Date Range</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <table class="table responsive table-striped datatable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="hidden" width="2rem"></th>
                                <th>Bill Type</th>
                                <th>Billing Period</th>
                                <th>Date OR Receive</th>
                                <th>Picture</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Electric Bills
                            $sql_electric = "SELECT 'Electricity' as bill_type, 
                                           CONCAT(DATE_FORMAT(month_2, '%M %Y'), ' - ', DATE_FORMAT(month_1, '%M %Y')) as billing_period, 
                                           date_2 as date_receive, e_photo as photo, 
                                           (gtc + dr + uc + evax + other_ca + annex) as total_amount, 
                                           id, 'electric' as source FROM electric_bill";

                            // Water Bills
                            $sql_water = "SELECT 'Water' as bill_type, DATE_FORMAT(month_wb, '%M %Y') as billing_period,
                                         date_receive, w_photo as photo, total_amount_wb as total_amount,
                                         id, 'water' as source FROM water_bill";

                            // WiFi Bills
                            $sql_wifi = "SELECT 'WiFi' as bill_type, DATE_FORMAT(month_1, '%M %Y') as billing_period,
                                        date_1 as date_receive, wifi_photo as photo, total_amount_1 as total_amount,
                                        id, 'wifi' as source FROM wifi_bill";

                            // Combine all queries
                            $sql = "($sql_electric) UNION ALL ($sql_water) UNION ALL ($sql_wifi) ORDER BY date_receive DESC";
                            $query = $conn->query($sql);

                            while ($row = $query->fetch_assoc()) {
                                $imagePath = 'assets/images/bills/' . $row['source'] . $row['photo'];
                                $image = (!empty($row['photo']) && file_exists($imagePath)) ? $imagePath : 'assets/images/blank.svg';
                                $billBadge = ($row['bill_type'] === 'Electricity') ? 'badge-warning' : 
                                               (($row['bill_type'] === 'Water') ? 'badge-primary' : 'badge-success');
                                echo "
                                <tr data-id='" . $row['id'] . "' data-source='" . $row['source'] . "'> 
                                    <td class='hidden text-center'></td>
                                    <td class='text-center'><span class='badge rounded-pill $billBadge' style='font-size: 0.75rem;'>".ucfirst($row['bill_type'])."</span></td>
                                    <td>" . $row['billing_period'] . "</td>
                                    <td>" . $row['date_receive'] . "</td>
                                    <td>
                                        <div class='d-flex align-items-start justify-content-start'>
                                            <img src='" . $image . "' width='50' height='50' class='rounded-circle bill-images me-2'>
                                            <a href='#edit_photo' data-toggle='modal' class='photo text-primary d-flex align-items-center' data-id='" . $row['id'] . "' data-source='" . $row['source'] . "'>
                                                <span class='mdi mdi-square-edit-outline' style='font-size: 1.3rem;'></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>" . number_format($row['total_amount'], 2) . "</td>
                                    <td class='text-center'>
                                        <a href='" . $row['source'] . "_bill.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>
                                            <i class='mdi mdi-eye'></i>
                                        </a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <div id="modal-container">
                        <span class="close" style="opacity: 1;">&times;</span>
                        <img id="modal-content">
                    </div>
                </div>
                <?php include 'includes/footer.php';?>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php';?>
    <?php include 'includes/bills_date_range_modal.php';?>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    
    <!-- jQuery (must be included before DataTables JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the ID from URL if present
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        
        if (id) {
            // Use setTimeout to ensure DOM is fully loaded
            setTimeout(() => {
                // Find the row with matching ID
                const targetRow = document.querySelector(`tr[data-id='${id}']`);
                if (targetRow) {
                    // Scroll the row into view with smooth animation
                    targetRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    // Add a more prominent highlight effect
                    targetRow.style.transition = 'none';
                    targetRow.style.backgroundColor = '#ffeeba';
                    targetRow.style.boxShadow = '0 0 10px rgba(255, 193, 7, 0.5)';
                    
                    // Fade out the highlight effect
                    setTimeout(() => {
                        targetRow.style.transition = 'all 1s ease';
                        targetRow.style.backgroundColor = '';
                        targetRow.style.boxShadow = '';
                    }, 2000);
                }
            }, 100);
        }

        // Modal functionality for bill images
        const modal = document.getElementById('modal-container');
        const modalImg = document.getElementById('modal-content');
        const closeBtn = document.querySelector('.close');
        const billImages = document.querySelectorAll('.bill-images');

        // Open modal when clicking on bill images
        billImages.forEach(img => {
            img.addEventListener('click', function() {
                modal.classList.add('active');
                modalImg.src = this.src;
                document.body.classList.add('modal-open');
            });
        });

        // Close modal when clicking on close button
        closeBtn.addEventListener('click', function() {
            modal.classList.remove('active');
            document.body.classList.remove('modal-open');
        });

        // Close modal when clicking outside the image
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('active');
                document.body.classList.remove('modal-open');
            }
        });

        // Close modal with escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                modal.classList.remove('active');
                document.body.classList.remove('modal-open');
            }
        });
    });
    </script>
</body>
</html>