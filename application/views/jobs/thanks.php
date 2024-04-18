<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Registration</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
  <style type="text/css">
    .img1 {
      width: 110px;
      ;
    }

    .img2 {
      width: 80px;
      ;
    }

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

      .col-sm-1,
      .col-sm-10,
      .col-sm-12 {
        float: left;
      }

      .col-sm-12 {
        width: 100%;
      }

      .col-sm-10 {
        width: 83.33333333%;
      }

      .col-sm-1 {
        width: 8.33333333%;
      }

      .out h2 {
        font-size: 20px;
      }

    }
  </style>
</head>

<body>
  <div class="login-wrapper1">
    <div class="container-fluid">
      <div class="row text-center out">
        <div class="col-md-12" style="margin-top: 10px;">
          <div class="col-sm-1">
            <img src="<?php echo BASE_PATH; ?>/assets/img/ka.jpeg" class="img1">
          </div>
          <div class="col-sm-10">
            <h2>ಅಲ್ಪಸಂಖ್ಯಾತರ ಕಲ್ಯಾಣ ಇಲಾಖೆಯ ಸಹಯೋಗದೊಂದಿಗೆ ಅಲ್ಪಸಂಖ್ಯಾತರ
              ಸಮುದಾಯದ ವಿದ್ಯಾರ್ಥಿಗಳಿಗೆ ಸರ್ಕಾರಿ ಉಪಕರಣಾಗಾರ ಮತ್ತು ತರಬೇತಿ
              ಕೇಂದ್ರದ ವತಿಯಿಂದ ವಿವಿಧ ತಾಂತ್ರಿಕ ಕೌಶಲ್ಯ ತರಬೇತಿಗಾಗಿ ಅರ್ಜಿ <br>(ಮುಸ್ಲೀಂ,
              ಕ್ರಿಶ್ಚಿಯನ್, ಜೈನ್, ಸಿಖ್ ಮತ್ತು ಪಾರ್ಸಿ ಸಮುದಾಯದ ವಿದ್ಯಾರ್ಥಿಗಳಿಗೆ ಮಾತ್ರ)</h2>
            <h3>Student Registration</h3>
          </div>
          <div class="col-sm-1">
            <img src="<?php echo BASE_PATH; ?>/assets/img/perhebat_logo.png" class="img2">

          </div>

        </div>
      </div>
      <hr>
      <div class="row out">
        <div class=" col-md-12 col-lg-12">
          <h3 align="center"><strong>Your application has been sent successfully</strong><br /></h3>
          <h4 align="center">Reference - <strong><?php echo $student->uid; ?></strong><br /></h4>
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
        subject: "New Application Received - " + ref,
        message: msg,
        to: "gttcit2022@gmail.com"
      },
      function(data, status) {
        alert("Data: " + data + "\nStatus: " + status);
      });
  </script>
</body>

</html>