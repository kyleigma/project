<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<?php
// Sample data for projects and municipalities
$projects = [
    ["title" => "IPTB", "description" => "This is a description for card 1.", "image" => "https://placehold.co/350x150/png", "link" => "iptb.php"],
    ["title" => "MIS Aklan", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "mis_aklan.php"],
    ["title" => "Municipal", "description" => "This is a description for card 3.", "image" => "https://placehold.co/350x150/png", "link" => "municipal.php"],
    ["title" => "PIALEOS", "description" => "This is a description for card 4.", "image" => "https://placehold.co/350x150/png", "link" => "pialeos.php"],
    ["title" => "PICS-PP", "description" => "This is a description for card 5.", "image" => "https://placehold.co/350x150/png", "link" => "pics_pp.php"],
    ["title" => "Region Initiated", "description" => "This is a description for card 6.", "image" => "https://placehold.co/350x150/png", "link" => "region_initiated.php"],
    ["title" => "UISGIDA", "description" => "This is a description for card 7.", "image" => "https://placehold.co/350x150/png", "link" => "uisgida.php"],
    ["title" => "VSAT UNDP-CoRe", "description" => "This is a description for card 8.", "image" => "https://placehold.co/350x150/png", "link" => "vsat_undp_core.php"],
    ["title" => "WITS", "description" => "This is a description for card 9.", "image" => "https://placehold.co/350x150/png", "link" => "wits.php"],
];

$municipalities = [
    ["title" => "Altavas", "description" => "This is a description for card 1.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_1.php"],
    ["title" => "Balete", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Banga", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Batan", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Buruanga", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Ibajay", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Kalibo", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Lezo", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Libacao", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Madalag", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Makato", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Malay", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Malinao", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Nabas", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "New Washington", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Numancia", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
    ["title" => "Tangalan", "description" => "This is a description for card 2.", "image" => "https://placehold.co/350x150/png", "link" => "municipal_2.php"],
];
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
                        <img src="https://placehold.co/1920x400" class="img-fluid mb-3" alt="Header Image">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Free Wifi</h1>
                            <nav style="font-size:85%;" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class=""><a href="home.php">Dashboard</a></li>&nbsp;&nbsp;&nbsp;
                                    <li class=""><i class="mdi mdi-menu-right"></i></li>&nbsp;&nbsp;&nbsp;
                                    <li class="active" aria-current="page">Free Wifi</li>
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
                                                    <h6 class="card-title"><?php echo $project['title']; ?></h6>
                                                    <p class="card-text"><?php echo $project['description']; ?></p>
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
                                                <img src="<?php echo $municipality['image']; ?>" class="card-img-top" alt="Image">
                                                <div class="card-body">
                                                    <h6 class="card-title"><?php echo $municipality['title']; ?></h6>
                                                    <p class="card-text"><?php echo $municipality['description']; ?></p>
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
</body>
</html>