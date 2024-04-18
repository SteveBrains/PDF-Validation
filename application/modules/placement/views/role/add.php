<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Add Role</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Role</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div> 
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Role Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Role <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="role" name="role">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Status <span class='error-text'>*</span></p>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="1" checked="checked"><span class="check-radio"></span> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="0"><span class="check-radio"></span> Inactive
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
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form_scheme").validate({
            rules: {
                role: {
                    required: true
                }
            },
            messages: {
                role: {
                    required: "<p class='error-text'>Role Required</p>",
                }
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }
        });
    });
</script>