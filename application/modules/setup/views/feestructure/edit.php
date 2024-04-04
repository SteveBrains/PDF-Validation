<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Fee Structure</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Fee Structure</li>
                    <li class="breadcrumb-item active">Edit</li>
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
                                    <option value="<?php echo $row->id; ?>" <?php if ($feestructureInfo->academicyear_id == $row->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Course <span class='error-text'>*</span></label>
                            <select class="form-control" id="course_id" name="course_id">
                                <option value="">Select</option>
                                <?php foreach ($courses as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($feestructureInfo->course_id == $row->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Discipline <span class='error-text'>*</span></label>
                            <select class="form-control" id="discipline_id" name="discipline_id">
                                <option value="">Select</option>
                                <?php foreach ($disciplines as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($feestructureInfo->discipline_id == $row->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Caste <span class='error-text'>*</span></label>
                            <select class="form-control" id="caste_id" name="caste_id">
                                <option value="">Select</option>
                                <?php foreach ($colleges as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($feestructureInfo->caste_id == $row->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Gender <span class='error-text'>*</span></label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select</option>
                                <option value="Male" <?php if ($feestructureInfo->gender == 'Male') {
                                                            echo "selected";
                                                        } ?>>Male</option>
                                <option value="Female" <?php if ($feestructureInfo->gender == 'Female') {
                                                            echo "selected";
                                                        } ?>>Female</option>
                                <option value="Others" <?php if ($feestructureInfo->gender == 'Others') {
                                                            echo "selected";
                                                        } ?>>Others</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="button-block clearfix">
                    <div class="bttn-group">
                        <button type="submit" class="btn btn-primary btn-lg" name="master" value="master">Update</button>
                        <a href="../list" class="btn btn-link">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        <form id="form_detail" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Fee Item</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Fee Item <span class='error-text'>*</span></label>
                            <select class="form-control" id="feeitem_id" name="feeitem_id">
                                <option value="">Select</option>
                                <?php foreach ($feeitems as $row) { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Fee <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="fee" name="fee">
                        </div>
                    </div>
                </div>
                <div class="button-block clearfix">
                    <div class="bttn-group">
                        <input type="hidden" name="feestructure_id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary btn-lg" name="detail" value="detail">Save</button>
                        <a href="../list" class="btn btn-link">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="form-container">
            <h4 class="form-group-title">Fee Item Details</h4>
            <div class="row">
                <div class="custom-table">
                    <table class="table" id="list-table">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th> Fee Item</th>
                                <th> Fee</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($feestructuredetails)) {
                                $i = 1;
                                foreach ($feestructuredetails as $record) {
                            ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $record->feeitemName ?></td>
                                        <td><?php echo $record->fee ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo '/setup/feestructure/removeitem/' . $record->id; ?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Remove</a>
                                        </td>
                                    </tr>
                            <?php
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
                caste_id: {
                    required: "<p class='error-text'>Caste required</p>",
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
        $("#form_detail").validate({

            rules: {
                feeitem_id: {
                    required: true
                },
                fee: {
                    required: true,
                },

            },
            messages: {
                feeitem_id: {
                    required: "<p class='error-text'>Fee Item required</p>",
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