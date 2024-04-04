<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>College Management</title>
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
</head>

<body>
  <div class="login-wrapper1">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-md-12" style="margin-top: 10px;">
          <div class="col-sm-1">
            <!-- <img src="<?php echo BASE_PATH; ?>/assets/img/ka.jpeg" width="110"> -->
          </div>
          <div class="col-sm-10">
            <h3>Application Form</h3>
          </div>
          <div class="col-sm-1">
            <!-- <img src="<?php echo BASE_PATH; ?>/assets/img/perhebat_logo.png" width="80"> -->

          </div>

        </div>
      </div>
      <hr>
      <div class="row">
        <div class=" col-md-12 col-lg-12">
          <form id="form_main" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
              <h4 class="form-group-title">Personal Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Programme Type<span class='error-text'>*</span></label>
                    <select name="type" id="type" class="form-control">
                      <option value="">Select</option>
                      <option value="UG">UG</option>
                      <option value="PG">PG</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Name<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Mother Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Gender<span class='error-text'>*</span></label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="">Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Caste <span class='error-text'>*</span></label>
                    <select name="caste" id="caste" class="form-control" onchange="getFee()">
                      <option value="">Select</option>

                      <?php
                      if (!empty($castes)) {
                        foreach ($castes as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Blood Group</label>
                    <input type="text" class="form-control" id="blood_group" name="blood_group" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Aadhar<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="aadhar" name="aadhar" autocomplete="off">
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
                    <label>Mobile<span class='error-text'>*</span></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Nationality </label>
                    <select name="nationality" id="nationality" class="form-control">
                      <option value="">Select</option>

                      <?php
                      if (!empty($nationalities)) {
                        foreach ($nationalities as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Religion</label>
                    <select name="religion" id="religion" class="form-control">
                      <option value="">Select</option>

                      <?php
                      if (!empty($religions)) {
                        foreach ($religions as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Marital Status</label>
                    <select name="marital_status" id="marital_status" class="form-control">
                      <option value="">Select</option>
                      <option value="Married">Married</option>
                      <option value="Unmarried">Unmarried</option>
                      <option value="Widowed">Widowed</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Differently Abled</label>
                    <select name="differently_abled" id="differently_abled" class="form-control">
                      <option value="">Select</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4" id="diff_able_type">
                  <div class="form-group">
                    <label>Differently Abled Type</label>
                    <select name="differently_abled_type" id="differently_abled_type" class="form-control">
                      <option value="">Select</option>
                      <option value="Vocal">Vocal</option>
                      <option value="Blind">Blind</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Permanent Address</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>House No</label>
                    <input type="text" class="form-control" id="house_no_p" name="house_no_p" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Village</label>
                    <input type="text" class="form-control" id="village_p" name="village_p" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Post Office</label>
                    <input type="text" class="form-control" id="po_p" name="po_p" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Zip Code</label>
                    <input type="text" class="form-control" id="zip_p" name="zip_p" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>District</label>
                    <select name="disctrict_p" id="disctrict_p" class="form-control" onchange="getTalukPById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($districts)) {
                        foreach ($districts as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Taluk</label>
                    <select name="taluk_p" id="taluk_p" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" id="state_p" name="state_p" autocomplete="off">
                  </div>
                </div>

              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Correspondence Address</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>House No</label>
                    <input type="text" class="form-control" id="house_no_c" name="house_no_c" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Village</label>
                    <input type="text" class="form-control" id="village_c" name="village_c" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Post Office</label>
                    <input type="text" class="form-control" id="po_c" name="po_c" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Zip Code</label>
                    <input type="text" class="form-control" id="zip_c" name="zip_c" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>District</label>
                    <select name="disctrict_c" id="disctrict_c" class="form-control" onchange="getTalukCById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($districts)) {
                        foreach ($districts as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Taluk</label>
                    <select name="taluk_c" id="taluk_c" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" id="state_c" name="state_c" autocomplete="off">
                  </div>
                </div>

              </div>
            </div>
            <div class="form-container onlyug">
              <h4 class="form-group-title">SSLC Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Stream</label>
                    <input type="text" class="form-control" id="sslc_stream" name="sslc_stream" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of passing</label>
                    <input type="text" class="form-control" id="sslc_year" name="sslc_year" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>School Name</label>
                    <input type="text" class="form-control" id="sslc_name" name="sslc_name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage</label>
                    <input type="text" class="form-control" id="sslc_percentage" name="sslc_percentage" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Proof</label>
                    <input type="file" class="form-control" id="sslc_proof" name="sslc_proof" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container onlyug">
              <h4 class="form-group-title">PUC Details</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>PUC Type </label>
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
                    <label>Stream</label>
                    <input type="text" class="form-control" id="puc_stream" name="puc_stream" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>College Name</label>
                    <input type="text" class="form-control" id="puc_name" name="puc_name" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Year of passing</label>
                    <input type="text" class="form-control" id="puc_year" name="puc_year" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Percentage</label>
                    <input type="text" class="form-control" id="puc_percentage" name="puc_percentage" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Proof</label>
                    <input type="file" class="form-control" id="puc_proof" name="puc_proof" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Preferred Colleges</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>University 1</label>
                    <select name="university1" id="university1" class="form-control" onchange="getCollege1ById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($universities)) {
                        foreach ($universities as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>University 2</label>
                    <select name="university2" id="university2" class="form-control" onchange="getCollege2ById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($universities)) {
                        foreach ($universities as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>University 3</label>
                    <select name="university3" id="university3" class="form-control" onchange="getCollege3ById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($universities)) {
                        foreach ($universities as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>College 1<span class='error-text'>*</span></label>
                    <select name="college1" id="college1" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>College 2</label>
                    <select name="college2" id="college2" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>College 3</label>
                    <select name="college3" id="college3" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-container">
              <h4 class="form-group-title">Preferred Course</h4>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Course <span class='error-text'>*</span></label>
                    <select name="course_id" id="course_id" class="form-control" onchange="getDisciplinesById(this.value)">
                      <option value="">Select</option>

                      <?php
                      if (!empty($courses)) {
                        foreach ($courses as $record) { ?>
                          <option value="<?php echo $record->id;  ?>">
                            <?php echo $record->name; ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Discipline <span class='error-text'>*</span></label>
                    <select name="discipline_id" id="discipline_id" class="form-control">
                      <option value="">Select</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="button-block clearfix">
              <div class="bttn-group">
                <button type="submit" class="btn btn-primary btn-lg">Apply</button>&nbsp;
                Application Fee: <span id="fee">0</span>
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
    function getDisciplinesById(id) {
      if (id != '') {
        $.ajax('/studentapplication/getDisciplinesById', {
          type: 'POST',
          data: {
            course_id: id,
            discipline_id: 0
          },
          success: function(data, status, xhr) {
            $('#discipline_id').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }

    function getTalukPById(id) {
      if (id != '') {
        $.ajax('/studentapplication/getTalukById', {
          type: 'POST',
          data: {
            district_id: id,
            taluk_id: 0
          },
          success: function(data, status, xhr) {
            $('#taluk_p').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }

    function getCollege1ById(id) {
      if (id != '') {
        $.ajax('/studentapplication/getCollegeById', {
          type: 'POST',
          data: {
            university_id: id,
            college_id: 0
          },
          success: function(data, status, xhr) {
            $('#college1').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }
    function getCollege2ById(id) {
      if (id != '') {
        $.ajax('/studentapplication/getCollegeById', {
          type: 'POST',
          data: {
            university_id: id,
            college_id: 0
          },
          success: function(data, status, xhr) {
            $('#college2').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }
    function getCollege3ById(id) {
      if (id != '') {
        $.ajax('/studentapplication/getCollegeById', {
          type: 'POST',
          data: {
            university_id: id,
            college_id: 0
          },
          success: function(data, status, xhr) {
            $('#college3').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }

    function getTalukCById(id) {
      if (id != '') {
        $.ajax('/studentapplication/getTalukById', {
          type: 'POST',
          data: {
            district_id: id,
            taluk_id: 0
          },
          success: function(data, status, xhr) {
            $('#taluk_c').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }

    function getFee() {
      var caste = $('#caste').val();
      var type = $('#type').val();
      if (caste != '' && type != '') {
        $.ajax('/studentapplication/getFee', {
          type: 'POST',
          data: {
            caste: caste,
            type: type
          },
          success: function(data, status, xhr) {
            $('#fee').html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) { // error callback 
            console.log(errorMessage);
          }
        });
      }
    }
    $(document).ready(function() {
      $('#diff_able_type').hide();
      $('.onlyug').hide();
      $("#type").change(function() {
        // getFee();
        var value = $(this).val();
        if (value == 'UG') {
          $('.onlyug').show();
        } else {
          $('.onlyug').hide();
        }
      });
      $("#differently_abled").change(function() {
        var value = $(this).val();
        if (value == 'Yes') {
          $('#diff_able_type').show();
        } else {
          $('#diff_able_type').hide();
        }
      });

      $("#form_main").validate({
        rules: {
          type: {
            required: true
          },
          name: {
            required: true
          },
          gender: {
            required: true
          },
          mobile: {
            required: true
          },
          email: {
            required: true
          },
          caste: {
            required: true
          },
          aadhar: {
            required: true,
            remote: "studentapplication/checkAadhar"
          },
          college1: {
            required: true
          },
          course_id: {
            required: true
          },
          discipline_id: {
            required: true
          },
        },
        messages: {
          type: {
            required: "<p class='error-text'> Programme Required</p>",
          },
          gender: {
            required: "<p class='error-text'> Gender Required</p>",
          },
          name: {
            required: "<p class='error-text'> Name Required</p>",
          },
          email: {
            required: "<p class='error-text'> Email Required</p>",
          },
          mobile: {
            required: "<p class='error-text'> Mobile Required</p>",
          },
          caste: {
            required: "<p class='error-text'> Caste Required</p>",
          },
          aadhar: {
            required: "<p class='error-text'> Aadhar Required</p>",
            remote: "<p class='error-text'> Aadhar already exist</p>",
          },
          college1: {
            required: "<p class='error-text'> College Required</p>",
          },
          course_id: {
            required: "<p class='error-text'> Course Required</p>",
          },
          discipline_id: {
            required: "<p class='error-text'> Discipline Required</p>",
          },
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
          error.appendTo(element.parent());
        }

      });
    });
  </script>
</body>

</html>