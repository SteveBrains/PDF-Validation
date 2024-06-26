<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Caste</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Caste</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Caste Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $casteInfo->name; ?>">
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
                name: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "<p class='error-text'>Name required</p>",
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>