<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
.datatable th,
.datatable td {
    text-align: center;
    /* Center-align headers and contents */
    vertical-align: middle;
    /* Vertically center contents */
}

.user-images {
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
                        <h1 class="h3 mb-0 text-gray-800 mb-3">Manage Accounts</h1>
                            <nav style="font-size:85%;" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                                    <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                                    <li class="active" aria-current="page">Manage Accounts</li>
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
                    </div>

                    <table class="table responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Full Name</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM accounts";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    $imagePath = 'assets/images/' . $row['photo'];
                                    $image = (!empty($row['photo']) && file_exists($imagePath)) ? $imagePath : 'assets/images/blank.svg';
                                    echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>
                                                <div class='d-flex align-items-center justify-content'>
                                                    <img src='" . $image . "' width='50' height='50' class='rounded-circle user-images me-2' alt='User Photo'>
                                                    <a href='#edit_photo' data-toggle='modal' class='photo text-primary d-flex align-items-center' data-id='" . $row['id'] . "'>
                                                        <span class='mdi mdi-square-edit-outline' style='font-size: 1.3rem;'></span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{$row['username']}</td>
                                            <td>******</td>
                                            <td>{$row['firstname']} {$row['lastname']}</td>
                                            <td>{$row['role']}</td>
                                            <td width='50' class='text-center'>
                                                <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='mdi mdi-square-edit-outline'></i> </button>
                                                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='mdi mdi-trash-can'></i> </button>                          
                                            </td>
                                            </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/accounts_modal.php'; ?>

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
        var galleryImgs = document.querySelectorAll('.user-images');

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

    <script>
$(document).ready(function () {
    // Show "Add New" Modal with Blank Inputs
    $(document).on("click", ".addnew", function (e) {
        e.preventDefault();

        if ($("#addnew").length) {
            let modal = $("#addnew");

            // Clear all input fields inside the modal
            modal.find("input").val("");

            // Reset password field
            let passwordField = modal.find(".password-field");
            passwordField.val(""); // Clear password
            passwordField.attr("type", "password"); // Ensure it's in password mode

            // Reset the eye icon to 'mdi-eye-off' (hidden state)
            modal.find(".toggle-password i").removeClass("mdi-eye").addClass("mdi-eye-off");

            // Show the modal
            modal.modal("show");
        }
    });

    // Toggle Password Visibility
    $(document).on("click", ".toggle-password", function () {
        var input = $(this).closest(".input-group").find("input");
        var icon = $(this).find("i");

        if (input.attr("type") === "password") {
            input.attr("type", "text");
            icon.removeClass("mdi-eye-off").addClass("mdi-eye");
        } else {
            input.attr("type", "password");
            icon.removeClass("mdi-eye").addClass("mdi-eye-off");
        }
    });

    // Handle Edit Button Click
    $(document).on("click", ".edit", function (e) {
        e.preventDefault();
        var id = $(this).data("id");

        if (id) {
            if ($("#edit").length) {
                $("#edit").modal("show");
            }
            getRow(id); // Fetch the data for the selected user
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

    // Handle Delete Button Click
    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        var id = $(this).data("id");

        if (id) {
            // Make sure the modal is shown correctly
            if ($("#delete").length) {
                $("#delete").modal("show");
            }
            getRow(id); // Fetch the data for deletion
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

// Function to fetch row data for the Edit modal
function getRow(id) {
    $.ajax({
        type: 'POST',
        url: 'accounts_row.php',  // Ensure this file correctly fetches data
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            // Populate edit modal fields
            $('#edit_id').val(response.id);
            $('#edit_username').val(response.username);
            $('#edit_password').val(response.password);
            $('#edit_firstname').val(response.firstname);
            $('#edit_lastname').val(response.lastname);
            $('#edit_role').val(response.role);
            
            // Populate delete modal fields
            $('#delete_id').val(response.id);
            $('#delete_name').text(response.firstname + ' ' + response.lastname);

            // Populate edit photo modal
            $('#edit_photo_id').val(response.id);
            $('#edit_photo_display').attr('src', 'assets/images/accounts/' + response.photo);
        },
        error: function(xhr, status, error) {
            console.error("Error in getRow: " + error);
        }
    });
}

</script>

    
</body>
</html>
