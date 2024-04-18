<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Job Description</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Job Description</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_main" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title">Job Description Details</h4>

                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Title<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="title" name="title" autocomplete="off" value="<?php echo $jobdescription->title; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Code<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="code" name="code" autocomplete="off" value="<?php echo $jobdescription->code; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Type<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="type" name="type" autocomplete="off" value="<?php echo $jobdescription->type; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Skills<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="skills" name="skills" autocomplete="off" value="<?php echo $jobdescription->skills; ?>" placeholder="Eg: communication,project management">
                        </div>
                    </div>
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <p>Domain <span class='error-text'>*</span></p>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="chkparent" name="domain[]" value="RTL Verification" <?php if (in_array("RTL Verification", $jobdescription->domain)) {
                                                                                                                            echo 'checked';
                                                                                                                        }  ?>>
                                        <span class="check-radio"></span>
                                        RTL Verification
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="chkparent" name="domain[]" value="FC" <?php if (in_array("FC", $jobdescription->domain)) {
                                                                                                                echo 'checked';
                                                                                                            }  ?>>
                                        <span class="check-radio"></span>
                                        FC
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="chkparent" name="domain[]" value="PD" <?php if (in_array("PD", $jobdescription->domain)) {
                                                                                                                echo 'checked';
                                                                                                            }  ?>>
                                        <span class="check-radio"></span>
                                        PD
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="chkparent" name="domain[]" value="Embedded Systems" <?php if (in_array("Embedded Systems", $jobdescription->domain)) {
                                                                                                                            echo 'checked';
                                                                                                                        }  ?>>
                                        <span class="check-radio"></span>
                                        Embedded Systems
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="chkparent" name="domain[]" value="AE" <?php if (in_array("AE", $jobdescription->domain)) {
                                                                                                                echo 'checked';
                                                                                                            }  ?>>
                                        <span class="check-radio"></span>
                                        AE
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="chkparent" name="domain[]" value="AI" <?php if (in_array("AI", $jobdescription->domain)) {
                                                                                                                echo 'checked';
                                                                                                            }  ?>>
                                        <span class="check-radio"></span>
                                        AI
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>No of openings<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="openings" name="openings" autocomplete="off" value="<?php echo $jobdescription->openings; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Minimum Qualification <span class='error-text'>*</span></label>
                            <select name="qualification" id="qualification" class="form-control">
                                <option value="">Select</option>

                                <?php
                                if (!empty($educationList)) {
                                    foreach ($educationList as $record) { ?>
                                        <option value="<?php echo $record->Id;  ?>" <?php
                                                                                    if ($record->Id == $jobdescription->qualification) {
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
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label>RV Grade<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="rv_cutoff" name="rv_cutoff" autocomplete="off" value="<?php echo $jobdescription->rv_cutoff; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>ME Grade<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="me_cutoff" name="me_cutoff" autocomplete="off" value="<?php echo $jobdescription->me_cutoff; ?>">
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label>ME Passout Year<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="me_year" name="me_year" autocomplete="off" value="<?php echo $jobdescription->me_year; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>BE Percentage<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="be_cutoff" name="be_cutoff" autocomplete="off" value="<?php echo $jobdescription->be_cutoff; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>BE Passout Year<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="be_year" name="be_year" autocomplete="off" value="<?php echo $jobdescription->be_year; ?>">
                        </div>
                    </div> -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>PUC Percentage<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="puc_cutoff" name="puc_cutoff" autocomplete="off" value="<?php echo $jobdescription->puc_cutoff; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>PUC Passout Year<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="puc_year" name="puc_year" autocomplete="off" value="<?php echo $jobdescription->puc_year; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>SSLC Percentage<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="sslc_cutoff" name="sslc_cutoff" autocomplete="off" value="<?php echo $jobdescription->sslc_cutoff; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>SSLC Passout Year<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="sslc_year" name="sslc_year" autocomplete="off" value="<?php echo $jobdescription->sslc_year; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Suggestions<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="suggestions" name="suggestions" autocomplete="off" value="<?php echo $jobdescription->suggestions; ?>" placeholder="Suggested text books to refer">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Test Location<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="test_location" name="test_location" autocomplete="off" value="<?php echo $jobdescription->test_location; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Is hiring for permanent position? <span class='error-text'>*</span></p>
                            <label class="radio-inline">
                                <input type="radio" name="permanent" id="permanent" value="Yes" <?php if ($jobdescription->permanent == 'Yes') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="permanent" id="permanent" value="No" <?php if ($jobdescription->permanent == 'No') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> No
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Is there any service agreement bond? <span class='error-text'>*</span></p>
                            <label class="radio-inline">
                                <input type="radio" name="agreement" id="agreement" value="Yes" <?php if ($jobdescription->agreement == 'Yes') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="agreement" id="agreement" value="No" <?php if ($jobdescription->agreement == 'No') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> No
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Written Test(Aptitude)<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="aptitude" name="aptitude" autocomplete="off" value="<?php echo $jobdescription->aptitude; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Written Test(Technical)<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="technical" name="technical" autocomplete="off" value="<?php echo $jobdescription->technical; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Technical Interview<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="technical_interview" name="technical_interview" autocomplete="off" value="<?php echo $jobdescription->technical_interview; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>General HR Interview<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="hr_interview" name="hr_interview" autocomplete="off" value="<?php echo $jobdescription->hr_interview; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Monthly stipend during probabation<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="stipend" name="stipend" autocomplete="off" value="<?php echo $jobdescription->stipend; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Monthly salary after confirmation of service<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="salary" name="salary" autocomplete="off" value="<?php echo $jobdescription->salary; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Company <span class='error-text'>*</span></label>
                            <select name="company_id" id="company_id" class="form-control">
                                <option value="">Select</option>

                                <?php
                                if (!empty($companyList)) {
                                    foreach ($companyList as $record) { ?>
                                        <option value="<?php echo $record->Id;  ?>" <?php
                                                                                    if ($record->Id == $jobdescription->company_id) {
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
                            <p>Status <span class='error-text'>*</span></p>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Active" <?php if ($jobdescription->status == 'Active') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Inactive" <?php if ($jobdescription->status == 'Inactive') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> Inactive
                            </label>
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
            $(document).ready(function() {
                $("#form_main1").validate({
                    rules: {
                        title: {
                            required: true
                        },
                        code: {
                            required: true
                        },
                        type: {
                            required: true
                        },
                        skills: {
                            required: true
                        },
                        openings: {
                            required: true
                        },
                        rv_cutoff: {
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
                        qualification: {
                            required: true
                        },
                        suggestions: {
                            required: true
                        },
                        test_location: {
                            required: true
                        },
                        permanent: {
                            required: true
                        },
                        agreement: {
                            required: true
                        },
                        aptitude: {
                            required: true
                        },
                        technical: {
                            required: true
                        },
                        technical_interview: {
                            required: true
                        },
                        hr_interview: {
                            required: true
                        },
                        stipend: {
                            required: true
                        },
                        salary: {
                            required: true
                        },
                        company_id: {
                            required: true
                        }

                    },
                    messages: {

                        title: {
                            required: "<p class='error-text'> Title Required</p>",
                        },
                        code: {
                            required: "<p class='error-text'> Code Required</p>",
                        },
                        type: {
                            required: "<p class='error-text'> Type Required</p>",
                        },
                        skills: {
                            required: "<p class='error-text'> Skills Required</p>",
                        },
                        openings: {
                            required: "<p class='error-text'> No of openings Required</p>",
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
                        qualification: {
                            required: "<p class='error-text'> Qualification Required</p>",
                        },
                        suggestions: {
                            required: "<p class='error-text'> Suggestions Required</p>",
                        },
                        test_location: {
                            required: "<p class='error-text'> Test Location Required</p>",
                        },
                        permanent: {
                            required: "<p class='error-text'> Required</p>",
                        },
                        agreement: {
                            required: "<p class='error-text'> Required</p>",
                        },
                        aptitude: {
                            required: "<p class='error-text'> Required</p>",
                        },
                        technical: {
                            required: "<p class='error-text'> Required</p>",
                        },
                        technical_interview: {
                            required: "<p class='error-text'> Required</p>",
                        },
                        hr_interview: {
                            required: "<p class='error-text'> Required</p>",
                        },
                        stipend: {
                            required: "<p class='error-text'> Stipend Required</p>",
                        },
                        salary: {
                            required: "<p class='error-text'> Salary Required</p>",
                        },
                        company_id: {
                            required: "<p class='error-text'> Company Required</p>",
                        },
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    }
                });
            });
        </script>
        <footer class="footer-wrapper">
            <p>&copy; 2023 All rights, reserved</p>
        </footer>

    </div>
</div>