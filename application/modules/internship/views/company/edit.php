<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Company</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Company</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_academic_year" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title"> Company Details</h4>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required value="<?php echo $company->name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Contact Person First Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" value="<?php echo $company->first_name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Contact Person Last Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" value="<?php echo $company->last_name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Email<span class='error-text'>*</span></label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $company->email; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Mobile<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off" value="<?php echo $company->mobile; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Designation<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="designation" name="designation" autocomplete="off" value="<?php echo $company->designation; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Website URL<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="url" name="url" autocomplete="off" value="<?php echo $company->url; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Status </p>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Active" <?php if ($company->status == 'Active') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Inactive" <?php if ($company->status == 'Inactive') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>>
                                <span class="check-radio"></span> In-Active
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
                $("#form_main").validate({
                    rules: {
                        name: {
                            required: true
                        },
                        contact_person: {
                            required: true
                        },
                        email: {
                            required: true
                        },
                        mobile: {
                            required: true
                        },
                        designation: {
                            required: true
                        },
                        url: {
                            required: true
                        },
                        status: {
                            required: true
                        }
                    },
                    messages: {
                        name: {
                            required: "<p class='error-text'> Name Required</p>",
                        },
                        contact_person: {
                            required: "<p class='error-text'> Contact Person Required</p>",
                        },
                        email: {
                            required: "<p class='error-text'> Email Required</p>",
                        },
                        mobile: {
                            required: "<p class='error-text'> Mobile Required</p>",
                        },
                        designation: {
                            required: "<p class='error-text'> Designation Required</p>",
                        },
                        url: {
                            required: "<p class='error-text'> Website URL Required</p>",
                        },
                        status: {
                            required: "<p class='error-text'> Status Required</p>",
                        }
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