<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centralized Student Placement Management</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
</head>

<body>
  <div class="login-wrapper1">
    <div class="container-fluid">
      <div class="row">
        <div class=" col-md-12 col-lg-12">
          <h3><strong>Candidate Registration</strong><br /></h3>
          <form id="form_main" action="" method="post" enctype="multipart/form-data">
            <div class="form-container">
              <h4 class="form-group-title">Candidate Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Mobile<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Email<span class='error-text'>*</span></label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>DOB<span class='error-text'>*</span></label>
                    <input type="date" class="form-control" id="dob" name="dob" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Father Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="father_name" name="father_name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Bank Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Account Number<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Caste <span class='error-text'>*</span></p>
                    <label class="radio-inline">
                      <input type="radio" name="caste" id="caste" value="OC"><span class="check-radio"></span> OC
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="caste" id="caste" value="BC"><span class="check-radio"></span> BC
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="caste" id="caste" value="SC"><span class="check-radio"></span> SC
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="caste" id="caste" value="ST"><span class="check-radio"></span> ST
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Aadhar Number<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="aadhar" name="aadhar" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Religion<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="religion" name="religion" autocomplete="off">
                  </div>
                </div>
                <!-- <div class="col-sm-4">
                  <div class="form-group">
                    <label>Disability Type<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="disability_type" name="disability_type" autocomplete="off">
                  </div>
                </div> -->
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Profile Photo<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="image" name="image" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Resume<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="resume" name="resume" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Address 1<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Address 2<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="address1" name="address1" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Zip Code<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="zip" name="zip" autocomplete="off">
                  </div>
                </div>
                <!-- <div class="col-sm-4">
                  <div class="form-group">
                    <label>Country <span class='error-text'>*</span></label>
                    <select name="country" id="country" class="form-control">
                      <option value="">Select</option>
                      <option value="India">India</option>
                    </select>
                  </div>
                </div> -->
                <!-- <div class="col-sm-4">
                  <div class="form-group">
                    <label>State <span class='error-text'>*</span></label>
                    <select name="state" id="state" class="form-control">
                      <option value="">Select</option>
                      <option value="Karnataka">Karnataka</option>
                      <option value="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="Telangana">Telangana</option>
                      <option value="Tamil Nadu">Tamil Nadu</option>
                    </select>
                  </div>
                </div> -->
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Status <span class='error-text'>*</span></p>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="status" value="Active" checked="checked"><span class="check-radio"></span> Active
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="status" value="Inactive"><span class="check-radio"></span> Inactive
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Highest Education <span class='error-text'>*</span></label>
                    <select name="education" id="education" class="form-control">
                      <option value="">Select</option>

                      <?php
                      if (!empty($educations)) {
                        foreach ($educations as $record) { ?>
                          <option value="<?php echo $record->Id;  ?>">
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
            </div>
            <div class="form-container">
              <h4 class="form-group-title">SSLC Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>School Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_college" name="sslc_college" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of passing<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_year" name="sslc_year" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Marks card<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="sslc_marks_card" name="sslc_marks_card" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="sslc_cutoff" name="sslc_cutoff" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">PUC Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>PUC Type <span class='error-text'>*</span></label>
                    <select name="puc_type" id="puc_type" class="form-control">
                      <option value="">Select</option>
                      <option value="12">12th</option>
                      <option value="ITI">ITI</option>
                      <option value="Diploma">Diploma</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>College Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_college" name="puc_college" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of passing<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_year" name="puc_year" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Marks card<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="puc_marks_card" name="puc_marks_card" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="puc_cutoff" name="puc_cutoff" autocomplete="off">
                  </div>
                </div>

              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Graduation Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Graduation Type <span class='error-text'>*</span></label>
                    <select name="be_type" id="be_type" class="form-control">
                      <option value="">Select</option>
                      <option value="BSC">BSC</option>
                      <option value="BBA">BBA</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>College Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="be_college" name="be_college" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of passing<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="be_year" name="be_year" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Marks card<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="be_marks_card" name="be_marks_card" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="be_cutoff" name="be_cutoff" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Post Graduation Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>College Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="me_college" name="me_college" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of passing<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="me_year" name="me_year" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Marks card<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="me_marks_card" name="me_marks_card" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="me_cutoff" name="me_cutoff" autocomplete="off">
                  </div>
                </div>

              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Training Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Training Center <span class='error-text'>*</span></label>
                    <select name="training_center_id" id="training_center_id" class="form-control" onchange="getJobrolesById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($trainingcenterList)) {
                        foreach ($trainingcenterList as $record) { ?>
                          <option value="<?php echo $record->Id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- <div class="col-sm-4">
                  <div class="form-group">
                    <label>Job Role <span class='error-text'>*</span></label>
                    <select name="job_role_id" id="job_role_id" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Course Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Course <span class='error-text'>*</span></label>
                    <select name="course_id" id="course_id" class="form-control" onchange="getSemestersById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($courseList)) {
                        foreach ($courseList as $record) { ?>
                          <option value="<?php echo $record->Id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- <div class="col-sm-4">
                  <div class="form-group">
                    <label>Semesters <span class='error-text'>*</span></label>
                    <select name="semester_id" id="semester_id" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Registration No<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="registration_number" name="registration_number" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <p>Fees Paid <span class='error-text'>*</span></p>
                    <label class="radio-inline">
                      <input type="radio" name="fee_paid" id="fee_paid" value="Yes" checked="checked"><span class="check-radio"></span> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="fee_paid" id="fee_paid" value="No"><span class="check-radio"></span> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Document of Fees<span class='error-text'>*</span></label>
                    <input type="file" class="form-control" id="fee_document" name="fee_document" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Fee Paid Date<span class='error-text'>*</span></label>
                    <input type="date" class="form-control" id="fee_date" name="fee_date" autocomplete="off">
                  </div>
                </div> -->
              </div>
            </div>

            <div class="button-block clearfix">
              <div class="bttn-group">
                <button type="submit" class="btn btn-primary btn-lg">Apply</button>
                <a href="../../jobs" class="btn btn-link">Cancel</a>
              </div>
            </div>

          </form>


        </div>
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
      $("#form_main").validate({
        rules: {
          name: {
            required: true
          },
          mobile: {
            required: true
          },
          email: {
            required: true
          },
          dob: {
            required: true
          },
          father_name: {
            required: true
          },
          bank_name: {
            required: true
          },
          account_number: {
            required: true
          },
          education: {
            required: true
          },
          passing_year: {
            required: true
          },
          me_cutoff: {
            required: true
          },
          be_cutoff: {
            required: true
          },
          puc_cutoff: {
            required: true
          },
          sslc_cutoff: {
            required: true
          },
          me_year: {
            required: true
          },
          be_year: {
            required: true
          },
          puc_year: {
            required: true
          },
          sslc_year: {
            required: true
          },
          me_college: {
            required: true
          },
          be_college: {
            required: true
          },
          puc_college: {
            required: true
          },
          sslc_college: {
            required: true
          },
          caste: {
            required: true
          },
          aadhar: {
            required: true
          },
          religion: {
            required: true
          },
          disability_type: {
            required: true
          },
          image: {
            required: true
          },
          resume: {
            required: true
          },
          address: {
            required: true
          },
          address1: {
            required: true
          },
          zip: {
            required: true
          },
          country: {
            required: true
          },
          state: {
            required: true
          },
          training_center_id: {
            required: true
          },


        },
        messages: {

          name: {
            required: "<p class='error-text'> Name Required</p>",
          },
          mobile: {
            required: "<p class='error-text'> Mobile Required</p>",
          },
          email: {
            required: "<p class='error-text'> Email Required</p>",
          },
          dob: {
            required: "<p class='error-text'> DOB Required</p>",
          },
          father_name: {
            required: "<p class='error-text'> Father Name Required</p>",
          },
          bank_name: {
            required: "<p class='error-text'> Bank Name Required</p>",
          },
          account_number: {
            required: "<p class='error-text'> Account Number Required</p>",
          },
          education: {
            required: "<p class='error-text'> Highest Education Required</p>",
          },
          passing_year: {
            required: "<p class='error-text'> Passing Year Required</p>",
          },
          rv_cutoff: {
            required: "<p class='error-text'> RV Grade Required</p>",
          },
          me_cutoff: {
            required: "<p class='error-text'> ME Grade Required</p>",
          },
          be_cutoff: {
            required: "<p class='error-text'> BE Grade Required</p>",
          },
          puc_cutoff: {
            required: "<p class='error-text'> PUC Grade Required</p>",
          },
          sslc_cutoff: {
            required: "<p class='error-text'> SSLC Grade Required</p>",
          },
          me_year: {
            required: "<p class='error-text'> ME Year Required</p>",
          },
          be_year: {
            required: "<p class='error-text'> BE Year Required</p>",
          },
          puc_year: {
            required: "<p class='error-text'> PUC Year Required</p>",
          },
          sslc_year: {
            required: "<p class='error-text'> SSLC Year Required</p>",
          },
          me_college: {
            required: "<p class='error-text'> ME Institution Required</p>",
          },
          be_college: {
            required: "<p class='error-text'> BE Institution Required</p>",
          },
          puc_college: {
            required: "<p class='error-text'> PUC Institution Required</p>",
          },
          sslc_college: {
            required: "<p class='error-text'> SSLC Institution Required</p>",
          },
          discipline: {
            required: "<p class='error-text'> Discipline Required</p>",
          },
          domain: {
            required: "<p class='error-text'> Domain Required</p>",
          },
          caste: {
            required: "<p class='error-text'> Caste Required</p>",
          },
          aadhar: {
            required: "<p class='error-text'> Aadhar Required</p>",
          },
          religion: {
            required: "<p class='error-text'> Religion Required</p>",
          },
          disability_type: {
            required: "<p class='error-text'> Disability Type Required</p>",
          },
          image: {
            required: "<p class='error-text'> Profile Picture Required</p>",
          },
          resume: {
            required: "<p class='error-text'> Resume Required</p>",
          },
          address: {
            required: "<p class='error-text'> Address 1 Required</p>",
          },
          address1: {
            required: "<p class='error-text'> Address 2 Required</p>",
          },
          zip: {
            required: "<p class='error-text'> Zipcode Required</p>",
          },
          country: {
            required: "<p class='error-text'> Country Required</p>",
          },
          state: {
            required: "<p class='error-text'> State Required</p>",
          },
          training_center_id: {
            required: "<p class='error-text'> Training Center Required</p>",
          },
          job_role_id: {
            required: "<p class='error-text'> Job Role Required</p>",
          }
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