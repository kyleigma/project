<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<style>
.datatable th,
.datatable td {
    text-align: center;
    /* Center-align headers and contents */
    vertical-align: middle;
    /* Vertically center contents */
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
    /* Higher than sidebar and navbar */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    align-items: center;
    justify-content: center;
    overflow: hidden;
    /* Prevents scrolling */
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
    color: skyblue;
}

/* Disable scrolling when modal is open */
body.modal-open {
    overflow: hidden;

}
</style>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php include 'includes/navbar.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include 'includes/sidebar.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 mb-3">Water Bill</h1>
                    <nav style="font-size:85%;" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                            <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                            <li class="active" aria-current="page">Water Bill</li>
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
                            <a href="water_bill_print.php" target="_blank" class="btn btn-md btn-primary btn-flat" style="margin-left: 2rem;">
                                <i class="mdi mdi-printer-outline"></i> Print
                            </a>
                            <a href="water_bill_excel.php" target="_blank" class="btn btn-md btn-primary btn-flat">
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
                            $sql = "SELECT * FROM water_bill";
                            $query = $conn->query($sql);
                            $rowNumber = 1;

                            while ($row = $query->fetch_assoc()) {
                                $imagePath = 'assets/images/' . $row['w_photo'];
                                $image = (!empty($row['w_photo']) && file_exists($imagePath)) ? $imagePath : 'assets/images/blank.svg';

                                // Format the month_wb to "Month Year"
                                $month_wb = new DateTime($row['month_wb']);
                                $formatted_month_wb = $month_wb->format('F Y');

                                echo "
                                <tr data-id='" . $row['id'] . "'> 
                                    <td class='hidden text-center'></td>
                                    <td class='text-start'>" . $formatted_month_wb . "</td>
                                    <td class='text-start'>" . $row['date_receive'] . "</td>
                                    <td class='text-center'>
                                        <div class='d-flex align-items-center justify-content-center'>
                                            <img src='" . $image . "' width='50' height='50' class='rounded-circle bill-images me-2'>
                                            <a href='#edit_photo' data-toggle='modal' class='photo text-primary d-flex align-items-center' data-id='" . $row['id'] . "'>
                                                <span class='mdi mdi-square-edit-outline' style='font-size: 1.3rem;'></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class='text-start'>" . number_format($row['total_amount_wb'], 2) . "</td>
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
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <?php include 'includes/footer.php';?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include 'includes/water_bill_modal.php';?>
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
        $(document).on('click', '.close-modal', function() {
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
            url: 'water_bill_row.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('.id').val(response.id);
                $('#edit_month_wb').val(response.month_wb);
                $('#edit_date_receive').val(response.date_receive);
                $('#edit_total_amount_wb').val(response.total_amount_wb);
                $('.fullname').html(response.month_wb + ' ' + response.date_receive);
            }
        });
    }
    </script>
</body>

</html>