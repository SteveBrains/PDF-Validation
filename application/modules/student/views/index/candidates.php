<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Placed Candidates</h3>
        </div>


        <div class="custom-table">
            <table class="table" id="list-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Placement Status</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                    <?php
                    if (!empty($candidateList)) {
                        foreach ($candidateList as $record) {
                    ?> <tr>
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->mobile; ?></td>
                                <td><?php echo $record->email; ?></td>
                                <td><?php echo $record->placement_status; ?></td>
                                <td>
                                    <a target="_blank" href="<?php echo BASE_PATH; ?>/assets/resources/<?php echo $record->resume; ?>" title="View"><span class="glyphicon glyphicon-eye" aria-hidden="true"></span>View</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>