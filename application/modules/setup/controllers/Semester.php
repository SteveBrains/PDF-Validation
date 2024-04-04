<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Semester extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('semester_model');
        if (!$this->checkAccess('setup.semester')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.semester';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data['name'] = $name;
            $data['semesterRecords'] = $this->semester_model->getSemesters($data);
            $this->loadViews("semester/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.semester';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $order = $this->security->xss_clean($this->input->post('order'));
            $data = array(
                'name' => $name,
                'order' => $order,
                'status' => 1,
            );
            $this->semester_model->addSemester($data);
            redirect('/setup/semester/list');
        }
        $this->loadViews("semester/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.semester';
        if ($id == null) {
            redirect('/setup/semester/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $order = $this->security->xss_clean($this->input->post('order'));
            $data = array(
                'order' => $order,
                'name' => $name,
            );
            $this->semester_model->editSemester($data, $id);
            redirect('/setup/semester/list');
        }
        $data['semesterInfo'] = $this->semester_model->getSemester($id);
        $this->loadViews("semester/edit", $this->global, $data, NULL);
    }
}
