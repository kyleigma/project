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
                <div class="form-group">
                    <label for="month_2" class="col-sm-9 control-label">Month Start</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="month_2" name="month_2" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="month_1" class="col-sm-9 control-label">Month End</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="month_1" name="month_1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_2" class="col-sm-9 control-label">Date OR Receive</label>

                    <div class="col-sm-12">
                      <input type="date" class="form-control" id="date_2" name="date_2" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="e_photo" class="col-sm-9 control-label">Picture Attachment</label>

                    <div class="col-sm-12">
                      <input type="file" id="e_photo" name="e_photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gtc" class="col-sm-9 control-label">Generation and Transmission Charges</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="gtc" name="gtc" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="ur" class="col-sm-9 control-label">Usage Rate</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="ur" name="ur" required>
                    </div>
                </div>  
                
                <div class="form-group">
                    <label for="dr" class="col-sm-9 control-label">Distribution Revenues</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="dr" name="dr" required>
                    </div>
                </div>  <div class="form-group">
                    <label for="uc" class="col-sm-9 control-label">Universal Charges</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="uc" name="uc" required>
                    </div>
                </div>  <div class="form-group">
                    <label for="evax" class="col-sm-9 control-label">Expanded Value Added Tax</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="evax" name="evax" required>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="other_ca" class="col-sm-9 control-label">Other Charges/Adjustment</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="other_ca" name="other_ca" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="annex" class="col-sm-9 control-label">Annex</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="annex" name="annex" required>
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
                <div class="form-group">
                    <label for="edit_month_2" class="col-sm-9 control-label">Month Start</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_month_2" name="month_2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_month_1" class="col-sm-9 control-label">Month End</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_month_1" name="month_1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_date_2" class="col-sm-9 control-label">Date OR Receive</label>

                    <div class="col-sm-12">
                      <input type="date" class="form-control" id="edit_date_2" name="date_2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_gtc" class="col-sm-9 control-label">Generation and Transmission Charges</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_gtc" name="gtc">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_ur" class="col-sm-9 control-label">Usage Rate</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_ur" name="ur">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_dr" class="col-sm-9 control-label">Distribution Revenues</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_dr" name="dr">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_uc" class="col-sm-9 control-label">Universal Charges</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_uc" name="uc">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_evax" class="col-sm-9 control-label">Expanded Value Added Tax</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_evax" name="evax">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_other_ca" class="col-sm-9 control-label">Other Charges/Adjustment</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_other_ca" name="other_ca">
                    </div>
                </div>
                <div class="form-group">
                    <label for="annex" class="col-sm-9 control-label">Annex</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="annex" name="annex" required>
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
                <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
                <button type="button" class="btn-close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="electric_bill_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="e_photo" class="col-sm-9 control-label">Photo</label>

                    <div class="col-sm-12">
                      <input type="file" id="e_photo" name="e_photo" required>
                    </div>
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



     