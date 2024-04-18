<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>List Candidate</h3>
      <a href="add" class="btn btn-primary">+ Add Candidate</a>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Candidate</li>
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
                      <label class="col-sm-4 control-label">Candidate</label>
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
      <table class="table" id="example">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th> Name</th>
            <th> Student ID</th>
            <th> SSLC Registration Number</th>
            <th> Mobile</th>
            <th> Email</th>
            <th> DOB</th>
            <th> Father Name</th>
            <th> Bank Name</th>
            <th> Account Number</th>
            <th> Type</th>
            <th> Religion</th>
            <th> Caste</th>
            <th> Category</th>
            <th> Aadhar</th>
            <th> Address 1</th>
            <th> Address 2</th>
            <th> Zip Code</th>
            <th> Highest Education</th>
            <th> SSLC School Name</th>
            <th> Year of Passing</th>
            <th> Percentage</th>
            <th> PUC Type</th>
            <th> PUC College Name</th>
            <th> Year of Passing</th>
            <th> Percentage</th>
            <th> Graduation Type</th>
            <th> Graduation College Name</th>
            <th> Year of Passing</th>
            <th> Percentage</th>
            <th> Post Graduation Type</th>
            <th> Post Graduation College Name</th>
            <th> Year of Passing</th>
            <th> Percentage</th>

            <th> Training Center</th>
            <th> Course</th>
            <th class="noExport"> Placements</th>
            <?php if ($_SESSION['role'] == 1) { ?>
              <th class="noExport" style="text-align: center;">Action</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($candidateList)) {
            $i = 1;
            foreach ($candidateList as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->name ?></td>
                <td><?php echo $record->uid ?></td>
                <td><?php echo $record->registration_number; ?></td>
                <td><?php echo $record->mobile ?></td>
                <td><?php echo $record->email ?></td>
                <td><?php echo $record->dob ?></td>
                <td><?php echo $record->father_name ?></td>
                <td><?php echo $record->bank_name ?></td>
                <td><?php echo $record->account_number ?></td>
                <td><?php echo ($record->type ==1 ? 'Minority':'General') ?></td>
                <td><?php echo $record->religion ?></td>
                <td><?php echo $record->caste ?></td>
                <td><?php echo $record->category ?></td>
                <td><?php echo $record->aadhar ?></td>
                <td><?php echo $record->address ?></td>
                <td><?php echo $record->address1 ?></td>
                <td><?php echo $record->zip ?></td>
                <td><?php echo $record->HighestEducation ?></td>
                <td><?php echo $record->sslc_college ?></td>
                <td><?php echo $record->sslc_year ?></td>
                <td><?php echo $record->sslc_cutoff ?></td>
                <td><?php echo $record->puc_type ?></td>
                <td><?php echo $record->puc_college ?></td>
                <td><?php echo $record->puc_year ?></td>
                <td><?php echo $record->puc_cutoff ?></td>
                <td><?php echo $record->be_type ?></td>
                <td><?php echo $record->be_college ?></td>
                <td><?php echo $record->be_year ?></td>
                <td><?php echo $record->be_cutoff ?></td>
                <td><?php echo $record->me_type ?></td>
                <td><?php echo $record->me_college ?></td>
                <td><?php echo $record->me_year ?></td>
                <td><?php echo $record->me_cutoff ?></td>
                <td><?php echo $record->TcName ?></td>
                <td><?php echo $record->CourseName ?></td>
                <!--<td>
                  <a href="<?php echo 'markscard/' . $record->Id; ?>" title="Edit"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>Upload</a>
                </td> -->
                <td class="text-center">
                  <a href="<?php echo 'placements/' . $record->Id; ?>" title="Edit"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View</a>
                </td>
                <?php if ($_SESSION['role'] == 1) { ?>
                  <td class="text-center">
                    <a href="<?php echo 'edit/' . $record->Id; ?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit</a>
                  </td>
                <?php } ?>


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
  $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'excel',
          filename: 'student',
          exportOptions: {
            columns: "thead th:not(.noExport)"
          }
        },
        {
          extend: 'pdf',
          filename: 'student',
          exportOptions: {
            columns: "thead th:not(.noExport)"
          }
        }, 'print'
      ],
    });

  });
</script>