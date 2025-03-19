<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

  <body>
    <div class="container-scroller">
      <?php include 'includes/navbar.php'; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include 'includes/sidebar.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <img src="assets/images/dict_proj/gecs.png" class="img-fluid mb-4 rounded" alt="Header Image">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800 mb-3"><b>Government Emergency Communications System (GECS)</b></h1>
                <nav style="font-size:85%;" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                        <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                        <li class="active" aria-current="page">GECS</li>
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
                            <button type='button class='btn-close ms-auto' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                    unset($_SESSION['success']);
                }
            ?>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <button class="btn btn-primary addnew"><i class="mdi mdi-plus"></i> New</button>
                <div class="ml-auto">
                    <a href="#" target="" class="btn btn-md btn-primary btn-flat">
                        <i class="mdi mdi-printer-outline"></i> Print
                    </a>
                    <a href="#" class="btn btn-md btn-primary btn-flat">
                        <i class="mdi mdi-file-excel"></i> Export
                    </a>
                </div>
            </div>
          </div>
          <?php include 'includes/footer.php';?>
        </div>
      </div>
    </div>
    <?php include 'includes/gecs_modal.php';?>
    <?php include 'includes/scripts.php';?>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function () {
      $(document).on('click', '.addnew', function (e) {
        e.preventDefault();
        if ($('#addnew').length) {
          $('#addnew').modal('show');
        }
      });
      
      $(document).on('click', '.close-modal', function () {
        var modal = $(this).closest('.modal');
        if (modal.length) {
          modal.modal('hide');
        }
      });
    });
    </script>
  </body>
</html>