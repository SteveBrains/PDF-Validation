<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>View Staff</h3>
        </div>


        <div class="custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Marks</th>
                        <th>Grade</th>
                        <th>Enter</th>
                    </tr>
                </thead>
                <form action="" method="post" id="searchForm">
                    <?php
                    if (!empty($candidates)) {
                        foreach ($candidates as $record) {
                    ?> <tr>
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->email; ?></td>
                                <td><?php echo $record->mobile; ?></td>
                                <td><?php echo $record->marks; ?></td>
                                <td><?php echo $record->grade; ?></td>
                                <td>
                                    <?php if ($record->marks == '') { ?>
                                        <a href="<?php echo '../entry/' . $record->Id; ?>" title="Tag">Enter</a>
                                    <?php } ?>
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