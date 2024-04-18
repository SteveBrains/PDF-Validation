<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Placements</h3>
        </div>


        <div class="custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Company Name</th>
                        <th>Job Description</th>
                        <th>Job Code</th>
                        <th>Resume Shortlisted</th>
                        <th>Placed</th>
                        <th>Joining Date</th>
                        <th>Offer Letter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($placementList)) {
                        $i = 1;
                        foreach ($placementList as $record) {
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->title; ?></td>
                                <td><?php echo $record->code; ?></td>
                                <td><?php if ($record->placement_status == 'Shortlisted' || $record->placement_status == 'Selected') {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }; ?></td>
                                <td><?php if ($record->placement_status == 'Selected') {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }; ?></td>
                                <td><?php echo $record->joining_date; ?></td>

                                <?php if ($record->offer_letter != null) { ?>
                                    <td>
                                        <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $record->offer_letter; ?>" title="View"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View</a>
                                    </td>
                                <?php } ?>
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