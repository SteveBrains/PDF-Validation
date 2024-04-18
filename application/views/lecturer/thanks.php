<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lecturer Application</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
  <style type="text/css">
    @media print {
      body * {
        visibility: hidden;
      }

      .print {
        visibility: hidden;

      }

      .out * {
        visibility: visible;
      }

      #out {
        position: absolute;
        top: 40px;
        left: 30px;
      }
    }
  </style>
</head>

<body>
  <div class="login-wrapper1">
    <div class="container-fluid">
      <div class="row text-center out">
        <div class="col-md-12">
          <img src="<?php echo BASE_PATH; ?>/assets/img/perhebat_logo.png" width="80">
          <h2>Government Tool Room and Training Centre</h2>
          <h3>Application for the post of lecturers(Contract Basis)</h3>
        </div>
      </div>
      <hr>
      <div class="row out">
        <div class=" col-md-12 col-lg-12">
          <h3 align="center"><strong>Your application has been sent successfully</strong><br /></h3>
          <h4 align="center">Reference - <strong><?php echo $lecturer->acknowledge_number; ?></strong><br /></h4>
        </div>
        <center><button class="print" id="print">Print</button><br>
          <span class="print">(Please download reference number for futher enquiries)</span>
        </center>
      </div>
    </div>
  </div>
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-1.12.4.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-validate.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/datatable.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/custom.js"></script>
  <script>
    $('#print').click(function() {
      window.print();
    });
    var ref = "<?php echo $lecturer->acknowledge_number; ?>";
    var msg = "<?php echo $message; ?>";
    $.post("https://jobs.industry-mitra.com/mail.php", {
        subject: "New Application Received - "+ref,
        message: msg,
        to: "gttcit2022@gmail.com"
      },
      function(data, status) {
        alert("Data: " + data + "\nStatus: " + status);
      });
  </script>
</body>

</html>