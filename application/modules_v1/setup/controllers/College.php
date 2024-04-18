<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class College extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('college_model');
        if (!$this->checkAccess('setup.college')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.course';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $data['name'] = $name;
            $data['code'] = $code;
            $data['address'] = $address;
            $data['collegeRecords'] = $this->college_model->getColleges($data);
            $this->loadViews("college/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.college';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'address' =>$address,
                'status' => 1,
            );
            $this->college_model->addCollege($data);
            redirect('/setup/college/list');
        }
        $this->loadViews("college/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.college';
        if ($id == null) {
            redirect('/setup/college/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'address' =>$address,
            );
            $this->college_model->editCollege($data, $id);
            redirect('/setup/college/list');
        }
        $data['collegeInfo'] = $this->college_model->getCollege($id);
        $this->loadViews("college/edit", $this->global, $data, NULL);
    }
}