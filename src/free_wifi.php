<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<?php
// Function to get access points count
function getAccessPointsCount($type, $id) {
    global $conn; // Use the global database connection

    if ($type === 'project') {
        $stmt = $conn->prepare("SELECT SUM(access_point) as count FROM free_wifi WHERE project_id = ?");
    } else if ($type === 'municipality') {
        $stmt = $conn->prepare("SELECT SUM(access_point) as count FROM free_wifi WHERE municipality_id = ?");
    } else {
        return 0;
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['count'] ?? 0; // Return 0 if NULL
}

// Fetch projects from free_wifi_projects table
$projects = [];
$projectQuery = "SELECT id, name FROM free_wifi_projects";
$result = $conn->query($projectQuery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = [
            "id" => $row['id'],
            "title" => $row['name'],
            "image" => "assets/images/dict_proj/".strtolower(str_replace(' ', '_', $row['name'])).".png", // Auto-generate image path
            "link" => strtolower(str_replace(' ', '_', $row['name'])).".php",
            "access_point" => getAccessPointsCount('project', $row['id'])
        ];
    }
}

// Fetch municipalities from municipalities table
$municipalities = [];
$municipalityQuery = "SELECT id, name FROM municipalities";
$result = $conn->query($municipalityQuery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $municipalities[] = [
            "id" => $row['id'],
            "title" => $row['name'],
            "image" => "assets/images/freewifi/".strtolower(str_replace(' ', '_', $row['name'])).".png", // Auto-generate image path
            "link" => "municipal_".$row['id'].".php",
            "access_point" => getAccessPointsCount('municipality', $row['id'])
        ];
    }
}
?>


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
                    <div class="container">
                        <img src="assets/images/dict_proj/freewifi4all.png" class="img-fluid mb-4 rounded" alt="Header Image">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800 mb-3">Implemented Aklan Free WiFi Sites</h1>
                            <nav style="font-size:85%;" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                                    <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                                    <li class="active" aria-current="page">Free Wifi</a></li>
                                </ol>
                            </nav>
                        </div>
                        <!-- Tab navigation -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="projects" aria-selected="true">Projects</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="municipality-tab" data-bs-toggle="tab" data-bs-target="#municipality" type="button" role="tab" aria-controls="municipality" aria-selected="false">Municipality</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Projects Tab -->
                            <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                                <div class="row mt-4">
                                    <?php foreach ($projects as $project): ?>
                                    <div class="col-md-4 mb-4">
                                        <a href="<?php echo $project['link']; ?>" class="text-decoration-none">
                                            <div class="card h-100">
                                                <img src="<?php echo $project['image']; ?>" class="card-img-top" alt="Image">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-title"><?php echo $project['title']; ?></h6>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <p class="text-muted mb-0">Access Points:</p>
                                                            <h2 class="card-title text-primary fw-bold" style="font-size: 1.5rem;"><?php echo $project['access_point']; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Municipality Tab -->
                            <div class="tab-pane fade" id="municipality" role="tabpanel" aria-labelledby="municipality-tab">
                                <div class="row mt-4">
                                    <?php foreach ($municipalities as $municipality): ?>
                                    <div class="col-md-4 mb-4">
                                        <a href="<?php echo $municipality['link']; ?>" class="text-decoration-none">
                                            <div class="card h-100">
                                                <div class="card-img-container position-relative">
                                                    <img src="<?php echo $municipality['image']; ?>" class="card-img-top" alt="Image">
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h4 class="card-title"><?php echo $municipality['title']; ?></h4>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <p class="text-muted mb-0">Access Points:</p>
                                                            <h2 class="card-title text-primary fw-bold" style="font-size: 1.5rem;"><?php echo $municipality['access_point']; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                    
                                </div>
                            </div>
                        </div>
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
    <?php include 'includes/scripts.php';?>

    <script>
(function ($) {
  'use strict';
  $(function () {
    var body = $('body');

    // Store and retrieve active tab from localStorage
    function setActiveTab() {
      var activeTab = localStorage.getItem("activeTab");

      if (activeTab) {
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');

        var selectedTab = $('#' + activeTab);
        var selectedPane = $(selectedTab.attr('data-bs-target'));

        if (selectedTab.length && selectedPane.length) {
          selectedTab.addClass('active');
          selectedPane.addClass('show active');
        }
      } else {
        // Set default tab to "Projects" if no active tab is found in localStorage
        $('#projects-tab').addClass('active');
        $('#projects').addClass('show active');
      }
    }

    // Save the clicked tab ID in localStorage
    $('.nav-link').on("click", function () {
      localStorage.setItem("activeTab", this.id);
    });

    // Apply the active tab after the page loads
    setActiveTab();
  });

})(jQuery);
    </script>


</body>
</html>