<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Student Marks</h3>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Student</li>
          <li class="breadcrumb-item active">Marks</li>
        </ol>
      </div>
    </div>
    <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Student Details
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
                      <label class="col-sm-4">Student Name</label>
                      <div class="col-sm-8">
                        <b><?php echo $student->name; ?></b>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 ">Registration Number</label>
                      <div class="col-sm-8">
                        <b> <?php echo $student->registration_number; ?></b>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 ">Course</label>
                      <div class="col-sm-8">
                        <b><?php echo $student->courseName; ?></b>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 ">Semester</label>
                      <div class="col-sm-8">
                        <b><?php echo $student->semesterName; ?></b>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 ">Training Center</label>
                      <div class="col-sm-8">
                        <b><?php echo $student->trainingCenter; ?></b>
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
      <table class="table" style="width:100%" id="example">
        <thead>
          <tr>
            <th rowspan="2">SI. No.</th>
            <th rowspan="2">Code</th>
            <th rowspan="2">Subjects</th>
            <th colspan="2" style="text-align: center;">Maximum Marks</th>
            <th colspan="3" style="text-align: center;">Marks Obtained</th>
          </tr>
          <tr>
            <th>Sessional</th>
            <th>Examination</th>
            <th>Sessional</th>
            <th>Examination</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          $internal_total = 0;
          $external_total = 0;
          $internal_max_total = 0;
          $external_max_total = 0;
          foreach ($subjectList as $row) { ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row->code; ?></td>
              <td><?php echo $row->name; ?></td>
              <td><?php echo $row->internal_max; ?></td>
              <td><?php echo $row->external_max; ?></td>
              <td><?php echo $row->internal_marks; ?></td>
              <td><?php echo $row->external_marks; ?></td>
              <td><?php echo $row->total_marks; ?></td>
            </tr>
          <?php
            $internal_total += $row->internal_marks;
            $external_total += $row->external_marks;
            $internal_max_total += $row->internal_max;
            $external_max_total += $row->external_max;
          } ?>
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
  $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'excel',
          filename: 'marks'
        },
        {
          extend: 'pdf',
          filename: 'marks'
        }
        , 'print'
      ],
    });

  });
</script>