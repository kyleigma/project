<?php include 'includes/header.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="home.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item nav-category">Manage</li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-folder-open"></i>
                <span class="menu-title">DICT Projects</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic" data-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="free_wifi.php">Free Wifi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tech4Ed</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ILCDB</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">eGOVph</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">GECS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">IIDB</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">PNPKI</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#utilities" aria-expanded="false"
                aria-controls="utilities">
                <i class="menu-icon mdi mdi-cash-multiple"></i>
                <span class="menu-title">Utilities</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="utilities" data-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="electric_bill.php">Electricity Bill</a></li>
                    <li class="nav-item"><a class="nav-link" href="water_bill.php">Water Bill</a></li>
                    <li class="nav-item"><a class="nav-link" href="wifi_bill.php">Wi-Fi Bill</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">APs Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts" data-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="chartjs.php">ChartJs</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-accounts" aria-expanded="false"
                aria-controls="user-accounts">
                <i class="menu-icon mdi mdi-account-group"></i>
                <span class="menu-title">User Accounts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-accounts" data-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="basic-table.php">Basic Table</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="documentation.php">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Activity Monitoring</span>
            </a>
        </li>
    </ul>
</nav>
</body>

</html>