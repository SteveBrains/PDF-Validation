<?php $this->load->helper("form"); ?>
<div class="container-fluid page-wrapper">
    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Add Menu</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Menu</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
        <form id="form_scheme" action="" method="post">
            <div class="form-container">
                <h4 class="form-group-title">Menu Details</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Code <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Controller <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="controller" name="controller">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Action <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="action" name="action">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Order <span class='error-text'>*</span></label>
                            <input type="text" class="form-control" id="order" name="order">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Parent Menu</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (!empty($menuList)) {
                                    foreach ($menuList as $record) { ?>
                                        <option value="<?php echo $record->id;  ?>"><?php echo $record->menu_name; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Status <span class='error-text'>*</span></p>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="1" checked="checked"><span class="check-radio"></span> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="0"><span class="check-radio"></span> Inactive
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-block clearfix">
                <div class="bttn-group">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <a href="list" class="btn btn-link">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form_scheme").validate({
            rules: {
                name: {
                    required: true
                },
                code: {
                    required: true
                },
                controller: {
                    required: true
                },
                action: {
                    required: true
                },
                order: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "<p class='error-text'>Name Required</p>",
                },
                code: {
                    required: "<p class='error-text'>Code Required</p>",
                },
                controller: {
                    required: "<p class='error-text'>Controller Required</p>",
                },
                action: {
                    required: "<p class='error-text'>Action Required</p>",
                },
                order: {
                    required: "<p class='error-text'>Order Required</p>",
                }
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>