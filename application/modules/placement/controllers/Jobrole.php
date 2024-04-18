<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Jobrole extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jobrole_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('setup.jobrole')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.jobrole';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['jobroleList'] = $this->jobrole_model->getAll();
        $this->loadViews("jobrole/list", $this->global, $data, NULL);
    }
    function report()
    {
        if (!$this->checkAccess('report.jwise')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'report.jwise';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['jobroleList'] = $this->jobrole_model->getAll();
        $this->loadViews("jobrole/report", $this->global, $data, NULL);
    }
    function placements($id)
    {
        $this->global['code'] = 'setup.jobrole';
        $data['candidateList'] = $this->jobrole_model->getPlacedStudentsByJobRole($id);
        $this->loadViews("jobrole/candidates", $this->global, $data, NULL);
    }
    function add()
    {
        $this->global['code'] = 'setup.jobrole';
        if ($this->input->post()) {

            $name = $this->security->xss_clean($this->input->post('name'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'status' => $status,
            );

            $result = $this->jobrole_model->addJobrole($data);
            redirect('/placement/jobrole/list');
        }
        $this->loadViews("jobrole/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.jobrole';
        if ($id == null) {
            redirect('/placement/jobrole/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'status' => $status,
            );

            $result = $this->jobrole_model->editJobrole($data, $id);
            redirect('/placement/jobrole/list');
        }
        $data['jobrole'] = $this->jobrole_model->getJobrole($id);
        $this->loadViews("jobrole/edit", $this->global, $data, NULL);
    }
}
