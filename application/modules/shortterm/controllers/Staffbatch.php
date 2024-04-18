<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Staffbatch extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staffbatch_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('shortterm.staffbatch')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'shortterm.staffbatch';
    }

    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['batchList'] = $this->staffbatch_model->getAll();
        $this->loadViews("staffbatch/list", $this->global, $data, NULL);
    } 

    function add()
    {
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $start_date = $this->security->xss_clean($this->input->post('start_date'));
            $end_date = $this->security->xss_clean($this->input->post('end_date'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $scheme_id = $this->security->xss_clean($this->input->post('scheme_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'course_id' => $course_id,
                'training_center_id' => $training_center_id,
                'scheme_id' => $scheme_id,
                'status' => $status,
                'type' => 2,
            );
            $result = $this->staffbatch_model->addBatch($data);
            redirect('/shortterm/staffbatch/list');
        }
        $data['courseList'] = $this->staffbatch_model->getAllCourse();
        $data['tcList'] = $this->staffbatch_model->getAllTc();
        $data['schemeList'] = $this->staffbatch_model->getAllShortScheme();
        $this->loadViews("staffbatch/add", $this->global, $data, NULL);
    }
  
    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/shortterm/staffbatch/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $start_date = $this->security->xss_clean($this->input->post('start_date'));
            $end_date = $this->security->xss_clean($this->input->post('end_date'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $scheme_id = $this->security->xss_clean($this->input->post('scheme_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'course_id' => $course_id,
                'training_center_id' => $training_center_id,
                'scheme_id' => $scheme_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'status' => $status,
            );
            $result = $this->staffbatch_model->editBatch($data, $id);
            redirect('/shortterm/staffbatch/list');
        }
        $data['batch'] = $this->staffbatch_model->getBatch($id);
        $data['courseList'] = $this->staffbatch_model->getAllCourse();
        $data['tcList'] = $this->staffbatch_model->getAllTc();
        $data['schemeList'] = $this->staffbatch_model->getAllShortScheme();
        $this->loadViews("staffbatch/edit", $this->global, $data, NULL);
    }
    function tag($id = NULL)
    {
         if ($id == null) {
            redirect('/shortterm/staffbatch/list');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'candidate_id' => $candidate,
                    'batch_id' => $id,
                    'status' => 'Active',
                );
                $result = $this->staffbatch_model->tagStudents($data);
            }
        }
        $data['batch_id'] = $id;
        $data['studentlist'] = $this->staffbatch_model->getCourses($id);
        // echo "<pre>";print_r($data);die;
        $this->loadViews("staffbatch/tag", $this->global, $data, NULL);
    }
    function view($id = NULL)
    {
        if ($id == null) {
            redirect('/shortterm/staffbatch/list');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'status' => 'Inactive',
                );
                $result = $this->staffbatch_model->unTagStudents($data, $candidate);
            }
            redirect('/shortterm/staffbatch/list');
        }
        $candidates = $this->staffbatch_model->getTaggedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("staffbatch/view", $this->global, $data, NULL);
    }
    function marks($id = NULL)
    {
        if ($id == null) {
            redirect('/shortterm/staffbatch/list');
        }
        $candidates = $this->staffbatch_model->getTaggedCandidates($id);
        $data['candidates'] = $candidates;
        $data['batch_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("staffbatch/marks", $this->global, $data, NULL);
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
            $result = $this->staffbatch_model->updateMarks($data, $id);
            redirect('/shortterm/staffbatch/list');
        }
        $this->loadViews("staffbatch/entry", $this->global, $data, NULL);
    }
}
