<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Candidate Bulk Upload</h3>
    </div>

    <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              File Upload<a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/Students.xlsx" class="btn btn-link"><button type="button" class="btn btn-primary">Download Template</button></a>
            </a>
          </h4>
        </div>
        <form action="" method="post" id="searchForm" enctype="multipart/form-data">
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="form-horizontal">

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Course</label>
                      <div class="col-sm-8">
                        <select name="course_id" id="course_id" class="form-control" onchange="getSemestersById(this.value)">
                          <option value="">Select</option>
                          <?php
                          if (!empty($courseList)) {
                            foreach ($courseList as $record) { ?>
                              <option value="<?php echo $record->Id;  ?>" <?php if ($record->Id == $course_id) {
                                                                            echo "selected";
                                                                          } ?>>
                                <?php echo $record->name; ?>
                              </option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Semesters</label>
                      <div class="col-sm-8">
                        <select name="semester_id" id="semester_id" class="form-control">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">File </label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="students">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="app-btn-group">
                <input type="hidden" name="from" value="file">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='index' class="btn btn-link">Clear All Fields</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <form action="" method="post" id="searchForm" enctype="multipart/form-data">

      <div class="custom-table">
        <table class="table">
          <thead>
            <tr>
              <th>Sl. No</th>
              <th>Name</th>
              <th>Registration Number</th>
              <th>Contact Number</th>
              <th>Email</th>
              <th>Date Of Birth</th>
              <th>Father Name</th>
              <th>Bank Name</th>
              <th>Account Number</th>
              <th>Aadhar Number</th>
              <th>Religion</th>
              <th>Caste</th>
              <th>Disability Type</th>
              <th>Address 1</th>
              <th>Address 2</th>
              <th>Zip Code</th>
              <th>School Name</th>
              <th>Year of passing</th>
              <th>Percentage</th>
              <th>PUC College Name</th>
              <th>Year of passing</th>
              <th>Percentage</th>
              <th>Graduation College Name</th>
              <th>Year of passing</th>
              <th>Percentage</th>
              <th>Post Graduation College Name</th>
              <th>Year of passing</th>
              <th>Percentage</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            if (!empty($studentList)) {

              foreach ($studentList as $record) {
            ?>
                <tr style="background-color: #b8f9b8;">
                  <td><?php echo $i ?></td>
                  <td><?php echo $record['A']; ?></td>
                  <td><?php echo $record['AA']; ?></td>
                  <td><?php echo $record['B']; ?></td>
                  <td><?php echo $record['C']; ?></td>
                  <td><?php echo $record['D']; ?></td>
                  <td><?php echo $record['E']; ?></td>
                  <td><?php echo $record['F']; ?></td>
                  <td><?php echo $record['G']; ?></td>
                  <td><?php echo $record['H']; ?></td>
                  <td><?php echo $record['I']; ?></td>
                  <td><?php echo $record['J']; ?></td>
                  <td><?php echo $record['K']; ?></td>
                  <td><?php echo $record['L']; ?></td>
                  <td><?php echo $record['M']; ?></td>
                  <td><?php echo $record['N']; ?></td>
                  <td><?php echo $record['O']; ?></td>
                  <td><?php echo $record['P']; ?></td>
                  <td><?php echo $record['Q']; ?></td>
                  <td><?php echo $record['R']; ?></td>
                  <td><?php echo $record['S']; ?></td>
                  <td><?php echo $record['T']; ?></td>
                  <td><?php echo $record['U']; ?></td>
                  <td><?php echo $record['V']; ?></td>
                  <td><?php echo $record['W']; ?></td>
                  <td><?php echo $record['X']; ?></td>
                  <td><?php echo $record['Y']; ?></td>
                  <td><?php echo $record['Z']; ?></td>

                </tr>
              <?php
                $i++;
              }
            }
            if (!empty($duplicates)) {

              foreach ($duplicates as $record) {
              ?>
                <tr style="background-color: #f1a2a2;">
                  <td><?php echo $i ?></td>
                  <td><?php echo $record['A']; ?></td>
                  <td><?php echo $record['B']; ?></td>
                  <td><?php echo $record['C']; ?></td>
                  <td><?php echo $record['D']; ?></td>
                  <td><?php echo $record['E']; ?></td>
                  <td><?php echo $record['F']; ?></td>
                  <td><?php echo $record['G']; ?></td>
                  <td><?php echo $record['H']; ?></td>
                  <td><?php echo $record['I']; ?></td>
                  <td><?php echo $record['J']; ?></td>
                  <td><?php echo $record['K']; ?></td>
                  <td><?php echo $record['L']; ?></td>
                  <td><?php echo $record['M']; ?></td>
                  <td><?php echo $record['N']; ?></td>
                  <td><?php echo $record['O']; ?></td>
                  <td><?php echo $record['P']; ?></td>
                  <td><?php echo $record['Q']; ?></td>
                  <td><?php echo $record['R']; ?></td>
                  <td><?php echo $record['S']; ?></td>
                  <td><?php echo $record['T']; ?></td>
                  <td><?php echo $record['U']; ?></td>
                  <td><?php echo $record['V']; ?></td>
                  <td><?php echo $record['W']; ?></td>
                  <td><?php echo $record['X']; ?></td>
                  <td><?php echo $record['Y']; ?></td>
                  <td><?php echo $record['Z']; ?></td>

                </tr>
            <?php
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="app-btn-group">
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        <input type="hidden" name="semester_id" value="<?php echo $semester_id; ?>">
        <input type="hidden" name="from" value="upload">
        <input type="hidden" name="studentArray" value="<?php if (!empty($studentListArray)) {
                                                          echo $studentListArray;
                                                        } ?>">
        <button type="submit" class="btn btn-primary">Upload</button>
        <a href='index' class="btn btn-link">Clear All Fields</a>
      </div>
    </form>
  </div>
  <footer class="footer-wrapper">
    <p>&copy; 2019 All rights, reserved</p>
  </footer>
</div>
<script>
  function clearSearchForm() {
    window.location.reload();
  }

  var semester_id = "<?php echo ($semester_id > 0) ? $semester_id : 0; ?>";
  $(document).ready(function() {
    $('#course_id').trigger("change");
  });

  function getSemestersById(id) {
    if (id != '') {
      $.ajax('/placement/candidate/getSemestersById', {
        type: 'POST',
        data: {
          course_id: id,
          semester_id: semester_id
        },
        success: function(data, status, xhr) {
          $('#semester_id').html(data);
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback 
          console.log(errorMessage);
        }
      });
    }
  }
</script>