<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Tag Resumes</h3>
        </div>

        <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Job Description
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
                                            <label class="col-sm-6 control-label">Company Name</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $jobdescription->name; ?></b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Email</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $jobdescription->email; ?></b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Mobile</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $jobdescription->mobile; ?></b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Job Code</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $jobdescription->code; ?></b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Job Title</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $jobdescription->title; ?></b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">No of Openings</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $jobdescription->openings; ?></b></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">ME Cut-off(%)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="me_cutoff" id="me_cutoff" value="<?php echo $searchdata['me_cutoff']; ?>">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">ME Passout Year</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="me_year" id="me_year" value="<?php echo $searchdata['me_year']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">BE Cut-off(%)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="be_cutoff" id="be_cutoff" value="<?php echo $searchdata['be_cutoff']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">BE Passout Year</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="be_year" id="be_year" value="<?php echo $searchdata['be_year']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">PUC Cut-off(%)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="puc_cutoff" id="puc_cutoff" value="<?php echo $searchdata['puc_cutoff']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">PUC Passout Year</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="puc_year" id="puc_year" value="<?php echo $searchdata['puc_year']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">SSLC Cut-off(%)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="sslc_cutoff" id="sslc_cutoff" value="<?php echo $searchdata['sslc_cutoff']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">SSLC Passout Year</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="sslc_year" id="sslc_year" value="<?php echo $searchdata['sslc_year']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Skills</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="skills" id="skills" value="<?php echo $searchdata['skills']; ?>">
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
                        <th>Status</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                <form action="../tagstudents" method="post" id="searchForm">
                    <input type="hidden" name="job_id" value="<?php echo $job_id;  ?>" <tbody>
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
                    <a href="../approved" class="btn btn-link">Cancel</a>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>