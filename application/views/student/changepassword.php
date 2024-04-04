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
                            <li class="list-unstyled nav-item">
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

                            <li class="list-unstyled nav-item active">
                                <a href="/user/changepassword" class="nav-link"><i class="fe fe-clock nav-icon"></i> Change
                                    Password</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>


        <div class="col-xl-10 col-md-6">
            <form action="" method="post" id="myform" enctype="multipart/form-data">
                <div class="card p-3  mb-3">
                    <div class="card-body form-row">
                        <!-- First name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="password">Password <span class="required">*</span></label>
                            <input type="password" id="password" class="form-control" name="password">
                        </div>
                        <!-- Last name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="cpassword">Confirm Password <span class="required">*</span></label>
                            <input type="password" id="cpassword" class="form-control" name="cpassword">
                        </div>
                    </div>
                    <div class="col-12 pb-3">
                        <!-- Button -->
                        <button class="btn btn-primary" type="submit">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
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