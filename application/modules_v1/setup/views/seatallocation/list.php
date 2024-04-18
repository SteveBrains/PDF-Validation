<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>List Seat Allocation</h3>
      <a href="add" class="btn btn-primary">+ Setup Seat Allocation</a>
    </div>

    <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Advanced Search
            </a>
          </h4>
        </div>
        <form action="" method="post" id="searchForm">
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Academic Year</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="academicyear_id" name="academicyear_id">
                          <option value="">Select</option>
                          <?php foreach ($academicyears as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($academicyear_id == $row->id) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $row->name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Course</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="course_id" name="course_id">
                          <option value="">Select</option>
                          <?php foreach ($courses as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($course_id == $row->id) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $row->name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Discipline</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="discipline_id" name="discipline_id">
                          <option value="">Select</option>
                          <?php foreach ($disciplines as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($discipline_id == $row->id) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $row->name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="app-btn-group">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href='list' class="btn btn-link">Clear All Fields</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="custom-table">
      <table class="table" id="list-table">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th>Academic Year</th>
            <th>Course</th>
            <th>Discipline</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($seatallocationRecords)) {
            $i = 1;
            foreach ($seatallocationRecords as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->academicyearName ?></td>
                <td><?php echo $record->courseName ?></td>
                <td><?php echo $record->disciplineName ?></td>
                <td class="text-center">
                  <a href="<?php echo 'edit/' . $record->id; ?>" title="Edit">Edit</a>
                  <!-- <a class="btn btn-sm btn-danger deleteRole" href="#" data-id="<?php echo $record->userId; ?>" title="Delete"><i class="fa fa-trash"></i></a> -->
                </td>
              </tr>
          <?php
              $i++;
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <footer class="footer-wrapper">
    <p>&copy; 2023 All rights, reserved</p>
  </footer>
</div>
<script>
  function clearSearchForm() {
    window.location.reload();
  }
</script>