<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<?php
// Function to get access points count
function getAccessPointsCount($type, $id) {
    global $conn; // Use the global database connection

    if ($type === 'project') {
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM free_wifi WHERE project_id = ?");
    } else if ($type === 'municipality') {
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM free_wifi WHERE municipality_id = ?");
    } else {
        return 0;
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['count'];
}

// Sample data for projects and municipalities
$projects = [
    ["id" => 1, "title" => "IPTB", "image" => "assets/images/dict_proj/iptb.png", "link" => "iptb.php"],
    ["id" => 2, "title" => "MIS Aklan", "image" => "assets/images/dict_proj/misaklan.png", "link" => "mis_aklan.php"],
    ["id" => 3, "title" => "Municipal", "image" => "assets/images/dict_proj/municipal.png", "link" => "municipal.php"],
    ["id" => 4, "title" => "PIALEOS", "image" => "assets/images/dict_proj/pialeos.png", "link" => "pialeos.php"],
    ["id" => 5, "title" => "PICS-PP", "image" => "assets/images/dict_proj/picspp.png", "link" => "pics_pp.php"],
    ["id" => 6, "title" => "Region Initiated", "image" => "assets/images/dict_proj/region.png", "link" => "region_initiated.php"],
    ["id" => 7, "title" => "UISGIDA", "image" => "assets/images/dict_proj/uisgida.png", "link" => "uisgida.php"],
    ["id" => 8, "title" => "VSAT UNDP-CoRe", "image" => "assets/images/dict_proj/vsat.png", "link" => "vsat_undp_core.php"],
    ["id" => 9, "title" => "WITS", "image" => "assets/images/dict_proj/wits.png", "link" => "wits.php"],
];

$municipalities = [
    ["id" => 1, "title" => "Altavas", "image" => "assets/images/freewifi/altavas.png", "link" => "municipal_1.php"],
    ["id" => 2, "title" => "Balete", "image" => "assets/images/freewifi/balete.png", "link" => "municipal_2.php"],
    ["id" => 3, "title" => "Banga", "image" => "assets/images/freewifi/banga.png", "link" => "municipal_2.php"],
    ["id" => 4, "title" => "Batan", "image" => "assets/images/freewifi/batan.png", "link" => "municipal_2.php"],
    ["id" => 5, "title" => "Buruanga", "image" => "assets/images/freewifi/buruanga.png", "link" => "municipal_2.php"],
    ["id" => 6, "title" => "Ibajay", "image" => "assets/images/freewifi/ibajay.png", "link" => "municipal_2.php"],
    ["id" => 7, "title" => "Kalibo", "image" => "assets/images/freewifi/kalibo.png", "link" => "municipal_2.php"],
    ["id" => 8, "title" => "Lezo", "image" => "assets/images/freewifi/lezo.png", "link" => "municipal_2.php"],
    ["id" => 9, "title" => "Libacao", "image" => "assets/images/freewifi/libacao.png", "link" => "municipal_2.php"],
    ["id" => 10, "title" => "Madalag", "image" => "assets/images/freewifi/madalag.png", "link" => "municipal_2.php"],
    ["id" => 11, "title" => "Makato", "image" => "assets/images/freewifi/makato.png", "link" => "municipal_2.php"],
    ["id" => 12, "title" => "Malay", "image" => "assets/images/freewifi/malay.png", "link" => "municipal_2.php"],
    ["id" => 13, "title" => "Malinao", "image" => "assets/images/freewifi/malinao.png", "link" => "municipal_2.php"],
    ["id" => 14, "title" => "Nabas", "image" => "assets/images/freewifi/nabas.png", "link" => "municipal_2.php"],
    ["id" => 15, "title" => "New Washington", "image" => "assets/images/freewifi/new_wash.png", "link" => "municipal_2.php"],
    ["id" => 16, "title" => "Numancia", "image" => "assets/images/freewifi/numancia.png", "link" => "municipal_2.php"],
    ["id" => 17, "title" => "Tangalan", "image" => "assets/images/freewifi/tangalan.png", "link" => "municipal_2.php"],
];

// Add access points count to projects and municipalities
foreach ($projects as &$project) {
    $project['access_point'] = getAccessPointsCount('project', $project['id']);
}
foreach ($municipalities as &$municipality) {
    $municipality['access_point'] = getAccessPointsCount('municipality', $municipality['id']);
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
                            <h1 class="h3 mb-0 text-gray-800 mb-3">Implemented Aklan Free WiFi Sites - IPTB</h1>
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