<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Add Staff</h3>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Staff</li>
          <li class="breadcrumb-item active">Add</li>
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
              <label>Father Name</label>
              <input type="text" class="form-control" id="father_name" name="father_name" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Caste<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="caste" name="caste" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Category</label>
              <input type="text" class="form-control" id="category" name="category" autocomplete="off">
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
              <label>Photo<span class='error-text'>*</span></label>
              <input type="file" class="form-control" id="photo" name="photo" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Communication Address<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="address" name="address" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Zip Code</label>
              <input type="text" class="form-control" id="zipcode" name="zipcode" autocomplete="off">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Designation<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="designation" name="designation" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Post<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="post" name="post" autocomplete="off" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Registration Number<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="registration_number" name="registration_number" autocomplete="off" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Highest Education<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="highest_education" name="highest_education" autocomplete="off" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Joining<span class='error-text'>*</span></label>
              <input type="date" class="form-control" id="doj" name="doj" autocomplete="off" >
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
              <label>Year of Passing<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="sslc_year" name="sslc_year" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marks Card<span class='error-text'>*</span></label>
              <input type="file" class="form-control" id="sslc_marks_card" name="sslc_marks_card" autocomplete="off" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Percentage<span class='error-text'>*</span></label>
              <input type="text" class="form-control" id="sslc_percentage" name="sslc_percentage" autocomplete="off" >
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
              <input type="text" class="form-control" id="puc_college" name="puc_college" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of Passing</label>
              <input type="text" class="form-control" id="puc_year" name="puc_year" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marks Card</label>
              <input type="file" class="form-control" id="puc_marks_card" name="puc_marks_card" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Percentage</label>
              <input type="text" class="form-control" id="puc_percentage" name="puc_percentage" autocomplete="off" >
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
              <input type="text" class="form-control" id="be_college" name="be_college" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Year of Passing</label>
              <input type="text" class="form-control" id="be_year" name="be_year" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marks Card</label>
              <input type="file" class="form-control" id="be_marks_card" name="be_marks_card" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Percentage</label>
              <input type="text" class="form-control" id="be_percentage" name="be_percentage" autocomplete="off" >
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
              <select name="training_center_id" id="training_center_id" class="form-control" >
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
          <div class="col-sm-4">
            <div class="form-group">
              <label>Employment Type <span class='error-text'>*</span></label>
              <select name="employment_type" id="employment_type" class="form-control">
                <option value="">Select</option>
                <option value="1">Permanent</option>
                <option value="2">Guest Faculty Full Time</option>
                <option value="3">Guest Faculty Part Time</option>
                <option value="4">Outsource</option>
                <option value="5">Contract</option>
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Joining Certificate <span class='error-text'>*</span></label>
              <input type="file" class="form-control" id="joining_certificate" name="joining_certificate" autocomplete="off">
            </div>
          </div>

        </div>
        <div class="button-block clearfix">
                <div class="bttn-group">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <a href="list" class="btn btn-link">Cancel</a>
                </div>
            </div>
      </div>
    </form>
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
        photo: {
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
        sslc_marks_card: {
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
        joining_certificate: {
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