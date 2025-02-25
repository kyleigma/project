<?php include 'includes/header.php';?>
<?php include 'includes/session.php'; ?>

<style>
.split-screen {
  display: flex;
  height: 100%;
  padding: 20px;
  gap: 20px;
}

@media (max-width: 768px) {
  .split-screen {
    flex-direction: column;
    padding: 10px;
    gap: 10px;
  }

  .input-section, .preview-section {
    width: 100%;
  }

  .preview-content {
    padding: 15px;
  }

  .form-control.time-input {
    width: 80px !important;
  }

  .table-responsive {
    overflow-x: auto;
  }

  .table td, .table th {
    padding: 2px !important;
    font-size: 0.9rem;
  }

  .preview-table {
    font-size: 0.9rem;
  }

  .preview-table th, .preview-table td {
    padding: 2px;
  }

  #previewEmployeeInfo {
    font-size: 11pt;
  }

  .preview-header h5 {
    font-size: 11pt;
  }

  .preview-header h4 {
    font-size: 11pt;
  }

  .preview-footer {
    font-size: 11pt;
  }

  .preview-footer .verifier-name-display,
  .preview-footer .supervisor-name {
    min-width: 250px;
  }
}

.input-section, .preview-section {
  flex: 1;
  min-width: 0;
}

.preview-section {
  background-color: #f8f9fa;
  border-left: 1px solid #dee2e6;
  padding: 1rem !important;
}

.preview-content {
  background: white;
  padding: 30px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  max-width: 100%;
  margin: 0 auto;
}

.preview-header {
  text-align: center;
  margin-bottom: 20px;
}

.preview-header img {
  width: 100px;
  height: auto;
  margin-bottom: 15px;
}

.preview-header h5 {
  margin: 0;
  font-weight: normal;
  font-family: "docs-Book Antiqua", Arial;
  font-size: 12pt;
}

.preview-header h5:last-of-type {
  border-top: 1px solid #000;
  padding-top: 5px;
  margin-top: 5px;
}

.preview-header h4 {
  font-family: Arial;
  font-size: 12pt;
  font-weight: bold;
  margin-top: 10px;
}

#previewEmployeeInfo {
  font-family: docs-Calibri, Arial;
  font-size: 12pt;
  margin: 20px 0;
}

#previewEmployeeInfo p {
  margin: 5px 0;
  display: flex;
  align-items: center;
  position: relative;
}

#previewEmployeeInfo p strong {
  margin-right: 10px;
  min-width: 70px;
  font-family: docs-Calibri, Arial;
}

#previewEmployeeInfo p span {
  flex: 1;
  text-align: left;
  border-bottom: 1px solid #000;
  padding-bottom: 5px;
}

.preview-table {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial;
  margin: 20px 0;
}

.preview-table th, .preview-table td {
  border: 1px solid #000;
  padding: 3px;
  text-align: center;
  vertical-align: bottom;
  white-space: normal;
}

.preview-table th {
  font-weight: bold;
  font-size: 11pt;
}

.preview-table td {
  font-size: 10pt;
}

.preview-footer {
  margin-top: 30px;
  text-align: center;
  font-family: Arial;
  font-size: 12pt;
}

.preview-footer .verifier-name-display {
  border-bottom: 1px solid #000;
  display: inline-block;
  min-width: 300px;
  margin: 20px 0 10px;
}

.preview-footer .supervisor-name {
  font-weight: bold;
  margin: 10px 0;
  border-top: 1px solid #000;
  padding-top: 10px;
  display: inline-block;
  min-width: 300px;
}

.table-responsive {
  overflow-x: hidden;
  max-width: 100%;
}

.form-control.time-input {
  width: 100px !important;
  padding: 5px !important;
  text-align: center;
}

.table td:first-child {
  text-align: center;
}

.preview-table td:first-child {
  text-align: center;
}

.preview-table td {
  text-align: center;
}

.form-control.text-input {
  padding: 0.375rem;
  width: 100%;
}

.table td, .table th {
  padding: 4px !important;
  vertical-align: middle;
  white-space: nowrap;
  min-width: 40px;
}

.card-body {
  padding: 1rem !important;
}

.form-group {
  margin-bottom: 0.5rem !important;
}
</style>

<body>
  <div class="container-scroller">
    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>
    <!-- Body Wrapper -->
    <div class="container-fluid page-body-wrapper">
      <!-- Sidebar -->
      <?php include 'includes/sidebar.php'; ?>
      <!-- Main Content -->
      <div class="main-panel">
        <div class="content-wrapper p-0">
          <div class="split-screen">
            <!-- Input Section -->
            <div class="input-section">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daily Time Record</h4>
                  <form class="forms-sample" id="dtrForm">
                    <div class="form-group">
                      <label for="dtrDate">Month</label>
                      <select class="form-control" id="dtrDate">
                        <option value="">Select Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dtrYear">Year</label>
                      <select class="form-control" id="dtrYear">
                        <option value="">Select Year</option>
                        <?php
                          $currentYear = date('Y');
                          for($year = 2020; $year <= 2040; $year++) {
                            echo "<option value='$year'>$year</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="employeeName">Name</label>
                      <input type="text" class="form-control" id="employeeName" placeholder="Employee Name">
                    </div>
                    <div class="form-group">
                      <label for="position">Position</label>
                      <input type="text" class="form-control" id="position" placeholder="Position">
                    </div>
                    <div class="form-group">
                      <label for="division">Division</label>
                      <input type="text" class="form-control" id="division" placeholder="Division">
                    </div>
                    <div class="form-group">
                      <label for="verifierName">Verifier's Name</label>
                      <input type="text" class="form-control" id="verifierName" placeholder="Enter verifier's name">
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th colspan="2">A.M.</th>
                            <th colspan="2">P.M.</th>
                            <th>Late/UT</th>
                            <th>Remarks</th>
                          </tr>
                          <tr>
                            <th></th>
                            <th>IN</th>
                            <th>OUT</th>
                            <th>IN</th>
                            <th>OUT</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          for($i = 1; $i <= 31; $i++) {
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><input type='time' class='form-control time-input' name='am_in_$i' data-row='$i' data-type='am_in'></td>";
                            echo "<td><input type='time' class='form-control time-input' name='am_out_$i' data-row='$i' data-type='am_out'></td>";
                            echo "<td><input type='time' class='form-control time-input' name='pm_in_$i' data-row='$i' data-type='pm_in'></td>";
                            echo "<td><input type='time' class='form-control time-input' name='pm_out_$i' data-row='$i' data-type='pm_out'></td>";
                            echo "<td><input type='text' class='form-control text-input' name='late_ut_$i' data-row='$i' data-type='late_ut'></td>";
                            echo "<td><input type='text' class='form-control text-input' name='remarks_$i' data-row='$i' data-type='remarks'></td>";
                            echo "</tr>";
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="mt-3">
                      <button type="button" class="btn btn-danger me-2" onclick="clearForm()">Clear Form</button>
                      <button type="button" class="btn btn-primary me-2" onclick="exportToPDF()">Export as PDF</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Preview Section -->
            <div class="preview-section">
              <div class="preview-content">
                <div class="preview-header">
                  <img src="assets/images/dictlogo.png" alt="DICT Logo">
                  <h5>Republic of the Philippines</h5>
                  <h5>Department of Information &</h5>
                  <h5>Communications Technology</h5>
                  <h4 id="previewDate"></h4>
                  <h5 style="margin-top: 5px; text-align: center; width: 150px; margin-left: auto; margin-right: auto;">Date</h5>
                </div>
                <div id="previewEmployeeInfo">
                  <p><strong>Name:</strong><span id="previewName"></span></p>
                  <p><strong>Position:</strong><span id="previewPosition"></span></p>
                  <p><strong>Division:</strong><span id="previewDivision"></span></p>
                </div>
                <table class="preview-table">
                  <thead>
                    <tr>
                      <th rowspan="2">Date</th>
                      <th colspan="2">A.M.</th>
                      <th colspan="2">P.M.</th>
                      <th rowspan="2">Late/UT</th>
                      <th rowspan="2">Remarks</th>
                    </tr>
                    <tr>
                      <th>IN</th>
                      <th>OUT</th>
                      <th>IN</th>
                      <th>OUT</th>
                    </tr>
                  </thead>
                  <tbody id="previewTableBody">
                  </tbody>
                </table>
                <div class="preview-footer">
                  <p class="verifier-name-display" style="margin-top: 5px; text-align: center; width: 300px; margin-left: auto; margin-right: auto; border-bottom: 1px solid #000; margin-bottom: 5px;" id="previewVerifierName"></p>
                  <p>Verified as to the prescribed office hours.</p>
                  <br>
                  <p class="supervisor-line" style="margin-top: 5px; text-align: center; width: 300px; margin-left: auto; margin-right: auto; border-top: 1px solid #000; margin-bottom: 5px;"><strong>MARVIN L. MANUEL</strong></p>
                  <p>Immediate Supervisor</p>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
  <!-- container-scroller -->
  <?php include 'includes/scripts.php';?>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  
  <script>

    function exportToPDF() {
      const formData = new FormData();
      formData.append('employeeName', $('#employeeName').val());
      formData.append('position', $('#position').val());
      formData.append('division', $('#division').val());
      formData.append('verifierName', $('#verifierName').val());
      formData.append('month', $('#dtrDate').val());
      
      // Get time values from input fields directly
      for (let i = 1; i <= 31; i++) {
          formData.append(`am_in_${i}`, $(`input[name="am_in_${i}"]`).val() || '');
          formData.append(`am_out_${i}`, $(`input[name="am_out_${i}"]`).val() || '');
          formData.append(`pm_in_${i}`, $(`input[name="pm_in_${i}"]`).val() || '');
          formData.append(`pm_out_${i}`, $(`input[name="pm_out_${i}"]`).val() || '');
          formData.append(`late_ut_${i}`, $(`input[name="late_ut_${i}"]`).val() || '');
          formData.append(`remarks_${i}`, $(`input[name="remarks_${i}"]`).val() || '');
      }
      
      fetch('generate_dtr_pdf.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.blob())
      .then(blob => {
          const url = window.URL.createObjectURL(blob);
          const a = document.createElement('a');
          a.href = url;
          a.download = `DTR - ${$('#employeeName').val()}.pdf`;
          document.body.appendChild(a);
          a.click();
          window.URL.revokeObjectURL(url);
          a.remove();
      })
      .catch(error => console.error('Error:', error));
    }
  // Function to update preview
  function updatePreview() {
    // Update employee info
    $('#previewName').text($('#employeeName').val() || '');
    $('#previewPosition').text($('#position').val() || '');
    $('#previewDivision').text($('#division').val() || '');
    const selectedMonth = $('#dtrDate').val();
    const selectedYear = $('#dtrYear').val();
    $('#previewDate').text(`${selectedMonth} ${selectedYear}`);
    $('#previewVerifierName').text($('#verifierName').val() || '');
  
    // Clear existing table rows
    $('#previewTableBody').empty();
  
    // Add table rows
    for(let i = 1; i <= 31; i++) {
      const row = $('<tr>');
      row.append($('<td>').text(i));
      
      // Convert time to 12-hour format
      const formatTime = (time) => {
        if (!time) return '';
        const [hours, minutes] = time.split(':');
        const hour = parseInt(hours);
        const ampm = hour >= 12 ? 'PM' : 'AM';
        const hour12 = hour % 12 || 12;
        return `${hour12}:${minutes} ${ampm}`;
      };

      // AM IN
      row.append($('<td>').text(formatTime($(`input[name="am_in_${i}"]`).val())));
      // AM OUT
      row.append($('<td>').text(formatTime($(`input[name="am_out_${i}"]`).val())));
      // PM IN
      row.append($('<td>').text(formatTime($(`input[name="pm_in_${i}"]`).val())));
      // PM OUT
      row.append($('<td>').text(formatTime($(`input[name="pm_out_${i}"]`).val())));
      // Late/UT
      row.append($('<td>').text($(`input[name="late_ut_${i}"]`).val() || ''));
      // Remarks
      row.append($('<td>').text($(`input[name="remarks_${i}"]`).val() || ''));
  
      $('#previewTableBody').append(row);
    }
  }
  
  // Add event listeners for all form inputs
  $('#dtrForm input, #dtrForm select').on('input change', updatePreview);
  
  // Initial preview update
  updatePreview();

  // Add this to the script section
function saveFormData() {
  const formData = {
    employeeName: $('#employeeName').val(),
    position: $('#position').val(),
    division: $('#division').val(),
    verifierName: $('#verifierName').val(),
    dtrDate: $('#dtrDate').val(),
    dtrYear: $('#dtrYear').val()
  };

  // Save time entries
  for(let i = 1; i <= 31; i++) {
    formData[`am_in_${i}`] = $(`input[name="am_in_${i}"]`).val();
    formData[`am_out_${i}`] = $(`input[name="am_out_${i}"]`).val();
    formData[`pm_in_${i}`] = $(`input[name="pm_in_${i}"]`).val();
    formData[`pm_out_${i}`] = $(`input[name="pm_out_${i}"]`).val();
    formData[`late_ut_${i}`] = $(`input[name="late_ut_${i}"]`).val();
    formData[`remarks_${i}`] = $(`input[name="remarks_${i}"]`).val();
  }

  localStorage.setItem('dtrFormData', JSON.stringify(formData));
}

function loadFormData() {
  const savedData = localStorage.getItem('dtrFormData');
  if (savedData) {
    const formData = JSON.parse(savedData);
    $('#employeeName').val(formData.employeeName);
    $('#position').val(formData.position);
    $('#division').val(formData.division);
    $('#verifierName').val(formData.verifierName);
    $('#dtrDate').val(formData.dtrDate);
    $('#dtrYear').val(formData.dtrYear);

    // Load time entries
    for(let i = 1; i <= 31; i++) {
      $(`input[name="am_in_${i}"]`).val(formData[`am_in_${i}`]);
      $(`input[name="am_out_${i}"]`).val(formData[`am_out_${i}`]);
      $(`input[name="pm_in_${i}"]`).val(formData[`pm_in_${i}`]);
      $(`input[name="pm_out_${i}"]`).val(formData[`pm_out_${i}`]);
      $(`input[name="late_ut_${i}"]`).val(formData[`late_ut_${i}`]);
      $(`input[name="remarks_${i}"]`).val(formData[`remarks_${i}`]);
    }
    updatePreview();
  }
}

// Add event listeners for all form inputs to save data
$('#dtrForm input, #dtrForm select').on('input change', function() {
  saveFormData();
  updatePreview();
});

// Load saved data when page loads
$(document).ready(function() {
  loadFormData();
});

  function clearForm() {
    // Clear all form inputs
    $('#employeeName').val('');
    $('#position').val('');
    $('#division').val('');
    $('#verifierName').val('');
    
    // Reset month and year dropdowns to blank
    $('#dtrDate').val('');
    $('#dtrYear').val('');
    
    // Clear all time entries
    for(let i = 1; i <= 31; i++) {
      $(`input[name="am_in_${i}"]`).val('');
      $(`input[name="am_out_${i}"]`).val('');
      $(`input[name="pm_in_${i}"]`).val('');
      $(`input[name="pm_out_${i}"]`).val('');
      $(`input[name="late_ut_${i}"]`).val('');
      $(`input[name="remarks_${i}"]`).val('');
    }
    
    // Clear local storage
    localStorage.removeItem('dtrFormData');
    
    // Update preview
    updatePreview();

    // Scroll to top of the page
    window.scrollTo(0, 0);
  }
  </script>
</body>
</html>