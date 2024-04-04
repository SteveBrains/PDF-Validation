<div class="mt-3 container-fluid">
    <div class="row">
        <!-- SIDEBAR NAV STARTS HERE -->
        <div class="col-xl-2 col-md-3">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 small-sidenav">
                <!--MENU-->
                <a href="#" class="d-xl-none d-lg-none d-md-none text-inherit font-weight-bold">Menu</a>
                <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button" data-toggle="collapse" data-target="#smallSidenav" aria-controls="smallSidenav" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="fe fe-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="smallSidenav">
                    <div class="navbar-nav flex-column w-100">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="<?php
                                                        if ($_SESSION['user_image']) {
                                                            echo BASE_PATH; ?>/assets/img/<?php echo $_SESSION['user_image'];
                                                                                        } else {
                                                                                            echo "https://myeduskills.com/website/img/blank.png";
                                                                                        }
                                                                                            ?>" class="rounded-circle">
                            </div>
                            <div class="ml-3 lh-1">
                                <h5 class="mb-1"><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></h5>
                                <p class="mb-0 text-muted"></p>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="list-unstyled nav-item active">
                                <a href="/user/dashboard" class="nav-link"><i class="fe fe-home nav-icon"></i> Dashboard</a>
                            </li>
                            <li class="list-unstyled nav-item">
                                <a href="/user/profile" class="nav-link"><i class="fe fe-user nav-icon"></i> Profile</a>
                            </li>

                            <li class="list-unstyled nav-item">
                                <a href="/user/invoice" class="nav-link"><i class="fe fe-clipboard nav-icon"></i> Invoice
                                    &amp;
                                    Receipt</a>
                            </li>

                            <li class="list-unstyled nav-item">
                                <a href="/user/changepassword" class="nav-link"><i class="fe fe-clock nav-icon"></i> Change
                                    Password</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-xl-10 col-md-6">
            <div class="card-header border-bottom-0 p-0 bg-light">
                <div>
                    <!-- Nav -->
                    <ul class="nav nav-lb-tab custom-tabs" id="tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="inProgressCourses-tab" data-toggle="pill" href="#inProgressCourses" role="tab" aria-controls="table" aria-selected="true">In Progress </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="completedCourses-tab" data-toggle="pill" href="#completedCourses" role="tab" aria-controls="description" aria-selected="false">Completed</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="tab-content" id="tabContent">
                    <div class="tab-pane fade active in show" id="inProgressCourses" role="tabpanel" aria-labelledby="inProgressCourses-tab">
                        <div class="course-card pt-0">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="courses-table table border-0" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="40%">Course</th>
                                                <th scope="col" width="40%">Course Name</th>
                                                <th scope="col" width="20%">Course Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($courses as $course) {
                                            ?>
                                                <tr> 
                                                    <td class="align-middle ">
                                                        <a href="/courses/sso/<?php echo $course->moodle_id; ?>" target="_blank">
                                                            <img src="<?php echo BASE_PATH; ?>/assets/img/<?php echo $course->small_image; ?>" alt="" class="rounded-top card-img-top" style="width:60%;padding-bottom:20px;">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="/courses/sso/<?php echo $course->moodle_id; ?>" target="_blank"><?php echo $course->name; ?></a>
                                                    </td>
                                                    <td class="align-middle "><?php echo $course->duration.' '.$course->duration_type; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="completedCourses" role="tabpanel" aria-labelledby="completedCourses-tab">
                    <div class="course-card pt-0">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="courses-table table border-0" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="40%">Course</th>
                                                <th scope="col" width="40%">Course Name</th>
                                                <th scope="col" width="20%">Marks</th>
                                                <th scope="col" width="20%">Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($completed_courses as $course) {
                                            ?>
                                                <tr> 
                                                    <td class="align-middle ">
                                                            <img src="<?php echo BASE_PATH; ?>/assets/img/<?php echo $course->small_image; ?>" alt="" class="rounded-top card-img-top" style="width:60%;padding-bottom:20px;">
                                                    </td>
                                                    <td>
                                                        <?php echo $course->courseName; ?>
                                                    </td>
                                                    <td class="align-middle "><?php echo $course->marks; ?></td>
                                                    <td class="align-middle "><?php echo $course->grade; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SIDEBAR NAV ENDS HERE -->
</div>
<script>
    $(document).ready(function() {

        $('#myform').validate({ // initialize the plugin
            rules: {
                password: {
                    required: true,
                },
                cpassword: {
                    equalTo: "#password",
                    required: true,
                }
            },
            messages: {
                password: "Password is required ",
                cpassword: {
                    required: "Confirm Password is required ",
                    equalTo: "Password mismatch ",
                }
            }
        });

    });
</script>