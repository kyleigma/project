<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<style>
.datatable th,
.datatable td {
    text-align: center;
    vertical-align: middle;
}

.bill-images {
    width: 30px;
    height: auto;
    cursor: pointer;
}

#modal-container {
    display: none;
    position: fixed;
    z-index: 1050;
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
}

.close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 35px;
    color: white;
    cursor: pointer;
}

.close:hover {
    color: lightgray;
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
                        <h1 class="h3 mb-0 text-gray-800 mb-3">WiFi Bill</h1>
                        <nav style="font-size:85%;" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                                <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                                <li class=""><a href="bills.php">Bills Overview</a></li>&nbsp;&nbsp;&nbsp;
                                <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                                <li class="active" aria-current="page">WiFi Bill</li>
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
                        <div class="ml-auto">
                            <a href="wifi_bill_print.php" target="_blank" class="btn btn-md btn-primary btn-flat" style="margin-left: 2rem;">
                                <i class="mdi mdi-printer-outline"></i> Print
                            </a>
                            <a href="wifi_bill_excel.php" target="_blank" class="btn btn-md btn-primary btn-flat">
                                <i class="mdi mdi-file-excel"></i> Excel
                            </a>
                        </div>
                    </div>

                    <table class="table responsive table-striped datatable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="hidden"></th>
                                <th>Month</th>
                                <th>Date OR<br>Receive</th>
                                <th>Picture</th>
                                <th>Total<br>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM wifi_bill";
                            $query = $conn->query($sql);
                            $rowNumber = 1;

                            while ($row = $query->fetch_assoc()) {
                                $imagePath = 'assets/images/bills/wifi' . $row['wifi_photo'];
                                $image = (!empty($row['wifi_photo']) && file_exists($imagePath)) ? $imagePath : 'assets/images/blank.svg';

                                // Format the month_1 to "Month Year"
                                $month_1 = new DateTime($row['month_1']);
                                $formatted_month_1 = $month_1->format('F Y');

                                // Format date_1 to word format
                                $date_1 = new DateTime($row['date_1']);
                                $formatted_date_1 = $date_1->format('F j, Y');

                                echo "
                                <tr data-id='" . $row['id'] . "'> 
                                    <td class='hidden text-center'></td>
                                    <td class='text-start'>" . $formatted_month_1 . "</td>
                                    <td class='text-start'>" . $formatted_date_1 . "</td>
                                    <td>
                                        <div class='d-flex align-items-center justify-content-center'>
                                            <img src='" . $image . "' width='50' height='50' class='rounded-circle bill-images me-2'>
                                            <a href='#edit_photo' data-toggle='modal' class='photo text-primary d-flex align-items-center' data-id='" . $row['id'] . "'>
                                                <span class='mdi mdi-square-edit-outline' style='font-size: 1.3rem;'></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class='text-start'>" . number_format($row['total_amount_1'], 2) . "</td>
                                    <td class='text-center'>
                                        <button class='btn btn-success btn-sm edit' data-id='" . $row['id'] . "'>
                                            <i class='mdi mdi-square-edit-outline'></i>
                                        </button>
                                        <button class='btn btn-danger btn-sm delete' data-id='" . $row['id'] . "'>
                                            <i class='mdi mdi-trash-can'></i>
                                        </button>
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

    <?php include 'includes/wifi_bill_modal.php';?>
    <?php include 'includes/scripts.php';?>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- jQuery (must be included before DataTables JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <div id="modal-container">
        <span class="close" style="opacity: 1;">&times;</span>
        <img id="modal-content">
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalContainer = document.getElementById('modal-container');
        var modalContent = document.getElementById('modal-content');
        var closeBtn = document.querySelector('#modal-container .close');
        var galleryImgs = document.querySelectorAll('.bill-images');

        galleryImgs.forEach(function(img) {
            img.addEventListener('click', function() {
                modalContent.src = this.src;
                modalContainer.classList.add('active'); // Fix: Show modal properly
            });
        });

        closeBtn.addEventListener('click', function() {
            modalContainer.classList.remove('active'); // Fix: Hide modal properly
        });

        window.addEventListener('click', function(e) {
            if (e.target === modalContainer) {
                modalContainer.classList.remove('active'); // Fix: Hide when clicking outside
            }
        });
    });
    </script>

    <!-- Initialize DataTable -->
    <script>
    $(document).ready(function() {
        // Handle "Add New" Button Click
        $(document).on('click', '.addnew', function(e) {
            e.preventDefault();
            if ($('#addnew').length) {
                $('#addnew').modal('show');
            }
        });

        // Handle Edit Button Click
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if (id) {
                if ($('#edit').length) {
                    $('#edit').modal('show');
                }
                getRow(id);
            }
        });

        // Handle Delete Button Click
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if (id) {
                if ($('#delete').length) {
                    $('#delete').modal('show');
                }
                getRow(id);
            }
        });

        // Handle Edit Photo Button Click
        $(document).on('click', '.photo', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if (id) {
                if ($('#edit_photo').length) {
                    $('#edit_photo').modal('show');
                }
                getRow(id);
            }
        });

        // Close Modal on Button Click
        $(document).on('click', '.close-modal', function () {
        var modal = $(this).closest('.modal');
        if (modal.length) {
            modal.modal('hide');
        }
        });
        // Bootstrap default modal close behavior
        $(document).on('click', '[data-dismiss="modal"]', function () {
            var modal = $(this).closest('.modal');
            if (modal.length) {
                modal.modal('hide');
            }
        });
    });

    // Function to fetch row data
    function getRow(id) {
        console.log("Fetching data for ID:", id);
        // Ensure the function is defined in your script
    }
    </script>

    <script>
    function getRow(id) {
        $.ajax({
            type: 'POST',
            url: 'wifi_bill_row.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('.id').val(response.id);
                $('#edit_month_1').val(response.month_1);
                $('#edit_date_1').val(response.date_1);
                $('#edit_total_amount_1').val(response.total_amount_1);
                $('.fullname').html(response.month_1 + ' ' + response.date_1);
            }
        });
    }
    </script>
</body>

</html>