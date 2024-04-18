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
                <form action="verification/handleVerifyUpload" method="post" enctype="multipart/form-data">
                    <label for="pdfFile">Select PDF File:</label><br>
                    <input class="btn btn-primary" type="file" name="pdfFile" id="pdfFile"><br>
                    <input class="btn btn-primary" type="submit" value="Upload" name="submit">
                </form>
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
</body>

</html>