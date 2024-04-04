<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Add Academic Year</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Academic Year</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Academic Year Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Start Date <span class='error-text'>*</span></label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>End Date <span class='error-text'>*</span></label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
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
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                },

            },
            messages: {
                name: {
                    required: "<p class='error-text'>Name required</p>",
                },
                start_date: {
                    required: "<p class='error-text'>Start Date required</p>",
                },
                End_date: {
                    required: "<p class='error-text'>End Date required</p>",
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>