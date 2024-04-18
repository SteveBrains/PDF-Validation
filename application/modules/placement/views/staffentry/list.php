<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>List Staff</h3>
      <a href="add" class="btn btn-primary">+ Add Staff</a>
    </div>

    <!-- <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
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
                      <label class="col-sm-4 control-label">Parent Menu</label>
                      <div class="col-sm-8">
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">Select</option>
                            <?php
                            if (!empty($parentMenuList)) {
                              foreach ($parentMenuList as $record) { ?>
                             <option value="<?php echo $record->id;  ?>"
                                <?php
                                if ($record->id == $parent_id) {
                                  echo "selected=selected";
                                } ?>>
                                <?php echo $record->menu_name; ?>
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
                      <label class="col-sm-4 control-label">Menu</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="<?php echo $searchParam; ?>">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="app-btn-group">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="list" class="btn btn-link">Clear All Fields</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div> -->

    <div class="custom-table">
      <table class="table" id="role-table">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Father Name</th>
            <th>Caste</th>
            <th>Category</th>
            <th>Aadhar Number</th>
            <th>Address</th>
            <th>Zip Code</th>
            <th>Designation</th>
            <th>Post</th>
            <th>Registration Number</th>
            <th>Highest Education</th>
            <th>Date of Joining</th>
            <th> SSLC School Name</th>
            <th> Year of Passing</th>
            <th> Percentage</th>
            <th> PUC College Name</th>
            <th> Year of Passing</th>
            <th> Percentage</th>
            <th> Graduation College Name</th>
            <th> Year of Passing</th>
            <th> Percentage</th>
            <th> Training Center</th>
            <th> Employment Type</th>
            <?php if ($_SESSION['role'] == 1) { ?>
              <th class="noExport" style="text-align: center;">Action</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($staffs)) {
            $i = 1;
            foreach ($staffs as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->name; ?></td>
                <td><?php echo $record->mobile; ?></td>
                <td><?php echo $record->email; ?></td>
                <td><?php echo $record->dob; ?></td>
                <td><?php echo $record->father_name; ?></td>
                <td><?php echo $record->caste; ?></td>
                <td><?php echo $record->category; ?></td>
                <td><?php echo $record->aadhar; ?></td>
                <td><?php echo $record->address; ?></td>
                <td><?php echo $record->zipcode; ?></td>
                <td><?php echo $record->designation; ?></td>
                <td><?php echo $record->post; ?></td>
                <td><?php echo $record->registration_number; ?></td>
                <td><?php echo $record->highest_education; ?></td>
                <td><?php echo $record->doj; ?></td>
                <td><?php echo $record->sslc_college; ?></td>
                <td><?php echo $record->sslc_year; ?></td>
                <td><?php echo $record->sslc_percentage; ?></td>
                <td><?php echo $record->puc_college; ?></td>
                <td><?php echo $record->puc_year; ?></td>
                <td><?php echo $record->puc_percentage; ?></td>
                <td><?php echo $record->be_college; ?></td>
                <td><?php echo $record->be_year; ?></td>
                <td><?php echo $record->be_percentage; ?></td>
                <td><?php echo $record->TcName; ?></td>
                <td><?php if ($record->employment_type == 1) {
                      echo "Permanent";
                    } else  if ($record->employment_type == 2) {
                      echo "Guest Faculty Full Time";
                    } else  if ($record->employment_type == 3) {
                      echo "Guest Faculty Part Time";
                    } else  if ($record->employment_type == 4) {
                      echo "Outsource";
                    } else  if ($record->employment_type == 5) {
                      echo "Contract";
                    }
                    ?>
                </td>
                <?php if ($_SESSION['role'] == 1) { ?>
                  <td class="text-center">
                    <a href="<?php echo 'edit/' . $record->Id; ?>" title="Edit">Edit</a>
                    <!-- <a class="btn btn-sm btn-danger deleteRole" href="#" data-id="<?php echo $record->roleId; ?>" title="Delete"><i class="fa fa-trash"></i></a> -->
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
    $('#role-table').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'excel',
          filename: 'staff',
          exportOptions: {
            columns: "thead th:not(.noExport)"
          }
        },
        {
          extend: 'pdf',
          filename: 'staff',
          exportOptions: {
            columns: "thead th:not(.noExport)"
          }
        }, 'print'
      ],
    });

  });
</script>