<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New WiFi Bill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="wifi_bill_add.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="month_1" class="col-sm-3 control-label">Month</label>
                        <div class="col-sm-9">
                            <input type="month" class="form-control" id="month_1" name="month_1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_1" class="col-sm-3 control-label">Date Received</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date_1" name="date_1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total_amount_1" class="col-sm-3 control-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" id="total_amount_1"
                                name="total_amount_1" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Update WiFi Bill</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="wifi_bill_edit.php">
                    <input type="hidden" class="id" name="id">
                    <div class="form-group">
                        <label for="edit_month_1" class="col-sm-3 control-label">Month</label>
                        <div class="col-sm-9">
                            <input type="month" class="form-control" id="edit_month_1" name="month_1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_date_1" class="col-sm-3 control-label">Date OR Receive</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="edit_date_1" name="date_1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_total_amount_1" class="col-sm-3 control-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" id="edit_total_amount_1"
                                name="total_amount_1" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i
                        class="mdi mdi-content-save-edit"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Update WiFi Bill Photo</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="wifi_bill_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="id" name="id">
                    <div class="form-group">
                        <label for="wifi_photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="wifi_photo" name="photo" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="mdi mdi-upload"></i>
                    Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Delete WiFi Bill</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="wifi_bill_delete.php">
                    <input type="hidden" class="id" name="id">
                    <div class="text-center">
                        <p>DELETE THIS WIFI BILL?</p>
                        <h2 class="bold description"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="mdi mdi-trash-can"></i>
                    Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>