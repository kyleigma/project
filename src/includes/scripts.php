<!-- jQuery (Full Version) - Required for Popups, DataTables, and AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 Bundle (Includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core Plugins -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<!-- Page-Specific Plugins -->
<script src="assets/vendors/chart.js/chart.umd.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>

<!-- Layout & UI Scripts -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/todolist.js"></script>

<!-- Third-Party Plugins -->
<script src="assets/js/jquery.cookie.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables Plugins -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<!-- Dashboard & Custom Scripts -->
<script src="assets/js/dashboard.js"></script>


<!-- Fix Bootstrap Modals, Tooltips & Popups -->
<script>
$(document).ready(function() {
    // Initialize Bootstrap tooltips and popovers
    $('[data-bs-toggle="tooltip"]').tooltip();
    $('[data-bs-toggle="popover"]').popover();

    // Fix Bootstrap 5 modal issue
    $(".modal").on("hidden.bs.modal", function () {
        $(this).removeData("bs.modal");
    });

    // DataTables Initialization
    $(".datatable").DataTable({
        "paging": false, 
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "scrollX": true,
        "scrollY": "500px",
        "scrollCollapse": true,
        "retrieve": true,
        "fixedHeader": true,
        "columnDefs": [
            { "orderable": false, "targets": [-1] }
        ]
    });
});
</script>

