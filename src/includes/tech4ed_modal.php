<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Center</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="tech4ed_add.php">
                <div class="form-group">
                    <label for="center_name" class="col-sm-3 control-label">Center Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="center_name" name="center_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="center_loc" class="col-sm-3 control-label">Center Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="center_loc" name="center_loc" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="municipal" class="col-sm-3 control-label">LGU</label>

                    <div class="col-sm-12">
                      <select class="form-control" id="municipal" name="municipal" required>
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
                    <label for="district_no" class="col-sm-3 control-label">District</label>

                    <div class="col-sm-12">
                      <input type="number" class="form-control" id="district_no" name="district_no" required readonly>
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
                <h4 class="modal-title"><b>Edit Center</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="tech4ed_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_center_name" class="col-sm-3 control-label">Center Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_center_name" name="center_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_center_loc" class="col-sm-3 control-label">Center Location</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_center_loc" name="center_loc" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_municipal" class="col-sm-3 control-label">LGU</label>

                    <div class="col-sm-12">
                        <select class="form-control" id="edit_municipal" name="municipal" required>
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
                    <label for="edit_district_no" class="col-sm-3 control-label">District</label>

                    <div class="col-sm-12">
                      <input type="number" class="form-control" id="edit_district_no" name="district_no" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_status" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="">Select Status</option>
                            <?php
                                // Fetch the current status for the specific row you're editing
                                $sql = "SELECT status FROM free_wifi WHERE id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $id);  // Bind the ID to the query
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $currentStatus = $result->fetch_assoc()['status'] ?? '';  // Retrieve the status of the row you're editing

                                $statuses = ['active', 'inactive']; // Explicit list of possible statuses

                                // Loop through each status option and check if it matches the current status
                                foreach ($statuses as $statusOption) {
                                    $selected = ($currentStatus == $statusOption) ? 'selected' : '';  // Set selected option if it matches
                                    echo "<option value='$statusOption' $selected>" . ucfirst($statusOption) . "</option>";
                                }
                            ?>
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


<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Delete Project</b></h4>
                <button type="button" class="btn-close close close-modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="tech4ed_delete.php">
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



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const districtMapping = {
            // District 1
            "Altavas": 1,
            "Balete": 1,
            "Banga": 1,
            "Batan": 1,
            "Kalibo": 1,
            "Libacao": 1,
            "Madalag": 1,
            "New Washington": 1,
            // District 2
            "Buruanga": 2,
            "Ibajay": 2,
            "Lezo": 2,
            "Makato": 2,
            "Malay": 2,
            "Malinao": 2,
            "Nabas": 2,
            "Numancia": 2,
            "Tangalan": 2
        };

        const municipalDropdown = document.getElementById("municipal");
        const districtInput = document.getElementById("district_no");

        if (municipalDropdown) {
            municipalDropdown.addEventListener("change", function () {
                const selectedMunicipality = municipalDropdown.options[municipalDropdown.selectedIndex].text;
                districtInput.value = districtMapping[selectedMunicipality] || "";
            });
        }

        // Same functionality for the edit modal
        const editMunicipalDropdown = document.getElementById("edit_municipal");
        const editDistrictInput = document.getElementById("edit_district_no");

        if (editMunicipalDropdown) {
            editMunicipalDropdown.addEventListener("change", function () {
                const selectedMunicipality = editMunicipalDropdown.options[editMunicipalDropdown.selectedIndex].text;
                editDistrictInput.value = districtMapping[selectedMunicipality] || "";
            });
        }
    });
</script>
