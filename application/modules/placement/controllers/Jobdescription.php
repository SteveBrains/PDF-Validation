<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Jobdescription extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jobdescription_model');
        $this->isLoggedIn();
        
    }

    function list()
    {
        if (!$this->checkAccess('company.jobdescription')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.jobdescription';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getAll($data); 
        $this->loadViews("jobdescription/list", $this->global, $data, NULL);
    } 
    function selected()
    {
        if (!$this->checkAccess('company.offer')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.offer';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getAll($data);
        $this->loadViews("jobdescription/selected", $this->global, $data, NULL);
    }
    function approval()
    {
        if (!$this->checkAccess('company.approve')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.approve';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getApprovalItems($data);
        $this->loadViews("jobdescription/approve", $this->global, $data, NULL);
    }
    function approved()
    {
        if (!$this->checkAccess('company.tag')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.tag';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getApprovedItems($data);
        $this->loadViews("jobdescription/approved", $this->global, $data, NULL);
    }
    function tagged()
    {
        if (!$this->checkAccess('company.shortlist')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.shortlist';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getTaggedItems($data);
        $this->loadViews("jobdescription/tagged", $this->global, $data, NULL);
    }
    function shortlisted()
    {
        if (!$this->checkAccess('company.finalize')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.finalize';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getShortlistedItems($data);
        $this->loadViews("jobdescription/shortlisted", $this->global, $data, NULL);
    }
    function summary()
    {
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getApprovedItems($data);
        $this->loadViews("jobdescription/summary", $this->global, $data, NULL);
    }

    function completed()
    {
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getCompletedItems($data);
        $this->loadViews("jobdescription/completed", $this->global, $data, NULL);
    }
    function rejected()
    {
        if (!$this->checkAccess('company.rejected')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.rejected';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['company_id'] = $this->security->xss_clean($this->input->post('company_id'));
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['jobdescriptionList'] = $this->jobdescription_model->getRejectedItems($data);
        $this->loadViews("jobdescription/rejected", $this->global, $data, NULL);
    }

    function add()
    {
        if (!$this->checkAccess('company.jobdescription')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.jobdescription';
        if ($this->input->post()) {

            $title = $this->security->xss_clean($this->input->post('title'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $skills = $this->security->xss_clean($this->input->post('skills'));
            // $domain = $this->security->xss_clean($this->input->post('domain'));
            $openings = $this->security->xss_clean($this->input->post('openings'));
            // $rv_cutoff = $this->security->xss_clean($this->input->post('rv_cutoff'));
            // $me_cutoff = $this->security->xss_clean($this->input->post('me_cutoff'));
            $be_cutoff = $this->security->xss_clean($this->input->post('be_cutoff'));
            $puc_cutoff = $this->security->xss_clean($this->input->post('puc_cutoff'));
            $sslc_cutoff = $this->security->xss_clean($this->input->post('sslc_cutoff'));
            $qualification = $this->security->xss_clean($this->input->post('qualification'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $suggestions = $this->security->xss_clean($this->input->post('suggestions'));
            $test_location = $this->security->xss_clean($this->input->post('test_location'));
            $permanent = $this->security->xss_clean($this->input->post('permanent'));
            $agreement = $this->security->xss_clean($this->input->post('agreement'));
            $aptitude = $this->security->xss_clean($this->input->post('aptitude'));
            $technical = $this->security->xss_clean($this->input->post('technical'));
            $technical_interview = $this->security->xss_clean($this->input->post('technical_interview'));
            $hr_interview = $this->security->xss_clean($this->input->post('hr_interview'));
            $stipend = $this->security->xss_clean($this->input->post('stipend'));
            $salary = $this->security->xss_clean($this->input->post('salary'));
            $company_id = $this->security->xss_clean($this->input->post('company_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            // $domain = serialize($domain);

            $data = array(
                'title' => $title,
                'code' => $code,
                'type' => $type,
                'skills' => $skills,
                // 'domain' => $domain,
                'openings' => $openings,
                // 'rv_cutoff' => $rv_cutoff,
                // 'me_cutoff' => $me_cutoff,
                'be_cutoff' => $be_cutoff,
                'puc_cutoff' => $puc_cutoff,
                'sslc_cutoff' => $sslc_cutoff,
                'me_year' => $me_year,
                'be_year' => $be_year,
                'puc_year' => $puc_year,
                'sslc_year' => $sslc_year,
                'qualification' => $qualification,
                'suggestions' => $suggestions,
                'test_location' => $test_location,
                'permanent' => $permanent,
                'agreement' => $agreement,
                'aptitude' => $aptitude,
                'technical' => $technical,
                'technical_interview' => $technical_interview,
                'hr_interview' => $hr_interview,
                'stipend' => $stipend,
                'salary' => $salary,
                'company_id' => $company_id,
                'status' => $status, 
            );

            $result = $this->jobdescription_model->addJobdescription($data);
            redirect('/placement/jobdescription/list');
        }
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['educationList'] = $this->jobdescription_model->getEducations();
        $this->loadViews("jobdescription/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        if (!$this->checkAccess('company.jobdescription')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.jobdescription';
        if ($id == null) {
            redirect('/placement/jobdescription/list');
        }
        if ($this->input->post()) {

            $title = $this->security->xss_clean($this->input->post('title'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $skills = $this->security->xss_clean($this->input->post('skills'));
            // $domain = $this->security->xss_clean($this->input->post('domain'));
            $openings = $this->security->xss_clean($this->input->post('openings'));
            // $rv_cutoff = $this->security->xss_clean($this->input->post('rv_cutoff'));
            // $me_cutoff = $this->security->xss_clean($this->input->post('me_cutoff'));
            $be_cutoff = $this->security->xss_clean($this->input->post('be_cutoff'));
            $puc_cutoff = $this->security->xss_clean($this->input->post('puc_cutoff'));
            $sslc_cutoff = $this->security->xss_clean($this->input->post('sslc_cutoff'));
            $qualification = $this->security->xss_clean($this->input->post('qualification'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $suggestions = $this->security->xss_clean($this->input->post('suggestions'));
            $test_location = $this->security->xss_clean($this->input->post('test_location'));
            $permanent = $this->security->xss_clean($this->input->post('permanent'));
            $agreement = $this->security->xss_clean($this->input->post('agreement'));
            $aptitude = $this->security->xss_clean($this->input->post('aptitude'));
            $technical = $this->security->xss_clean($this->input->post('technical'));
            $technical_interview = $this->security->xss_clean($this->input->post('technical_interview'));
            $hr_interview = $this->security->xss_clean($this->input->post('hr_interview'));
            $stipend = $this->security->xss_clean($this->input->post('stipend'));
            $salary = $this->security->xss_clean($this->input->post('salary'));
            $company_id = $this->security->xss_clean($this->input->post('company_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            // $domain = serialize($domain);

            $data = array(
                'title' => $title,
                'code' => $code,
                'type' => $type,
                'skills' => $skills,
                // 'domain' => $domain,
                'openings' => $openings,
                // 'rv_cutoff' => $rv_cutoff,
                // 'me_cutoff' => $me_cutoff,
                'be_cutoff' => $be_cutoff,
                'puc_cutoff' => $puc_cutoff,
                'sslc_cutoff' => $sslc_cutoff,
                'me_year' => $me_year,
                'be_year' => $be_year,
                'puc_year' => $puc_year,
                'sslc_year' => $sslc_year,
                'qualification' => $qualification,
                'suggestions' => $suggestions,
                'test_location' => $test_location,
                'permanent' => $permanent,
                'agreement' => $agreement,
                'aptitude' => $aptitude,
                'technical' => $technical,
                'technical_interview' => $technical_interview,
                'hr_interview' => $hr_interview,
                'stipend' => $stipend,
                'salary' => $salary,
                'company_id' => $company_id,
                'status' => $status,
            );

            $result = $this->jobdescription_model->editJobdescription($data, $id);
            redirect('/placement/jobdescription/list');
        }
        $jobdescription = $this->jobdescription_model->getJobdescription($id);
     
        $data['jobdescription'] = $jobdescription;
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        $data['educationList'] = $this->jobdescription_model->getEducations();
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/edit", $this->global, $data, NULL);
    }
    function viewjob($id = NULL)
    {
        if (!$this->checkAccess('company.approve')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.approve';
        if ($id == null) {
            redirect('/placement/jobdescription/approval');
        }
        
        $jobdescription = $this->jobdescription_model->getJobdescription($id);
        
        $data['jobdescription'] = $jobdescription;
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        // echo "<pre>";print_r($data);die;
        $this->loadViews("jobdescription/viewjob", $this->global, $data, NULL);
    }
    function viewjobdescription($id = NULL)
    {
        if (!$this->checkAccess('company.approve')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.approve';
        if ($id == null) {
            redirect('/placement/jobdescription/approval');
        }
        
        $jobdescription = $this->jobdescription_model->getJobdescription($id);
        
        $data['jobdescription'] = $jobdescription;
        $data['companyList'] = $this->jobdescription_model->getCompanies();
        // echo "<pre>";print_r($data);die;
        $this->loadViews("jobdescription/viewjobdescription", $this->global, $data, NULL);
    }
    function tag($id = NULL)
    {
        if (!$this->checkAccess('company.tag')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.tag';
        if ($id == null) {
            redirect('/placement/jobdescription/list');
        }
        if ($this->input->post()) {

            // $me_cutoff = $this->security->xss_clean($this->input->post('me_cutoff'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $be_cutoff = $this->security->xss_clean($this->input->post('be_cutoff'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $puc_cutoff = $this->security->xss_clean($this->input->post('puc_cutoff'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $sslc_cutoff = $this->security->xss_clean($this->input->post('sslc_cutoff'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $skills = $this->security->xss_clean($this->input->post('skills'));
            // $domain = $this->security->xss_clean($this->input->post('domain'));
            $discipline = $this->security->xss_clean($this->input->post('discipline'));
            $education = $this->security->xss_clean($this->input->post('education'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $searchdata = array(
                // 'me_cutoff' => $me_cutoff,
                'me_year' => $me_year,
                'be_cutoff' => $be_cutoff,
                'be_year' => $be_year,
                'puc_cutoff' => $puc_cutoff,
                'puc_year' => $puc_year,
                'sslc_cutoff' => $sslc_cutoff,
                'sslc_year' => $sslc_year,
                'skills' => $skills,
                // 'domain' => $domain,
                'discipline' => $discipline,
                'education' => $education,
                'training_center_id' => $training_center_id,
                'course_id' => $course_id,
            );
            // echo "hi";die;
            $candidates = $this->jobdescription_model->filterCandidates($searchdata, $id);
        }
        $jobdescription = $this->jobdescription_model->getJobdescription($id);
        $data['jobdescription'] = $jobdescription;
       
        if (!$searchdata['discipline']) {
            $searchdata['discipline'] = array();
        }
        $data['searchdata'] = $searchdata;
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $data['trainingcenterlist'] = $this->jobdescription_model->getTrainingCenters();
        $data['courselist'] = $this->jobdescription_model->getCourses();
        $this->loadViews("jobdescription/tag", $this->global, $data, NULL);
    }
    function tagstudents()
    {
        if ($this->input->post()) {

            $job_id = $this->security->xss_clean($this->input->post('job_id'));
            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'jobdescription_id' => $job_id,
                    'candidate_id' => $candidate,
                    'status' => 'Active',
                );
                $result = $this->jobdescription_model->tagResumes($data);
            }
        }
        redirect('/placement/jobdescription/tag/' . $job_id);
    }
    function view($id = NULL)
    {
        if (!$this->checkAccess('company.tag')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.tag';
        if ($id == null) {
            redirect('/placement/jobdescription/approved');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'status' => 'Inactive',
                );
                $result = $this->jobdescription_model->unTagResumes($data, $candidate);
            }
            redirect('/placement/jobdescription/approved');
        }
        $candidates = $this->jobdescription_model->getTaggedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/view", $this->global, $data, NULL);
    }
    function viewshortlisted($id = NULL)
    {
        if (!$this->checkAccess('company.shortlist')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.shortlist';
        if ($id == null) {
            redirect('/placement/jobdescription/tagged');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'placement_status' => '',
                );
                $result = $this->jobdescription_model->unTagResumes($data, $candidate);
            }
            redirect('/placement/jobdescription/tagged');
        }
        $candidates = $this->jobdescription_model->getShortlistedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/viewshortlisted", $this->global, $data, NULL);
    }
    function viewfinalized($id = NULL)
    {
        if (!$this->checkAccess('company.finalize')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.finalize';
        if ($id == null) {
            redirect('/placement/jobdescription/shortlisted');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'placement_status' => 'Shortlisted',
                );
                $result = $this->jobdescription_model->unTagResumes($data, $candidate);
            }
            redirect('/placement/jobdescription/shortlisted');
        }
        $candidates = $this->jobdescription_model->getFinalizedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/viewfinalized", $this->global, $data, NULL);
    }
    function selectedcandidates($id = NULL)
    {
        if (!$this->checkAccess('company.offer')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.offer';
        if ($id == null) {
            redirect('/placement/jobdescription/selected');
        } 
        $candidates = $this->jobdescription_model->getSelectedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/selectedcandidates", $this->global, $data, NULL);
    }
    function offerletter($id = NULL)
    {
        if (!$this->checkAccess('company.offer')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.offer';
        if ($id == null) {
            redirect('/placement/jobdescription/selected');
        }
        if ($this->input->post()) {

            $joining_date = $this->security->xss_clean($this->input->post('joining_date'));

            $config = array(
                'upload_path' => "./assets/resources/",
                'allowed_types' => '*',
                'overwrite' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['offer_letter']['tmp_name']) {
                if ($this->upload->do_upload('offer_letter')) {
                    $data = $this->upload->data();
                    $offer_letter = $data['file_name'];
                } else {
                    $offer_letter = '';
                }
            } else {
                $offer_letter = '';
            }
            $data = array(
                'joining_date' => $joining_date,
                'offer_letter' => $offer_letter,
            );
            $result = $this->jobdescription_model->editJobdescriptionTag($data, $id);
            redirect('/placement/jobdescription/selected');
        }
        $candidates = $this->jobdescription_model->getSelectedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/offerletter", $this->global, $data, NULL);
    }
    function shortlist($id = NULL)
    {
        if (!$this->checkAccess('company.shortlist')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.shortlist';
        if ($id == null) {
            redirect('/placement/jobdescription/tagged');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'placement_status' => 'Shortlisted',
                );
                $result = $this->jobdescription_model->unTagResumes($data, $candidate);
            }
            redirect('/placement/jobdescription/tagged');
        }
        $candidates = $this->jobdescription_model->getNonShortlistedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/shortlist", $this->global, $data, NULL);
    }
    function approve($id = NULL)
    {
        if ($id == null) {
            redirect('/placement/jobdescription/list');
        }
        $data = array(
            'status' => 'Tag Candidates',
        );
        $result = $this->jobdescription_model->editJobdescription($data, $id);
        redirect('/placement/jobdescription/approval');
    }
    function tagsubmit($id = NULL)
    {
        if ($id == null) {
            redirect('/placement/jobdescription/approved');
        } 
        $data = array(
            'status' => 'Shortlist',
        );
        $result = $this->jobdescription_model->editJobdescription($data, $id);
        redirect('/placement/jobdescription/approved');
    }
    function shortlistsubmit($id = NULL)
    {
        if ($id == null) {
            redirect('/placement/jobdescription/tagged');
        }
        $data = array(
            'status' => 'Finalize',
        );
        $result = $this->jobdescription_model->editJobdescription($data, $id);
        redirect('/placement/jobdescription/tagged');
    }
    function finalsubmit($id = NULL)
    {
        if ($id == null) {
            redirect('/placement/jobdescription/shortlisted');
        }
        $data = array(
            'status' => 'Completed',
        );
        $result = $this->jobdescription_model->editJobdescription($data, $id);
        redirect('/placement/jobdescription/shortlisted');
    }
    function reject($id = NULL)
    {
        if ($id == null) {
            redirect('/placement/jobdescription/list');
        }
        $data = array(
            'status' => 'Rejected',
        );
        $result = $this->jobdescription_model->editJobdescription($data, $id);
        redirect('/placement/jobdescription/approval');
    }
    function finalize($id = NULL)
    {
        if (!$this->checkAccess('company.finalize')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'company.finalize';
        if ($id == null) {
            redirect('/placement/jobdescription/shortlisted');
        }
        if ($this->input->post()) {

            $tagged_candidates = $this->security->xss_clean($this->input->post('tagged_candidates'));
            foreach ($tagged_candidates as $candidate) {
                $data = array(
                    'placement_status' => 'Selected',
                );
                $result = $this->jobdescription_model->unTagResumes($data, $candidate);
            }
            // $data = array(
            //     'status' => 'Completed',
            // );
            // $result = $this->jobdescription_model->editJobdescription($data, $id);
            redirect('/placement/jobdescription/shortlisted');
        }
        $candidates = $this->jobdescription_model->getShortlistedCandidates($id);
        $data['candidates'] = $candidates;
        $data['job_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("jobdescription/finalize", $this->global, $data, NULL);
    }
}
