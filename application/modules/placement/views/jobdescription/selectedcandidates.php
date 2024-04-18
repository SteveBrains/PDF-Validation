<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Selected Resumes</h3>
        </div>


        <div class="custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Training Center</th>
                        <th>Resume</th>
                        <th>Joining Date</th>
                        <th>Offer Letter</th>
                    </tr>
                </thead>
                <form action="" method="post" id="searchForm">
                    <input type="hidden" name="job_id" value="<?php echo $job_id;  ?>" <tbody>
                    <?php
                    if (!empty($candidates)) {
                        foreach ($candidates as $record) {
                    ?> <tr>
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->email; ?></td>
                                <td><?php echo $record->mobile; ?></td>
                                <td><?php echo $record->training_center; ?></td>
                                <td>
                                    <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $record->resume; ?>" title="View"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View</a>
                                </td>
                                <td><?php echo $record->joining_date; ?></td>
                                <?php if ($record->offer_letter != null) { ?>
                                    <td>
                                        <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $record->offer_letter; ?>" title="View"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View</a>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <a href="<?php echo '../offerletter/' . $record->Id; ?>" title="Tag"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>Upload </a>
                                    </td>
                                <?php } ?>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
            </table>
            </form>

        </div>
    </div>
</div>