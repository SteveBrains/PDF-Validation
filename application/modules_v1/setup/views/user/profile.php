<div class="container-fluid page-wrapper">
  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Edit Profile</h3>
    </div>

    <div class="form-container">
      <form id="form_academic_year" action="" method="post">
        <h4 class="form-group-title">Profile Details</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Name <span class='error-text'>*</span></label>
              <br>
              <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="<?php echo $userInfo->name; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Email <span class='error-text'>*</span></label>
              <br>
              <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $userInfo->email; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Mobile <span class='error-text'>*</span></label>
              <br>
              <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off" value="<?php echo $userInfo->mobile; ?>">
            </div>
          </div>
        </div>
        <div class="button-block clearfix">
          <div class="bttn-group">
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
            <a href="../list" class="btn btn-link">Cancel</a>
          </div>
        </div>
      </form>
    </div>
    <br>
    <div class="form-container">
      <form id="form_academic_year" action="changePassword" method="post">
        <h4 class="form-group-title">Change Password</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Password <span class='error-text'>*</span></label>
              <br>
              <input type="password" class="form-control" id="password" name="password" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Confirm Password <span class='error-text'>*</span></label>
              <br>
              <input type="password" class="form-control" id="cnfpassword" name="cnfpassword" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="button-block clearfix">
          <div class="bttn-group">
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
            <a href="../list" class="btn btn-link">Cancel</a>
          </div>
        </div>
      </form>
    </div>

    <footer class="footer-wrapper">
      <p>&copy; 2023 All rights, reserved</p>
    </footer>

  </div>
</div>
<script>
  $(document).ready(function() {});
</script>