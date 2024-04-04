<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Setup Seat Allocation</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Seat Allocation</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Seat Allocation Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Academic Year <span class='error-text'>*</span></label>
                            <input type="hidden" name="academicyear_id" value="<?php echo $seatallocationInfo->academicyear_id; ?>">
                            <select class="form-control" id="academicyear_id" name="academicyear_id" disabled>
                                <option value="">Select</option>
                                <?php foreach ($academicyears as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($seatallocationInfo->academicyear_id == $row->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Course <span class='error-text'>*</span></label>
                            <input type="hidden" name="course_id" value="<?php echo $seatallocationInfo->course_id; ?>">
                            <select class="form-control" id="course_id" name="course_id" onchange="getDisciplinesById(this.value)" disabled>
                                <option value="">Select</option>
                                <?php foreach ($courses as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($seatallocationInfo->course_id == $row->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Discipline <span class='error-text'>*</span></label>
                            <input type="hidden" name="discipline_id" value="<?php echo $seatallocationInfo->discipline_id; ?>">
                            <select class="form-control" id="discipline_id" name="discipline_id" disabled>
                                <option value="">Select</option>

                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h5>College </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5>Seats </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5>Type </h5>
                    </div>
                    <?php foreach ($colleges as $row) { ?>
                        <div class="col-sm-4">
                            <h56><?php echo $row->name; ?></h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="seats[<?php echo $row->id; ?>]" value="<?php echo $row->seats; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" id="type" name="type[<?php echo $row->id; ?>]">
                                    <option value="">Select</option>
                                    <option value="1" <?php if ($row->type == '1') {
                                                            echo "selected";
                                                        } ?>>First Come First</option>
                                    <option value="2" <?php if ($row->type == '2') {
                                                            echo "selected";
                                                        } ?>>Merit</option>
                                </select>
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
    var course_id = "<?php echo $seatallocationInfo->course_id ?>";
    var discipline_id = "<?php echo $seatallocationInfo->discipline_id ?>";
    if (course_id > 0) {
        getDisciplinesById(course_id);
    }

    function getDisciplinesById(id) {
        if (id != '') {
            $.ajax('/studentapplication/getDisciplinesById', {
                type: 'POST',
                data: {
                    course_id: id,
                    discipline_id: discipline_id
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
                college_id: {
                    required: true,
                },
                seats: {
                    required: true,
                },
                type: {
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
                college_id: {
                    required: "<p class='error-text'>College required</p>",
                },
                seats: {
                    required: "<p class='error-text'>Seats required</p>",
                },
                type: {
                    required: "<p class='error-text'>Type required</p>",
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>