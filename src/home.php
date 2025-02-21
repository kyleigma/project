
	<?php include 'includes/session.php'; ?>
	<?php include 'includes/header.php'; ?>

  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include 'includes/navbar.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <h2 class="mb-3">Dashboard</h2>
                  <div class="d-sm-flex align-items-center justify-content-end border-bottom">
                    <div>
                      <!-- <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                      </div> -->
                    </div>
                  </div>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Monthly Bills</h4>
                                            <h5 class="card-subtitle card-subtitle-dash">Overview of Electricity, Water, and WiFi Bills</h5>
                                        </div>
                                    </div>
                                    <div class="chartjs-wrapper mt-4" style="width: 100%; min-height: 400px;">
                                        <canvas id="overviewChart" style="width: 100%; height: 400px;"></canvas>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <!-- Project-wise AP Distribution -->
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                <div class="card card-rounded text-center">
                                    <div class="card-body">
                                        <h4 class="card-title">Access Points by Projects</h4>
                                        <div class="chart-container" style="position: relative; height: auto; width: 100%;">
                                            <canvas id="projectDonutChart"></canvas>
                                        </div>
                                        <div id="projectDonutChart-legend" class="mt-4 text-center d-flex flex-wrap justify-content-center"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                        <div>
                                          <p class="text-small mb-2">Sample</p>
                                          <h4 class="mb-0 fw-bold">26.80%</h4>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                          <p class="text-small mb-2">Sample</p>
                                          <h4 class="mb-0 fw-bold">9065</h4>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash">Electricity Bills</h4>
                                      <p class="card-subtitle card-subtitle-dash"></p>
                                    </div>
                                  </div>
                                  <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                    <!-- <div class="me-3">
                                      <div id="marketingOverview-legend"></div>
                                    </div> -->
                                  </div>
                                  <div class="chartjs-bar-wrapper mt-3">
                                    <canvas id="electricityChart" style="height: 500px;"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash">WiFi Bills</h4>
                                      <p class="card-subtitle card-subtitle-dash"></p>
                                    </div>
                                  </div>
                                  <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                    <!-- <div class="me-3">
                                      <div id="marketingOverview-legend"></div>
                                    </div> -->
                                  </div>
                                  <div class="chartjs-bar-wrapper mt-3">
                                    <canvas id="wifiChart" style="height: 500px;"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash">Water Bills</h4>
                                      <p class="card-subtitle card-subtitle-dash"></p>
                                    </div>
                                  </div>
                                  <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                    <!-- <div class="me-3">
                                      <div id="marketingOverview-legend"></div>
                                    </div> -->
                                  </div>
                                  <div class="chartjs-bar-wrapper mt-3">
                                    <canvas id="waterChart" style="height: 500px;"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title card-title-dash">Activities</h4>
                                        <div class="add-items d-flex mb-0">
                                          <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                          <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                      </div>
                                      <div class="list-wrapper">
                                        <ul class="todo-list todo-list-rounded">
                                          <li class="d-block">
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                                <i class="mdi mdi-flag ms-2 flag-color"></i>
                                              </div>
                                            </div>
                                          </li>
                                          <li class="d-block">
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">23 June 2020</div>
                                                <div class="badge badge-opacity-success me-3">Done</div>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-success me-3">Done</div>
                                              </div>
                                            </div>
                                          </li>
                                          <li class="border-bottom-0">
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-danger me-3">Expired</div>
                                              </div>
                                            </div>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row flex-grow">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                          <h4 class="card-title card-title-dash">Project Distribution</h4>
                                      </div>
                                      
                                      <!-- Add this spinner inside the same container -->
                                      <div id="loadingSpinner" class="spinner-container">
                                          <div class="dot-spinner">
                                              <div class="dot"></div>
                                              <div class="dot"></div>
                                              <div class="dot"></div>
                                          </div>
                                      </div>

                                      <!-- Canvas for the Pie Chart -->
                                      <div class="chart-container" style="position: relative; height: auto; width: 100%;">
                                            <canvas id="projectPieChart"></canvas>
                                      </div>
                                      
                                      <!-- Legend for Pie Chart -->
                                      <div id="projectPieChart-legend" class="mt-4 text-center d-flex flex-wrap justify-content-center"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                          <h4 class="card-title card-title-dash">Statistics</h4>
                                        </div>
                                        <div>
                                          <div class="dropdown">
                                            <button class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                              <h6 class="dropdown-header">week Wise</h6>
                                              <a class="dropdown-item" href="#">Year Wise</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="mt-3">
                                        <canvas id="leaveReport"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                          <!-- <h4 class="card-title card-title-dash">Top Performer</h4> -->
                                        </div>
                                      </div>
                                      <div class="mt-3">
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include 'includes/footer.php'; ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include 'includes/scripts.php';?>
    
    <?php
      include("includes/conn.php");

      // Electricity Bill Data
      $labels101 = [];
      $values101 = [];
      $sqlElectricity = "SELECT month_2, total_amount_2 FROM electric_bill ORDER BY month_2 ASC";
      $resultElectricity = $conn->query($sqlElectricity);
      while ($row = $resultElectricity->fetch_assoc()) {
          $labels101[] = date("F Y", strtotime($row['month_2']));
          $values101[] = floatval($row['total_amount_2']);
      }

      // Water Bill Data
      $waterlabel = [];
      $watervalues = [];
      $sqlWater = "SELECT month_wb, total_amount_wb FROM water_bill ORDER BY month_wb ASC";
      $resultWater = $conn->query($sqlWater);
      while ($row = $resultWater->fetch_assoc()) {
          $waterlabel[] = date("F Y", strtotime($row['month_wb']));
          $watervalues[] = floatval($row['total_amount_wb']);
      }

      // WiFi Bill Data
      $wifilabels = [];
      $wifivalues = [];
      $sqlWifi = "SELECT month_1, total_amount_1 FROM wifi_bill ORDER BY month_1 ASC";
      $resultWifi = $conn->query($sqlWifi);
      while ($row = $resultWifi->fetch_assoc()) {
          $wifilabels[] = date("F Y", strtotime($row['month_1']));
          $wifivalues[] = floatval($row['total_amount_1']);
      }
    ?>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var electricityValues = <?php echo json_encode($values101); ?>;
    var electricityLabels = <?php echo json_encode($labels101); ?>;
    
    var waterValues = <?php echo json_encode($watervalues); ?>;
    var waterLabels = <?php echo json_encode($waterlabel); ?>;
    
    var wifiValues = <?php echo json_encode($wifivalues); ?>;
    var wifiLabels = <?php echo json_encode($wifilabels); ?>;

    // Function to determine the max Y-axis value
    function getMaxValue(data) {
        let max = Math.max(...data);
        return Math.ceil(max / 1000) * 1000 || 1000; // Round up to the nearest 1000
    }

    // Function to create a chart
    function createChart(ctx, labels, label, data, borderColor, backgroundColor, maxY) {
        new Chart(ctx, {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: data,
                    borderColor: borderColor,
                    backgroundColor: backgroundColor,
                    borderWidth: 2,
                    fill: true,
                    pointRadius: 3,
                    pointHoverRadius: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: true },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.dataset.label}: ₱${tooltipItem.raw.toLocaleString("en-PH")}`;
                            }
                        }
                    }
                },
                scales: {
                    x: { 
                        title: { display: true, text: "Months" },
                        ticks: { autoSkip: false, maxRotation: 45, minRotation: 45 }
                    },
                    y: { 
                        title: { display: true, text: "Total Amount (₱)" },
                        ticks: { callback: value => `₱${value.toLocaleString()}` },
                        suggestedMax: maxY
                    }
                }
            }
        });
    }

    // Individual Charts with Unique X-Axis Labels
    createChart(
        document.getElementById("electricityChart"),
        electricityLabels,
        "Electricity Bill",
        electricityValues,
        "#ff5733",
        "#ff573333",
        getMaxValue(electricityValues)
    );

    createChart(
        document.getElementById("waterChart"),
        waterLabels,
        "Water Bill",
        waterValues,
        "#3498db",
        "#3498db33",
        getMaxValue(waterValues)
    );

    createChart(
        document.getElementById("wifiChart"),
        wifiLabels,
        "WiFi Bill",
        wifiValues,
        "#2ecc71",
        "#2ecc7133",
        getMaxValue(wifiValues)
    );

    // Overview Chart (Shared Timeline)
    var overviewCanvas = document.getElementById("overviewChart");
    if (overviewCanvas) {
        new Chart(overviewCanvas, {
            type: "line",
            data: {
                labels: [...new Set([...electricityLabels, ...waterLabels, ...wifiLabels])], // Merged unique labels
                datasets: [
                    { label: "Electricity Bill", data: electricityValues, borderColor: "#ff5733", backgroundColor: "#ff573333", borderWidth: 2, fill: true },
                    { label: "Water Bill", data: waterValues, borderColor: "#3498db", backgroundColor: "#3498db33", borderWidth: 2, fill: true },
                    { label: "WiFi Bill", data: wifiValues, borderColor: "#2ecc71", backgroundColor: "#2ecc7133", borderWidth: 2, fill: true }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: true },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.dataset.label}: ₱${tooltipItem.raw.toLocaleString("en-PH")}`;
                            }
                        }
                    }
                },
                scales: {
                    x: { 
                        title: { display: true, text: "Months" },
                        ticks: { autoSkip: false, maxRotation: 45, minRotation: 45 }
                    },
                    y: { 
                        title: { display: true, text: "Total Amount (₱)" },
                        ticks: { callback: value => `₱${value.toLocaleString()}` },
                        suggestedMax: getMaxValue([...electricityValues, ...waterValues, ...wifiValues]) // Uses highest across all bills
                    }
                }
            }
        });
    } else {
        console.error("overviewChart canvas element not found!");
    }
});
</script>


<style>
    /* Set a fixed height for charts */
    .chart-container {
        height: 1000px; /* Adjust height as needed */
    }
</style>

<?php
include("includes/conn.php");

// Retrieve access points per project
$projectLabels = [];
$projectValues = [];

$sqlProject = "SELECT p.name AS project_name, SUM(fw.access_point) AS total_ap 
               FROM free_wifi fw
               INNER JOIN free_wifi_projects p ON fw.project_id = p.id
               GROUP BY p.name";
$resultProject = $conn->query($sqlProject);
while ($row = $resultProject->fetch_assoc()) {
    $projectLabels[] = $row['project_name'];
    $projectValues[] = intval($row['total_ap']);
}
?>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var ctxProject = document.getElementById("projectDonutChart").getContext("2d");

    // Star Admin 2 Blue Shades
    var starAdminBlueShades = ["#4B49AC", "#007BFF", "#6C757D", "#17A2B8", "#5A5C69", "#1F3BB3"];

    // Get project labels and values from PHP
    var projectLabels = <?php echo json_encode($projectLabels); ?>;
    var projectValues = <?php echo json_encode($projectValues); ?>;

    // Ensure each label has a color (cycle through if more labels than colors)
    var backgroundColors = projectLabels.map((_, i) => starAdminBlueShades[i % starAdminBlueShades.length]);

    // Track original values to restore when re-enabling
    var originalValues = [...projectValues];

    // ✅ Calculate Total Amount
    function calculateTotal() {
        return projectValues.reduce((acc, val) => acc + val, 0);
    }

    // ✅ Custom Chart.js Plugin for Center Text (with Page Font Style)
    const centerTextPlugin = {
        id: "centerText",
        beforeDraw: function (chart) {
            let width = chart.width,
                height = chart.height,
                ctx = chart.ctx;

            // ✅ Get the computed font from the page
            let sampleText = document.body; // Change this if you want to match a specific element
            let computedFont = window.getComputedStyle(sampleText).font; // Gets the page font style

            ctx.save();
            ctx.font = computedFont; // Apply the page's font style dynamically
            ctx.fillStyle = "#333"; // Dark text for visibility
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            let total = calculateTotal();
            let text = total > 0 ? `Total: ${total}` : "No Data";

            ctx.fillText(text, width / 2, height / 2);
            ctx.restore();
        }
    };

    // ✅ Create the Chart
    var projectChart = new Chart(ctxProject, {
        type: "doughnut",
        data: {
            labels: projectLabels,
            datasets: [{
                data: projectValues,
                backgroundColor: backgroundColors,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Hide default legend, using custom one
                }
            }
        },
        plugins: [centerTextPlugin] // ✅ Add the plugin here
    });

    // ✅ Custom Legend with Interactivity
    var legendContainer = document.getElementById("projectDonutChart-legend");
    legendContainer.innerHTML = ""; // Clear any previous content

    projectLabels.forEach((label, index) => {
        var legendItem = document.createElement("div");
        legendItem.style.display = "inline-flex";
        legendItem.style.alignItems = "center";
        legendItem.style.margin = "5px 10px";
        legendItem.style.cursor = "pointer"; // Clickable for toggling visibility
        legendItem.dataset.index = index;

        // Generate legend item
        legendItem.innerHTML = `
            <span class="legend-color" style="width: 12px; height: 12px; background-color: ${backgroundColors[index]}; display: inline-block; margin-right: 8px; border-radius: 50%;"></span>
            <span class="legend-label" style="font-size: 14px;">${label}</span>
        `;

        // ✅ Toggle dataset visibility on click
        legendItem.addEventListener("click", function () {
            var dataset = projectChart.data.datasets[0];
            var labelText = legendItem.querySelector(".legend-label");
            var legendColor = legendItem.querySelector(".legend-color");

            if (dataset.data[index] === 0) {
                // Restore original value
                dataset.data[index] = originalValues[index];
                legendColor.style.opacity = "1"; // Show color
                labelText.style.textDecoration = "none"; // Remove strikethrough
                labelText.style.color = ""; // Restore default text color
            } else {
                // Hide dataset value
                dataset.data[index] = 0;
                legendColor.style.opacity = "0.4"; // Dim legend color
                labelText.style.textDecoration = "line-through"; // Cross out text
                labelText.style.color = "#6c757d"; // Muted text color
            }

            // ✅ Update total text inside donut hole
            projectChart.update();
        });

        legendContainer.appendChild(legendItem);
    });
});
</script>

<!-- Add this spinner in your HTML -->
<div id="loadingSpinner" style="display: none; text-align: center;">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var ctxProject = document.getElementById("projectPieChart").getContext("2d");

    // Star Admin 2 Blue Shades (or choose your own color palette)
    var starAdminBlueShades = ["#4B49AC", "#007BFF", "#6C757D", "#17A2B8", "#5A5C69", "#1F3BB3"];

    function showLoading() {
        document.getElementById('loadingSpinner').style.display = 'block';
    }

    function hideLoading() {
        document.getElementById('loadingSpinner').style.display = 'none';
    }

    // Function to fetch project data using AJAX
    function fetchProjectData() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'neon_fetch_projects.php', true);

        // Show loading spinner before the request starts
        showLoading();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var projectData = JSON.parse(xhr.responseText); // Assuming PHP returns JSON data
                if (Array.isArray(projectData) && projectData.length > 0) {
                    renderChart(projectData);
                } else {
                    console.error("No valid project data received");
                }

                // Hide loading spinner after data is loaded
                hideLoading();
            }
        };
        xhr.send();
    }

    // Function to render the chart with the fetched data
    function renderChart(projectData) {
        var projectLabels = projectData.map(project => project.name); // Project names
        var projectValues = projectData.map(project => project.value); // Activities count
        var participants = projectData.map(project => project.participants); // Number of participants

        // Ensure each label has a color (cycle through if more labels than colors)
        var backgroundColors = projectLabels.map((_, i) => starAdminBlueShades[i % starAdminBlueShades.length]);

        // Track original values to restore when re-enabling
        var originalValues = [...projectValues];

        // ✅ Create the Pie Chart (not Donut Chart)
        var projectChart = new Chart(ctxProject, {
            type: "pie", // Changed to pie chart
            data: {
                labels: projectLabels, // Project names
                datasets: [{
                    data: projectValues,
                    backgroundColor: backgroundColors,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true, // Keep the aspect ratio for chart to avoid extra space
                layout: {
                    padding: {
                        bottom: 0 // Remove the bottom padding
                    }
                },
                plugins: {
                    legend: {
                        display: false // Hide default legend, using custom one
                    }
                }
            }
        });

        // ✅ Custom Legend with Interactivity
        var legendContainer = document.getElementById("projectPieChart-legend");
        legendContainer.innerHTML = ""; // Clear any previous content

        projectData.forEach((project, index) => {
            var legendItem = document.createElement("div");
            legendItem.style.display = "inline-flex";
            legendItem.style.alignItems = "center";
            legendItem.style.margin = "5px 10px";
            legendItem.style.cursor = "pointer"; // Clickable for toggling visibility
            legendItem.dataset.index = index;

            // Generate legend item
            legendItem.innerHTML = ` 
                <span class="legend-color" style="width: 12px; height: 12px; background-color: ${backgroundColors[index]}; display: inline-block; margin-right: 8px; border-radius: 50%;"></span>
                <span class="legend-label" style="font-size: 14px;">${project.name}</span>
            `;

            // ✅ Toggle dataset visibility on click
            legendItem.addEventListener("click", function () {
                var dataset = projectChart.data.datasets[0];
                var labelText = legendItem.querySelector(".legend-label");
                var legendColor = legendItem.querySelector(".legend-color");

                if (dataset.data[index] === 0) {
                    // Restore original value
                    dataset.data[index] = originalValues[index];
                    legendColor.style.opacity = "1"; // Show color
                    labelText.style.textDecoration = "none"; // Remove strikethrough
                    labelText.style.color = ""; // Restore default text color
                } else {
                    // Hide dataset value
                    dataset.data[index] = 0;
                    legendColor.style.opacity = "0.4"; // Dim legend color
                    labelText.style.textDecoration = "line-through"; // Cross out text
                    labelText.style.color = "#6c757d"; // Muted text color
                }

                // ✅ Update total text inside pie chart
                projectChart.update();
            });

            legendContainer.appendChild(legendItem);
        });
    }

    // Fetch data from the PHP file
    fetchProjectData();
});
</script>


<style>
/* Container for centering the spinner */
.spinner-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centers spinner */
    display: none; /* Hidden by default */
}

/* Styling for dot spinner */
.dot-spinner {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 50px;
}

.dot {
    position: absolute;
    top: 0;
    width: 10px;
    height: 10px;
    background-color: #007bff;
    border-radius: 50%;
    animation: dot 1.2s infinite ease-in-out;
}

.dot:nth-child(1) {
    left: 0;
    animation-delay: 0s;
}

.dot:nth-child(2) {
    left: 20px;
    animation-delay: 0.2s;
}

.dot:nth-child(3) {
    left: 40px;
    animation-delay: 0.4s;
}

@keyframes dot {
    0%, 100% {
        transform: scale(0);
    }
    50% {
        transform: scale(1);
    }
}
</style>


  </body>
</html>