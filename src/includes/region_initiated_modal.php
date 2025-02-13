<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Project Name</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="region_initiated_add.php">
                <div class="form-group">
                    <label for="projectname_ibajay" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="projectname_ibajay" name="projectname_ibajay" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="barangay_ibajay" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="barangay_ibajay" name="barangay_ibajay" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_5" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="project_5" name="project_5" required>
                    </div>
                </div>
            <div class="form-group">
                    <label for="aps_ibajay" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="aps_ibajay" name="aps_ibajay" required>
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
                <h4 class="modal-title"><b>Edit Project</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="region_initiated_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_projectname_ibajay" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_projectname_ibajay" name="projectname_ibajay">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_barangay_ibajay" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_barangay_ibajay" name="barangay_ibajay">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_project_5" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_project_5" name="project_5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_aps_ibajay" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_aps_ibajay" name="aps_ibajay">
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
              <form class="form-horizontal" method="POST" action="region_initiated_delete.php">
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



     