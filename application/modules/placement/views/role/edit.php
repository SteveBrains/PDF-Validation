<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Edit Role</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Role</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Role Details</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fname">Role</label>
                            <input type="text" class="form-control" id="role" placeholder="Role Name" name="role" value="<?php echo $role->role; ?>" maxlength="128">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Status </p>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="1" <?php if ($role->status == '1') {
                                                                                            echo "checked=checked";
                                                                                        }; ?>><span class="check-radio"></span> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="0" <?php if ($role->status == '0') {
                                                                                            echo "checked=checked";
                                                                                        }; ?>>
                                <span class="check-radio"></span> In-Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-container">
                <h4 class="form-group-title">Permissions</h4>
                    <div class="clearfix">
                        <?php foreach ($menuList as $menu) { ?>
                            <ul class="menu-tree">
                                <li>
                                    <span class="icon folder collapsed" data-toggle="collapse" href="#menu<?php echo $menu->id; ?>" aria-expanded="false" aria-controls="menu<?php echo $menu->id; ?>"></span>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="chkparent<?php echo $menu->id; ?>" name="menus[]" value="<?php echo $menu->id; ?>" <?php if (in_array($menu->id, $role_permissions)) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }  ?>>
                                            <span class="check-radio"></span>
                                            <?php echo $menu->menu_name; ?>
                                        </label>
                                    </div>
                                    <div class="collapse" id="menu<?php echo $menu->id; ?>">
                                        <ul>
                                            <?php foreach ($menu->submenus as $submenu) { ?>
                                                <li>
                                                    <span class="collapsed" data-toggle="collapse" href="#menu<?php echo $submenu->id; ?>" aria-expanded="false" aria-controls="menu<?php echo $submenu->id; ?>"></span>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="chk<?php echo $menu->id; ?>" id="chk<?php echo $submenu->id; ?>" name="submenus[]" value="<?php echo $submenu->id; ?>" <?php if (in_array($submenu->id, $role_permissions)) {
                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                    }  ?>>
                                                            <span class="check-radio"></span>
                                                            <?php echo $submenu->menu_name; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php }  ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="button-block clearfix">
                    <div class="bttn-group">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        <a href="../list" class="btn btn-link">Back</a>
                    </div>
                </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form_scheme").validate({
            rules: {
                role: {
                    required: true
                }
            },
            messages: {
                role: {
                    required: "<p class='error-text'>Role Required</p>",
                }
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }
        });
    });

    function checkallchild(id) {
        var checkstatus = $("#chk" + id).prop("checked");
        if (checkstatus == true) {
            $("[id^=" + id + "-]").prop("checked", true);
        }
        if (checkstatus == false) {
            $("[id^=" + id + "-]").prop("checked", false);
        }
    }

    function checkparent(id) {
        var checkstatus = $("#chkparent" + id).prop("checked");

    }
</script>