<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Student Subject Approval</h3>
        </div>


        <div class="custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($subjectList)) {
                        $i = 1;
                        foreach ($subjectList as $record) {
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $record->studentName; ?></td>
                                <td><?php echo $record->name . '-' . $record->code; ?></td>
                                <td>
                                    <a href="/application/subjectapproval/approve/<?php echo $record->id; ?>">Approve</a> / <a href="/application/subjectapproval/reject/<?php echo $record->id; ?>">Reject</a>
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