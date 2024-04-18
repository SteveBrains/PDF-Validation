<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hall Ticket</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />

</head>

<body>
  <div class="login-wrapper1">
    <div class="container-fluid">
      <div class="row text-center out">
        <div class="col-md-12">
          <img src="<?php echo BASE_PATH; ?>/assets/img/perhebat_logo.png" width="80">
          <h2>Government Tool Room and Training Centre</h2>
          <h3>Application for the post of lecturers(Contract Basis)</h3>
          <h3>HALL TICKET</h3>
        </div>
      </div>
      <hr>
      <div class="row out">
        <div class=" col-md-12 col-lg-12">
          <form id="form_main" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label><b>Acknowledgement Number / Aadhar Number</b><span class='error-text'>*</span></label>
                  <input type="text" class="form-control" id="ref" name="ref" autocomplete="off"><br>
                  <button type="submit" class="btn btn-primary btn-lg">Fetch</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <?php if (!empty($lecturer)) { ?>
          <div class=" col-md-12 col-lg-12">
            <div class="form-container">
              <h4 class="form-group-title">Candidate Details</h4>
              <div class="custom-table">
                <table class="table">
                  <thead>
                    <tr>
                      <th> Name</th>
                      <th> Acknowledgement Number</th>
                      <th> Aadhar Number</th>
                      <th>DOB</th>
                      <th> Hallticket</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($lecturer)) {
                    ?>
                      <tr>
                        <td><?php echo $lecturer->name ?></td>
                        <td><?php echo $lecturer->acknowledge_number ?></td>
                        <td><?php echo $lecturer->aadhar ?></td>
                        <td><?php echo $lecturer->dob ?></td>
                        <td><a target="_blank" href="downloadhallticket/<?php echo $lecturer->Id ?>">Download</a></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-1.12.4.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-validate.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/datatable.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/custom.js"></script>
</body>

</html>