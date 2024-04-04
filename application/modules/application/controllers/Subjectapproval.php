<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Subjectapproval extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subject_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('application.subjectapproval')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $data['subjectList'] = $this->subject_model->getSubjects();
        $this->loadViews("subject/list", $this->global, $data, NULL);
    }
   
    function approve($id = NULL)
    {
        $data = array(
            'status' => 1
        );
        // echo $id;die;
        $result = $this->subject_model->editStudentSubject($data, $id);
        redirect('/application/subjectapproval/list');
    }
    function reject($id = NULL)
    {
        $data = array(
            'status' => 2
        );
        $result = $this->subject_model->editStudentSubject($data, $id);
        redirect('/application/subjectapproval/list');
    }
}
