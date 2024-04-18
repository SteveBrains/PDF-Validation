<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Setup Application Fee</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Application Fee</li>
                    <li class="breadcrumb-item active">Setup</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Application Fee Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <h5>Caste </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5>UG </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5>PG </h5>
                    </div>
                    <?php foreach ($castes as $row) { ?>
                        <div class="col-sm-4">
                            <h56><?php echo $row->name; ?></h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="ug[<?php echo $row->id; ?>]" value="<?php echo $row->ugapplicationfee; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pg[<?php echo $row->id; ?>]" value="<?php echo $row->pgapplicationfee; ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="button-block clearfix">
                <div class="bttn-group">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <a href="list" class="btn btn-link">Cancel</a>
                </div>
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
                    required: true
                },
            },
            messages: {
                caste_id: {
                    required: "<p class='error-text'>Caste  required</p>",
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