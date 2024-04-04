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
                            <li class="list-unstyled nav-item active">
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card p-3 bg-light mb-3">
                    <div class="row align-items-center">
                        <div class="col-sm-1 pb-sm-3 text-sm-right">I'm a
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group"><input type="text" class="form-control" value="<?php echo $userData->current_profile; ?>" id="current_profile" name="current_profile">
                            </div>
                        </div>

                        <div class="col-sm-2 pb-sm-3 text-sm-right">I want to become
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group"><input type="text" class="form-control" value="<?php echo $userData->next_profile; ?>" id="next_profile" name="next_profile"></div>
                        </div>
                        <div class="col-sm-2 pb-sm-3 text-sm-right">Set your learning goals
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group"><select id="learning_goals" name="learning_goals" class="form-control">
                                    <option value="1" <?php if ($userData->learning_goals == 1) { ?> selected="selected" <?php } ?>>Career Change</option>
                                    <option value="2" <?php if ($userData->learning_goals == 2) { ?> selected="selected" <?php } ?>>Upgrade Skill</option>
                                    <option value="3" <?php if ($userData->learning_goals == 3) { ?> selected="selected" <?php } ?>>Reskilling</option>
                                    <option value="4" <?php if ($userData->learning_goals == 4) { ?> selected="selected" <?php } ?>>Lifelong Learning</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <div class="small"> Eg: I'm a <b>teacher</b> I want to be <b>Artist</b> Set your learning goal as
                                <b>Reskilling</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body">
                        <!-- First name -->

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="salutation">Salutation</label>

                            <select name="salutation" id="salutation" class="form-control">

                                <option value="1" <?php if ($userData->salutation == 1) { ?> selected="selected" <?php } ?>>Mr</option>


                                <option value="2" <?php if ($userData->salutation == 2) { ?> selected="selected" <?php } ?>>Mrs</option>


                                <option value="3" <?php if ($userData->salutation == 3) { ?> selected="selected" <?php } ?>>Ms</option>


                                <option value="4" <?php if ($userData->salutation == 4) { ?> selected="selected" <?php } ?>>Dr</option>


                                <option value="5" <?php if ($userData->salutation == 5) { ?> selected="selected" <?php } ?>>Dato</option>


                                <option value="6" <?php if ($userData->salutation == 6) { ?> selected="selected" <?php } ?>>Ir</option>


                                <option value="26" <?php if ($userData->salutation == 26) { ?> selected="selected" <?php } ?>>Prof. Dr. </option>


                                <option value="27" <?php if ($userData->salutation == 27) { ?> selected="selected" <?php } ?>>Assoc. Prof. Dr. </option>


                                <option value="28" <?php if ($userData->salutation == 28) { ?> selected="selected" <?php } ?>>Assoc. Prof. </option>


                                <option value="29" <?php if ($userData->salutation == 29) { ?> selected="selected" <?php } ?>>Tuan</option>


                                <option value="30" <?php if ($userData->salutation == 30) { ?> selected="selected" <?php } ?>>Prof Dato’ Dr.</option>


                            </select>

                        </div>


                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="first_name">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo $userData->first_name; ?>">
                        </div>
                        <!-- Last name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo $userData->last_name; ?>">
                        </div>
                        <!-- Phone -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="<?php echo $userData->email; ?>">
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $userData->phone; ?>">
                        </div>

                        <!-- Birthday -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="whatsapp_number">Whatsapp Number</label>
                            <input type="text" id="whatsapp_number" class="form-control" name="whatsapp_number" value="<?php echo $userData->whatsapp_number; ?>">
                        </div>
                         <!-- Birthday -->
                         <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="whatsapp_number">Profile Photo</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <input type="hidden" class="form-control" id="image_value" name="image_value" value="<?php echo $userData->image; ?>">
                            <?php if ($userData->image) {
                            ?>
                                <a href="<?php echo BASE_PATH; ?>/assets/img/<?php echo $userData->image; ?>" target="_blank">View</a>
                            <?php
                            } ?>
                        </div>

                    </div>

                    <div class="card-header bg-light">
                        <h5 class="mb-0">Work Experience</h5>
                    </div>
                    <div class="card-body form-row">
                        <!-- First name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="occupation">Occupation</label>
                            <input type="text" id="occupation" class="form-control" name="occupation" value="<?php echo $userData->occupation; ?>">
                        </div>
                        <!-- Last name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="experience_level">Experience Level</label>
                            <input type="text" id="experience_level" class="form-control" name="experience_level" value="<?php echo $userData->experience_level; ?>">
                        </div>
                        <!-- Phone -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="employer">Employer</label>
                            <input type="text" id="employer" class="form-control" name="employer" value="<?php echo $userData->employer; ?>">
                        </div>

                    </div>

                    <div class="card-header bg-light">
                        <h5 class="mb-0">Education</h5>
                    </div>
                    <div class="card-body form-row">
                        <!-- First name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="degree">Degree</label>
                            <input type="text" id="degree" class="form-control" name="degree" value="<?php echo $userData->degree; ?>">
                        </div>
                        <!-- Last name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="university">University</label>
                            <input type="text" id="university" class="form-control" name="university" value="<?php echo $userData->university; ?>">
                        </div>
                        <!-- Phone -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="field_major">Field or Major</label>
                            <input type="text" id="field_major" class="form-control" name="field_major" value="<?php echo $userData->field_major; ?>">
                        </div>

                    </div>

                    <div class="card-header bg-light">
                        <h5 class="mb-0">Career Goal</h5>
                    </div>
                    <div class="card-body form-row">
                        <!-- First name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="career_occupation">Occupation</label>
                            <input type="text" id="career_occupation" class="form-control" name="career_occupation" value="<?php echo $userData->career_occupation; ?>">
                        </div>
                        <!-- Last name -->
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="industry">Industry</label>
                            <input type="text" id="industry" class="form-control" name="industry" value="<?php echo $userData->industry; ?>">
                        </div>
                    </div>
                    <div class="col-12 pb-3">
                        <!-- Button -->
                        <button class="btn btn-primary" type="submit">
                            Update Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- SIDEBAR NAV ENDS HERE -->
</div>