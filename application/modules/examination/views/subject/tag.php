<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Tag Subjects</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Subject</li>
                    <li class="breadcrumb-item active">Tag</li>
                </ol>
            </div>
        </div>
        <form id="form_main" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title">Tag Details</h4>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Semester <span class='error-text'>*</span></label>
                            <select name="semester" id="semester" class="form-control">
                                <option value="">Select</option>

                                <?php
                                if (!empty($semesterList)) {
                                    foreach ($semesterList as $record) { ?>
                                        <option value="<?php echo $record->Id;  ?>">
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
                            <label>Subject <span class='error-text'>*</span></label>
                            <select name="subject" id="subject" class="form-control">
                                <option value="">Select</option>

                                <?php
                                if (!empty($subjectList)) {
                                    foreach ($subjectList as $record) { ?>
                                        <option value="<?php echo $record->Id;  ?>">
                                            <?php echo $record->name.' - '.$record->code; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
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
        </form>
        <?php foreach($taggedSubjects as $row){ ?> 
        <div class="form-container">
            <h4 class="form-group-title"><?php echo $row->name; ?></h4>
            <div class="row">
                <div class="custom-table">
                    <table class="table" id="list-table">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th> Subject Name</th>
                                <th> Subject Code</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($row->subjects)) {
                                $i = 1;
                                foreach ($row->subjects as $record) {
                            ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $record->name ?></td>
                                        <td><?php echo $record->code ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo '/examination/subject/removetag/' . $record->mainId; ?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Remove</a>
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
        <?php } ?>
        <script>
            $(document).ready(function() {
                $("#form_main").validate({
                    rules: {
                        name: {
                            required: true
                        },
                        code: {
                            required: true
                        },
                        min: {
                            required: true
                        },
                        max: {
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