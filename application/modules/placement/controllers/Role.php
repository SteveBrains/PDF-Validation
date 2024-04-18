<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        if (!$this->checkAccess('setup.role')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.role';
        $name = $this->security->xss_clean($this->input->post('name'));
        $data['searchParam'] = $name;
        $data['roleList'] = $this->role_model->getRoles($data);
        $this->global['pageTitle'] = 'Setup : Role';
        $this->loadViews("role/list", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.role';
        if ($id == null) {
            redirect('/placement/role/list'); 
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('role'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $menus = $this->security->xss_clean($this->input->post('menus'));
            $submenus = $this->security->xss_clean($this->input->post('submenus'));
            $data = array(
                'role' => $name,
                'status' => $status,
            );
            $this->role_model->editRole($data, $id);
            $this->role_model->clearRolePermissions($id);
            if (!empty($menus)) {
                foreach ($menus as $menu) {
                    $data = array(
                        'id_role' => $id,
                        'id_menu' => $menu,
                    );
                    $result = $this->role_model->addRolePermissions($data);
                }
            }
            if (!empty($submenus)) {
                foreach ($submenus as $submenu) {
                    $data = array(
                        'id_role' => $id,
                        'id_menu' => $submenu,
                    );

                    $submenuDetails = $this->role_model->getMenu($submenu);
                    $parentdata = array(
                        'id_role' => $id,
                        'id_menu' => $submenuDetails->parent_id,
                    );
                    $exist = $this->role_model->checkRolePermission($id, $submenuDetails->parent_id);
                    if (!$exist) {
                        $result = $this->role_model->addRolePermissions($parentdata);
                    }
                    $result = $this->role_model->addRolePermissions($data);
                }
            }
            redirect('/placement/role/list');
        }
        $data['role'] = $this->role_model->getRole($id);
        $data['menuList'] = $this->role_model->getAllMenus();
        $permissions = $this->role_model->getRolePermissions($id);
        $role_permissions = array();
        foreach ($permissions as $permission) {
            array_push($role_permissions, $permission->id_menu);
        }
        $data['role_permissions'] = $role_permissions;
        $this->global['pageTitle'] = 'Setup : Edit Role';
        $this->loadViews("role/edit", $this->global, $data, NULL);
    }
    function add()
    {
        $this->global['code'] = 'setup.role';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('role'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'role' => $name,
                'status' => $status,
            );
            $this->role_model->addRole($data);
            redirect('/placement/role/list');
        }
        $this->global['pageTitle'] = 'Setup : Add Role';
        $this->loadViews("role/add", $this->global, $data, NULL);
    }
}
