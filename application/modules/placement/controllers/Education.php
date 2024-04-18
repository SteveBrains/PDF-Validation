<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Education extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('education_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('setup.education')) {
            $this->loadAccessRestricted();
        }
    }
 
    function list()
    {
        $this->global['code'] = 'setup.education';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['educationList'] = $this->education_model->getAll();
        $this->loadViews("education/list", $this->global, $data, NULL);
    } 
    function lecturers()
    { 
        $this->global['code'] = 'setup.lecturer';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['lecturerList'] = $this->education_model->getAllLecturers();
        $this->loadViews("education/lecturer", $this->global, $data, NULL);
    } 
    
    function add()
    {
        $this->global['code'] = 'setup.education';
        if ($this->input->post()) {

            $name = $this->security->xss_clean($this->input->post('name'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'status' => $status,
            );

            $result = $this->education_model->addEducation($data);
            redirect('/placement/education/list');
        }
        $this->loadViews("education/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.education';
        if ($id == null) {
            redirect('/placement/education/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'status' => $status,
            );

            $result = $this->education_model->editEducation($data, $id);
            redirect('/placement/education/list');
        }
        $data['education'] = $this->education_model->getEducation($id);
        $this->loadViews("education/edit", $this->global, $data, NULL);
    }
}
