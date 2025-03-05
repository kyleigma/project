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

<!-- Dashboard & Custom Scripts -->
<script src="assets/js/dashboard.js"></script>

<!-- DataTables Initialization -->
<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('.datatable')) {
        var table = $(".datatable").DataTable({
            "paging": true, 
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "scrollX": true,
            "scrollY": "500px",
            "scrollCollapse": true,
            "retrieve": true,
            "fixedHeader": {
                header: true,  // Keep the header fixed at the top
                footer: false  // Disable footer fixed if not needed
            },
            "columnDefs": [
                { "orderable": false, "targets": [-1] },
                { "width": "50px", "targets": 0 }  // Set width for row number column
            ],
            "createdRow": function(row, data, dataIndex) {
                // Add row number to the first column
                $('td', row).eq(0).html(dataIndex + 1).addClass('row-number');
            }
        });

        // Adjust the table layout after window resize or sidebar toggle
        $(window).on('resize', function() {
            table.columns.adjust().draw();
        });

        // Ensure layout adjustment when the sidebar is toggled
        $(".sidebar-toggle").on('click', function() {
            table.columns.adjust().draw();
        });
    }

    // Optional: You can also adjust the table width explicitly if needed
    $(".datatable").css({
        'width': '100%',
        'table-layout': 'auto'
    });
});
</script>

<style>
    /* Make sure the table and header expand correctly */
.dataTables_scrollHeadInner {
    width: 100% !important;  /* Force scroll header to match the table width */
}

/* Ensure table and scroll body width align */
table.dataTable {
    width: 100% !important;  /* Ensure full width */
}

.dataTables_scrollBody {
    width: 100% !important;  /* Ensure scrollable body is 100% width */
}

/* Ensure fixed header remains sticky and does not move */
table.dataTable thead th {
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 10;
}

/* Style for row number column */
table.dataTable td.row-number {
    width: 50px !important;
    min-width: 50px !important;
    max-width: 50px !important;
    text-align: center;
}

/* Adjust scrolling container when the sidebar is toggled */
.dataTables_wrapper .dataTables_scrollBody {
    overflow-x: auto !important;
    overflow-y: auto !important;
    width: 100%;
}
</style>
  </style>
