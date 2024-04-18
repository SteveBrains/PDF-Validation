<style>
  table th,
  table td {
    text-align: center;
  }
</style>
<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>External Marks</h3>
    </div>

    <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              File Upload 
              <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/External_Marks_Barcode.xlsx" class="btn btn-link"><button type="button" class="btn btn-primary">Download Template</button></a>
              
            </a>
          </h4>
        </div>
        <form action="" method="post" id="searchForm" enctype="multipart/form-data">
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="row">
                  <div class="col-sm-3">
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
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Semesters</label>
                      <div class="col-sm-8">
                        <select name="semester_id" id="semester_id" class="form-control" onchange="getSubjectsById(this.value)">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Subject</label>
                      <div class="col-sm-8">
                        <select name="subject_id" id="subject_id" class="form-control">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">File</label>
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
                <a href='' class="btn btn-link">Clear All Fields</a>
                
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
              <th>Registration Number</th>
              <th>Student Name</th>
              <th>Father Name</th>
              <th>Centre</th>
              <th>Booklet Number</th>
              <th>Barcode</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            if (!empty($studentList)) {

              foreach ($studentList as $record) {
            ?>
                <tr style="background-color: #b8f9b8;">
                  <td><?php echo $record['A']; ?></td>
                  <td><?php echo $record['B']; ?></td>
                  <td><?php echo $record['C']; ?></td>
                  <td><?php echo $record['D']; ?></td>
                  <td><?php echo $record['E']; ?></td>
                  <td><?php echo $record['F']; ?></td>
                  <td><?php echo $record['G']; ?></td>
                </tr>
              <?php
                $i++;
              }
            }
            if (!empty($duplicates)) {

              foreach ($duplicates as $record) {
              ?>
                <tr style="background-color: #f1a2a2;">
                  <td><?php echo $record['A']; ?></td>
                  <td><?php echo $record['B']; ?></td>
                  <td><?php echo $record['C']; ?></td>
                  <td><?php echo $record['D']; ?></td>
                  <td><?php echo $record['E']; ?></td>
                  <td><?php echo $record['F']; ?></td>
                  <td><?php echo $record['G']; ?></td>
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
        <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
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
  var subject_id = "<?php echo ($subject_id > 0) ? $subject_id : 0; ?>";
  // var course_id = "<?php echo ($course_id > 0) ? $course_id : 0; ?>";
  $(document).ready(function() {
    $('#course_id').trigger("change");
    if(semester_id > 0){
      getSubjectsById(semester_id);
    }
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

  function getSubjectsById(id) {
    var course_id = $('#course_id').val();
    if (id != '') {
      $.ajax('/placement/candidate/getSubjectsById', {
        type: 'POST',
        data: {
          course_id: course_id,
          semester_id: id,
          subject_id: subject_id
        },
        success: function(data, status, xhr) {
          $('#subject_id').html(data);
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback 
          console.log(errorMessage);
        }
      });
    }
  }
</script>