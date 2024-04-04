<?php

$urlarray = explode('/', $_SERVER['REQUEST_URI']);
$urlmodule = $urlarray['1'];



$roleModel = new Role_model();
$role = $_SESSION['role'];
$menuList  = $roleModel->getMenuByModules($urlmodule);
//  echo "<pre>";print_r($menuList);die;
?>
<div class="sidebar">
  <div class="sidebar-nav">
    <ul class="collapse in" id="placements" aria-expanded="true">
      <li>
        <a href="/student/index">Subjects </a>
        <a href="/student/fee/index">Fee </a>
      </li>
    </ul>
  </div>
</div>