
<!-- Custom Bill Filter Modal -->
<div class="modal fade" id="dateRangeModal" data-bs-backdrop="true" data-bs-keyboard="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle"><b>Custom Bill Filter</b></h4>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="billType" class="form-label">Bill Type</label>
                            <select class="form-control" id="billType" name="bill_type" required>
                                <option value="all">All Bills</option>
                                <option value="electric">Electric Bill</option>
                                <option value="water">Water Bill</option>
                                <option value="wifi">WiFi Bill</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="startDate" class="form-label">Start Month</label>
                            <input type="month" class="form-control" id="startDate" name="date_from" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endDate" class="form-label">End Month</label>
                            <input type="month" class="form-control" id="endDate" name="date_to" required>
                        </div>
                    </div>
                </div>
                <div id="dateError" class="text-danger mt-2" style="display: none;"></div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary excel-btn" style="display: none;" onclick="submitDateRange('excel')"><i class="mdi mdi-file-excel me-1"></i>Export</button>
                <button type="button" class="btn btn-primary print-btn" style="display: none;" onclick="submitDateRange('pdf')"><i class="mdi mdi-printer me-1"></i>Print</button>
            </div>
        </div>
    </div>
</div>

<script>
function validateDateRange() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const errorDiv = document.getElementById('dateError');

    if (!startDate || !endDate) {
        errorDiv.textContent = 'Please select both start and end dates.';
        errorDiv.style.display = 'block';
        return false;
    }

    if (startDate > endDate) {
        errorDiv.textContent = 'Start date must be before or equal to end date.';
        errorDiv.style.display = 'block';
        return false;
    }

    errorDiv.style.display = 'none';
    return true;
}

function submitDateRange(type) {
    if (!validateDateRange()) return;

    const billType = document.getElementById('billType').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    let url = type === 'excel' ? 'bills_excel.php' : 'bills_print.php';
    url += `?bill_type=${billType}&date_from=${startDate}&date_to=${endDate}`;
    
    window.open(url, '_blank');
    $('#dateRangeModal').modal('hide');
}

$(document).ready(function() {
    const printBtn = $('.print-btn');
    const excelBtn = $('.excel-btn');
    
    // Initialize the modal using jQuery
    $('#dateRangeModal').on('show.bs.modal', function(e) {
        // Get the button that triggered the modal
        const triggerBtn = $(e.relatedTarget);
        
        // Get the modal type from data attribute
        const modalType = triggerBtn.data('modal-type');
        
        // Hide both buttons first
        printBtn.hide();
        excelBtn.hide();
        
        // Show the appropriate button based on modal type
        if (modalType === 'print') {
            printBtn.show();
        } else if (modalType === 'excel') {
            excelBtn.show();
        }
    });

    // Handle modal close
    $('.close-modal, [data-bs-dismiss="modal"]').on('click', function() {
        $('#dateRangeModal').modal('hide');
    });
});
</script>
