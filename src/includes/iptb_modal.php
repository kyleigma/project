<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Project Name</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="iptb_add.php">
                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Project Name</label>

                    <div class="col-sm-12">
                      <!-- Hidden input for the project ID -->
                      <input type="hidden" id="project_id" name="project_id" value="<?php 
                        // Query to fetch the IPTB project ID
                        $sql = "SELECT id FROM free_wifi_projects WHERE name = 'iptb' LIMIT 1";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['id'];  // Set IPTB project ID
                        }
                      ?>">
                      <!-- Text input for displaying the project name -->
                      <input type="text" class="form-control" id="project_name" name="project_name" value="IPTB" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="municipality_name" class="col-sm-3 control-label">Municipality</label>

                    <div class="col-sm-12">
                      <select class="form-control" id="municipality_name" name="municipality_name" required>
                        <option value="">Select Municipality</option>
                        <?php
                          // Assuming you have a connection to the database
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
                <h4 class="modal-title"><b>Edit Locality</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="iptb_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                  <label for="edit_project_name" class="col-sm-3 control-label">Project Name</label>
                  <div class="col-sm-12">
                      <select class="form-control" id="edit_project_name" name="project_name" required>
                          <option value="">Select Project</option>
                          <?php
                              // Assuming you have a connection to the database
                              $sql = "SELECT id, name FROM free_wifi_projects";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      // Check if the current project_id matches the one from the database
                                      $selected = ($row['id'] == $project_id) ? 'selected' : '';
                                      echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
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
                                // Assuming you have a connection to the database
                                $sql = "SELECT id, name FROM municipalities";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        // Check if the current municipality matches the one from the database
                                        if ($row['id'] == $municipality_id) {
                                            echo "<option value='" . $row['id'] . "' selected>" . $row['name'] . "</option>";
                                        } else {
                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
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
              <form class="form-horizontal" method="POST" action="iptb_delete.php">
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



     