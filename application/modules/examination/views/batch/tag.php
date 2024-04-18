<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Tag Students</h3>
        </div>

        <form action="" method="post" id="searchForm">
            <div class="custom-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tag</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Registration Number</th>
                            <th>Training Center</th>
                            <th>Status</th>
                            <th>Resume</th>
                        </tr>
                    </thead>
                    <form action="" method="post" id="searchForm">
                        <input type="hidden" name="course_id" value="<?php echo $course_id;  ?>" <tbody>
                        <?php
                        if (!empty($studentlist)) {
                            foreach ($studentlist as $record) {
                        ?> <tr>
                                    <td><input type="checkbox" id="chkparent" name="tagged_candidates[]" value="<?php echo $record->Id; ?>"></td>
                                    <td><?php echo $record->name; ?></td>
                                    <td><?php echo $record->email; ?></td>
                                    <td><?php echo $record->mobile; ?></td>
                                    <td><?php echo $record->registration_number; ?></td>
                                    <td><?php echo $record->training_center; ?></td>
                                    <td><?php echo $record->status; ?></td>
                                    <td class="text-center">
                                        <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $record->resume; ?>" title="View"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                </table>
                <div class="button-block clearfix">
                    <div class="bttn-group">
                        <button type="submit" class="btn btn-primary btn-lg">Tag Candidates</button>
                        <a href="../list" class="btn btn-link">Cancel</a>
                    </div>
                </div>
        </form>

    </div>
    </form>
</div>
</div>