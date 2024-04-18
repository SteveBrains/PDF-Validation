<div class="container-fluid page-wrapper">
  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>View Application</h3>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Application</li>
          <li class="breadcrumb-item active">View</li>
        </ol>
      </div>
    </div>
    <form id="form_academic_year" action="" method="post" enctype="multipart/form-data">

      <div class="form-container">
        <h4 class="form-group-title">Personal Details</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Programme Type<span class='error-text'>*</span></label>
              <select name="type" id="type" class="form-control">
                <option value="">Select</option>
                <option value="UG" <?php if ($application->type == 'UG') {
                                      echo 'selected';
                                    } ?>>UG</option>
                <option value="PG" <?php if ($application->type == 'PG') {
                                      echo 'selected';
                                    } ?>>PG</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Name<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $application->name; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Mother Name<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo $application->mother_name; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Father Name<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $application->father_name; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>DOB<span class='error-text'>*</span></label>
              <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $application->dob; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Nationality</label>
              <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $application->nationality; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Gender<span class='error-text'>*</span></label>
              <select name="gender" id="gender" class="form-control">
                <option value="">Select</option>
                <option value="Male" <?php if ($application->gender == 'Male') {
                                        echo 'selected';
                                      } ?>>Male</option>
                <option value="Female" <?php if ($application->gender == 'Female') {
                                          echo 'selected';
                                        } ?>>Female</option>
                <option value="Others" <?php if ($application->gender == 'Others') {
                                          echo 'selected';
                                        } ?>>Others</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Caste </label>
              <select name="caste" id="caste" class="form-control" onchange="getFee()">
                <option value="">Select</option>

                <?php
                if (!empty($castes)) {
                  foreach ($castes as $record) { ?>
                    <option value="<?php echo $record->id;  ?>" <?php if ($application->caste == $record->id) {
                                                                  echo 'selected';
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
          <div class="col-sm-4">
            <div class="form-group">
              <label>Religion</label>
              <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $application->religion; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Blood Group</label>
              <input type="text" class="form-control" id="blood_group" name="blood_group" value="<?php echo $application->blood_group; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Aadhar</label>
              <input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $application->aadhar; ?>">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Email<span class='error-text'>*</span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $application->email; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Mobile<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $application->mobile; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marital Status<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="marital_status" name="marital_status" value="<?php echo $application->marital_status; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Differently Abled<span class='error-text'>*</span></label>
              <select name="differently_abled" id="differently_abled" class="form-control">
                <option value="">Select</option>
                <option value="Yes" <?php if ($application->differently_abled == 'Yes') {
                                      echo 'selected';
                                    } ?>>Yes</option>
                <option value="No" <?php if ($application->differently_abled == 'No') {
                                      echo 'selected';
                                    } ?>>No</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4" id="diff_able_type">
            <div class="form-group">
              <label>Differently Abled Type<span class='error-text'>*</span></label>
              <select name="differently_abled_type" id="differently_abled_type" class="form-control">
                <option value="">Select</option>
                <option value="Vocal" <?php if ($application->differently_abled_type == 'Yes') {
                                        echo 'selected';
                                      } ?>>Vocal</option>
                <option value="Blind" <?php if ($application->differently_abled_type == 'No') {
                                        echo 'selected';
                                      } ?>>Blind</option>
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
              <label>House No<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="house_no_p" name="house_no_p" value="<?php echo $application->house_no_p; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Village<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="village_p" name="village_p" value="<?php echo $application->village_p; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Post Office<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="po_p" name="po_p" value="<?php echo $application->po_p; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Zip Code<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="zip_p" name="zip_p" value="<?php echo $application->zip_p; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>District<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="disctrict_p" name="disctrict_p" value="<?php echo $application->disctrict_p; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>State<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="state_p" name="state_p" value="<?php echo $application->state_p; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Taluk<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="taluk_p" name="taluk_p" value="<?php echo $application->taluk_p; ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="form-container">
        <h4 class="form-group-title">Correspondence Address</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>House No<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="house_no_c" name="house_no_c" value="<?php echo $application->house_no_c; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Village<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="village_c" name="village_c" value="<?php echo $application->village_c; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Post Office<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="po_c" name="po_c" value="<?php echo $application->po_c; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Zip Code<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="zip_c" name="zip_c" value="<?php echo $application->zip_c; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>District<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="district_c" name="district_c" value="<?php echo $application->district_c; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>State<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="state_c" name="state_c" value="<?php echo $application->state_c; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Taluk<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="taluk_c" name="taluk_c" value="<?php echo $application->taluk_c; ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="form-container onlyug">
        <h4 class="form-group-title">SSLC Details</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Stream<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="sslc_stream" name="sslc_stream" value="<?php echo $application->sslc_stream; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of passing<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="sslc_year" name="sslc_year" value="<?php echo $application->sslc_year; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>School Name<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="sslc_name" name="sslc_name" value="<?php echo $application->sslc_name; ?>">
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
                <option value="12" <?php if ($application->puc_type == '12') {
                                      echo 'selected';
                                    } ?>>12th</option>
                <option value="ITI" <?php if ($application->puc_type == 'ITI') {
                                      echo 'selected';
                                    } ?>>ITI</option>
                <option value="Diploma" <?php if ($application->puc_type == 'Diploma') {
                                          echo 'selected';
                                        } ?>>Diploma</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Stream</label>
              <input type="text" class="form-control" id="puc_stream" name="puc_stream" value="<?php echo $application->puc_stream; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>College Name</label>
              <input type="text" class="form-control" id="puc_name" name="puc_name" value="<?php echo $application->puc_name; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of passing</label>
              <input type="text" class="form-control" id="puc_year" name="puc_year" value="<?php echo $application->puc_year; ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="form-container">
        <h4 class="form-group-title">Preferred Colleges</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>College 1 </label>
              <select name="caste" id="caste" class="form-control">
                <option value="">Select</option>
                <?php
                if (!empty($colleges)) {
                  foreach ($colleges as $record) { ?>
                    <option value="<?php echo $record->id;  ?>" <?php if ($application->college1 == $record->id) {
                                                                  echo 'selected';
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
          <div class="col-sm-4">
            <div class="form-group">
              <label>College 2</label>
              <select name="caste" id="caste" class="form-control">
                <option value="">Select</option>
                <?php
                if (!empty($colleges)) {
                  foreach ($colleges as $record) { ?>
                    <option value="<?php echo $record->id;  ?>" <?php if ($application->college2 == $record->id) {
                                                                  echo 'selected';
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
          <div class="col-sm-4">
            <div class="form-group">
              <label>College 3</label>
              <select name="caste" id="caste" class="form-control">
                <option value="">Select</option>
                <?php
                if (!empty($colleges)) {
                  foreach ($colleges as $record) { ?>
                    <option value="<?php echo $record->id;  ?>" <?php if ($application->college3 == $record->id) {
                                                                  echo 'selected';
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
      </div>
      <div class="form-container">
        <h4 class="form-group-title">Preferred Course</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Course </label>
              <select name="course_id" id="course_id" class="form-control">
                <option value="">Select</option>

                <?php
                if (!empty($courses)) {
                  foreach ($courses as $record) { ?>
                    <option value="<?php echo $record->id;  ?>" <?php if ($application->course_id == $record->id) {
                                                                  echo 'selected';
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
          <div class="col-sm-4">
            <div class="form-group">
              <label>Discipline </label>
              <select name="discipline_id" id="discipline_id" class="form-control">
                <option value="">Select</option>

                <?php
                if (!empty($disciplines)) {
                  foreach ($disciplines as $record) { ?>
                    <option value="<?php echo $record->id;  ?>" <?php if ($application->discipline_id == $record->id) {
                                                                  echo 'selected';
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
      </div>

      <div class="button-block clearfix">
        <div class="bttn-group">
          <!-- <a href="/application/studentapplication/approve2/<?php echo $application->id; ?>"><button type="button" class="btn btn-primary btn-lg">Approve</button></a>
        <a href="/application/studentapplication/reject2/<?php echo $application->id; ?>"><button type="button" class="btn btn-primary btn-lg">Reject</button></a>
        <a href="/application/studentapplication/reverify/<?php echo $application->id; ?>"><button type="button" class="btn btn-primary btn-lg">Reverify</button></a> -->
          <a href="../list3" class="btn btn-link">Cancel</a>
        </div>
      </div>
    </form>


    <script>
      var type = "<?php echo $application->type; ?>";
      var caste = "<?php echo $application->type; ?>";
      var differently_abled = "<?php echo $application->differently_abled; ?>";
      if (differently_abled != '') {
        $('#differently_abled').val(differently_abled).change();
      }
      if (type != '') {
        $('#type').val(type).change();
      }

      function getFee() {
        var caste = $('#caste').val();
        var type = $('#type').val();
        if (caste != '' && type != '') {
          $.ajax('/application/getFee', {
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
        $("input").prop("disabled", true);
        $("select").prop("disabled", true);
        $('#diff_able_type').hide();
        $('.onlyug').hide();
        $("#type").change(function() {
          getFee();
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
      });
    </script>
    <footer class="footer-wrapper">
      <p>&copy; 2023 All rights, reserved</p>
    </footer>

  </div>
</div>