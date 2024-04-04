<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('course_model');
        if (!$this->checkAccess('setup.course')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.course';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $data['name'] = $name;
            $data['code'] = $code;
            $data['courseRecords'] = $this->course_model->getCourses($data);
            $this->loadViews("course/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.course';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'status' => 1,
            );
            $this->course_model->addCourse($data);
            redirect('/setup/course/list');
        }
        $this->loadViews("course/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.course';
        if ($id == null) {
            redirect('/setup/course/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $data = array(
                'name' => $name,
                'code' => $code,
            );
            $this->course_model->editCourse($data, $id);
            redirect('/setup/course/list');
        }
        $data['courseInfo'] = $this->course_model->getCourse($id);
        $this->loadViews("course/edit", $this->global, $data, NULL);
    }
}
