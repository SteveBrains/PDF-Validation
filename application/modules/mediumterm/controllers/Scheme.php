<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Scheme extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('scheme_model');
        $this->load->model('batch_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('mediumterm.scheme')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'mediumterm.scheme';
    }

    function list()
    {
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['schemeList'] = $this->scheme_model->getAll();
        $this->loadViews("scheme/list", $this->global, $data, NULL);
    }

    function add()
    {
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'training_center_id' => $training_center_id,
                'status' => $status,
            );
            $result = $this->scheme_model->addScheme($data);
            redirect('/mediumterm/scheme/list');
        }
        $data['tcList'] = $this->batch_model->getAllTc();
        $this->loadViews("scheme/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        if ($id == null) {
            redirect('/mediumterm/scheme/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'training_center_id' => $training_center_id,
                'status' => $status,
            );
            $result = $this->scheme_model->editScheme($data, $id);
            redirect('/mediumterm/scheme/list');
        }
        $data['scheme'] = $this->scheme_model->getScheme($id);
        $data['tcList'] = $this->batch_model->getAllTc();
        $this->loadViews("scheme/edit", $this->global, $data, NULL);
    }
}
