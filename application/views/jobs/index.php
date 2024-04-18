<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centralized Student Placement Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/adminmain.css" />
</head>
<!--<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }
    </style>
</head>-->

<body>
    <div class="container">
        <h2 class="text-center">Jobs</h2>
        <hr />
        <div class="row md-d-flex">
                <?php foreach ($jobList as $job) { ?>
                    <div class="col-md-4 mb-20">
                        <div class="job-card">
                            <div>
                                <div class="company-name">Capgemini</div>
                                <h3><?php echo $job->title; ?></h3>
                                <div class="d-flex mb-20">
                                <div><i class="fa fa-suitcase mr-5" aria-hidden="true"></i> 6 - 12 years</div>
                                <div class="ml-20"><i class="fa fa-map-marker mr-5" aria-hidden="true"></i> Bangalore</div>
                                </div>                            
                                <p class="description"><?php echo $job->code; ?></p>
                                <ul class="skill-set">
                                <li><?php echo $job->skills; ?></li>
                                </ul>
                                <h5>Openings: <strong><?php echo $job->openings; ?></strong></h5>
                            </div>
                        <div><a href="jobs/apply/<?php echo $job->Id; ?>" class="btn btn-primary btn-block">Apply</a></div>
                        </div>                            
    
                    </div>
                <?php } ?>
                
                    <!-- Sample Job Card -->             
                    <!-- <div class="col-md-4 mb-20">
                        <div class="job-card">
                            <div>
                                <div class="company-name">Capgemini</div>
                                    <h3>AWS Cloud Engineer</h3>
                                    <div class="d-flex mb-20">
                                <div><i class="fa fa-suitcase mr-5" aria-hidden="true"></i> 6 - 12 years</div><div class="ml-20"><i class="fa fa-map-marker mr-5" aria-hidden="true"></i> Bangalore</div>
                                </div>
                                <p class="description">Total more than 6 years of experience in which 3+ years in cloud-based operations at scale handling multiple projects simultaneously</p>
                                    <ul class="skill-set
                                ">
                                <li>AWS</li><li>RDS</li><li>S3</li><li>Maven</li>
                                </ul>
                                <h5>Openings: <strong>5</strong></h5>
                            </div>
                            <div>
                                <a href="jobs/apply/4" class="btn btn-primary btn-block">Apply</a>
                            </div>
                        </div>
                    </div>     -->
                    <!-- Sample Job Card -->
                
        </div>
    </div>

  <script src="<?php echo BASE_PATH; ?>/assets/js/jquery-1.12.4.min.js"></script>
  <script src="<?php echo BASE_PATH; ?>/assets/js/bootstrap.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

</body>

</html>