<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Discipline extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('discipline_model');
        if (!$this->checkAccess('setup.discipline')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.discipline';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data['name'] = $name;
            $data['disciplineRecords'] = $this->discipline_model->getDisciplines($data);
            $this->loadViews("discipline/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.discipline';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $data = array(
                'name' => $name,
                'course_id' => $course_id,
                'status' => 1,
            );
            $this->discipline_model->addDiscipline($data);
            redirect('/setup/discipline/list');
        }
        $data['courses'] = $this->discipline_model->getCourses();
        $this->loadViews("discipline/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.discipline';
        if ($id == null) {
            redirect('/setup/discipline/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $data = array(
                'name' => $name,
                'course_id' => $course_id,
            );
            $this->discipline_model->editDiscipline($data, $id);
            redirect('/setup/discipline/list');
        }
        $data['disciplineInfo'] = $this->discipline_model->getDiscipline($id);
        $data['courses'] = $this->discipline_model->getCourses();
        $this->loadViews("discipline/edit", $this->global, $data, NULL);
    }
}
