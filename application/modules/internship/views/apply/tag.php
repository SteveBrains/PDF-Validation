<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Tag Students</h3>
        </div>

        <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Company
                        </a>
                    </h4>
                </div>
                <form action="" method="post" id="searchForm">
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Company</label>
                                            <div class="col-sm-6">
                                                <select name="company_id" id="company_id" class="form-control">
                                                    <option value="">Select</option>

                                                    <?php
                                                    if (!empty($companyList)) {
                                                        foreach ($companyList as $record) { ?>
                                                            <option value="<?php echo $record->Id;  ?>" <?php
                                                                                                        if ($record->Id == $searchdata['company_id']) {
                                                                                                            echo "selected=selected";
                                                                                                        } ?>>
                                                                <?php echo $record->name; ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Training Center</label>
                                            <div class="col-sm-6">
                                                <select name="training_center_id" id="training_center_id" class="form-control">
                                                    <option value="">Select</option>

                                                    <?php
                                                    if (!empty($trainingcenterlist)) {
                                                        foreach ($trainingcenterlist as $record) { ?>
                                                            <option value="<?php echo $record->Id;  ?>" <?php
                                                                                                        if ($record->Id == $searchdata['training_center_id']) {
                                                                                                            echo "selected=selected";
                                                                                                        } ?>>
                                                                <?php echo $record->name; ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Course</label>
                                            <div class="col-sm-6">
                                                <select name="course_id" id="course_id" class="form-control">
                                                    <option value="">Select</option>

                                                    <?php
                                                    if (!empty($courselist)) {
                                                        foreach ($courselist as $record) { ?>
                                                            <option value="<?php echo $record->Id;  ?>" <?php
                                                                                                        if ($record->Id == $searchdata['course_id']) {
                                                                                                            echo "selected=selected";
                                                                                                        } ?>>
                                                                <?php echo $record->name; ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="app-btn-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href='list' class="btn btn-link">Clear All Fields</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
                        <th>Course</th>
                        <th>Failed Subjects</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                <form action="tagstudents" method="post" id="searchForm">
                    <input type="hidden" name="company_id" value="<?php echo $searchdata['company_id'];  ?>" <tbody>
                    <?php
                    if (!empty($candidates)) {
                        foreach ($candidates as $record) {
                    ?> <tr>
                                <td><input type="checkbox" id="chkparent" name="tagged_candidates[]" value="<?php echo $record->Id; ?>"></td>
                                <td><?php echo $record->name; ?></td>
                                <td><?php echo $record->email; ?></td>
                                <td><?php echo $record->mobile; ?></td>
                                <td><?php echo $record->registration_number; ?></td>
                                <td><?php echo $record->training_center; ?></td>
                                <td><?php echo $record->course_name; ?></td>
                                <td><?php echo $record->subjectscount; ?></td>
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
                </div>
            </div>
            </form>

        </div>
    </div>
</div>