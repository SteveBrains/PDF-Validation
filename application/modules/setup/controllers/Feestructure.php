<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feestructure extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('feestructure_model');
        if (!$this->checkAccess('setup.feestructure')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.feestructure';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data['name'] = $name;
            $data['feestructureRecords'] = $this->feestructure_model->getFeestructures($data);
            $data['academicyears'] = $this->feestructure_model->getAcademicyears();
            $data['courses'] = $this->feestructure_model->getCourses();
            $data['disciplines'] = $this->feestructure_model->getDisciplines();
            $data['castes'] = $this->feestructure_model->getCastes();
            $this->loadViews("feestructure/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.feestructure';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $academicyear_id = $this->security->xss_clean($this->input->post('academicyear_id'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $discipline_id = $this->security->xss_clean($this->input->post('discipline_id'));
            $caste_id = $this->security->xss_clean($this->input->post('caste_id'));
            $gender = $this->security->xss_clean($this->input->post('gender'));
            $data = array(
                'name' => $name,
                'academicyear_id' => $academicyear_id,
                'course_id' => $course_id,
                'discipline_id' => $discipline_id,
                'caste_id' => $caste_id,
                'gender' => $gender,
                'status' => 1,
            );
            $id = $this->feestructure_model->addFeestructure($data);
            redirect('/setup/feestructure/edit/' . $id);
        }
        $data['academicyears'] = $this->feestructure_model->getAcademicyears();
        $data['courses'] = $this->feestructure_model->getCourses();
        $data['disciplines'] = $this->feestructure_model->getDisciplines();
        $data['castes'] = $this->feestructure_model->getCastes();

        $this->loadViews("feestructure/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.feestructure';
        if ($id == null) {
            redirect('/setup/feestructure/list');
        }
        if ($this->input->post()) {
            if (isset($_REQUEST['master'])) {
                $name = $this->security->xss_clean($this->input->post('name'));
                $academicyear_id = $this->security->xss_clean($this->input->post('academicyear_id'));
                $course_id = $this->security->xss_clean($this->input->post('course_id'));
                $discipline_id = $this->security->xss_clean($this->input->post('discipline_id'));
                $caste_id = $this->security->xss_clean($this->input->post('caste_id'));
                $gender = $this->security->xss_clean($this->input->post('gender'));
                $data = array(
                    'name' => $name,
                    'academicyear_id' => $academicyear_id,
                    'course_id' => $course_id,
                    'discipline_id' => $discipline_id,
                    'caste_id' => $caste_id,
                    'gender' => $gender,
                );
                $this->feestructure_model->editFeestructure($data, $id);
                redirect('/setup/feestructure/edit/' . $id);
            }
            if (isset($_REQUEST['detail'])) {
                $feeitem_id = $this->security->xss_clean($this->input->post('feeitem_id'));
                $fee = $this->security->xss_clean($this->input->post('fee'));
                $feestructure_id = $this->security->xss_clean($this->input->post('feestructure_id'));

                $data = array(
                    'feeitem_id' => $feeitem_id,
                    'fee' => $fee,
                    'feestructure_id' => $feestructure_id,
                );
                $this->feestructure_model->addFeestructureItem($data);
                redirect('/setup/feestructure/edit/' . $id);
            }
        }
        $data['feestructureInfo'] = $this->feestructure_model->getFeestructure($id);
        $data['academicyears'] = $this->feestructure_model->getAcademicyears();
        $data['courses'] = $this->feestructure_model->getCourses();
        $data['disciplines'] = $this->feestructure_model->getDisciplines();
        $data['castes'] = $this->feestructure_model->getCastes();
        $data['feeitems'] = $this->feestructure_model->getFeeItems($id);
        $data['feestructuredetails'] = $this->feestructure_model->getFeestructureDetails($id);
        $data['id'] = $id;
        $this->loadViews("feestructure/edit", $this->global, $data, NULL);
    }
    public function removeitem($id)
    {
        $this->feestructure_model->removeitem($id);
        redirect('/setup/feestructure/list');
    }
}
