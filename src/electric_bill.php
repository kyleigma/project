<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<style>
    .datatable th,
    .datatable td {
        white-space: normal;
        word-break: break-word;
        text-align: left;
        vertical-align: middle;
        min-width: 100px;
        max-width: 120px;
        padding: 10px 5px;
        font-size: 0.9rem;
    }
    
    .datatable th {
        background-color: #f8f9fa;
        font-weight: 600;
        height: auto;
        white-space: normal;
        word-wrap: break-word;
        line-height: 1.2;
    }
    .datatable th.date-column,
    .datatable td.date-column {
        min-width: 120px;
    }
    .datatable th.picture-column,
    .datatable td.picture-column {
        min-width: 80px;
    }
    .datatable th.action-column,
    .datatable td.action-column {
        min-width: 90px;
    }
    .datatable th.amount-column,
    .datatable td.amount-column {
        min-width: 100px;
        text-align: left;
    }
    .datatable th.hidden,
    .datatable td.hidden {
        display: none;
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
        color: lightgray;
    }

    /* Disable scrolling when modal is open */
    .body.modal-open {
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
                <h1 class="h3 mb-0 text-gray-800 mb-3">Electricity Bill</h1>
                <nav style="font-size:85%;" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                        <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                        <li class=""><a href="bills.php">Bills Overview</a></li>&nbsp;&nbsp;&nbsp;
                        <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                        <li class="active" aria-current="page">Electricity Bill</li>
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
                    <a href="electric_bill_print.php" target="_blank" class="btn btn-md btn-primary btn-flat" style="margin-left: 2rem;">
                        <i class="mdi mdi-printer-outline"></i> Print
                    </a>
                    <a href="electric_bill_excel.php" target="_blank" class="btn btn-md btn-primary btn-flat">
                        <i class="mdi mdi-file-excel"></i> Excel
                    </a>
                </div>
            </div>

            <table class="table table-striped datatable" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="min-width: 40px; max-width: 40px;"></th>
                        <th class="date-column">Inclusive Months</th>
                        <th class="date-column">Date OR Receive</th>
                        <th class="picture-column">Picture</th>
                        <th class="amount-column">Gen. & Trans. Charges</th>
                        <th>Usage Rate</th>
                        <th class="amount-column">Distribution Revenues</th>
                        <th class="amount-column">Universal Charges</th>
                        <th class="amount-column">EVAT</th>
                        <th class="amount-column">Other Charges</th>
                        <th class="amount-column">Annex</th>
                        <th class="amount-column">Total Amount</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM electric_bill ORDER BY date_2 DESC";
                    $query = $conn->query($sql);
                    $rowNumber = 1;

                    while ($row = $query->fetch_assoc()) {
                        $total = $row['gtc'] + $row['dr'] + $row['uc'] + $row['evax'] + $row['other_ca'] + $row['annex'];
                        $imagePath = 'assets/images/bills/electric' . $row['e_photo'];
                        $image = (!empty($row['e_photo']) && file_exists($imagePath)) ? $imagePath : 'assets/images/blank.svg';
                        $month2_formatted = date('F Y', strtotime($row['month_2']));
                        $month1_formatted = date('F Y', strtotime($row['month_1']));

                        echo "
                        <tr data-id='" . $row['id'] . "'> 
                            <td style='text-align: center;'>" . $rowNumber++ . "</td>
                            <td>" . $month2_formatted . " -<br><br>" . $month1_formatted . "</td>
                            <td>" . date('F j, Y', strtotime($row['date_2'])) . "</td>
                            <td class='text-start'>
                                <div class='d-flex align-items-start justify-content-start'>
                                    <img src='" . $image . "' width='50' height='50' class='rounded-circle bill-images me-2'>
                                    <a href='#edit_photo' data-toggle='modal' data-id='" . $row['id'] . "' class='photo text-primary d-flex align-items-center'>
                                        <span class='mdi mdi-square-edit-outline' style='font-size: 1.3rem;'></span>
                                    </a>
                                </div>
                            </td>
                            <td>" . $row['gtc'] . "</td> 
                            <td>" . $row['ur'] . "</td> 
                            <td>" . $row['dr'] . "</td> 
                            <td>" . $row['uc'] . "</td> 
                            <td>" . $row['evax'] . "</td> 
                            <td>" . $row['other_ca'] . "</td>
                            <td>" . $row['annex'] . "</td>
                            <td>" . number_format($total, 2) . "</td>
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
    <?php include 'includes/electric_bill_modal.php';?>
    <?php include 'includes/scripts.php';?>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    
    <!-- jQuery (must be included before DataTables JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        // Initialize DataTable
        const table = $('.datatable').DataTable();

        // Add new record button click handler
        $('.addnew').click(function() {
            $('#addnew').modal('show');
        });

        // Edit record button click handler
        $(document).on('click', '.edit', function() {
            const id = $(this).data('id');
            getRow(id);
        });

        // Delete record button click handler
        $(document).on('click', '.delete', function() {
            const id = $(this).data('id');
            $('#del_id').val(id);
            $('#delete').modal('show');
        });

        // Confirm delete button click handler
        $('#confirmDelete').click(function() {
            const id = $('#del_id').val();
            $.ajax({
                url: 'electric_bill_delete.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    if(response === 'success') {
                        $('#delete').modal('hide');
                        location.reload();
                    } else {
                        alert('Error deleting record');
                    }
                },
                error: function() {
                    alert('Error: Could not connect to server');
                }
            });
        });
        // Function to get row data for editing
        function getRow(id) {
            $.ajax({
                url: 'electric_bill_row.php',
                type: 'POST',
                data: {id: id},
                dataType: 'json',
                success: function(response) {
                    $('#edit_month_1').val(response.month_1);
                    $('#edit_month_2').val(response.month_2);
                    $('#edit_date_2').val(response.date_2);
                    $('#edit_gtc').val(response.gtc);
                    $('#edit_ur').val(response.ur);
                    $('#edit_dr').val(response.dr);
                    $('#edit_uc').val(response.uc);
                    $('#edit_evax').val(response.evax);
                    $('#edit_other_ca').val(response.other_ca);
                    $('#edit_annex').val(response.annex);
                    $('#edit_id').val(response.id);
                    $('#edit').modal('show');
                },
                error: function() {
                    alert('Error: Could not fetch record data');
                }
            });
        }

        // Handle form submissions
        $('#addForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'electric_bill_add.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if(response === 'success') {
                        $('#addnew').modal('hide');
                        location.reload();
                    } else {
                        alert('Error adding record');
                    }
                },
                error: function() {
                    alert('Error: Could not connect to server');
                }
            });
        });

        $('#editForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'electric_bill_edit.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if(response === 'success') {
                        $('#edit').modal('hide');
                        location.reload();
                    } else {
                        alert('Error updating record');
                    }
                },
                error: function() {
                    alert('Error: Could not connect to server');
                }
            });
        });
    // Get the ID from URL if present
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    
    if (id) {
        // Find the row with matching ID and highlight it
        const targetRow = $(`tr[data-id='${id}']`);
        if (targetRow.length) {
            // Calculate the page number where the row exists
            const rowIndex = table.row(targetRow).index();
            const pageNumber = Math.floor(rowIndex / table.page.len());
            
            // Go to the correct page
            table.page(pageNumber).draw('page');
            
            // Scroll the row into view with smooth animation
            setTimeout(() => {
                targetRow[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Add more prominent highlight effect with longer duration
                targetRow.css('backgroundColor', '#ffeb3b'); // Brighter yellow color
                targetRow.css('outline', '2px solid #fd7e14'); // Add orange outline
                targetRow.css('font-weight', 'bold'); // Make text bold
                
                // Fade out effect after 5 seconds
                setTimeout(() => {
                    targetRow.css({
                        'transition': 'all 1.5s ease',
                        'backgroundColor': '',
                        'outline': '',
                        'font-weight': ''
                    });
                }, 5000);
            }, 100);
        }
    }

    // Image modal functionality
    const modalContainer = document.getElementById('modal-container');
    const modalContent = document.getElementById('modal-content');
    const closeBtn = document.querySelector('#modal-container .close');
    const galleryImgs = document.querySelectorAll('.bill-images');

    galleryImgs.forEach(function(img) {
        img.addEventListener('click', function() {
            modalContent.src = this.src;
            modalContainer.classList.add('active');
            document.body.classList.add('modal-open');
        });
    });

    closeBtn.addEventListener('click', function() {
        modalContainer.classList.remove('active');
        document.body.classList.remove('modal-open');
    });

    window.addEventListener('click', function(e) {
        if (e.target === modalContainer) {
            modalContainer.classList.remove('active');
            document.body.classList.remove('modal-open');
        }
    });
});
    </script>
<script> // Fix for duplicate modal backdrops
    $(document).on('show.bs.modal', '.modal', function () {
        // Remove any existing duplicate backdrops
        $('.modal-backdrop:gt(0)').remove();
    });
    
    // Handle both Bootstrap 4 and 5 modal close buttons
    $(document).on('click', '[data-dismiss="modal"], [data-bs-dismiss="modal"]', function() {
        var modal = $(this).closest('.modal');
        if (modal.length) {
            modal.modal('hide');
        }
    });
    </script>
  </body>
</html>
