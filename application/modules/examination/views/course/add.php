<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Add Course</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Course</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
        <form id="form_main" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title">Course Details</h4>

                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Code<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="code" name="code" autocomplete="off">
                        </div>
                    </div>
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
                </div>
            </div>

            <div class="button-block clearfix">
                <div class="bttn-group">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <a href="list" class="btn btn-link">Cancel</a>
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
                        code: {
                            required: true
                        },
                        min: {
                            required: true
                        },
                        max: {
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