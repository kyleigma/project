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
                        <h1 class="h3 mb-0 text-gray-800">WiFi Bill</h1>
                        <nav style="font-size:85%;" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                                <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                                <li class=""><a href="free_wifi.php">Utilities</a></li>
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
                            <a href="wifi_bill_print.php" target="_blank" class="btn btn-md btn-primary btn-flat mr-2">
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
                                <th width="25px">#</th>
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
                                $image = !empty($row['wifi_photo']) ? 'assets/images/' . $row['wifi_photo'] : 'assets/images/blank.svg';
                                $month_1 = new DateTime($row['month_1']);
                                $formatted_month = $month_1->format('F Y');

                                echo "
                                <tr data-id='" . $row['id'] . "'> 
                                    <td class='text-center'>" . $rowNumber . "</td> 
                                    <td>" . $formatted_month . "</td>
                                    <td>" . $row['date_1'] . "</td>
                                    <td class='text-center'>
                                        <div class='d-flex align-items-center justify-content-center'>
                                            <img src='" . $image . "' width='50' height='50' class='rounded-circle bill-images me-2'>
                                            <a href='#edit_photo' data-toggle='modal' class='photo text-primary d-flex align-items-center' data-id='" . $row['id'] . "'>
                                                <span class='mdi mdi-square-edit-outline' style='font-size: 1.3rem;'></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>" . number_format($row['total_amount_1'], 2) . "</td>
                                    <td class='text-center'>
                                        <button class='btn btn-success btn-sm edit' data-id='" . $row['id'] . "'>
                                            <i class='mdi mdi-square-edit-outline'></i>
                                        </button>
                                        <button class='btn btn-danger btn-sm delete' data-id='" . $row['id'] . "'>
                                            <i class='mdi mdi-trash-can'></i>
                                        </button>
                                    </td>
                                </tr>";
                                $rowNumber++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php include 'includes/footer.php';?>
            </div>
        </div>
    </div>

    <?php include 'includes/wifi_bill_modal.php';?>
    <?php include 'includes/scripts.php';?>

    <script>
    $(document).ready(function() {
        $(document).on('click', '.addnew', function(e) {
            e.preventDefault();
            if ($('#addnew').length) {
                $('#addnew').modal('show');
            }
        });

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
    });

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