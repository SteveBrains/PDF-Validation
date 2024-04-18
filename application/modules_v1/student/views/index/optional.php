<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Optional Optional</h3>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Optional</li>
          <li class="breadcrumb-item active">Subjects</li>
        </ol>
      </div>
    </div>
    <div class="custom-table">
      <form action="" method="post" id="searchForm">
        <table class="table">
          <thead>
            <tr>
              <th>Sl. No</th>
              <th> Name</th>
              <th> Code</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($subjectList)) {
              $i = 1;
              foreach ($subjectList as $record) {
            ?>
                <tr>
                  <td><input type="checkbox" name="subjects[]" value="<?php echo $record->id ?>"></td>
                  <td><?php echo $record->name ?></td>
                  <td><?php echo $record->code ?></td>
                </tr>
            <?php
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
        <div class="app-btn-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <footer class="footer-wrapper">
    <p>&copy; 2023 All rights, reserved</p>
  </footer>
</div>
<script>
  function clearSearchForm() {
    window.location.reload();
  }
</script>