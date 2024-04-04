<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>List Menu</h3>
      <a href="add" class="btn btn-primary">+ Add Menu</a>
    </div>

    <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Advanced Search
            </a>
          </h4>
        </div>
        <form action="" method="post" id="searchForm">
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Parent Menu</label>
                      <div class="col-sm-8">
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">Select</option>
                            <?php
                            if (!empty($parentMenuList))
                            {
                                foreach ($parentMenuList as $record)
                                {?>
                             <option value="<?php echo $record->id;  ?>"
                                <?php 
                                if($record->id == $parent_id)
                                {
                                    echo "selected=selected";
                                } ?>>
                                <?php echo $record->menu_name;?>
                             </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Menu</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="<?php echo $searchParam; ?>">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="app-btn-group">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="list" class="btn btn-link">Clear All Fields</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="custom-table">
      <table class="table" id="role-table">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Code</th>
            <th>Controller</th>
            <th>Action</th>
            <th>Order</th>
            <th>Status</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($menuList)) {
            $i=1;
            foreach ($menuList as $record) {
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $record->menu_name; ?></td>
                <td><?php echo $record->parent_name; ?></td>
                <td><?php echo $record->code; ?></td>
                <td><?php echo $record->controller; ?></td>
                <td><?php echo $record->action; ?></td>
                <td><?php if($record->parent_id == 0){ echo "<b>".$record->order."</b>"; }else{ echo $record->order; } ?></td>
                <td><?php echo ($record->status == 1)? "Active":"Inactive";  ?></td>
                <td class="text-center">
                  <a href="<?php echo 'edit/' . $record->id; ?>" title="Edit">Edit</a>
                  <!-- <a class="btn btn-sm btn-danger deleteRole" href="#" data-id="<?php echo $record->roleId; ?>" title="Delete"><i class="fa fa-trash"></i></a> -->
                </td>
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
  <footer class="footer-wrapper">
    <p>&copy; 2023 All rights, reserved</p>
  </footer>
</div>
<script>
    function clearSearchForm()
    {
      window.location.reload();
    }
</script>