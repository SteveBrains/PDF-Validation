<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Semester extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('semester_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('examination.semester')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'examination.semester';
    }
    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['semesterList'] = $this->semester_model->getAll();
        $this->loadViews("semester/list", $this->global, $data, NULL);
    }
    function add()
    {
        if ($this->input->post()) {

            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'status' => $status,
            );

            $result = $this->semester_model->addSemester($data);
            redirect('/examination/semester/list');
        }

        $this->loadViews("semester/add", $this->global, $data, NULL);
    }
    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/semester/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'status' => $status,
            );

            $result = $this->semester_model->editSemester($data, $id);
            redirect('/examination/semester/list');
        }
        $data['semester'] = $this->semester_model->getSemester($id);
        $this->loadViews("semester/edit", $this->global, $data, NULL);
    }
}
