<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Add College</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">College</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">College Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Code <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Address <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
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
                name: {
                    required: true
                },
                code: {
                    required: true,
                },
                address: {
                    required: true,
                },
                

            },
            messages: {
                name: {
                    required: "<p class='error-text'>Name required</p>",
                },
                code: {
                    required: "<p class='error-text'>Code required</p>",
                },
                address: {
                    required: "<p class='error-text'>Address required</p>",
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>