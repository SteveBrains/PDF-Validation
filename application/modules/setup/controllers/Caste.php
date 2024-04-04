<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Caste extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('caste_model');
        if (!$this->checkAccess('setup.caste')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.caste';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data['name'] = $name;
            $data['casteRecords'] = $this->caste_model->getCastes($data);
            $this->loadViews("caste/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.caste';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data = array(
                'name' => $name,
                'status' => 1,
            );
            $this->caste_model->addCaste($data);
            redirect('/setup/caste/list');
        }
        $this->loadViews("caste/add", $this->global, $data, NULL);
    }
   function edit($id = NULL)
    {
        $this->global['code'] = 'setup.caste';
        if ($id == null) {
            redirect('/setup/caste/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data = array(
                'name' => $name,
            );
            $this->caste_model->editCaste($data, $id);
            redirect('/setup/caste/list');
        }
        $data['casteInfo'] = $this->caste_model->getCaste($id);
        $this->loadViews("caste/edit", $this->global, $data, NULL);
    }
}