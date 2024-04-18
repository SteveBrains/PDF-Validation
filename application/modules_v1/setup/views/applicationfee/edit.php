<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Application Fee</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Application Fee</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Application Fee Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Caste <span class='error-text'>*</span></label>
                            <select class="form-control" id="caste_id" name="caste_id">
                                <option value="">Select</option>
                                <?php foreach ($castes as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($applicationfeeInfo->caste_id == $row->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Type <span class='error-text'>*</span></label>
                            <select class="form-control" id="type" name="type">
                                <option value="">Select</option>
                                <option value="UG" <?php if ($applicationfeeInfo->type == 'UG') {
                                                        echo "selected";
                                                    } ?>>UG</option>
                                <option value="PG" <?php if ($applicationfeeInfo->type == 'PG') {
                                                        echo "selected";
                                                    } ?>>PG</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Fee <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="fee" name="fee" value="<?php echo $applicationfeeInfo->fee; ?>">
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
                caste_id: {
                    required: true
                },
                type: {
                    required: true,
                },
                fee: {
                    required: true,
                },

            },
            messages: {
                caste_id: {
                    required: "<p class='error-text'>Caste required</p>",
                },
                type: {
                    required: "<p class='error-text'>Type required</p>",
                },
                fee: {
                    required: "<p class='error-text'>Fee required</p>",
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>