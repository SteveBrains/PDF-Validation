<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Batch extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('batch_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('shortterm.batch')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'shortterm.batch';
    }

    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['batchList'] = $this->batch_model->getAll();
        $this->loadViews("batch/list", $this->global, $data, NULL);
    }

    function add()
    {
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $start_date = $this->security->xss_clean($this->input->post('start_date'));
            $end_date = $this->security->xss_clean($this->input->post('end_date'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'course_id' => $course_id,
                'status' => $status,
            );
            $result = $this->batch_model->addBatch($data);
            redirect('/examination/batch/list');
        }
        $data['courseList'] = $this->batch_model->getAllCourse();
        $this->loadViews("batch/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/batch/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $start_date = $this->security->xss_clean($this->input->post('start_date'));
            $end_date = $this->security->xss_clean($this->input->post('end_date'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'course_id' => $course_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'status' => $status,
            );
            $result = $this->batch_model->editBatch($data, $id);
            redirect('/examination/batch/list');
        }
        $data['batch'] = $this->batch_model->getBatch($id);
        $data['courseList'] = $this->batch_model->getAllCourse();
        $this->loadViews("batch/edit", $this->global, $data, NULL);
    }
    function tag($id = NULL)
    {
         if ($id == null) {
            redirect('/examination/batch/list');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'candidate_id' => $candidate,
                    'batch_id' => $id,
                    'status' => 'Active',
                );
                $result = $this->batch_model->tagStudents($data);
            }
        }
        $data['batch_id'] = $id;
        $data['studentlist'] = $this->batch_model->getCourses($id);
        $this->loadViews("batch/tag", $this->global, $data, NULL);
    }
    function view($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/batch/list');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'status' => 'Inactive',
                );
                $result = $this->batch_model->unTagStudents($data, $candidate);
            }
            redirect('/examination/batch/list');
        }
        $candidates = $this->batch_model->getTaggedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("batch/view", $this->global, $data, NULL);
    }
    function marks($id = NULL)
    {
        if ($id == null) {
            redirect('/examination/batch/list');
        }
        $candidates = $this->batch_model->getTaggedCandidates($id);
        $data['candidates'] = $candidates;
        $data['batch_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("batch/marks", $this->global, $data, NULL);
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
            $result = $this->batch_model->updateMarks($data, $id);
            redirect('/examination/batch/list');
        }
        $this->loadViews("batch/entry", $this->global, $data, NULL);
    }
}
