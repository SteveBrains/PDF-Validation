<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feeitem extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('feeitem_model');
        if (!$this->checkAccess('setup.feeitem')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.feeitem';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data['name'] = $name;
            $data['feeitemRecords'] = $this->feeitem_model->getFeeitems($data);
            $this->loadViews("feeitem/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.feeitem';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data = array(
                'name' => $name,
                'status' => 1,
            );
            $this->feeitem_model->addFeeitem($data);
            redirect('/setup/feeitem/list');
        }
        $this->loadViews("feeitem/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.feeitem';
        if ($id == null) {
            redirect('/setup/feeitem/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data = array(
                'name' => $name,
            );
            $this->feeitem_model->editFeeitem($data, $id);
            redirect('/setup/feeitem/list');
        }
        $data['feeitemInfo'] = $this->feeitem_model->getFeeitem($id);
        $this->loadViews("feeitem/edit", $this->global, $data, NULL);
    }
}