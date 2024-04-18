<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Subjects</h3>
            <a href="/student/index/optional" class="btn btn-primary">+ Optional Subjects</a>
        </div>


        <div class="custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Type</th>
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
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->code; ?></td>
                                <td><?php echo $record->type; ?></td>
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                     <?php
                    if (!empty($optionalSubjectList)) {
                        foreach ($optionalSubjectList as $record) {
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->code; ?></td>
                                <td><?php echo $record->type; ?></td>
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