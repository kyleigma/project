<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>
<?php
    $selectedProject = isset($_GET['project']) ? $_GET['project'] : '';
    $selectedMunicipality = isset($_GET['municipality']) ? $_GET['municipality'] : '';
?>
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
          <div class="content-wrapper">
            <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-3 mb-4">
                <form method="GET" class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2 flex-grow-1">
                    <label class="mb-0 me-2 d-flex align-items-center" style="color: #484848; font-size: 14px;">Filter:</label>
                    <select name="project" class="form-select flex-fill" style="width: 100%; min-width: 100px; max-width: 150px; color: #484848; font-size: 14px;" onchange="this.form.submit()">
                        <option value="">All Projects</option>
                        <?php
                            $projectSql = "SELECT DISTINCT fp.id, fp.name FROM free_wifi_projects fp ORDER BY fp.name ASC";
                            $projectQuery = $conn->query($projectSql);
                            while($projectRow = $projectQuery->fetch_assoc()){
                                $selected = $selectedProject == $projectRow['id'] ? 'selected' : '';
                                echo "<option value='".$projectRow['id']."' ".$selected.">".$projectRow['name']."</option>";
                            }
                        ?>
                    </select>
                    <select name="municipality" class="form-select flex-fill" style="width: 100%; min-width: 100px; max-width: 150px; color: #484848; font-size: 14px;" onchange="this.form.submit()">
                        <option value="">All Municipalities</option>
                        <?php
                            $municipalitySql = "SELECT DISTINCT m.id, m.name FROM municipalities m ORDER BY m.name ASC";
                            $municipalityQuery = $conn->query($municipalitySql);
                            while($municipalityRow = $municipalityQuery->fetch_assoc()){
                                $selected = $selectedMunicipality == $municipalityRow['id'] ? 'selected' : '';
                                echo "<option value='".$municipalityRow['id']."' ".$selected.">".$municipalityRow['name']."</option>";
                            }
                        ?>
                    </select>
                </form>
                <div class="d-flex flex-column flex-sm-row gap-2 flex-shrink-0">
                    <a href="reports_ap_excel.php" class="btn btn-md btn-primary btn-flat"><i class="mdi mdi-file-excel"></i> Export</a>
                    <a href="reports_ap_print.php?project=<?php echo $selectedProject; ?>&municipality=<?php echo $selectedMunicipality; ?>" target="_blank" class="btn btn-md btn-primary btn-flat">
                        <i class="mdi mdi-printer-outline"></i> Print
                    </a>
                </div>
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
            
            <table class="table responsive table-striped datatable">
              <thead>
                <tr>
                    <th class="hidden"></th>
                    <th>Project Name</th>
                    <th>Location</th>
                    <th>Address</th>
                    <th>APs</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $sql = "SELECT 
                    fw.id, fw.address, fw.access_point, 
                    fp.name AS project_name, fw.status, m.name AS municipality_name
                            FROM free_wifi fw
                            INNER JOIN free_wifi_projects fp ON fw.project_id = fp.id
                            INNER JOIN municipalities m ON fw.municipality_id = m.id
                            WHERE 1=1";
                    
                    if (!empty($selectedProject)) {
                        $sql .= " AND fp.id = '" . $conn->real_escape_string($selectedProject) . "'";
                    }
                    if (!empty($selectedMunicipality)) {
                        $sql .= " AND m.id = '" . $conn->real_escape_string($selectedMunicipality) . "'";
                    }
                    
                    $sql .= " ORDER BY fw.address ASC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $statusBadge = $row['status'] == 'active' ? 'badge-success' : 'badge-danger';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$row['project_name']."</td> 
                          <td>".$row['municipality_name']."</td> 
                          <td>".$row['address']."</td> 
                          <td class='text-center'>".$row['access_point']."</td> 
                          <td class='text-center'>
                              <span class='badge rounded-pill $statusBadge' style='font-size: 0.75rem;'>".ucfirst($row['status'])."</span>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
              </tbody>
            </table>
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

     <!-- DataTables CSS and JS -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    
    <!-- jQuery (must be included before DataTables JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
  </body>
</html>