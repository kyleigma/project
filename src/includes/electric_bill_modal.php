<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Electric Bill</b></h4>
                <button type="button" class="btn-close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="electric_bill_add.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="month_1" class="control-label">Month End</label>
                      <input type="date" class="form-control" id="month_1" name="month_1" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="month_2" class="control-label">Month Start</label>
                      <input type="date" class="form-control" id="month_2" name="month_2" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="date_2" class="control-label">Date OR Receive</label>
                      <input type="date" class="form-control" id="date_2" name="date_2" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="gtc" class="control-label">Generation & Transmission Charges</label>
                      <input type="text" class="form-control" id="gtc" name="gtc" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group mb-3">
                      <label for="e_photo" class="control-label">Picture Attachment</label>
                      <input type="file" class="form-control" id="e_photo" name="e_photo">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="ur" class="control-label">Usage Rate</label>
                      <input type="text" class="form-control" id="ur" name="ur" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="dr" class="control-label">Distribution Revenues</label>
                      <input type="text" class="form-control" id="dr" name="dr" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="uc" class="control-label">Universal Charges</label>
                      <input type="text" class="form-control" id="uc" name="uc" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="evax" class="control-label">Expanded Value Added Tax</label>
                      <input type="text" class="form-control" id="evax" name="evax" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="other_ca" class="control-label">Other Charges/Adjustment</label>
                      <input type="text" class="form-control" id="other_ca" name="other_ca" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="annex" class="control-label">Annex</label>
                      <input type="text" class="form-control" id="annex" name="annex" required>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left" data-dismiss="modal"> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="mdi mdi-content-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Update Electric Bill</b></h4>
                <button type="button" class="btn-close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="electric_bill_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="edit_month_1" class="control-label">Month End</label>
                      <input type="date" class="form-control" id="edit_month_1" name="month_1" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="edit_month_2" class="control-label">Month Start</label>
                      <input type="date" class="form-control" id="edit_month_2" name="month_2">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="edit_date_2" class="control-label">Date OR Receive</label>
                      <input type="date" class="form-control" id="edit_date_2" name="date_2">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="edit_gtc" class="control-label">Generation & Transmission Charges</label>
                      <input type="text" class="form-control" id="edit_gtc" name="gtc">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="edit_ur" class="control-label">Usage Rate</label>
                      <input type="text" class="form-control" id="edit_ur" name="ur">
                    </div>
                    <div class="form-group mb-3">
                      <label for="edit_dr" class="control-label">Distribution Revenues</label>
                      <input type="text" class="form-control" id="edit_dr" name="dr">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="edit_uc" class="control-label">Universal Charges</label>
                      <input type="text" class="form-control" id="edit_uc" name="uc">
                    </div>
                    <div class="form-group mb-3">
                      <label for="edit_evax" class="control-label">Expanded Value Added Tax</label>
                      <input type="text" class="form-control" id="edit_evax" name="evax">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="edit_other_ca" class="control-label">Other Charges/Adjustment</label>
                      <input type="text" class="form-control" id="edit_other_ca" name="other_ca">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label for="annex" class="control-label">Annex</label>
                      <input type="text" class="form-control" id="edit_annex" name="annex" required>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="mdi mdi-content-save-edit"></i> Update</button>
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
                <h4 class="modal-title"><b><span class="fullname"></span></h4>
                <button type="button" class="btn-close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="electric_bill_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group mb-3">
                  <label for="e_photo" class="control-label">Photo</label>
                  <input type="file" class="form-control" id="e_photo" name="e_photo" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="mdi mdi-content-save-edit"></i> Update</button>
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
                <h4 class="modal-title"><b>Delete Electric Bill</b></h4>
                <button type="button" class="btn-close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pics_pp_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>Confirm deletion?</p>
                    <h2 class="bold description"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="mdi mdi-trash-can"></i> Delete</button>
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
                <h4 class="modal-title"><b><span class="fullname"></span></h4>
                <button type="button" class="btn-close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="electric_bill_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group mb-3">
                  <label for="e_photo" class="control-label">Photo</label>
                  <input type="file" class="form-control" id="e_photo" name="e_photo" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="mdi mdi-content-save-edit"></i> Update</button>
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
                <h4 class="modal-title"><b>Delete Electric Bill</b></h4>
                <button type="button" class="btn-close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pics_pp_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>Confirm deletion?</p>
                    <h2 class="bold description"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="mdi mdi-trash-can"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>