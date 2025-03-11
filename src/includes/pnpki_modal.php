<!-- Add Modal -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New PNPKI Application</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pnpki_add.php">
                <div class="form-group mb-3">
                    <label for="application_type" class="control-label">Application Type</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="application_type" name="application_type" required>
                            <option value="" disabled selected>Select Application Type</option>
                            <option value="individual">Individual</option>
                            <option value="organization">Organization</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="agency" class="control-label">Agency/Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="agency" name="agency" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="address" class="control-label">Address</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="municipality_id" class="control-label">Municipality</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="municipality_id" name="municipality_id" required>
                            <?php
                            echo "<option value='' disabled selected>Select Municipality</option>";
                            $sql = "SELECT * FROM municipalities ORDER BY name";
                            $query = $conn->query($sql);
                            while($mrow = $query->fetch_assoc()){
                                echo "<option value='".$mrow['id']."'>".$mrow['name']."</option>";
                            }
                            ?>
                        </select>
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

<!-- Edit Modal -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit PNPKI Application</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pnpki_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group mb-3">
                    <label for="edit_application_type" class="control-label">Application Type</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="edit_application_type" name="application_type" required>
                            <option value="individual">Individual</option>
                            <option value="organization">Organization</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="edit_agency" class="control-label">Agency/Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="edit_agency" name="agency" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="edit_address" class="control-label">Address</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="edit_address" name="address" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="edit_municipality_id" class="control-label">Municipality</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="edit_municipality_id" name="municipality_id" required>
                            <?php
                            $sql = "SELECT * FROM municipalities ORDER BY name";
                            $query = $conn->query($sql);
                            while($mrow = $query->fetch_assoc()){
                                echo "<option value='".$mrow['id']."'>".$mrow['name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="edit_status" class="control-label">Status</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="mdi mdi-content-save"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal remains unchanged -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Delete Project</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pnpki_delete.php">
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