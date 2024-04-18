<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centralized Student Placement Management</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
</head>

<body>
  <div class="login-wrapper">
    <div class="container-fluid">
      <div class="login-new-container d-flex align-items-center">
        <form action="" method="post">
          <div class="brand-logo">Centralized Student Placement Management</div>
          <h3><strong>Sign In</strong><br /></h3>
          <?php
          $this->load->helper('form');
          $error = $this->session->flashdata('error');
          if ($error) {
          ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $error; ?>
            </div>
          <?php }
          ?>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block">
            Sign In
          </button>
      </div>
      </form>
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
</body>

</html>