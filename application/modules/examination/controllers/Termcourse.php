<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Termcourse extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('termcourse_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('shortterm.course')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'shortterm.course';
    }

    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['termcourseList'] = $this->termcourse_model->getAll();
        $this->loadViews("termcourse/list", $this->global, $data, NULL);
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
            $result = $this->termcourse_model->addTermcourse($data);
            redirect('/examination/termcourse/list');
        } 
        $this->loadViews("termcourse/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/termcourse/list');
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
            $result = $this->termcourse_model->editTermcourse($data, $id);
            redirect('/examination/termcourse/list');
        }
        $data['termcourse'] = $this->termcourse_model->getTermcourse($id);
        $this->loadViews("termcourse/edit", $this->global, $data, NULL);
    }
    function tag($id = NULL)
    {
         if ($id == null) {
            redirect('/examination/termcourse/list');
        }
        if ($this->input->post()) {

            $start_date = $this->security->xss_clean($this->input->post('start_date'));
            $end_date = $this->security->xss_clean($this->input->post('end_date'));
            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'candidate_id' => $candidate,
                    'course_id' => $id,
                    'status' => 'Active',
                );
                $result = $this->termcourse_model->tagStudents($data);
            }
        }
        $data['course_id'] = $id;
        $data['studentlist'] = $this->termcourse_model->getCourses($id);
        $this->loadViews("termcourse/tag", $this->global, $data, NULL);
    }
    function view($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/termcourse/list');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'status' => 'Inactive',
                );
                $result = $this->termcourse_model->unTagStudents($data, $candidate);
            }
            redirect('/examination/termcourse/list');
        }
        $candidates = $this->termcourse_model->getTaggedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("termcourse/view", $this->global, $data, NULL);
    }
    function marks($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/termcourse/list');
        }
        $candidates = $this->termcourse_model->getTaggedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("termcourse/marks", $this->global, $data, NULL);
    }
    function entry($id = NULL)
    {
        
        if ($this->input->post()) {

            $marks = $this->security->xss_clean($this->input->post('marks'));
            $grade = $this->security->xss_clean($this->input->post('grade'));
            $data = array(
                'marks' => $marks,
                'grade' => $grade,
            );
            $result = $this->termcourse_model->updateMarks($data, $id);
            redirect('/examination/termcourse/list');
        }
        $this->loadViews("termcourse/entry", $this->global, $data, NULL);
    }
    
}
