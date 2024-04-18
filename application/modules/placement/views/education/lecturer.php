<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Lecturer Applications</h3>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Lecturer</li>
          <li class="breadcrumb-item active">Applications</li>
        </ol>
      </div>
    </div>

    <div class="custom-table" style="max-width: fit-content;overflow:auto;">
      <table class="table" id="example">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th> Acknowledgement Number</th>
            <th> Name</th>
            <th> Father Name</th>
            <th> Mother Name</th>
            <th> DOB</th>
            <th> Age</th>
            <th> Communication Address</th>
            <th> Permanent Address</th>
            <th> Mobile</th>
            <th>Email</th>
            <th>PAN</th>
            <th>Aadhar Number</th>
            <th>Caste</th>
            <th>SSLC Trade/Branch</th>
            <th>SSLC Board/University</th>
            <th>SSLC Institute Name</th>
            <th>SSLC Year of Passing</th>
            <th>SSLC Max Marks</th>
            <th>SSLC Obtained Marks</th>
            <th>SSLC Percentage</th>

            <th>PUC Trade/Branch</th>
            <th>PUC Board/University</th>
            <th>PUC Institute Name</th>
            <th>PUC Year of Passing</th>
            <th>PUC Max Marks</th>
            <th>PUC Obtained Marks</th>
            <th>PUC Percentage</th>

            <th>B.E Trade/Branch</th>
            <th>B.E Board/University</th>
            <th>B.E Institute Name</th>
            <th>B.E Year of Passing</th>
            <th>B.E Max Marks</th>
            <th>B.E Obtained Marks</th>
            <th>B.E Percentage</th>

            <th>M.E Trade/Branch</th>
            <th>M.E Board/University</th>
            <th>M.E Institute Name</th>
            <th>M.E Year of Passing</th>
            <th>M.E Max Marks</th>
            <th>M.E Obtained Marks</th>
            <th>M.E Percentage</th>

            <th>M.sc Trade/Branch</th>
            <th>M.sc Board/University</th>
            <th>M.sc Institute Name</th>
            <th>M.sc Year of Passing</th>
            <th>M.sc Max Marks</th>
            <th>M.sc Obtained Marks</th>
            <th>M.sc Percentage</th>

            <th>SSLC Marks Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>PUC Marks Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Diploma Marks Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Diploma Certificate</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>B.E Marks Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>B.E Graduation Certificate</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>M.Tech Marks Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Msc Marks Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Post Graduation Certificate</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Pan Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Aadhar Card</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Experience Certificates</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Passport Size Photo</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>

            <th>Caste Certificate</th>
            <th>Enclosed Copy</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($lecturerList)) {
            $i = 1;
            foreach ($lecturerList as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->acknowledge_number; ?></td>
                <td><?php echo $record->name ?></td>
                <td><?php echo $record->father_name ?></td>
                <td><?php echo $record->mother_name ?></td>
                <td><?php echo $record->dob ?></td>
                <td><?php echo $record->age ?></td>
                <td><?php echo $record->address ?></td>
                <td><?php echo $record->address1 ?></td>
                <td><?php echo $record->mobile ?></td>
                <td><?php echo $record->email ?></td>
                <td><?php echo $record->pan ?></td>
                <td><?php echo $record->aadhar ?></td>
                <td><?php echo $record->caste ?></td>
                <td><?php echo $record->sslc_branch ?></td>
                <td><?php echo $record->sslc_board ?></td>
                <td><?php echo $record->sslc_college ?></td>
                <td><?php echo $record->sslc_year ?></td>
                <td><?php echo $record->sslc_max ?></td>
                <td><?php echo $record->sslc_marks ?></td>
                <td><?php echo $record->sslc_percentage ?></td>

                <td><?php echo $record->puc_branch ?></td>
                <td><?php echo $record->puc_board ?></td>
                <td><?php echo $record->puc_college ?></td>
                <td><?php echo $record->puc_year ?></td>
                <td><?php echo $record->puc_max ?></td>
                <td><?php echo $record->puc_marks ?></td>
                <td><?php echo $record->puc_percentage ?></td>

                <td><?php echo $record->be_branch ?></td>
                <td><?php echo $record->be_board ?></td>
                <td><?php echo $record->be_college ?></td>
                <td><?php echo $record->be_year ?></td>
                <td><?php echo $record->be_max ?></td>
                <td><?php echo $record->be_marks ?></td>
                <td><?php echo $record->be_percentage ?></td>

                <td><?php echo $record->me_branch ?></td>
                <td><?php echo $record->me_board ?></td>
                <td><?php echo $record->me_college ?></td>
                <td><?php echo $record->me_year ?></td>
                <td><?php echo $record->me_max ?></td>
                <td><?php echo $record->me_marks ?></td>
                <td><?php echo $record->me_percentage ?></td>

                <td><?php echo $record->msc_branch ?></td>
                <td><?php echo $record->msc_board ?></td>
                <td><?php echo $record->msc_college ?></td>
                <td><?php echo $record->msc_year ?></td>
                <td><?php echo $record->msc_max ?></td>
                <td><?php echo $record->msc_marks ?></td>
                <td><?php echo $record->msc_percentage ?></td>

                <td><?php if ($record->sslc_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->sslc_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->sslc_copy ?></td>
                <td><?php echo $record->sslc_remarks ?></td>

                <td><?php if ($record->puc_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->puc_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->puc_copy ?></td>
                <td><?php echo $record->puc_remarks ?></td>

                <td><?php if ($record->diploma_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->diploma_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->diploma_copy ?></td>
                <td><?php echo $record->diploma_remarks ?></td>

                <td><?php if ($record->diploma_certificate_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->diploma_certificate_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->diploma_certificate_copy ?></td>
                <td><?php echo $record->diploma_certificate_remarks ?></td>

                <td><?php if ($record->be_grad_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->be_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->be_grad_copy ?></td>
                <td><?php echo $record->be_grad_remarks ?></td>

                <td><?php if ($record->be_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->be_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->be_copy ?></td>
                <td><?php echo $record->be_remarks ?></td>

                <td><?php if ($record->me_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->me_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->me_copy ?></td>
                <td><?php echo $record->me_remarks ?></td>

                <td><?php if ($record->msc_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->msc_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->msc_copy ?></td>
                <td><?php echo $record->msc_remarks ?></td>

                <td><?php if ($record->pg_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->pg_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->pg_copy ?></td>
                <td><?php echo $record->pg_remarks ?></td>

                <td><?php if ($record->pan_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->pan_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->pan_copy ?></td>
                <td><?php echo $record->pan_remarks ?></td>

                <td><?php if ($record->aadhar_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->aadhar_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->aadhar_copy ?></td>
                <td><?php echo $record->aadhar_remarks ?></td>

                <td><?php if ($record->experience_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->experience_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->experience_copy ?></td>
                <td><?php echo $record->experience_remarks ?></td>

                <td><?php if ($record->photo_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->photo_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->photo_copy ?></td>
                <td><?php echo $record->photo_remarks ?></td>

                <td><?php if ($record->other_file) { ?><a target="_blank" href="<?php echo BASE_PATH . "/assets/resources/" . $record->other_file ?>">View</a><?php } ?></td>
                <td><?php echo $record->other_copy ?></td>
                <td><?php echo $record->other_remarks ?></td>
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
          filename: 'lecturer'
        },
        {
          extend: 'pdf',
          filename: 'lecturer'
        }, 'print'
      ],
    });

  });
</script>