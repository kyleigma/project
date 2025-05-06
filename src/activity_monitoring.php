<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

  <body>
    <div class="container-scroller">
      <!-- Navbar -->
      <?php include 'includes/navbar.php'; ?>
      <!-- Body Wrapper -->
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- Main Content -->
        <div class="main-panel">
          <div class="content-wrapper" style="padding: 0; margin: 0; height: calc(100vh - 60px);">
            <iframe 
              src="https://project-monitoring-five.vercel.app/" 
              style="width: 100%; height: 100%; border: none;">
            </iframe>
          </div>
          <!-- Content Wrapper Ends -->
          <!-- Footer -->
          <?php include 'includes/footer.php';?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include 'includes/scripts.php';?>
  </body>
</html>
