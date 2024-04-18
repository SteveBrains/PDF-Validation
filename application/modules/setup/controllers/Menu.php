<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('setup.role')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'setup.menu';
    } 

    function list()
    {
        $name = $this->security->xss_clean($this->input->post('name'));
        $parent_id = $this->security->xss_clean($this->input->post('parent_id'));
        $data['searchParam'] = $name;
        $data['parent_id'] = $parent_id;
        $data['parentMenuList'] = $this->menu_model->getParentMenus();
        $data['menuList'] = $this->menu_model->getMenus($data);
        $this->global['pageTitle'] = 'Inventory : Menu';
        $this->loadViews("menu/list", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/setup/menu/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $parent_id = $this->security->xss_clean($this->input->post('parent_id'));
            $order = $this->security->xss_clean($this->input->post('order'));
            $controller = $this->security->xss_clean($this->input->post('controller'));
            $action = $this->security->xss_clean($this->input->post('action'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'menu_name' => $name,
                'parent_id' => $parent_id,
                'order' => $order,
                'controller' => $controller,
                'action' => $action,
                'code' => $code,
                'status' => $status,
            );
            $this->menu_model->editMenu($data, $id);
            redirect('/setup/menu/list');
        }
        $data['menuList'] = $this->menu_model->getParentMenus();
        $data['menu'] = $this->menu_model->getMenu($id);
        $this->global['pageTitle'] = 'Inventory : Edit Menu';
        $this->loadViews("menu/edit", $this->global, $data, NULL);
    }

    function add()
    {
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $parent_id = $this->security->xss_clean($this->input->post('parent_id'));
            $order = $this->security->xss_clean($this->input->post('order'));
            $controller = $this->security->xss_clean($this->input->post('controller'));
            $action = $this->security->xss_clean($this->input->post('action'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'menu_name' => $name,
                'parent_id' => $parent_id,
                'order' => $order,
                'controller' => $controller,
                'code' => $code,
                'action' => $action,
                'status' => $status,
                'module' => 'admin',
            );
            $this->menu_model->addMenu($data);
            redirect('/setup/menu/list');
        }
        $data['menuList'] = $this->menu_model->getParentMenus();
        $this->global['pageTitle'] = 'Inventory : Add Menu';
        $this->loadViews("menu/add", $this->global, $data, NULL);
    }
}
