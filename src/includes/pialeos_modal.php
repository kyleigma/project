<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Project Name</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pialeos_add.php">
                <div class="form-group">
                    <label for="projectname_banga" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="projectname_banga" name="projectname_banga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="barangay_banga" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="barangay_banga" name="barangay_banga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_3" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="project_3" name="project_3" required>
                    </div>
                </div>
        
            <div class="form-group">
                    <label for="aps_banga" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="aps_banga" name="aps_banga" required>
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
              <form class="form-horizontal" method="POST" action="pialeos_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_projectname_banga" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_projectname_banga" name="projectname_banga">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_barangay_banga" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_barangay_banga" name="barangay_banga">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_project_3" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_project_3" name="project_3">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_aps_banga" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_aps_banga" name="aps_banga">
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
              <form class="form-horizontal" method="POST" action="pialeos_delete.php">
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



     