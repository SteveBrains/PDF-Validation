<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lecturer Experience</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
</head>

<body>
  <div class="login-wrapper1">
    <div class="container-fluid">
    <div class="row text-center">
        <div class="col-md-12">
          <img src="<?php echo BASE_PATH; ?>/assets/img/perhebat_logo.png" width="80">
          <h2>Government Tool Room and Training Centre</h2>
          <h3>Application for the post of lecturers(Contract Basis)</h3>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class=" col-md-12 col-lg-12">
          <h3><strong>Lecturer Experience</strong><br /></h3>
          <form id="form_main" action="" method="post" enctype="multipart/form-data">
            <div class="form-container">
              <h4 class="form-group-title">Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Organisation Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="organisation_name" name="organisation_name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>From Date</label>
                    <input type="date" class="form-control" id="from_date" name="from_date" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>To Date</label>
                    <input type="date" class="form-control" id="to_date" name="to_date" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Salary</label>
                    <input type="text" class="form-control" id="salary" name="salary" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="remarks" name="remarks" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="button-block clearfix">
              <div class="bttn-group">
                <button type="submit" class="btn btn-primary btn-lg">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="custom-table">
            <table class="table">
              <thead>
                <tr>
                  <th>Sl. No</th>
                  <th> Organisation Name</th>
                  <th> Address</th>
                  <th> Designation</th>
                  <th>From Date</th>
                  <th> To Date</th>
                  <th> Salary</th>
                  <th> Remarks</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($experience)) {
                  $i = 1;
                  foreach ($experience as $record) {
                ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $record->organisation_name ?></td>
                      <td><?php echo $record->address ?></td>
                      <td><?php echo $record->designation ?></td>
                      <td><?php echo $record->from_date ?></td>
                      <td><?php echo $record->to_date ?></td>
                      <td><?php echo $record->salary ?></td>
                      <td><?php echo $record->remarks ?></td>
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

      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="button-block text-right">
            <div class="bttn-group">
              <a href="/lecturers/review/<?php echo $id; ?>"><button type="button" class="btn btn-primary btn-lg">Review Application</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-1.12.4.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-validate.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/datatable.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/custom.js"></script>

  <script src="<?php echo BASE_PATH; ?>/assets/js/bootstrap-multiselect.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

  <script type="text/javascript">
    var windowURL = window.location.href
    var pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'))
    var x = $('a[href="' + pageURL + '"]')
    x.addClass('active')
    x.parent().addClass('active')
    var y = $('a[href="' + windowURL + '"]')
    y.addClass('active')
    y.parent().addClass('active')
  </script>
  <script>
    $(document).ready(function() {
      $("#form_main").validate({
        rules: {
          organisation_name: {
            required: true
          },
        },
        messages: {
          organisation_name: {
            required: "<p class='error-text'> Required</p>",
          },
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
          error.appendTo(element.parent());
        }

      });
    });

    function getJobrolesById(id) {
      if (id != '') {
        $.ajax('/jobs/getJobrolesById', {
          type: 'POST',
          data: {
            training_center_id: id,
            job_role_id: 0
          },
          success: function(data, status, xhr) {
            $('#job_role_id').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }

    function getSemestersById(id) {
      if (id != '') {
        $.ajax('/jobs/getSemestersById', {
          type: 'POST',
          data: {
            course_id: id,
            semester_id: 0
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
</body>

</html>