<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Add Fee Structure</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Fee Structure</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Fee Structure Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Academic Year <span class='error-text'>*</span></label>
                            <select class="form-control" id="academicyear_id" name="academicyear_id">
                                <option value="">Select</option>
                                <?php foreach ($academicyears as $row) { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Course <span class='error-text'>*</span></label>
                            <select class="form-control" id="course_id" name="course_id"  onchange="getDisciplinesById(this.value)">
                                <option value="">Select</option>
                                <?php foreach ($courses as $row) { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Discipline <span class='error-text'>*</span></label>
                            <select class="form-control" id="discipline_id" name="discipline_id">
                                <option value="">Select</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Caste <span class='error-text'>*</span></label>
                            <select class="form-control" id="caste_id" name="caste_id">
                                <option value="">Select</option>
                                <?php foreach ($castes as $row) { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Gender <span class='error-text'>*</span></label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
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
    </div>
    </form>
</div>
</div>
<script>
    function getDisciplinesById(id) {
        if (id != '') {
            $.ajax('/studentapplication/getDisciplinesById', {
                type: 'POST',
                data: {
                    course_id: id,
                    discipline_id: 0
                },
                success: function(data, status, xhr) {
                    $('#discipline_id').html(data);
                },
                error: function(jqXhr, textStatus, errorMessage) { // error callback 
                    console.log(errorMessage);
                }
            });
        }
    }
    $(document).ready(function() {
        $("#form_scheme").validate({
            rules: {
                academicyear_id: {
                    required: true
                },
                course_id: {
                    required: true,
                },
                discipline_id: {
                    required: true,
                },
                caste_id: {
                    required: true,
                },
                gender: {
                    required: true,
                },
            },
            messages: {
                academicyear_id: {
                    required: "<p class='error-text'>Academic Year required</p>",
                },
                course_id: {
                    required: "<p class='error-text'>Course required</p>",
                },
                discipline_id: {
                    required: "<p class='error-text'>Discipline required</p>",
                },
                caste_id: {
                    required: "<p class='error-text'>Caste required</p>",
                },
                gender: {
                    required: "<p class='error-text'>Gender required</p>",
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>