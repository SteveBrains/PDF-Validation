<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Fee extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('candidate_model');
        $this->load->library('excel');
        $this->isLoggedIn();
    }

    function index()
    {
        $student = $this->candidate_model->getStudent($_SESSION['userId']);
        $data['fee'] = $this->candidate_model->getFeeStructure($student->course_id, $student->discipline_id, $student->caste, $student->gender);
        // echo "<pre>";print_r($data);die;
        $this->loadViews("fee/index", $this->global, $data, NULL);
    }
}
