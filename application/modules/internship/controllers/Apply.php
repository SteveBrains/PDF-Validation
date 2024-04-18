<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Apply extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('internship.apply')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'internship.apply';
    }

    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['termcourseList'] = $this->company_model->getAll();
        $this->loadViews("termcourse/list", $this->global, $data, NULL);
    }

    function tag()
    {
        if ($this->input->post()) {

            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $company_id = $this->security->xss_clean($this->input->post('company_id'));
            $searchdata = array(
                'training_center_id' => $training_center_id,
                'course_id' => $course_id,
                'company_id' => $company_id,
            );
            $candidates = $this->company_model->filterCandidates($searchdata);
        }
        
        $data['searchdata'] = $searchdata;
        $data['candidates'] = $candidates;
        // echo "<pre>";print_r($company);die;
        $data['trainingcenterlist'] = $this->company_model->getTrainingCenters();
        $data['courselist'] = $this->company_model->getCourses();
        $data['companyList'] = $this->company_model->getAll();
        $this->loadViews("apply/tag", $this->global, $data, NULL);
    }
    function tagstudents()
    {
        if ($this->input->post()) {
            $company_id = $this->security->xss_clean($this->input->post('company_id'));
            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'company_id' => $company_id,
                    'candidate_id' => $candidate,
                    'status' => 'Active',
                );
                $result = $this->company_model->tagStudents($data);
            }
        }
        redirect('/internship/apply/tag');
    }
}
