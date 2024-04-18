<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Edit Staff</h3>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Staff</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
    <form id="form_main" action="" method="post" enctype="multipart/form-data">
      <div class="form-container">
        <h4 class="form-group-title">Personal Details</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Name<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $staff->name; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Mobile<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $staff->mobile; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Email<span class='error-text'>*</span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $staff->email; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>DOB<span class='error-text'>*</span></label>
              <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $staff->dob; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Father Name</label>
              <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $staff->father_name; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Caste<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="caste" name="caste" value="<?php echo $staff->caste; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Category</label>
              <input type="text" class="form-control" id="category" name="category" value="<?php echo $staff->category; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Aadhar Number<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $staff->aadhar; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Photo<span class='error-text'>*</span></label>
              <input type="file" class="form-control" id="photo" name="photo">
              <input type="hidden" class="form-control" id="photo_value" name="photo_value" value="<?php echo $staff->photo; ?>">
              <?php if ($staff->photo) {
              ?>
                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/staff/<?php echo $staff->photo; ?>" target="_blank">View</a>
              <?php
              } ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Communication Address<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="address" name="address" value="<?php echo $staff->address; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Zip Code</label>
              <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $staff->zipcode; ?>">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Designation<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $staff->designation; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Post<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="post" name="post" value="<?php echo $staff->post; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Registration Number<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="registration_number" name="registration_number" value="<?php echo $staff->registration_number; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Highest Education<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="highest_education" name="highest_education" value="<?php echo $staff->highest_education; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Joining<span class='error-text'>*</span></label>
              <input type="date" class="form-control" id="doj" name="doj" value="<?php echo $staff->doj; ?>">
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
              <input type="text" class="form-control" id="sslc_college" name="sslc_college" value="<?php echo $staff->sslc_college; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of Passing<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="sslc_year" name="sslc_year" value="<?php echo $staff->sslc_year; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marks Card<span class='error-text'>*</span></label>
              <input type="file" class="form-control" id="sslc_marks_card" name="sslc_marks_card">
              <input type="hidden" class="form-control" id="sslc_marks_card_value" name="sslc_marks_card_value" value="<?php echo $staff->sslc_marks_card; ?>">
              <?php if ($staff->sslc_marks_card) {
              ?>
                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/staff/<?php echo $staff->sslc_marks_card; ?>" target="_blank">View</a>
              <?php
              } ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Percentage<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="sslc_percentage" name="sslc_percentage" value="<?php echo $staff->sslc_percentage; ?>">
            </div>
          </div>

        </div>
      </div>
      <div class="form-container">
        <h4 class="form-group-title">PUC/IT/Diploma Details</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>College Name</label>
              <input type="text" class="form-control" id="puc_college" name="puc_college" value="<?php echo $staff->puc_college; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of Passing</label>
              <input type="text" class="form-control" id="puc_year" name="puc_year" value="<?php echo $staff->puc_year; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marks Card</label>
              <input type="file" class="form-control" id="puc_marks_card" name="puc_marks_card">
              <input type="hidden" class="form-control" id="puc_marks_card_value" name="puc_marks_card_value" value="<?php echo $staff->puc_marks_card; ?>">
              <?php if ($staff->puc_marks_card) {
              ?>
                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/staff/<?php echo $staff->puc_marks_card; ?>" target="_blank">View</a>
              <?php
              } ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Percentage</label>
              <input type="text" class="form-control" id="puc_percentage" name="puc_percentage" value="<?php echo $staff->puc_percentage; ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="form-container">
        <h4 class="form-group-title">Graduation Details</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>College Name</label>
              <input type="text" class="form-control" id="be_college" name="be_college" value="<?php echo $staff->be_college; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of Passing</label>
              <input type="text" class="form-control" id="be_year" name="be_year" value="<?php echo $staff->be_year; ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marks Card</label>
              <input type="file" class="form-control" id="be_marks_card" name="be_marks_card">
              <input type="hidden" class="form-control" id="be_marks_card_value" name="be_marks_card_value" value="<?php echo $staff->be_marks_card; ?>">
              <?php if ($staff->be_marks_card) {
              ?>
                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/staff/<?php echo $staff->be_marks_card; ?>" target="_blank">View</a>
              <?php
              } ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Percentage</label>
              <input type="text" class="form-control" id="be_percentage" name="be_percentage" value="<?php echo $staff->be_percentage; ?>">
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
              <select name="training_center_id" id="training_center_id" class="form-control">
                <option value="">Select</option>

                <?php
                if (!empty($trainingcenterList)) {
                  foreach ($trainingcenterList as $record) { ?>
                    <option value="<?php echo $record->Id;  ?>" <?php
                                                                if ($record->Id == $staff->training_center_id) {
                                                                  echo "selected=selected";
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
              <label>Employment Type <span class='error-text'>*</span></label>
              <select name="employment_type" id="employment_type" class="form-control">
                <option value="">Select</option>
                <option value="1" <?php if ("1" == $staff->employment_type) {
                                    echo "selected=selected";
                                  } ?>>Permanent</option>
                <option value="2" <?php if ("2" == $staff->employment_type) {
                                    echo "selected=selected";
                                  } ?>>Guest Faculty Full Time</option>
                <option value="3" <?php if ("3" == $staff->employment_type) {
                                    echo "selected=selected";
                                  } ?>>Guest Faculty Part Time</option>
                <option value="4" <?php if ("4" == $staff->employment_type) {
                                    echo "selected=selected";
                                  } ?>>Outsource</option>
                                  <option value="5" <?php if ("5" == $staff->employment_type) {
                                    echo "selected=selected";
                                  } ?>>Contract</option>
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Joining Certificate <span class='error-text'>*</span></label>
              <input type="file" class="form-control" id="joining_certificate" name="joining_certificate">
              <input type="hidden" class="form-control" id="joining_certificate_value" name="joining_certificate_value" value="<?php echo $staff->joining_certificate; ?>">
              <?php if ($staff->joining_certificate) {
              ?>
                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/staff/<?php echo $staff->joining_certificate; ?>" target="_blank">View</a>
              <?php
              } ?>
            </div>
          </div>

        </div>
      </div>
      <div class="button-block clearfix">
        <div class="bttn-group">
          <button type="submit" class="btn btn-primary btn-lg">Save</button>
          <a href="../list" class="btn btn-link">Cancel</a>
        </div>
      </div>
    </form>
    <form id="form_main1" action="../savegraduation" method="post" enctype="multipart/form-data">
      <div class="form-container">
        <h4 class="form-group-title">Post Graduation Details</h4>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>College Name</label>
              <input type="text" class="form-control" id="college_name" name="college_name">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of Passing</label>
              <input type="text" class="form-control" id="year" name="year">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marks Card</label>
              <input type="file" class="form-control" id="marks_card" name="marks_card">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Percentage</label>
              <input type="text" class="form-control" id="percentage" name="percentage">
            </div>
          </div>
        </div>
        <div class="button-block clearfix">
          <div class="bttn-group">
            <input type="hidden" name="staff_id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-primary btn-lg">Add</button>
          </div>
        </div>
    </form>
    <div class="custom-table">
      <table class="table" id="role-table">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th>College Name</th>
            <th>Year of Passing</th>
            <th>Percentage</th>
            <th>Marks Card</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($graduations)) {
            $i = 1;
            foreach ($graduations as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->college_name; ?></td>
                <td><?php echo $record->year; ?></td>
                <td><?php echo $record->percentage; ?></td>
                <td>
                  <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/staff/<?php echo $record->percentage; ?>" target="_blank">View</a>
                </td>
                <td class="text-center">
                <a href="<?php echo '../deletegraduation/' . $record->staff_id."?delid=".$record->Id; ?>" title="Edit">Delete</a>
                  <!-- <a class="btn btn-sm btn-danger deleteRole" href="#" data-id="<?php echo $record->roleId; ?>" title="Delete"><i class="fa fa-trash"></i></a> -->
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
  <form id="form_main2" action="../saveexperience" method="post" enctype="multipart/form-data">
    <div class="form-container">
      <h4 class="form-group-title">Experience Details</h4>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Organisation Name</label>
            <input type="text" class="form-control" id="organisation_name" name="organisation_name">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Designation</label>
            <input type="text" class="form-control" id="designation" name="designation">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" id="address" name="address">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>From Date</label>
            <input type="date" class="form-control" id="from_date" name="from_date">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>To Date</label>
            <input type="date" class="form-control" id="to_date" name="to_date">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Salary</label>
            <input type="text" class="form-control" id="salary" name="salary">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Remarks</label>
            <input type="text" class="form-control" id="remarks" name="remarks">
          </div>
        </div>
      </div>
      <div class="button-block clearfix">
        <div class="bttn-group">
          <input type="hidden" name="staff_id" value="<?php echo $id; ?>">
          <button type="submit" class="btn btn-primary btn-lg">Add</button>
        </div>
      </div>
  </form>
  <div class="custom-table">
      <table class="table" id="role-table">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th>Organisation Name</th>
            <th>Designation</th>
            <th>Address</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Salary</th>
            <th>Remarks</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($experiences)) {
            $i = 1;
            foreach ($experiences as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->organisation_name; ?></td>
                <td><?php echo $record->designation; ?></td>
                <td><?php echo $record->address; ?></td>
                <td><?php echo $record->from_date; ?></td>
                <td><?php echo $record->to_date; ?></td>
                <td><?php echo $record->salary; ?></td>
                <td><?php echo $record->remarks; ?></td>
                <td class="text-center">
                  <a href="<?php echo '../deleteexperience/' . $record->staff_id."?delid=".$record->Id; ?>" title="Edit">Delete</a>
                  <!-- <a class="btn btn-sm btn-danger deleteRole" href="#" data-id="<?php echo $record->roleId; ?>" title="Delete"><i class="fa fa-trash"></i></a> -->
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

</div>
</div>
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
        caste: {
          required: true
        },
        aadhar: {
          required: true
        },
        address: {
          required: true
        },
        designation: {
          required: true
        },
        post: {
          required: true
        },
        registration_number: {
          required: true
        },
        highest_education: {
          required: true
        },
        sslc_college: {
          required: true
        },
        sslc_year: {
          required: true
        },
        sslc_percentage: {
          required: true
        },
        training_center_id: {
          required: true
        },
        employment_type: {
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
        caste: {
          required: "<p class='error-text'> Caste Required</p>",
        },
        aadhar: {
          required: "<p class='error-text'> Aadhar Required</p>",
        },
        photo: {
          required: "<p class='error-text'> Photo Required</p>",
        },
        address: {
          required: "<p class='error-text'> Address Required</p>",
        },
        designation: {
          required: "<p class='error-text'> Designation Required</p>",
        },
        post: {
          required: "<p class='error-text'> Post Required</p>",
        },
        registration_number: {
          required: "<p class='error-text'> Registration Number Required</p>",
        },
        highest_education: {
          required: "<p class='error-text'> Highest Education Required</p>",
        },
        doj: {
          required: "<p class='error-text'> Joining Date Required</p>",
        },
        sslc_college: {
          required: "<p class='error-text'> School Name Required</p>",
        },
        sslc_year: {
          required: "<p class='error-text'> Required</p>",
        },
        sslc_marks_card: {
          required: "<p class='error-text'> Required</p>",
        },
        sslc_percentage: {
          required: "<p class='error-text'> Required</p>",
        },
        training_center_id: {
          required: "<p class='error-text'> Training Center Required</p>",
        },
        employment_type: {
          required: "<p class='error-text'> Employment Type Required</p>",
        },
        joining_certificate: {
          required: "<p class='error-text'> Required</p>",
        },
      },
      errorElement: "span",
      errorPlacement: function(error, element) {
        error.appendTo(element.parent());
      }

    });
  });
</script>