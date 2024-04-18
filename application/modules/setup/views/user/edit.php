<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit User</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">User Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Full Name <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $userInfo->name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Email <span class='error-text'>*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userInfo->email; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Mobile Number <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $userInfo->mobile; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Role <span class='error-text'>*</span></label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (!empty($roleList)) {
                                    foreach ($roleList as $record) { ?>
                                        <option value="<?php echo $record->id;  ?>" <?php
                                                                                    if ($record->id == $userInfo->role) {
                                                                                        echo "selected=selected";
                                                                                    } ?>>
                                            <?php echo $record->role; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
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
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form_scheme").validate({
            rules: {
                fname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    number: true
                },
                role: {
                    required: true,
                }
            },
            messages: {
                fname: {
                    required: "<p class='error-text'>Full Name required</p>",
                },
                email: {
                    required: "<p class='error-text'>Email required</p>",
                },
                mobile: {
                    required: "<p class='error-text'>Mobile required</p>",
                    number: "<p class='error-text'>Please enter a valid phone number without +91 </p>"
                },
                role: {
                    required: "<p class='error-text'>Role required</p>",
                }
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>