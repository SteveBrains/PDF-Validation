<?php

$urlarray = explode ('/',$_SERVER['REQUEST_URI']);
$urlmodule = $urlarray['1'];



$roleModel = new Role_model();
$role = $_SESSION['role'];
$menuList  = $roleModel->getMenuByModules($urlmodule);
//  echo "<pre>";print_r($menuList);die;
?>
<div class="sidebar">
  <div class="sidebar-nav">
    <?php foreach ($menuList as $menu) {
      if ($menu->controller == '') {
        if (strpos($code, $menu->code) !== false) {
    ?>
          <h4>
            <a role="button" data-toggle="collapse" href="#<?php echo $menu->id; ?>" aria-expanded="true"><?php echo $menu->menu_name; ?>
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
          </h4> 
          <ul class="collapse in" id="<?php echo $menu->id; ?>" aria-expanded="true" style="">
            <?php foreach ($menu->submenus as $submenu) { ?>
              <li <?php if (strpos($code, $submenu->code) !== false) {
                    echo "class='active'";
                  } ?>>
                <a href="/<?php echo $submenu->module; ?>/<?php echo $submenu->controller; ?>/<?php echo $submenu->action; ?> ">
                  <?php echo $submenu->menu_name; ?>
                </a>
              </li>
            <?php } ?>
          </ul>
        <?php } else {
        ?>
          <h4>
            <a role="button" data-toggle="collapse" class="collapsed" href="#<?php echo $menu->id; ?>" aria-expanded="true"><?php echo $menu->menu_name; ?>
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
          </h4>
          <ul class="collapse" id="<?php echo $menu->id; ?>" aria-expanded="true" style="">
            <?php foreach ($menu->submenus as $submenu) { ?>
              <li <?php if (strpos($code, $submenu->code) !== false) {
                    echo "class='active'";
                  } ?>>
                <a href="/<?php echo $submenu->module; ?>/<?php echo $submenu->controller; ?>/<?php echo $submenu->action; ?> ">
                  <?php echo $submenu->menu_name; ?>
                </a>
              </li>
            <?php } ?>
          </ul>
        <?php
        }
      } else { ?>
        <ul class="collapse in " id="<?php echo $menu->id; ?>" aria-expanded="true" style="">
          <li <?php if (strpos($code, $menu->code) !== false) {
                    echo "class='active'";
                  } ?>>
            <a href="/<?php echo $menu->module; ?>/<?php echo $menu->controller; ?>/<?php echo $menu->action; ?> ">
              <?php echo $menu->menu_name; ?> </a>
          </li>
        </ul>
    <?php }
    } ?>
  </div>
</div>