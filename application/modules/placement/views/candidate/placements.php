<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Candidate Placements</h3>
        </div>

        <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Candidate Details
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
                                            <label class="col-sm-6 control-label">Name</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $candidate->name; ?></b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Email</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $candidate->email; ?></b></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Mobile</label>
                                            <label class="col-sm-6 control-label"><b><?php echo $candidate->mobile; ?></b></label>
                                        </div>
                                    </div>
                                </div>
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
                        <th>Sl. No</th>
                        <th>Company Name</th>
                        <th>Job Description</th>
                        <th>Job Code</th>
                        <th>Resume Shortlisted</th>
                        <th>Placed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($candidateList)) {
                        $i = 1;
                        foreach ($candidateList as $record) {
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
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="button-block clearfix">
                <div class="bttn-group">
                    <a href="../list" class="btn btn-link">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>