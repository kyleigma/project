<!-- Custom Bill Filter Modal -->
<div class="modal fade" id="dateRangeModal">
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
                <button type="button" class="btn btn-success excel-btn" style="display: none;" onclick="submitDateRange('excel')"><i class="mdi mdi-file-excel me-1"></i>Download</button>
                <button type="button" class="btn btn-info print-btn" style="display: none;" onclick="submitDateRange('pdf')"><i class="mdi mdi-printer me-1"></i>Print</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modalElement = document.getElementById('dateRangeModal');
    const dateRangeModal = new bootstrap.Modal(modalElement);
    const printBtn = document.querySelector('.print-btn');
    const excelBtn = document.querySelector('.excel-btn');

    // Ensure modal opens properly with fade-in effect
    modalElement.addEventListener('show.bs.modal', function(event) {
        document.body.classList.add('modal-open');

        // Remove existing backdrops before adding a new one
        setTimeout(() => {
            document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
            const backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade show';
            document.body.appendChild(backdrop);
        }, 10);

        // Determine which button was clicked (Excel or Print)
        const triggerButton = event.relatedTarget;
        if (triggerButton) {
            const modalType = triggerButton.getAttribute('data-modal-type');
            printBtn.style.display = modalType === 'print' ? 'inline-block' : 'none';
            excelBtn.style.display = modalType === 'excel' ? 'inline-block' : 'none';
        }
    });

    // Ensure modal cleans up backdrops when closed
    modalElement.addEventListener('hidden.bs.modal', function() {
        document.body.classList.remove('modal-open');

        setTimeout(() => {
            document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
                backdrop.classList.remove('show');
                setTimeout(() => backdrop.remove(), 150);
            });
        }, 200);
    });

    // Handle modal close button
    document.querySelectorAll('.close-modal').forEach(button => {
        button.addEventListener('click', function() {
            dateRangeModal.hide();
        });
    });

    // Function to handle date range submission
    function submitDateRange(type) {
        const billType = document.getElementById('billType').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        if (!startDate || !endDate) {
            document.getElementById('dateError').textContent = 'Please select both start and end dates';
            document.getElementById('dateError').style.display = 'block';
            return;
        }

        if (startDate > endDate) {
            document.getElementById('dateError').textContent = 'Start date cannot be later than end date';
            document.getElementById('dateError').style.display = 'block';
            return;
        }

        const params = new URLSearchParams({
            bill_type: billType,
            date_from: startDate,
            date_to: endDate
        });

        const url = type === 'excel' ? 'bills_excel.php' : 'bills_print.php';
        window.open(`${url}?${params.toString()}`, '_blank');
        dateRangeModal.hide();
    }

    // Attach submitDateRange to window for button onclick access
    window.submitDateRange = submitDateRange;
});
</script>
