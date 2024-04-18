<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Academicyear extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('academicyear_model');
        if (!$this->checkAccess('setup.academicyear')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.academicyear';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
           $data['name'] = $name;
            $data['academicyearRecords'] = $this->academicyear_model->getAcademicyears($data);
            $this->loadViews("academicyear/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.academicyear';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $start_date = $this->security->xss_clean($this->input->post('start_date'));
            $end_date = $this->security->xss_clean($this->input->post('end_date'));
            $data = array(
                'name' => $name,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'status' => 1,
            );
            $this->academicyear_model->addAcademicyear($data);
            redirect('/setup/academicyear/list');
        }
        $this->loadViews("academicyear/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.academicyear';
        if ($id == null) {
            redirect('/setup/academicyear/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $start_date = $this->security->xss_clean($this->input->post('start_date'));
            $end_date = $this->security->xss_clean($this->input->post('end_date'));
            $data = array(
                'name' => $name,
                'start_date' => $start_date,
                'end_date' => $end_date,
            );
            $this->academicyear_model->editAcademicyear($data, $id);
            redirect('/setup/academicyear/list');
        }
        $data['academicyearInfo'] = $this->academicyear_model->getAcademicyear($id);
        $this->loadViews("academicyear/edit", $this->global, $data, NULL);
    }
}