<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Shortlist Resumes</h3>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Job Description</li>
          <li class="breadcrumb-item active">Shortlist Resumes</li>
        </ol>
      </div>
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
                      <label class="col-sm-4 control-label">Company</label>
                      <div class="col-sm-8">
                        <select name="company_id" id="company_id" class="form-control">
                          <option value="">Select</option>

                          <?php
                          if (!empty($companyList)) {
                            foreach ($companyList as $record) { ?>
                              <option value="<?php echo $record->Id;  ?>" <?php if ($company_id) {
                                                                            echo "selected";
                                                                          } ?>>
                                <?php echo $record->name; ?>
                              </option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Job Description</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
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
            <th> Title</th>
            <th> Code</th>
            <th> Company</th>
            <th> Type</th>
            <th> Skills</th>
            <th> No of openings</th>
            <th>Status</th>
            <th> Shortlisted Resumes</th>
            <th> Shortlist</th>
            <th> View</th>
            <th> Submit for Finalize</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($jobdescriptionList)) {
            $i = 1;
            foreach ($jobdescriptionList as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->title ?></td>
                <td><?php echo $record->code ?></td>
                <td><?php echo $record->companyName ?></td>
                <td><?php echo $record->type ?></td>
                <td><?php echo $record->skills ?></td>
                <td><?php echo $record->openings ?></td>
                <td><?php echo $record->status ?></td>
                <td><?php echo $record->resumeCount ?></td>
                <td>
                  <a href="<?php echo 'shortlist/' . $record->Id; ?>" title="Tag">Shortlist</a>
                </td>
                <td>
                  <a href="<?php echo 'viewshortlisted/' . $record->Id; ?>" title="Tag"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View Resumes</a>
                </td>
                <td>
                  <a href="<?php echo 'shortlistsubmit/' . $record->Id; ?>" title="Tag"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>Submit</a>
                </td>


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