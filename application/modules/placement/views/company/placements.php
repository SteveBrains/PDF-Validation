<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>View Job Description</h3>
        </div>


        <div class="custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Openings</th>
                        <th>Skills</th>
                        <th>Canidates</th>
                    </tr>
                </thead>
                    <?php
                    if (!empty($placementList)) {
                        foreach ($placementList as $record) {
                    ?> <tr>
                                <td><?php echo $record->title; ?></td>
                                <td><?php echo $record->code; ?></td>
                                <td><?php echo $record->openings; ?></td>
                                <td><?php echo $record->skills; ?></td>
                                <td>
                                    <a href="<?php echo '../candidates/' . $record->Id; ?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>View</a>
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