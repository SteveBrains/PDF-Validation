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
              Filter
            </a>
          </h4>
        </div>
        <form action="" method="post" id="searchForm" enctype="multipart/form-data">
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="row">
                  <?php if ($_SESSION['role'] != 3) { ?>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Training Center</label>
                        <div class="col-sm-8">
                          <select name="training_center_id" id="training_center_id" class="form-control">
                            <option value="">Select</option>
                            <?php
                            if (!empty($tcList)) {
                              foreach ($tcList as $record) { ?>
                                <option value="<?php echo $record->Id;  ?>" <?php if ($record->Id == $training_center_id) {
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
                  <?php } ?>
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
        <table class="table" id="example" style="text-align: center;">
          <thead>
            <tr>
              <th>Sl. No</th>
              <th>Registration Number</th>
              <th>Student Name</th>
              <th>Father Name</th>
              <?php
              foreach ($subjects as $subject) {
              ?>
                <th><?php echo $subject->code; ?></th>
              <?php } ?>
            </tr>

          </thead>
          <tbody>
            <?php
            $i = 1;
            if (!empty($studentList)) {

              foreach ($studentList as $record) {
            ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $record->registration_number; ?></td>
                  <td><?php echo $record->studentName; ?></td>
                  <td><?php echo $record->fatherName; ?></td>
                  <?php foreach ($subjects as $subject) {
                    $sub_code_s = $subject->code . "_s";
                    $sub_code_e = $subject->code . "_e";
                    $sub_code_t = $subject->code . "_t"; ?>
                    <td><?php echo $record->$sub_code_e; ?></td>
                  <?php } ?>

                </tr>
            <?php
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
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
  $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'excel',
          filename: 'marks'
        },
        {
          extend: 'pdf',
          filename: 'marks'
        }, 'print'
      ],
    });

  });
</script>