<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Upload Offer Letter</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Job Description</li>
                    <li class="breadcrumb-item active">Offer Letter</li>
                </ol>
            </div>
        </div>
        <form id="form_main" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title">Offer Details</h4>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Joining Date<span class='error-text'>*</span></label>
                            <input type="date" class="form-control" id="joining_date" name="joining_date" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Offer Letter<span class='error-text'>*</span></label>
                            <input type="file" class="form-control" id="offer_letter" name="offer_letter" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            <div class="button-block clearfix">
                <div class="bttn-group">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <a href="../selected" class="btn btn-link">Cancel</a>
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