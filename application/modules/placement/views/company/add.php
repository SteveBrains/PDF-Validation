<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Add Company</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Company</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
        <form id="form_main" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title">Company Details</h4>

                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Contact Person First Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Contact Person Last Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off">
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
                            <input type="text" class="form-control" id="mobile" name="mobile" onkeydown="phoneno()" autocomplete="off" pattern="[1-9]{1}[0-9]{9}" maxlength="10">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Password<span class='error-text'>*</span></label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
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
                            <label>Website URL<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="url" name="url" autocomplete="off">
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

            function phoneno() {
                $('#mobile').keypress(function(e) {
                    var a = [];
                    var k = e.which;

                    for (i = 48; i < 58; i++)
                        a.push(i);

                    if (!(a.indexOf(k) >= 0))
                        e.preventDefault();
                });
            }
        </script>
        <footer class="footer-wrapper">
            <p>&copy; 2023 All rights, reserved</p>
        </footer>

    </div>
</div>