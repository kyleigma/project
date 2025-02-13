<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Project Name</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pics_pp_add.php">
                <div class="form-group">
                    <label for="projectname_buruanga" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="projectname_buruanga" name="projectname_buruanga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="barangay_buruanga" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="barangay_buruanga" name="barangay_buruanga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_4" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="project_4" name="project_4" required>
                    </div>
                </div>
            <div class="form-group">
                    <label for="aps_buruanga" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="aps_buruanga" name="aps_buruanga" required>
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
              <form class="form-horizontal" method="POST" action="pics_pp_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_projectname_buruanga" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_projectname_buruanga" name="projectname_buruanga">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_barangay_buruanga" class="col-sm-3 control-label">Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_barangay_buruanga" name="barangay_buruanga">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_project_4" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_project_4" name="project_4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_aps_buruanga" class="col-sm-3 control-label">APs</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_aps_buruanga" name="aps_buruanga">
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



     