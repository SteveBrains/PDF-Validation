<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Trainingcenter extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('trainingcenter_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('setup.trainingcenter')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.trainingcenter';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['trainingcenterList'] = $this->trainingcenter_model->getAll();
        $this->loadViews("trainingcenter/list", $this->global, $data, NULL);
    }

    function report()
    {
        if (!$this->checkAccess('report.twise')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'report.twise';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['trainingcenterList'] = $this->trainingcenter_model->getAll();
        $this->loadViews("trainingcenter/report", $this->global, $data, NULL);
    }
    function placements($id)
    {
        $this->global['code'] = 'setup.trainingcenter';
        $data['candidateList'] = $this->trainingcenter_model->getPlacedStudentsByTrainingCenter($id);
        $this->loadViews("trainingcenter/candidates", $this->global, $data, NULL);
    }
    function add()
    {
        $this->global['code'] = 'setup.trainingcenter';
        if ($this->input->post()) {

            $name = $this->security->xss_clean($this->input->post('name'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'status' => $status,
            );

            $result = $this->trainingcenter_model->addTrainingcenter($data);
            redirect('/placement/trainingcenter/list');
        }
        $this->loadViews("trainingcenter/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.trainingcenter';
        if ($id == null) {
            redirect('/placement/trainingcenter/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'status' => $status,
            );

            $result = $this->trainingcenter_model->editTrainingcenter($data, $id);
            redirect('/placement/trainingcenter/list');
        }
        $data['trainingcenter'] = $this->trainingcenter_model->getTrainingcenter($id);
        $data['jobroles'] = $this->trainingcenter_model->getAllJobroles();
        $data['taggedjobroles'] = $this->trainingcenter_model->getTaggedJobroles($id);
        $this->loadViews("trainingcenter/edit", $this->global, $data, NULL);
    }
    function editjobrole()
    {
        $this->global['code'] = 'setup.trainingcenter';
        if ($this->input->post()) {

            $id_jobrole = $this->security->xss_clean($this->input->post('id_jobrole'));
            $id_trainingcenter = $this->security->xss_clean($this->input->post('id_trainingcenter'));
            $data = array(
                'id_jobrole' => $id_jobrole,
                'id_trainingcenter' => $id_trainingcenter,
                'status' => 1,
            );
            $result = $this->trainingcenter_model->tagJobRole($data);
        }
    }
    function remove($id_jobrole, $id_trainingcenter)
    {
        $this->trainingcenter_model->removeJobRole($id_jobrole, $id_trainingcenter);
        redirect('/placement/trainingcenter/edit/' . $id_trainingcenter);
    }
}
