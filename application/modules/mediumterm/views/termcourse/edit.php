<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Course</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Course</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_academic_year" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title"> Course Details</h4>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required value="<?php echo $termcourse->name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Code<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="code" name="code" autocomplete="off" value="<?php echo $termcourse->code; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Hours<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="hours" name="hours" autocomplete="off" value="<?php echo $termcourse->hours; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Training Center<span class='error-text'>*</span></label>
                            <select name="training_center_id" id="training_center_id" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (!empty($tcList)) {
                                    foreach ($tcList as $record) { ?>
                                        <option value="<?php echo $record->Id;  ?>" <?php if ($record->Id == $termcourse->training_center_id) {
                                                                                        echo "selected";
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
                            <p>Status </p>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Active" <?php if ($termcourse->status == 'Active') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Inactive" <?php if ($course->status == 'Inactive') {
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