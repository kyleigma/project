<?php include 'includes/header.php';?>
<?php include 'includes/scripts.php';?>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="home.php">
              <img src="assets/images/dictlogo-full.png" alt="logo" style="transform: scale(1.5); margin-left: 1rem;"/>
            </a>
            <a class="navbar-brand brand-logo-mini" href="home.php">
              <img src="assets/images/dictlogo-mini.png" alt="logo" />
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

      <?php include 'includes/profile_update_modal.php';?>

<script>
// Complete modal backdrop management
document.addEventListener('DOMContentLoaded', function() {
    let singleBackdrop = null;
    let modalStack = [];

    // Intercept all modal show events
    document.addEventListener('show.bs.modal', function(event) {
        // Add modal to stack
        modalStack.push(event.target);
        
        // Remove any existing backdrops
        document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
        
        // Create new backdrop if it doesn't exist
        if (!singleBackdrop) {
            singleBackdrop = document.createElement('div');
            singleBackdrop.classList.add('modal-backdrop', 'fade', 'show');
            document.body.appendChild(singleBackdrop);
        }
        
        // Ensure proper z-index stacking
        const modal = event.target;
        modal.style.zIndex = 1060 + modalStack.length * 10;
        if (singleBackdrop) {
            singleBackdrop.style.zIndex = 1050 + modalStack.length * 10;
        }
    });

    // Intercept all modal hide events
    document.addEventListener('hidden.bs.modal', function(event) {
        // Remove modal from stack
        modalStack = modalStack.filter(modal => modal !== event.target);
        
        // Remove backdrop if no more modals are open
        if (modalStack.length === 0 && singleBackdrop) {
            singleBackdrop.remove();
            singleBackdrop = null;
        }
    });

    // Prevent Bootstrap from creating backdrops
    const originalModal = bootstrap.Modal;
    bootstrap.Modal = function(element, options) {
        options = options || {};
        options.backdrop = false; // Disable Bootstrap's backdrop creation
        return new originalModal(element, options);
    };
    bootstrap.Modal.prototype = originalModal.prototype;

    // Clean up any existing backdrops
    document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
});
</script>