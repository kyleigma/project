
<!-- Date Range Modal -->
<div class="modal fade" id="dateRangeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Select Date Range</b></h4>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="bills_print.php" method="get" target="_blank" id="dateRangeForm" onsubmit="return validateDateRange()">
                <div class="modal-body">
                    <div class="row g-3">
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
                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-file-pdf me-1"></i>Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function validateDateRange() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const errorDiv = document.getElementById('dateError');

    if (startDate && endDate) {
        if (startDate > endDate) {
            errorDiv.textContent = 'End date cannot be earlier than start date';
            errorDiv.style.display = 'block';
            return false;
        }
        errorDiv.style.display = 'none';
        return true;
    }
    return true;
}

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('dateRangeModal');
    const closeButtons = modal.querySelectorAll('.close-modal');
    
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bsModal = bootstrap.Modal.getInstance(modal);
            if (bsModal) {
                bsModal.hide();
            }
        });
    });
});
</script>