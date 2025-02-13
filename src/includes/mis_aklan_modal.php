<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Project Name</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="mis_aklan_add.php">
                <div class="form-group">
                    <label for="projectname_balete" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="projectname_balete" name="projectname_balete" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="locality_balete" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="locality_balete" name="locality_balete" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address_project" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="address_project" name="address_project" required>
                    </div>
                </div>
            <div class="form-group">
                    <label for="aps_balete" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="aps_balete" name="aps_balete" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
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
                <h4 class="modal-title"><b>Edit Locality</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="mis_aklan_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_projectname_balete" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_projectname_balete" name="projectname_balete">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_locality_balete" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_locality_balete" name="locality_balete">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address_project" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_address_project" name="address_project">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_aps_balete" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_aps_balete" name="aps_balete">
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

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Delete Project</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="mis_aklan_delete.php">
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


     