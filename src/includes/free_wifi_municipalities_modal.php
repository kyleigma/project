<!-- Add Modal -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Municipality</b></h4>
                <button type="button" class="btn-close close close-modal"aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="free_wifi_municipalities_add.php">
                    <input type="hidden" name="prev_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                    <div class="form-group">
                        <label for="project_name" class="col-sm-3 control-label">Project Name</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="project_name" name="project_name" required>
                                    <option value="">Select Project</option>
                                    <?php
                                        $sql = "SELECT id, name FROM free_wifi_projects";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No projects available</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="municipality_name" class="col-sm-3 control-label">Municipality</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="municipality_name" name="municipality_name" required>
                                    <option value="">Select Municipality</option>
                                    <?php
                                        $sql = "SELECT id, name FROM municipalities";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No municipalities available</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="access_point" class="col-sm-3 control-label">APs</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="access_point" name="access_point" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-flat pull-left close-modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="mdi mdi-content-save"></i> Add</button>
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
                <h4 class="modal-title"><b>Edit Municipality</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="free_wifi_municipalities_edit.php">                    
                    <input type="hidden" class="id" name="id">
                    <input type="hidden" name="prev_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                    <div class="form-group">
                        <label for="edit_project_name" class="col-sm-3 control-label">Project Name</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="edit_project_name" name="project_name" required>
                                <option value="">Select Project</option>
                                <?php
                                    $sql = "SELECT id, name FROM free_wifi_projects";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No projects available</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_municipality_name" class="col-sm-3 control-label">Municipality</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="edit_municipality_name" name="municipality_name" required>
                                <option value="">Select Municipality</option>
                                <?php
                                    $sql = "SELECT id, name FROM municipalities";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No municipalities available</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="edit_address" name="address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_access_point" class="col-sm-3 control-label">APs</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="edit_access_point" name="access_point">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="edit_status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
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

<!-- Delete Modal -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Delete Municipality</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="free_wifi_municipalities_delete.php">
                    <input type="hidden" name="prev_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
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
