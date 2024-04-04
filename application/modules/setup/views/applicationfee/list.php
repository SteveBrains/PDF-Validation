<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>List Application Fee</h3>
      <a href="add" class="btn btn-primary">+ Setup Application Fee</a>
    </div>

    <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Advanced Search
            </a>
          </h4>
        </div>
        <form action="" method="post" id="searchForm">
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Caste</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="caste_id" name="caste_id">
                          <option value="">Select</option>
                          <?php foreach ($castes as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($caste_id == $row->id) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $row->name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Type</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="type" name="type">
                          <option value="">Select</option>
                          <option value="UG" <?php if ($type == 'UG') {
                                              echo "selected";
                                            } ?>>UG</option>
                          <option value="PG" <?php if ($type == 'PG') {
                                              echo "selected";
                                            } ?>>PG</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="app-btn-group">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href='list' class="btn btn-link">Clear All Fields</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="custom-table">
      <table class="table" id="list-table">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th>Caste </th>
            <th>Type</th>
            <th>Fee</th>
            <!-- <th style="text-align: center;">Action</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($applicationfeeRecords)) {
            $i = 1;
            foreach ($applicationfeeRecords as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->casteName ?></td>
                <td><?php echo $record->type ?></td>
                <td><?php echo $record->fee ?></td>
                <!-- <td class="text-center">
                  <a href="<?php echo 'edit/' . $record->id; ?>" title="Edit">Edit</a>
                </td> -->
              </tr>
          <?php
              $i++;
            }
          }
          ?>
        </tbody>
      </table>
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