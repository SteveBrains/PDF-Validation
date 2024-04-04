<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Applicationfee extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('applicationfee_model');
        if (!$this->checkAccess('setup.applicationfee')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.applicationfee';
        try {
            $caste_id = $this->security->xss_clean($this->input->post('caste_id'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $data['caste_id'] = $caste_id;
            $data['type'] = $type;
            $data['castes'] = $this->applicationfee_model->getCastes();
            $data['applicationfeeRecords'] = $this->applicationfee_model->getApplicationfees($data);
            $this->loadViews("applicationfee/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.applicationfee';
        if ($this->input->post()) {
            // echo "<pre>";
            // print_r($this->input->post());
            // die;
            $ug = $this->security->xss_clean($this->input->post('ug'));
            $pg = $this->security->xss_clean($this->input->post('pg'));

            $this->applicationfee_model->clearTable();
            foreach ($ug as $key => $value) {
                $data = array(
                    'fee' => $value,
                    'type' => 'UG',
                    'caste_id' => $key,
                    'status' => 1,
                );
                $this->applicationfee_model->addApplicationfee($data);
            }
            foreach ($pg as $key => $value) {
                $data = array(
                    'fee' => $value,
                    'type' => 'PG',
                    'caste_id' => $key,
                    'status' => 1,
                );
                $this->applicationfee_model->addApplicationfee($data);
            }

            redirect('/setup/applicationfee/list');
        }
        $data['castes'] = $this->applicationfee_model->getCastes();

        $this->loadViews("applicationfee/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.applicationfee';
        if ($id == null) {
            redirect('/setup/applicationfee/list');
        }
        if ($this->input->post()) {
            $fee = $this->security->xss_clean($this->input->post('fee'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $caste_id = $this->security->xss_clean($this->input->post('caste_id'));

            $data = array(
                'fee' => $fee,
                'type' => $type,
                'caste_id' => $caste_id,
            );
            $this->applicationfee_model->editApplicationfee($data, $id);
            redirect('/setup/applicationfee/list');
        }
        $data['applicationfeeInfo'] = $this->applicationfee_model->getApplicationfee($id);
        $data['castes'] = $this->applicationfee_model->getCastes();

        $this->loadViews("applicationfee/edit", $this->global, $data, NULL);
    }
}
