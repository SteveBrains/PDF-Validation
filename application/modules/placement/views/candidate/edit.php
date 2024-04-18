<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Candidate</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Candidate</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_main" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title">Candidate Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="<?php echo $candidate->name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Mobile<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off" value="<?php echo $candidate->mobile; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Email<span class='error-text'>*</span></label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $candidate->email; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>DOB<span class='error-text'>*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob" autocomplete="off" value="<?php echo $candidate->dob; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Father Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="father_name" name="father_name" autocomplete="off" value="<?php echo $candidate->father_name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Bank Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" autocomplete="off" value="<?php echo $candidate->bank_name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Account Number<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off" value="<?php echo $candidate->account_number; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Religion<span class='error-text'>*</span></label>
                            <select name="religion" id="religion" class="form-control">
                                <option value="">Select</option>
                                <option value="Muslim" <?php if ($candidate->religion == 'Muslim') {
                                                            echo "selected=selected";
                                                        }; ?>>Muslim</option>
                                <option value="Christian" <?php if ($candidate->religion == 'Christian') {
                                                            echo "selected=selected";
                                                        }; ?>>Christian</option>
                                <option value="Jain" <?php if ($candidate->religion == 'Jain') {
                                                            echo "selected=selected";
                                                        }; ?>>Jain</option>
                                <option value="Sikh" <?php if ($candidate->religion == 'Sikh') {
                                                            echo "selected=selected";
                                                        }; ?>>Sikh</option>
                                <option value="Parsi" <?php if ($candidate->religion == 'Parsi') {
                                                            echo "selected=selected";
                                                        }; ?>>Parsi</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Aadhar Number<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="aadhar" name="aadhar" autocomplete="off" value="<?php echo $candidate->aadhar; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Profile Photo<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="image" name="image">
                            <input type="hidden" class="form-control" id="image_value" name="image_value" value="<?php echo $candidate->image; ?>">
                            <?php if ($candidate->image) {
                            ?>
                                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/candidates/<?php echo $candidate->image; ?>" target="_blank">View</a>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Resume<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="resume" name="resume">
                            <input type="hidden" class="form-control" id="resume_value" name="resume_value" value="<?php echo $candidate->resume; ?>">
                            <?php if ($candidate->resume) {
                            ?>
                                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/candidates/<?php echo $candidate->resume; ?>" target="_blank">View</a>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Address 1<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="address" name="address" autocomplete="off" value="<?php echo $candidate->address; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Address 2<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="address1" name="address1" autocomplete="off" value="<?php echo $candidate->address1; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Zip Code<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="zip" name="zip" autocomplete="off" value="<?php echo $candidate->zip; ?>">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>SSLC Registration Number<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number" autocomplete="off" value="<?php echo $candidate->registration_number; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Caste Certificate<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="caste_certificate" name="caste_certificate">
                            <input type="hidden" class="form-control" id="caste_certificate" name="caste_certificate" value="<?php echo $candidate->caste_certificate; ?>">
                            <?php if ($candidate->caste_certificate) {
                            ?>
                                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/candidates/<?php echo $candidate->caste_certificate; ?>" target="_blank">View</a>
                            <?php
                            } ?>
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
                                        <option value="<?php echo $record->Id;  ?>" <?php
                                                                                    if ($record->Id == $candidate->education) {
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
                </div>
            </div>
            <div class="form-container">
                <h4 class="form-group-title">SSLC Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>School Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="sslc_college" name="sslc_college" autocomplete="off" value="<?php echo $candidate->sslc_college; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Year of passing<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="sslc_year" name="sslc_year" autocomplete="off" value="<?php echo $candidate->sslc_year; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Marks card<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="sslc_marks_card" name="sslc_marks_card" autocomplete="off">
                            <input type="hidden" class="form-control" id="sslc_marks_card_value" name="sslc_marks_card_value" value="<?php echo $candidate->sslc_marks_card; ?>">
                            <?php if ($candidate->sslc_marks_card) {
                            ?>
                                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/candidates/<?php echo $candidate->sslc_marks_card; ?>" target="_blank">View</a>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Percentage<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="sslc_cutoff" name="sslc_cutoff" autocomplete="off" value="<?php echo $candidate->puc_cutoff; ?>">
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
                                <option value="12" <?php
                                                    if ("12" == $candidate->puc_type) {
                                                        echo "selected=selected";
                                                    } ?>>12th</option>
                                <option value="ITI" <?php
                                                    if ("ITI" == $candidate->puc_type) {
                                                        echo "selected=selected";
                                                    } ?>>ITI</option>
                                <option value="Diploma" <?php
                                                        if ("Diploma" == $candidate->puc_type) {
                                                            echo "selected=selected";
                                                        } ?>>Diploma</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>College Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="puc_college" name="puc_college" autocomplete="off" value="<?php echo $candidate->puc_college; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Year of passing<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="puc_year" name="puc_year" autocomplete="off" value="<?php echo $candidate->puc_year; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Marks card<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="puc_marks_card" name="puc_marks_card" autocomplete="off">
                            <input type="hidden" class="form-control" id="puc_marks_card_value" name="puc_marks_card_value" value="<?php echo $candidate->puc_marks_card; ?>">
                            <?php if ($candidate->puc_marks_card) {
                            ?>
                                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/candidates/<?php echo $candidate->puc_marks_card; ?>" target="_blank">View</a>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Percentage<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="puc_cutoff" name="puc_cutoff" autocomplete="off" value="<?php echo $candidate->puc_cutoff; ?>">
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
                            <input type="text" class="form-control" id="be_type" name="be_type" autocomplete="off" value="<?php echo $candidate->be_type; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>College Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="be_college" name="be_college" autocomplete="off" value="<?php echo $candidate->be_college; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Year of passing<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="be_year" name="be_year" autocomplete="off" value="<?php echo $candidate->be_year; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Marks card<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="be_marks_card" name="be_marks_card" autocomplete="off">
                            <input type="hidden" class="form-control" id="be_marks_card_value" name="be_marks_card_value" value="<?php echo $candidate->be_marks_card; ?>">
                            <?php if ($candidate->be_marks_card) {
                            ?>
                                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/candidates/<?php echo $candidate->be_marks_card; ?>" target="_blank">View</a>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Percentage<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="be_cutoff" name="be_cutoff" autocomplete="off" value="<?php echo $candidate->be_cutoff; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-container">
                <h4 class="form-group-title">Post Graduation Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Graduation Type <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="me_type" name="me_type" autocomplete="off" value="<?php echo $candidate->me_type; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>College Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="me_college" name="me_college" autocomplete="off" value="<?php echo $candidate->me_college; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Year of passing<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="me_year" name="me_year" autocomplete="off" value="<?php echo $candidate->me_year; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Marks card<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="me_marks_card" name="me_marks_card" autocomplete="off">
                            <input type="hidden" class="form-control" id="me_marks_card_value" name="me_marks_card_value" value="<?php echo $candidate->me_marks_card; ?>">
                            <?php if ($candidate->me_marks_card) {
                            ?>
                                <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/candidates/<?php echo $candidate->me_marks_card; ?>" target="_blank">View</a>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Percentage<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="me_cutoff" name="me_cutoff" autocomplete="off" value="<?php echo $candidate->me_cutoff; ?>">
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
                            <select name="training_center_id" id="training_center_id" class="form-control" onchange="getCoursesById(this.value)">
                                <option value="">Select</option>

                                <?php
                                if (!empty($trainingcenterList)) {
                                    foreach ($trainingcenterList as $record) { ?>
                                        <option value="<?php echo $record->Id;  ?>" <?php
                                                                                    if ($record->Id == $candidate->training_center_id) {
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
                            <label>Course <span class='error-text'>*</span></label>
                            <select name="course_id" id="course_id" class="form-control">
                                <option value="">Select</option>
                            </select>
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
        <script>
            var training_center_id = "<?php echo $candidate->training_center_id ?>";
            var course_id = "<?php echo $candidate->course_id ?>";
            $(document).ready(function() {
                $("#form_main").validate({
                    rules: {
                        name: {
                            required: true
                        },
                        mobile: {
                            required: true
                        },
                        dob: {
                            required: true
                        },
                        sslc_cutoff: {
                            required: true
                        },
                        sslc_year: {
                            required: true
                        },
                        sslc_college: {
                            required: true
                        },
                        sslc_marks_card: {
                            required: true
                        },
                        religion: {
                            required: true
                        },
                        aadhar: {
                            required: true,
                            remote: "studentregistration/checkAadhar"
                        },

                        disability_type: {
                            required: true
                        },
                        caste_certificate: {
                            required: true
                        },
                        image: {
                            required: true
                        },
                        address: {
                            required: true
                        },
                        zip: {
                            required: true
                        },
                        training_center_id: {
                            required: true
                        },
                        course_id: {
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
                            remote: "<p class='error-text'>Email already exist</p>"
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
                        caste_certificate: {
                            required: "<p class='error-text'> Caste Certificate Required</p>",
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
                        sslc_marks_card: {
                            required: "<p class='error-text'> Marks Card Required</p>",
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
                            remote: "<p class='error-text'>Aadhar already exist</p>"
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
                        course_id: {
                            required: "<p class='error-text'> Course Required</p>",
                        }
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    }

                });
                $('#training_center_id').trigger("change").val(training_center_id);


            });

            function getCoursesById(id) {
                if (id != '') {
                    $.ajax('/jobs/getCoursesById', {
                        type: 'POST',
                        data: {
                            training_center_id: id,
                            course_id: course_id
                        },
                        success: function(data, status, xhr) {
                            $('#course_id').html(data);

                        },
                        error: function(jqXhr, textStatus, errorMessage) { // error callback 
                            console.log(errorMessage);
                        }
                    });
                }
            }

            function getJobrolesById(id) {
                if (id != '') {
                    $.ajax('/placement/candidate/getJobrolesById', {
                        type: 'POST',
                        data: {
                            training_center_id: id,
                            job_role_id: job_role_id
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
                    $.ajax('/placement/candidate/getSemestersById', {
                        type: 'POST',
                        data: {
                            course_id: id,
                            semester_id: semester_id
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
        <footer class="footer-wrapper">
            <p>&copy; 2023 All rights, reserved</p>
        </footer>

    </div>
</div>