<?php include 'includes/header.php';?>
<?php include 'includes/scripts.php';?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="home.php">
              <img src="assets/images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="home.php">
              <img src="assets/images/logo-mini.svg" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo (!empty($user['photo'])) ? 'assets/images/'.$user['photo'] : 'assets/images/logo-mini.svg'; ?>" class="img-circle" alt="User Image">
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown p-3 shadow-lg" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center border-bottom pb-3">
                    <img src="<?php echo (!empty($user['photo'])) ? 'assets/images/'.$user['photo'] : 'assets/images/logo-mini.svg'; ?>" 
                        class="img-fluid rounded-circle mb-2 border" 
                        style="width: 70px; height: 70px; object-fit: cover;" 
                        alt="User Image">
                    <h6 class="mb-0"><b><?php echo $user['firstname'].' '.$user['lastname']; ?></b></h6>
                    <small class="text-muted">
                        <i class="fa fa-circle text-success me-1"></i> Online
                    </small>
                </div>
                <a href="#profile" class="dropdown-item d-flex align-items-center py-2" data-bs-toggle="modal" data-bs-target="#profile">
                    <i class="mdi mdi-account-outline text-primary me-2"></i> 
                    <span>Edit Profile</span>
                </a>
                <a href="logout.php" class="dropdown-item d-flex align-items-center py-2">
                    <i class="mdi mdi-power text-danger me-2"></i> 
                    <span>Sign Out</span>
                </a>
            </div>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>