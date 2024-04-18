<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Company extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('placement.company')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'placement.company';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $formData['status'] = $this->security->xss_clean($this->input->post('status'));
        $data['companyList'] = $this->company_model->getAll($formData);
        $data['searchParam'] = $formData;
        $this->loadViews("company/list", $this->global, $data, NULL);
    }
    function report()
    {
        if (!$this->checkAccess('report.cwise')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'report.cwise';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['companyList'] = $this->company_model->getAll();
        $this->loadViews("company/report", $this->global, $data, NULL);
    }
    function placements($id)
    {
        $this->global['code'] = 'placement.company';
        $data['placementList'] = $this->company_model->getJobDescriptionByCompany($id);
        $this->loadViews("company/placements", $this->global, $data, NULL);
    }
    function candidates($id)
    {
        $this->global['code'] = 'placement.company';
        $data['candidateList'] = $this->company_model->getCandidatesByJob($id);
        $this->loadViews("company/candidates", $this->global, $data, NULL);
    }

    function add()
    {
        $this->global['code'] = 'placement.company';
        if ($this->input->post()) {

            $name = $this->security->xss_clean($this->input->post('name'));
            $first_name = $this->security->xss_clean($this->input->post('first_name'));
            $last_name = $this->security->xss_clean($this->input->post('last_name'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $designation = $this->security->xss_clean($this->input->post('designation'));
            $url = $this->security->xss_clean($this->input->post('url'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array( 
                'name' => $name,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'mobile' => $mobile,
                'designation' => $designation,
                'url' => $url,
                'status' => $status,
            );
 
            $company_id = $this->company_model->addCompany($data);
            $userInfo = array(
                'email' => $email,
                'password' => md5($password),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile' => $mobile,
                'company_id' => $company_id,
                'role' => 4,
                'status' => 1,
            );
            $this->company_model->addUser($userInfo);
            redirect('/placement/company/list');
        } 

        $this->loadViews("company/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'placement.company';
        if ($id == null) {
            redirect('/placement/company/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $first_name = $this->security->xss_clean($this->input->post('first_name'));
            $last_name = $this->security->xss_clean($this->input->post('last_name'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $designation = $this->security->xss_clean($this->input->post('designation'));
            $url = $this->security->xss_clean($this->input->post('url'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'mobile' => $mobile,
                'designation' => $designation,
                'url' => $url,
                'status' => $status,
            );

            $result = $this->company_model->editCompany($data, $id);
            redirect('/placement/company/list');
        }
        $data['company'] = $this->company_model->getCompany($id);
        $this->loadViews("company/edit", $this->global, $data, NULL);
    }
}
