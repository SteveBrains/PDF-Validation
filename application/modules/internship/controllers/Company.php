<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Company extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('internship.company')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'internship.company';
    }

    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['companyList'] = $this->company_model->getAll();
        $this->loadViews("company/list", $this->global, $data, NULL);
    }

    function add()
    {
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

            $company_id = $this->company_model->addCompany($data);
           
            redirect('/internship/company/list');
        }

        $this->loadViews("company/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/internship/company/list');
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
            redirect('/internship/company/list');
        }
        $data['company'] = $this->company_model->getCompany($id);
        $this->loadViews("company/edit", $this->global, $data, NULL);
    }
    function students($id)
    {
        $data['studentList'] = $this->company_model->getCompanyStudents($id);
        $this->loadViews("company/students", $this->global, $data, NULL);
    }
}
