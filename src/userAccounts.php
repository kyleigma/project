<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<head>
    <style>
        .datatable th, .datatable td {
            text-align: center;
            vertical-align: middle;
        }
        .user-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <?php include 'includes/navbar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include 'includes/sidebar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="h3 mb-4 text-gray-800">Manage Accounts</h1>
                    
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success'])) {
                        echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                        unset($_SESSION['success']);
                    }
                    ?>
                    
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAccount">Add New Account</button>
                    
                    <table class="table table-striped datatable">
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
                                $photo = !empty($row['photo']) ? 'uploads/' . $row['photo'] : 'assets/images/default.png';
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td><img src='$photo' class='user-photo'></td>
                                        <td>{$row['username']}</td>
                                        <td>******</td>
                                        <td>{$row['firstname']} {$row['lastname']}</td>
                                        <td>{$row['role']}</td>
                                        <td>
                                            <button class='btn btn-success btn-sm edit' data-id='{$row['id']}'>Edit</button>
                                            <button class='btn btn-danger btn-sm delete' data-id='{$row['id']}'>Delete</button>
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
    <?php include 'includes/userAccounts_modal.php'; ?>

    <script>
    $(document).ready(function() {
        // Initialize DataTable with filter
        $('.datatable').DataTable({
            "order": [[ 0, "asc" ]]
        });

        // Handle Edit button click
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: '../account_row.php',
                type: 'POST',
                data: {id: id},
                dataType: 'json',
                success: function(response) {
                    if(response.success) {
                        $('#edit_id').val(response.data.id);
                        $('#edit_username').val(response.data.username);
                        $('#edit_firstname').val(response.data.firstname);
                        $('#edit_lastname').val(response.data.lastname);
                        $('#edit_role').val(response.data.role);
                        $('#editAccount').modal('show');
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax Error:', error);
                    alert('Error fetching account details');
                }
            });
        });

        // Handle Delete button click
        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');
            if(confirm('Are you sure you want to delete this account?')) {
                $.ajax({
                    url: '../account_delete.php',
                    type: 'POST',
                    data: {id: id},
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax Error:', error);
                        alert('Error deleting account');
                    }
                });
            }
        });

        // Form validation
        $('form').on('submit', function(e) {
            var password = $(this).find('input[name="password"]').val();
            if(password && password.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long');
            }
        });

        // Toggle password visibility
        $(document).on('click', '.toggle-password', function() {
            var input = $(this).siblings('input');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                $(this).text('Hide');
            } else {
                input.attr('type', 'password');
                $(this).text('Show');
            }
        });
    });
    </script>
    
</body>
</html>
