<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Training Center</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Training Center</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_academic_year" action="" method="post" enctype="multipart/form-data">

            <div class="form-container">
                <h4 class="form-group-title"> Training Center Details</h4>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name<span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required value="<?php echo $trainingcenter->name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Status </p>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Active" <?php if ($trainingcenter->status == 'Active') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>><span class="check-radio"></span> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Inactive" <?php if ($trainingcenter->status == 'Inactive') {
                                                                                                    echo "checked=checked";
                                                                                                }; ?>>
                                <span class="check-radio"></span> In-Active
                            </label>
                        </div>
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
        <div class="form-container">
            <h4 class="form-group-title"> Job Roles</h4>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label> Job Roles<span class='error-text'>*</span></label>
                        <select name="id_jobrole" id="id_jobrole" class="form-control">
                            <option value="">Select</option>

                            <?php
                            if (!empty($jobroles)) {
                                foreach ($jobroles as $row) { ?>
                                    <option value="<?php echo $row->Id;  ?>">
                                        <?php echo $row->name; ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="button-block clearfix">
                <div class="bttn-group">
                    <button type="button" class="btn btn-primary btn-lg" onclick="savejobroledetails()">ADD</button>
                </div>
            </div>
        </div>
        <div class="form-container">
            <h4 class="form-group-title"> Tagged Job Roles</h4>
            <div class="custom-table">
                <table class="table" id="list-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($taggedjobroles as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->JobRole; ?></td>
                                <td><a href="/placement/trainingcenter/remove/<?php echo $row->Id; ?>/<?php echo $trainingcenter->Id; ?>">Remove</a></td>
                            </tr>

                        <?php } ?>
                </table>
                <footer class="footer-wrapper">
                    <p>&copy; 2019 All rights, reserved</p>
                </footer>

            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#form_main").validate({
                    rules: {
                        name: {
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

            function savejobroledetails() {

                var id_jobrole = $("#id_jobrole").val();
                var id_trainingcenter = "<?php echo $trainingcenter->Id; ?>";
                var url = "/placement/trainingcenter/editjobrole";
                $.post(url, {
                        id_jobrole: id_jobrole,
                        id_trainingcenter: id_trainingcenter,
                    },
                    function(data, status) {
                        location.reload();
                    });

            }
        </script>
        <footer class="footer-wrapper">
            <p>&copy; 2023 All rights, reserved</p>
        </footer>

    </div>
</div>