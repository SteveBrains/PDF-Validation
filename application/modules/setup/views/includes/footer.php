<footer class="footer-wrapper">
  <p>&copy; 2022 All rights, reserved</p>
</footer>

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

</html>