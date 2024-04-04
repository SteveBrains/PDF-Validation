<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centralized Student Placement Management</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/datatable.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-1.12.4.min.js"></script>
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
          <!-- <a class="navbar-brand" href="#" style="font-size: 14px">Inventory</a> -->
        </div>
        <ul class="nav navbar-nav navbar-right top-nav">
          <li>Welcome <a> <?php echo $first_name.' '.$last_name; ?> </a></li>
          <li>Last login <?php echo $last_login; ?></li>
          <li><a href="/index/logout">Logout</a></li>
        </ul> 
      </div>
      <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav main-nav">
          <li  class="active"><a href="/setup/user/list">Setup</a></li>
          <li><a href="/course/coursecategory/list">Course</a></li>
          <li><a href="/facilitator/academicfacilitator/list">Facilitator</a></li>
          <li><a href="/partner/partnerlist/list">Partner</a></li>
          <li><a href="/exam/grade/list">Exam</a></li>
          <li><a href="/student/search/list">Student</a></li>
        </ul>
      </nav>
      <!-- <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav main-nav">
          <li class="active"><a href="/setup/welcome">Setup</a></li>
          <li><a href="/prdtm/welcome">Product</a></li>
          <li><a href="/pm/welcome">Partner</a></li>
          <li><a href="/af/welcome">Facilitator</a></li>
          <li><a href="/corporate/welcome">Corporate</a></li>
          <li><a href="/registration/welcome">Registration</a></li>
          <li><a href="/examination/welcome">Assessment</a></li>
          <li><a href="/records/welcome">Records</a></li>
          <li><a href="/chatboat/welcome">Chatbot</a></li>
          <li><a href="/finance/welcome">Finance</a></li>
          <li><a href="/mrktngm/welcome">Marketing</a></li>
          <li><a href="/communication/welcome">Communication</a></li>
          <li><a href="/af/welcome">Moodle</a></li>
          <li><a href="/reports/welcome">Reporting</a></li>
        </ul>
      </nav> -->
    </div>
  </header>
</body>