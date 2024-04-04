<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('subject_model');
        if (!$this->checkAccess('setup.subject')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.subject';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data['name'] = $name;
            $data['subjectRecords'] = $this->subject_model->getSubjects($data);
            $this->loadViews("subject/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.subject';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'type' => $type,
                'status' => 1,
            );
            $this->subject_model->addSubject($data);
            redirect('/setup/subject/list');
        }
        $this->loadViews("subject/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.subject';
        if ($id == null) {
            redirect('/setup/subject/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'type' => $type,
            );
            $this->subject_model->editSubject($data, $id);
            redirect('/setup/subject/list');
        }
        $data['subjectInfo'] = $this->subject_model->getSubject($id);
        $this->loadViews("subject/edit", $this->global, $data, NULL);
    }
    function course()
    {
        if (!$this->checkAccess('setup.subjecttagging')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'setup.subjecttagging';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['courseList'] = $this->subject_model->getAllCourse();
        $this->loadViews("subject/course", $this->global, $data, NULL);
    }
    function tag($id)
    {
        $this->global['code'] = 'setup.subjecttagging';

        if ($this->input->post()) {

            $subject = $this->security->xss_clean($this->input->post('subject'));
            $semester = $this->security->xss_clean($this->input->post('semester'));
            $data = array(
                'subject_id' => $subject,
                'semester_id' => $semester,
                'course_id' => $id,
                'status' => 1,
            );
            $result = $this->subject_model->addSubjectTagging($data);
            redirect('/setup/subject/tag/' . $id);
        }
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['semesterList'] = $this->subject_model->getAllSemester();
        $data['subjectList'] = $this->subject_model->getUntaggedSubjects($id);
        $data['taggedSubjects'] = $this->subject_model->getTaggedSemesters($id);
        // echo "<pre>";print_r($data);die;
        $this->loadViews("subject/tag", $this->global, $data, NULL);
    }
    public function removetag($id)
    {
        $this->subject_model->remove($id);
        redirect('/setup/subject/course');
    }
}