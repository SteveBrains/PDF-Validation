<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centralized Student Placement Management</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />

  <link href='<?php echo BASE_PATH; ?>/assets/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <link href='<?php echo BASE_PATH; ?>/assets/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

  <!-- <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/datatable.min.css" /> -->
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-1.12.4.min.js"></script>
  <?php if ($_SESSION['role'] != 4) { ?>
    <style>
      .page-wrapper {
        margin-top: 105px;
      }
    </style>
  <?php } ?>
</head>

<body>
  <header class="navbar navbar-default navbar-fixed-top main-header">
    <div class="container-fluid">
      <div class="clearfix">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="font-size:14px;">Campus Management </a>
        </div>
        <ul class="nav navbar-nav navbar-right top-nav">
          <li>Welcome <a> <?php echo $first_name . ' ' . $last_name; ?> </a></li>
          <li>Last login <?php echo $last_login; ?></li>
          <li><a href="/index/logout">Logout</a></li>
        </ul>
      </div>
      <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav main-nav">
          <li><a href="/placement/trainingcenter/list">Placement</a></li>
          <li><a href="/examination/subject/list">Examination</a></li>
          <li><a href="/shortterm/scheme/list">Short Term</a></li>
          <li class="active"><a href="/mediumterm/scheme/list">Medium Term</a></li>
          <li><a href="/internship/company/list">Internship</a></li>
        </ul>
      </nav>
    </div>
  </header>
</body>