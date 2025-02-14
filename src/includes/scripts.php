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

<!-- DataTables Initialization -->
<script>
$(document).ready(function() {
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
