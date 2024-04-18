<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Course extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('examination.course')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'examination.course';
    }

    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['courseList'] = $this->course_model->getAll();
        $this->loadViews("course/list", $this->global, $data, NULL);
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
            $result = $this->course_model->addCourse($data);
            redirect('/examination/course/list');
        } 
        $this->loadViews("course/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/course/list');
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
            $result = $this->course_model->editCourse($data, $id);
            redirect('/examination/course/list');
        }
        $data['course'] = $this->course_model->getCourse($id);
        $this->loadViews("course/edit", $this->global, $data, NULL);
    }
}
