<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lecturer Application</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
</head>

<body>
  <div class="login-wrapper1">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-md-12">
          <img src="<?php echo BASE_PATH; ?>/assets/img/perhebat_logo.png" width="80">
          <h2>Government Tool Room and Training Centre</h2>
          <h3>Application for the post of lecturers(Contract Basis)</h3>
        </div>
      </div>
      <hr>
      <form id="form_main" action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <!-- <h3><strong>Lecturer Application</strong><br /></h3> -->
            <div class="form-container">
              <h4 class="form-group-title">Personal Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $lecturer->name; ?>" value="<?php echo $lecturer->name; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $lecturer->father_name; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Mother Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo $lecturer->mother_name; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>DOB<span class='error-text'>*</span></label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $lecturer->dob; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Age<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="age" name="age" value="<?php echo $lecturer->age; ?>" readonly>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Communication Address<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $lecturer->address; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Permanent Address</label>
                    <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $lecturer->address1; ?>">
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Mobile<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $lecturer->mobile; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Email<span class='error-text'>*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $lecturer->email; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>PAN</label>
                    <input type="text" class="form-control" id="pan" name="pan" value="<?php echo $lecturer->pan; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Aadhar Number<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $lecturer->aadhar; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Caste<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="caste" name="caste" value="<?php echo $lecturer->caste; ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">SSLC Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Board/University(KSBC,CBSE,ICSE)<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_board" name="sslc_board" value="<?php echo $lecturer->sslc_board; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name of Institute<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_college" name="sslc_college" value="<?php echo $lecturer->sslc_college; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of Passing<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_year" name="sslc_year" value="<?php echo $lecturer->sslc_year; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Marks<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_max" name="sslc_max" value="<?php echo $lecturer->sslc_max; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Obtained<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_marks" name="sslc_marks" value="<?php echo $lecturer->sslc_marks; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_percentage" name="sslc_percentage" value="<?php echo $lecturer->sslc_percentage; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">PUC/Diploma Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Trade/Branch<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_branch" name="puc_branch" value="<?php echo $lecturer->puc_branch; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Board/University<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_board" name="puc_board" value="<?php echo $lecturer->puc_board; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name of Institute<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_college" name="puc_college" value="<?php echo $lecturer->puc_college; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of Passing<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_year" name="puc_year" value="<?php echo $lecturer->puc_year; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Marks<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_max" name="puc_max" value="<?php echo $lecturer->puc_max; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Obtained<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_marks" name="puc_marks" value="<?php echo $lecturer->puc_marks; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_percentage" name="puc_percentage" value="<?php echo $lecturer->puc_percentage; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">B.E/B.sc Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Trade/Branch</label>
                    <input type="text" class="form-control" id="be_branch" name="be_branch" value="<?php echo $lecturer->be_branch; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Board/University</label>
                    <input type="text" class="form-control" id="be_board" name="be_board" value="<?php echo $lecturer->be_board; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name of Institute</label>
                    <input type="text" class="form-control" id="be_college" name="be_college" value="<?php echo $lecturer->be_college; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of Passing</label>
                    <input type="text" class="form-control" id="be_year" name="be_year" value="<?php echo $lecturer->be_year; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Marks</label>
                    <input type="text" class="form-control" id="be_max" name="be_max" value="<?php echo $lecturer->be_max; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Obtained</label>
                    <input type="text" class="form-control" id="be_marks" name="be_marks" value="<?php echo $lecturer->be_marks; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage</label>
                    <input type="text" class="form-control" id="be_percentage" name="be_percentage" value="<?php echo $lecturer->be_percentage; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">M.Tech Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Trade/Branch</label>
                    <input type="text" class="form-control" id="me_branch" name="me_branch" value="<?php echo $lecturer->me_branch; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Board/University</label>
                    <input type="text" class="form-control" id="me_board" name="me_board" value="<?php echo $lecturer->me_board; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name of Institute</label>
                    <input type="text" class="form-control" id="me_college" name="me_college" value="<?php echo $lecturer->me_college; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of Passing</label>
                    <input type="text" class="form-control" id="me_year" name="me_year" value="<?php echo $lecturer->me_year; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Marks</label>
                    <input type="text" class="form-control" id="me_max" name="me_max" value="<?php echo $lecturer->me_max; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Obtained</label>
                    <input type="text" class="form-control" id="me_marks" name="me_marks" value="<?php echo $lecturer->me_marks; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage</label>
                    <input type="text" class="form-control" id="me_percentage" name="me_percentage" value="<?php echo $lecturer->me_percentage; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">M.sc Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Trade/Branch</label>
                    <input type="text" class="form-control" id="msc_branch" name="msc_branch" value="<?php echo $lecturer->msc_branch; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Board/University</label>
                    <input type="text" class="form-control" id="msc_board" name="msc_board" value="<?php echo $lecturer->msc_board; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name of Institute</label>
                    <input type="text" class="form-control" id="msc_college" name="msc_college" value="<?php echo $lecturer->msc_college; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of Passing</label>
                    <input type="text" class="form-control" id="msc_year" name="msc_year" value="<?php echo $lecturer->msc_year; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Marks</label>
                    <input type="text" class="form-control" id="msc_max" name="msc_max" value="<?php echo $lecturer->msc_max; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Max Obtained</label>
                    <input type="text" class="form-control" id="msc_marks" name="msc_marks" value="<?php echo $lecturer->msc_marks; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage</label>
                    <input type="text" class="form-control" id="msc_percentage" name="msc_percentage" value="<?php echo $lecturer->msc_percentage; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Others</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Other Technical Skills</label>
                    <input type="text" class="form-control" id="other_skills" name="other_skills" value="<?php echo $lecturer->other_skills; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Languages Known</label>
                    <input type="text" class="form-control" id="languages_known" name="languages_known" value="<?php echo $lecturer->languages_known; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Hobbies</label>
                    <input type="text" class="form-control" id="hobbies" name="hobbies" value="<?php echo $lecturer->hobbies; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Achievements</label>
                    <input type="text" class="form-control" id="achievements" name="achievements" value="<?php echo $lecturer->achievements; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>References</label>
                    <input type="text" class="form-control" id="reference" name="reference" value="<?php echo $lecturer->reference; ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
            <h4 class="form-group-title">Documents <br><br><span style="font-size: 10px;color:red;">(Documents Size must be < 2MB)</span></h4><br><br>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>SSLC Marks Card<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="sslc_file" name="sslc_file">
                    <?php if ($lecturer->sslc_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->sslc_file; ?>"style="color:red">Click Here to View uploaded file</a>
                      <input type="hidden" name="sslc_file_value" value="<?php echo $lecturer->sslc_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="sslc_copy" id="sslc_copy" value="Yes" <?php if ($lecturer->sslc_copy == 'Yes') {
                                                                                        echo "checked";
                                                                                      } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="sslc_copy" id="sslc_copy" value="No" <?php if ($lecturer->sslc_copy == 'No') {
                                                                                        echo "checked";
                                                                                      } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="sslc_remarks" name="sslc_remarks" value="<?php echo $lecturer->sslc_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>PUC Marks Card</label>
                    <input type="file" class="form-control" id="puc_file" name="puc_file">
                    <?php if ($lecturer->puc_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->puc_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="puc_file_value" value="<?php echo $lecturer->puc_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="puc_copy" id="puc_copy" value="Yes" <?php if ($lecturer->puc_copy == 'Yes') {
                                                                                      echo "checked";
                                                                                    } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="puc_copy" id="puc_copy" value="No" <?php if ($lecturer->puc_copy == 'No') {
                                                                                      echo "checked";
                                                                                    } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="puc_remarks" name="puc_remarks" value="<?php echo $lecturer->puc_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Diploma Marks Card [All Years/Semesters]</label>
                    <input type="file" class="form-control" id="diploma_file" name="diploma_file">
                    <?php if ($lecturer->diploma_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->diploma_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="diploma_file_value" value="<?php echo $lecturer->diploma_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="diploma_copy" id="diploma_copy" value="Yes" <?php if ($lecturer->diploma_copy == 'Yes') {
                                                                                              echo "checked";
                                                                                            } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="diploma_copy" id="diploma_copy" value="No" <?php if ($lecturer->diploma_copy == 'No') {
                                                                                              echo "checked";
                                                                                            } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="diploma_remarks" name="diploma_remarks" value="<?php echo $lecturer->diploma_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Diploma Certificate</label>
                    <input type="file" class="form-control" id="diploma_certificate_file" name="diploma_certificate_file">
                    <?php if ($lecturer->diploma_certificate_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->diploma_certificate_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="diploma_certificate_file_value" value="<?php echo $lecturer->diploma_certificate_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="diploma_certificate_copy" id="diploma_certificate_copy" value="Yes" <?php if ($lecturer->diploma_certificate_copy == 'Yes') {
                                                                                                                      echo "checked";
                                                                                                                    } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="diploma_certificate_copy" id="diploma_certificate_copy" value="No" <?php if ($lecturer->diploma_certificate_copy == 'No') {
                                                                                                                      echo "checked";
                                                                                                                    } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="diploma_certificate_remarks" name="diploma_certificate_remarks" value="<?php echo $lecturer->diploma_certificate_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>B.E Marks Card [All Years/Semesters]</label>
                    <input type="file" class="form-control" id="be_file" name="be_file">
                    <?php if ($lecturer->be_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->be_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="be_file_value" value="<?php echo $lecturer->be_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="be_copy" id="be_copy" value="Yes" <?php if ($lecturer->be_copy == 'Yes') {
                                                                                    echo "checked";
                                                                                  } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="be_copy" id="be_copy" value="No" <?php if ($lecturer->be_copy == 'No') {
                                                                                    echo "checked";
                                                                                  } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="be_remarks" name="be_remarks" value="<?php echo $lecturer->be_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>BE Graduation Certificate</label>
                    <input type="file" class="form-control" id="be_grad_file" name="be_grad_file">
                    <?php if ($lecturer->be_grad_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->be_grad_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="be_grad_file_value" value="<?php echo $lecturer->be_grad_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="be_grad_copy" id="be_grad_copy" value="Yes" <?php if ($lecturer->be_grad_copy == 'Yes') {
                                                                                              echo "checked";
                                                                                            } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="be_grad_copy" id="be_grad_copy" value="No" <?php if ($lecturer->be_grad_copy == 'No') {
                                                                                              echo "checked";
                                                                                            } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="be_grad_remarks" name="be_grad_remarks" value="<?php echo $lecturer->be_grad_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>M. Tech Marks Cards [All Years/Semesters]</label>
                    <input type="file" class="form-control" id="me_file" name="me_file">
                    <?php if ($lecturer->me_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->me_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="me_file_value" value="<?php echo $lecturer->me_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="me_copy" id="me_copy" value="Yes" <?php if ($lecturer->me_copy == 'Yes') {
                                                                                    echo "checked";
                                                                                  } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="me_copy" id="me_copy" value="No" <?php if ($lecturer->me_copy == 'No') {
                                                                                    echo "checked";
                                                                                  } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="me_remarks" name="me_remarks" value="<?php echo $lecturer->me_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Msc Marks Cards [All Years/Semesters]</label>
                    <input type="file" class="form-control" id="msc_file" name="msc_file">
                    <?php if ($lecturer->msc_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->msc_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="msc_file_value" value="<?php echo $lecturer->msc_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="msc_copy" id="msc_copy" value="Yes" <?php if ($lecturer->msc_copy == 'Yes') {
                                                                                      echo "checked";
                                                                                    } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="msc_copy" id="msc_copy" value="No" <?php if ($lecturer->msc_copy == 'No') {
                                                                                      echo "checked";
                                                                                    } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="msc_remarks" name="msc_remarks" value="<?php echo $lecturer->msc_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Post Graduation Certificate</label>
                    <input type="file" class="form-control" id="pg_file" name="pg_file">
                    <?php if ($lecturer->pg_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->pg_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="pg_file_value" value="<?php echo $lecturer->pg_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="pg_copy" id="pg_copy" value="Yes" <?php if ($lecturer->pg_copy == 'Yes') {
                                                                                    echo "checked";
                                                                                  } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="pg_copy" id="pg_copy" value="No" <?php if ($lecturer->pg_copy == 'No') {
                                                                                    echo "checked";
                                                                                  } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="pg_remarks" name="pg_remarks" value="<?php echo $lecturer->pg_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Pan Card</label>
                    <input type="file" class="form-control" id="pan_file" name="pan_file">
                    <?php if ($lecturer->pan_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->pan_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="pan_file_value" value="<?php echo $lecturer->pan_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="pan_copy" id="pan_copy" value="Yes" <?php if ($lecturer->pan_copy == 'Yes') {
                                                                                      echo "checked";
                                                                                    } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="pan_copy" id="pan_copy" value="No" <?php if ($lecturer->pan_copy == 'No') {
                                                                                      echo "checked";
                                                                                    } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="pan_remarks" name="pan_remarks" value="<?php echo $lecturer->pan_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Aadhar Card<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="aadhar_file" name="aadhar_file">
                    <?php if ($lecturer->aadhar_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->aadhar_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="aadhar_file_value" value="<?php echo $lecturer->aadhar_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="aadhar_copy" id="aadhar_copy" value="Yes" <?php if ($lecturer->aadhar_copy == 'Yes') {
                                                                                            echo "checked";
                                                                                          } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="aadhar_copy" id="aadhar_copy" value="No" <?php if ($lecturer->aadhar_copy == 'No') {
                                                                                            echo "checked";
                                                                                          } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="aadhar_remarks" name="aadhar_remarks" value="<?php echo $lecturer->aadhar_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Experience Certificates</label>
                    <input type="file" class="form-control" id="experience_file" name="experience_file">
                    <?php if ($lecturer->experience_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->experience_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="experience_file_value" value="<?php echo $lecturer->experience_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="experience_copy" id="experience_copy" value="Yes" <?php if ($lecturer->experience_copy == 'Yes') {
                                                                                                    echo "checked";
                                                                                                  } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="experience_copy" id="experience_copy" value="No" <?php if ($lecturer->experience_copy == 'No') {
                                                                                                    echo "checked";
                                                                                                  } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="experience_remarks" name="experience_remarks" value="<?php echo $lecturer->experience_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Passport Size Photo<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="photo_file" name="photo_file">
                    <?php if ($lecturer->photo_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->photo_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="photo_file_value" value="<?php echo $lecturer->photo_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="photo_copy" id="photo_copy" value="Yes" <?php if ($lecturer->photo_copy == 'Yes') {
                                                                                          echo "checked";
                                                                                        } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="photo_copy" id="photo_copy" value="No" <?php if ($lecturer->photo_copy == 'No') {
                                                                                          echo "checked";
                                                                                        } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="photo_remarks" name="photo_remarks" value="<?php echo $lecturer->photo_remarks; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Caste Certificate</label>
                    <input type="file" class="form-control" id="other_file" name="other_file">
                    <?php if ($lecturer->other_file != '') { ?>
                      <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $lecturer->other_file; ?>"style="color:red">Click Here to View uploaded file</a>
                    <input type="hidden" name="other_file_value" value="<?php echo $lecturer->other_file; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Enclosed Copy</p>
                    <label class="radio-inline">
                      <input type="radio" name="other_copy" id="other_copy" value="Yes" <?php if ($lecturer->other_copy == 'Yes') {
                                                                                          echo "checked";
                                                                                        } ?>><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="other_copy" id="other_copy" value="No" <?php if ($lecturer->other_copy == 'No') {
                                                                                          echo "checked";
                                                                                        } ?>><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Remarks<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="other_remarks" name="other_remarks" value="<?php echo $lecturer->other_remarks; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <h3>Experience
                <a href="../experience/<?php echo $id; ?>"><button type="button" class="btn btn-primary btn-lg">Add</button></a>
              </h3>
          <div class="col-md-12">
            <div class="custom-table">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sl. No</th>
                    <th> Organisation Name</th>
                    <th> Address</th>
                    <th> Designation</th>
                    <th>From Date</th>
                    <th> To Date</th>
                    <th> Salary</th>
                    <th> Remarks</th>
                    <th> Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($experience)) {
                    $i = 1;
                    foreach ($experience as $record) {
                  ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $record->organisation_name ?></td>
                        <td><?php echo $record->address ?></td>
                        <td><?php echo $record->designation ?></td>
                        <td><?php echo $record->from_date ?></td>
                        <td><?php echo $record->to_date ?></td>
                        <td><?php echo $record->salary ?></td>
                        <td><?php echo $record->remarks ?></td>
                        <td class="text-center">
                          <a href="<?php echo  $record->lecturer_id."?delete_id=".$record->Id; ?>" title="Edit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
          <div class="button-block clearfix text-right">
            <div class="bttn-group">
              <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
            </div>
          </div>
        </div>
      </form>
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
  <script>
    $(document).ready(function() {

      $('#address_same').click(function() {

        if ($('#address_same').prop('checked')) {
          $('#address1').val($('#address').val());
          $("#address1").prop("readonly", true);

        } else {
          $('#address1').val("");
        };

      });
 
      function getAge(birthday) { // birthday is a date
        var ageDifMs = Date.now() - birthday.getTime();
        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        return Math.abs(ageDate.getUTCFullYear() - 1970);
      }
      $("#dob").bind("blur", function() {
        var age = getAge(new Date($("#dob").val()));
        $("#age").val(age)
      });


      function calculatePerc(max, marks) {
        perc = (marks * 100) / max,
          perc = perc.toFixed(2);
        return perc;
      }
      $("#sslc_max,#sslc_marks").bind("blur", function() {
        var max = $("#sslc_max").val();
        var marks = $("#sslc_marks").val();
        if (max > 0 && marks > 0) {
          var perc = calculatePerc(max, marks);
          $("#sslc_percentage").val(perc);
        }
      });

      $("#puc_max,#puc_marks").bind("blur", function() {
        var max = $("#puc_max").val();
        var marks = $("#puc_marks").val();
        if (max > 0 && marks > 0) {
          var perc = calculatePerc(max, marks);
          $("#puc_percentage").val(perc);
        }
      });

      $("#be_max,#be_marks").bind("blur", function() {
        var max = $("#be_max").val();
        var marks = $("#be_marks").val();
        if (max > 0 && marks > 0) {
          var perc = calculatePerc(max, marks);
          $("#be_percentage").val(perc);
        }
      });

      $("#me_max,#me_marks").bind("blur", function() {
        var max = $("#me_max").val();
        var marks = $("#me_marks").val();
        if (max > 0 && marks > 0) {
          var perc = calculatePerc(max, marks);
          $("#me_percentage").val(perc);
        }
      });

      $("#msc_max,#msc_marks").bind("blur", function() {
        var max = $("#msc_max").val();
        var marks = $("#msc_marks").val();
        if (max > 0 && marks > 0) {
          var perc = calculatePerc(max, marks);
          $("#msc_percentage").val(perc);
        }
      });
      $("#form_main1").validate({
        rules: {
          name: {
            required: true
          },
          dob: {
            required: true
          },
          address: {
            required: true
          },
          mobile: {
            required: true
          },
          email: {
            required: true,
            remote: "../../lecturers/checkEmail"
          },
          aadhar: {
            required: true
          },
          caste: {
            required: true
          },
          sslc_board: {
            required: true
          },
          sslc_college: {
            required: true
          },
          sslc_year: {
            required: true
          },
          sslc_max: {
            required: true
          },
          sslc_marks: {
            required: true
          },
          puc_branch: {
            required: true
          },
          puc_board: {
            required: true
          },
          puc_college: {
            required: true
          },
          puc_year: {
            required: true
          },
          puc_max: {
            required: true
          },
          puc_marks: {
            required: true
          },
        },
        messages: {

          name: {
            required: "<span class='error-text'> Required</span>",
          },
          dob: {
            required: "<span class='error-text'> Required</span>",
          },
          address: {
            required: "<span class='error-text'> Required</span>",
          },
          mobile: {
            required: "<span class='error-text'> Required</span>",
          },
          email: {
            required: "<span class='error-text'> Required</span>",
            remote: "<span class='error-text'>Email already exist</span>"
          },
          aadhar: {
            required: "<span class='error-text'> Required</span>",
          },
          caste: {
            required: "<span class='error-text'> Required</span>",
          },
          sslc_board: {
            required: "<span class='error-text'> Required</span>",
          },
          sslc_college: {
            required: "<span class='error-text'> Required</span>",
          },
          sslc_year: {
            required: "<span class='error-text'> Required</span>",
          },
          sslc_max: {
            required: "<span class='error-text'> Required</span>",
          },
          sslc_marks: {
            required: "<span class='error-text'> Required</span>",
          },
          puc_branch: {
            required: "<span class='error-text'> Required</span>",
          },
          puc_board: {
            required: "<span class='error-text'> Required</span>",
          },
          puc_college: {
            required: "<span class='error-text'> Required</span>",
          },
          puc_year: {
            required: "<span class='error-text'> Required</span>",
          },
          puc_max: {
            required: "<span class='error-text'> Required</span>",
          },
          puc_marks: {
            required: "<span class='error-text'> Required</span>",
          },
          sslc_file: {
            required: "<span class='error-text'> Required</span>",
          },
          aadhar_file: {
            required: "<span class='error-text'> Required</span>",
          },
          photo_file: {
            required: "<span class='error-text'> Required</span>",
          },


        },
        errorElement: "span",
        errorPlacement: function(error, element) {
          error.appendTo(element.parent());
        }

      });
    });

    function getJobrolesById(id) {
      if (id != '') {
        $.ajax('/jobs/getJobrolesById', {
          type: 'POST',
          data: {
            training_center_id: id,
            job_role_id: 0
          },
          success: function(data, status, xhr) {
            $('#job_role_id').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }

    function getSemestersById(id) {
      if (id != '') {
        $.ajax('/jobs/getSemestersById', {
          type: 'POST',
          data: {
            course_id: id,
            semester_id: 0
          },
          success: function(data, status, xhr) {
            $('#semester_id').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }
  </script>
</body>

</html>