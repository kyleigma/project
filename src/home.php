
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
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card bg-primary card-rounded">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                  <h4 class="card-title card-title-dash text-white mb-3 text-wrap">Total APs</h4>
                                  <h2 class="text-white display-4">
                                    <?php
                                      $sql = "SELECT SUM(total_aps) AS total FROM (
                                          SELECT aps_altavas as total_aps FROM altavas UNION ALL
                                          SELECT aps_balete as total_aps FROM balete UNION ALL
                                          SELECT aps_banga as total_aps FROM banga UNION ALL
                                          SELECT aps_batan as total_aps FROM batan UNION ALL
                                          SELECT aps_buruanga as total_aps FROM buruanga UNION ALL
                                          SELECT aps_ibajay as total_aps FROM ibajay UNION ALL
                                          SELECT aps_uisgida as total_aps FROM kalibo UNION ALL
                                          SELECT aps_vsat_undp_core as total_aps FROM lezo UNION ALL
                                          SELECT aps_wits as total_aps FROM libacao  ) AS all_aps ";
                                      $query = $conn->query($sql);
                                      $row = $query->fetch_assoc();
                                      echo $row['total'];
                                    ?>
                                  </h2>
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
                                      <h4 class="card-title card-title-dash">Electric Bill</h4>
                                      <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
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
                                      <h4 class="card-title card-title-dash">Usage Rate</h4>
                                      <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
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
                                      <h4 class="card-title card-title-dash">Water Bill</h4>
                                      <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
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
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title card-title-dash">Type By Amount</h4>
                                      </div>
                                      <div>
                                        <canvas class="my-auto" id="doughnutChart"></canvas>
                                      </div>
                                      <div id="doughnutChart-legend" class="mt-5 text-center"></div>
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
// Function to format month
function formatMonth($dateString) {
    $timestamp = strtotime($dateString);
    return $timestamp ? date("Y-m", $timestamp) : null;
}

// Fetch & process electricity bill data
$electricityData = [];
$labels = [];
$sql101 = "SELECT month_2, total_amount_2 FROM electric_bill";
$result101 = $conn->query($sql101);
if ($result101->num_rows > 0) {
    while ($row = $result101->fetch_assoc()) {
        $month = formatMonth($row['month_2']);
        if ($month) {
            $electricityData[$month] = floatval($row['total_amount_2']);
            $labels[] = $month;
        }
    }
}

// Fetch & process water bill data
$waterData = [];
$sqlwater = "SELECT month_wb, total_amount_wb FROM water_bill";
$resultwater = $conn->query($sqlwater);
if ($resultwater->num_rows > 0) {
    while ($row = $resultwater->fetch_assoc()) {
        $month = formatMonth($row['month_wb']);
        if ($month) {
            $waterData[$month] = floatval($row['total_amount_wb']);
            $labels[] = $month;
        }
    }
}

// Fetch & process WiFi bill data
$wifiData = [];
$sqlwifi = "SELECT month_1, total_amount_1 FROM wifi_bill";
$resultwifi = $conn->query($sqlwifi);
if ($resultwifi->num_rows > 0) {
    while ($row = $resultwifi->fetch_assoc()) {
        $month = formatMonth($row['month_1']);
        if ($month) {
            $wifiData[$month] = floatval($row['total_amount_1']);
            $labels[] = $month;
        }
    }
}

// Remove duplicates & sort months
$labels = array_unique($labels);
sort($labels);

// Organize data for the chart
$chartLabels = [];
$electricityValues = [];
$waterValues = [];
$wifiValues = [];

foreach ($labels as $month) {
    $chartLabels[] = date("F Y", strtotime($month));
    $electricityValues[] = isset($electricityData[$month]) ? $electricityData[$month] : 0;
    $waterValues[] = isset($waterData[$month]) ? $waterData[$month] : 0;
    $wifiValues[] = isset($wifiData[$month]) ? $wifiData[$month] : 0;

}
?>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var chartLabels = <?php echo json_encode($chartLabels); ?>;
    var electricityValues = <?php echo json_encode($electricityValues); ?>;
    var waterValues = <?php echo json_encode($waterValues); ?>;
    var wifiValues = <?php echo json_encode($wifiValues); ?>;

    function getMaxValue(data) {
    return Math.max(...data) > 0 ? Math.ceil(Math.max(...data) / 1000) * 1000 : 1000;
}

    function createChart(ctx, label, data, borderColor, backgroundColor) {
        new Chart(ctx, {
            type: "line",
            data: {
                labels: chartLabels,
                datasets: [
                    {
                        label: label,
                        data: data,
                        borderColor: borderColor,
                        backgroundColor: backgroundColor,
                        borderWidth: 2,
                        fill: true,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }
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
                                let value = tooltipItem.raw.toLocaleString("en-PH", { style: "currency", currency: "PHP" });
                                return `${tooltipItem.dataset.label}: ${value}`;
                            }
                        }
                    }
                },
                scales: {
                    x: { title: { display: true, text: "Months" } },
                    y: { 
                        title: { display: true, text: "Total Amount (₱)" },
                        ticks: { 
                            callback: function(value) {
                                return `₱${value.toLocaleString()}`;
                            }
                        },
                        suggestedMax: getMaxValue([electricityValues, waterValues, wifiValues])
                    }
                }
            }
        });
    }

    createChart(document.getElementById("electricityChart"), "Electricity Bill", electricityValues, "#ff5733", "#ff573333");
    createChart(document.getElementById("waterChart"), "Water Bill", waterValues, "#3498db", "#3498db33");
    createChart(document.getElementById("wifiChart"), "WiFi Bill", wifiValues, "#2ecc71", "#2ecc7133");

    var overviewCanvas = document.getElementById("overviewChart");
    if (overviewCanvas) {
        new Chart(overviewCanvas, {
            type: "line",
            data: {
                labels: chartLabels,
                datasets: [
                    {
                        label: "Electricity Bill",
                        data: electricityValues,
                        borderColor: "#ff5733",
                        backgroundColor: "#ff573333",
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: "Water Bill",
                        data: waterValues,
                        borderColor: "#3498db",
                        backgroundColor: "#3498db33",
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: "WiFi Bill",
                        data: wifiValues,
                        borderColor: "#2ecc71",
                        backgroundColor: "#2ecc7133",
                        borderWidth: 2,
                        fill: true
                    }
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
                                let value = tooltipItem.raw.toLocaleString("en-PH", { style: "currency", currency: "PHP" });
                                return `${tooltipItem.dataset.label}: ${value}`;
                            }
                        }
                    }
                },
                scales: {
                    x: { title: { display: true, text: "Months" } },
                    y: { 
                        title: { display: true, text: "Total Amount (₱)" },
                        ticks: { 
                            callback: function(value) {
                                return `₱${value.toLocaleString()}`;
                            }
                        },
                        suggestedMax: getMaxValue([electricityValues, waterValues, wifiValues])
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

  </body>
</html>