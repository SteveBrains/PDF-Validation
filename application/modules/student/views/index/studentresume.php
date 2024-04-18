<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Resume Builder</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Candidate</li>
                    <li class="breadcrumb-item active">Resume Builder</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div id="wizard">
                <h3>Profile Information</h3>
                <section>
                    <form id="form_main" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>First Name<span class='error-text'>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Last Name<span class='error-text'>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
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
                                    <label>DOB<span class='error-text'>*</span></label>
                                    <input type="date" class="form-control" id="dob" name="dob" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Place of Birth<span class='error-text'>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <p>Gender <span class='error-text'>*</span></p>
                                    <label class="radio-inline">
                                        <input type="radio" name="caste" id="caste" value="OC"><span class="check-radio"></span> Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="caste" id="caste" value="BC"><span class="check-radio"></span> Female
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nationality <span class='error-text'>*</span></label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Indian</option>
                                        <option value="Karnataka">Others</option>
                                    </select>
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
                                    <label>City<span class='error-text'>*</span></label>
                                    <input type="text" class="form-control" id="address1" name="address1" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Zip Code<span class='error-text'>*</span></label>
                                    <input type="text" class="form-control" id="zip" name="zip" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Country <span class='error-text'>*</span></label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select</option>
                                        <option value="India">India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Languages Known<span class='error-text'>*</span></label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <p>Work Experience <span class='error-text'>*</span></p>
                                    <label class="radio-inline">
                                        <input type="radio" name="caste" id="caste" value="OC"><span class="check-radio"></span> Fresher
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="caste" id="caste" value="BC"><span class="check-radio"></span> Experience
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>No of Years<span class='error-text'>*</span></label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </form>
                </section>

                <h3>Education</h3>
                <section>
                    <form id="form_main" action="" method="post" enctype="multipart/form-data">
                        <div class="form-container">
                            <h4 class="form-group-title">10th (S.S.L.C Details)</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Passed Out <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">2015</option>
                                            <option value="">2016</option>
                                            <option value="">2017</option>
                                            <option value="">2018</option>
                                            <option value="">2019</option>
                                            <option value="">2020</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Percentage<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>School / College Name<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-container">
                            <h4 class="form-group-title">Higher Secondary (Pre-University) / Diploma</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <p>PUC/12th/Diploma <span class='error-text'>*</span></p>
                                        <label class="radio-inline">
                                            <input type="radio" name="caste" id="caste" value="OC"><span class="check-radio"></span> 12th
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="caste" id="caste" value="BC"><span class="check-radio"></span> PUC
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="caste" id="caste" value="BC"><span class="check-radio"></span> Diploma
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Passed Out <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">2015</option>
                                            <option value="">2016</option>
                                            <option value="">2017</option>
                                            <option value="">2018</option>
                                            <option value="">2019</option>
                                            <option value="">2020</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Percentage<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>School / College Name<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-container">
                            <h4 class="form-group-title">Graduation (BE / BTech)</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Passed Out <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">2015</option>
                                            <option value="">2016</option>
                                            <option value="">2017</option>
                                            <option value="">2018</option>
                                            <option value="">2019</option>
                                            <option value="">2020</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Branch <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Computer Science</option>
                                            <option value="">Electrical Engineering</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Percentage<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>College Name<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>University<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-container">
                            <h4 class="form-group-title">Ph.D</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Passed Out <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">2015</option>
                                            <option value="">2016</option>
                                            <option value="">2017</option>
                                            <option value="">2018</option>
                                            <option value="">2019</option>
                                            <option value="">2020</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Branch <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Computer Science</option>
                                            <option value="">Electrical Engineering</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Percentage<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>College Name<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>University<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-container">
                            <h4 class="form-group-title">Certification / Vocational Training</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Select Institute <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">RVLSI</option>
                                            <option value="">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Select Course Name <span class='error-text'>*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Advanced Diploma</option>
                                            <option value="">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Course Duration (In Months)<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>RV-VLSI ID<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Passed Out<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <h3>Projects</h3>
                <section>
                    <form id="form_main" action="" method="post" enctype="multipart/form-data">
                        <div class="form-container">
                            <h4 class="form-group-title">B.E Project Details</h4>
                            <div class="row">
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Project Name<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Project Deliverables<span class='error-text'>*</span></label>
                                        <textarea  class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Software / Hardware Used<span class='error-text'>*</span></label>
                                        <textarea  class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Project Challenges<span class='error-text'>*</span></label>
                                        <textarea  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-container">
                            <h4 class="form-group-title">M.E Project Details</h4>
                            <div class="row">
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Project Name<span class='error-text'>*</span></label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Project Deliverables<span class='error-text'>*</span></label>
                                        <textarea  class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Software / Hardware Used<span class='error-text'>*</span></label>
                                        <textarea  class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Project Challenges<span class='error-text'>*</span></label>
                                        <textarea  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </form>
                </section>

            </div>
        </div>
        <footer class="footer-wrapper">
            <p>&copy; 2023 All rights, reserved</p>
        </footer>

    </div>
</div>
<script src="<?php echo BASE_PATH; ?>/assets/js/jquery.steps.js"></script>

<script>
    var wizard = $("#wizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        stepsOrientation: "vertical"
    });
</script>