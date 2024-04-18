<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>View Shortlisted Resumes</h3>
        </div>


        <div class="custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tag</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                <form action="" method="post" id="searchForm">
                    <input type="hidden" name="job_id" value="<?php echo $job_id;  ?>" <tbody>
                    <?php
                    if (!empty($candidates)) {
                        foreach ($candidates as $record) {
                    ?> <tr>
                                <td><input type="checkbox" id="chkparent" name="tagged_candidates[]" value="<?php echo $record->Id; ?>"></td>
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->email; ?></td>
                                <td><?php echo $record->mobile; ?></td>
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
                    <button type="submit" class="btn btn-primary btn-lg">Remove Candidates</button>
                    <a href="../tagged" class="btn btn-link">Cancel</a>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>