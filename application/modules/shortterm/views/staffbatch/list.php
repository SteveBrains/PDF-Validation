<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>List Staff Batch</h3>
      <a href="add" class="btn btn-primary">+ Add Batch</a>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Batch</li>
          <li class="breadcrumb-item active">List</li>
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
                      <label class="col-sm-4 control-label">Batch</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="<?php echo $searchParam['name']; ?>">
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
            <th> Name</th>
            <th> Code</th>
            <th> Scheme</th>
            <th> Course</th>
            <th> Training Center</th>
            <th> Start Date</th>
            <th> End Date</th>
            <th>Status</th>
            <th> Tag Staff</th>
            <th> View Staff</th>
            <th> Marks</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($batchList)) {
            $i = 1;
            foreach ($batchList as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->name ?></td>
                <td><?php echo $record->code ?></td>
                <td><?php echo $record->schemeName ?></td>
                <td><?php echo $record->courseName ?></td>
                <td><?php echo $record->tcName ?></td>
                <td><?php echo $record->start_date ?></td>
                <td><?php echo $record->end_date ?></td>
                <td><?php echo $record->status ?></td>
                <td>
                  <a href="<?php echo 'tag/' . $record->Id; ?>" title="Tag"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tag</a>
                </td>

                <td>
                  <a href="<?php echo 'view/' . $record->Id; ?>" title="Tag"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View</a>
                </td>
                <td>
                  <a href="<?php echo 'marks/' . $record->Id; ?>" title="Tag"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>Entry</a>
                </td>
                <td class="text-center">
                  <a href="<?php echo 'edit/' . $record->Id; ?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit</a>
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