<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Studentapplication extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('studentapplication_model');
        $this->isLoggedIn();
        if (!$this->checkAccess('application.application')) {
            $this->loadAccessRestricted();
        }
    }

    function list1()
    {
        $this->global['code'] = 'application.verify';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['course'] = $this->security->xss_clean($this->input->post('course'));
        $data['discipline'] = $this->security->xss_clean($this->input->post('discipline'));
        $data['applicationList'] = $this->studentapplication_model->getApprove1($data);
        $data['courses'] = $this->studentapplication_model->getCourses();
        $data['disciplines'] = $this->studentapplication_model->getDisciplines();
        $data['colleges'] = $this->studentapplication_model->getColleges();
        $this->loadViews("studentapplication/list1", $this->global, $data, NULL);
    }

    function view1($id = NULL)
    {
        if ($id == null) {
            redirect('/application/studentapplication/list1');
        }

        $data['application'] = $this->studentapplication_model->getApplication($id);
        $data['courses'] = $this->studentapplication_model->getCourses();
        $data['castes'] = $this->studentapplication_model->getCastes();
        $data['disciplines'] = $this->studentapplication_model->getDisciplines();
        $data['application'] = $this->studentapplication_model->getApplication($id);
        $data['colleges'] = $this->studentapplication_model->getColleges();

        $this->loadViews("studentapplication/view1", $this->global, $data, NULL);
    }
    function approve1($id = NULL)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->studentapplication_model->editApplication($data, $id);
        redirect('/application/studentapplication/list1');
    }
    function reject1($id = NULL)
    {
        $data = array(
            'status' => 4
        );
        $result = $this->studentapplication_model->editApplication($data, $id);
        redirect('/application/studentapplication/list1');
    }
    function list2()
    {
        $this->global['code'] = 'application.verified';
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['course'] = $this->security->xss_clean($this->input->post('course'));
        $data['discipline'] = $this->security->xss_clean($this->input->post('discipline'));
        $data['applicationList'] = $this->studentapplication_model->getApprove2($data);
        $data['courses'] = $this->studentapplication_model->getCourses();
        $data['disciplines'] = $this->studentapplication_model->getDisciplines();
        $data['colleges'] = $this->studentapplication_model->getColleges();
        $this->loadViews("studentapplication/list2", $this->global, $data, NULL);
    }

    function view2($id = NULL)
    {
        if ($id == null) {
            redirect('/application/studentapplication/list2');
        }

        $data['application'] = $this->studentapplication_model->getApplication($id);
        $data['courses'] = $this->studentapplication_model->getCourses();
        $data['castes'] = $this->studentapplication_model->getCastes();
        $data['disciplines'] = $this->studentapplication_model->getDisciplines();
        $data['application'] = $this->studentapplication_model->getApplication($id);
        $data['colleges'] = $this->studentapplication_model->getColleges();

        $this->loadViews("studentapplication/view2", $this->global, $data, NULL);
    }
    function reverify($id = NULL)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->studentapplication_model->editApplication($data, $id);
        redirect('/application/studentapplication/list2');
    }
    function approve2($id = NULL)
    {
        $data = array(
            'status' => 2
        );
        $result = $this->studentapplication_model->editApplication($data, $id);
        redirect('/application/studentapplication/list2');
    }
    function reject2($id = NULL)
    {
        $data = array(
            'status' => 4
        );
        $result = $this->studentapplication_model->editApplication($data, $id);
        redirect('/application/studentapplication/list3');
    }
    function approve3($id = NULL)
    {
        $data = array(
            'status' => 3
        );
        $result = $this->studentapplication_model->editApplication($data, $id);
    }
    function reject3($id = NULL)
    {
        $data = array(
            'status' => 4
        );
        $result = $this->studentapplication_model->editApplication($data, $id);
    }
    function list3()
    {
        $this->global['code'] = 'application.approval';
        $data['college'] = $this->security->xss_clean($this->input->post('college'));
        $data['course'] = $this->security->xss_clean($this->input->post('course'));
        $data['discipline'] = $this->security->xss_clean($this->input->post('discipline'));
        $data['applicationList'] = $this->studentapplication_model->getApprove3($data);
        $data['courses'] = $this->studentapplication_model->getCourses();
        $data['disciplines'] = $this->studentapplication_model->getDisciplines();
        $data['colleges'] = $this->studentapplication_model->getColleges();
        $this->loadViews("studentapplication/list3", $this->global, $data, NULL);
    }

    function view3($id = NULL)
    {
        if ($id == null) {
            redirect('/application/studentapplication/list3');
        }

        $data['application'] = $this->studentapplication_model->getApplication($id);
        $data['courses'] = $this->studentapplication_model->getCourses();
        $data['castes'] = $this->studentapplication_model->getCastes();
        $data['disciplines'] = $this->studentapplication_model->getDisciplines();
        $data['application'] = $this->studentapplication_model->getApplication($id);
        $data['colleges'] = $this->studentapplication_model->getColleges();

        $this->loadViews("studentapplication/view3", $this->global, $data, NULL);
    }
    function approveStudents()
    {
        if ($this->input->post()) {
            // echo "<pre>";
            // print_r($this->input->post());
            // die;
            $applications = $this->security->xss_clean($this->input->post('applications'));
            foreach ($applications as $row) {
                $application = $this->studentapplication_model->getApplication($row);
                // echo "<pre>";
                // print_r($application);
                // die;
                $availableseats1 =  $this->studentapplication_model->checkCollegeSeats($application->college1, $application->course_id, $application->discipline_id);
                $availableseats2 =  $this->studentapplication_model->checkCollegeSeats($application->college2, $application->course_id, $application->discipline_id);
                $availableseats3 =  $this->studentapplication_model->checkCollegeSeats($application->college3, $application->course_id, $application->discipline_id);
                if ($availableseats1 > 0) {
                    $data = array(
                        'status' => 3
                    );
                    $result = $this->studentapplication_model->editApplication($data, $row);
                    $insertdata = (array)$application;
                    $insertdata['password'] = md5($insertdata['aadhar']);
                    unset($insertdata['id']);
                    $student_id = $this->studentapplication_model->addStudent((array)$insertdata);
                    $semester_id = $this->studentapplication_model->getFirstSemester($application->course_id);
                    $data = array(
                        'college_id' => $application->college1,
                        'semester_id' => $semester_id,
                        'course_id' => $application->course_id,
                        'discipline_id' => $application->discipline_id,
                        'student_id' => $student_id,
                        'status' => 1
                    );
                    $student_id = $this->studentapplication_model->addCollegeStudent($data);
                } elseif ($availableseats2 > 0) {
                    $data = array(
                        'status' => 3
                    );
                    $result = $this->studentapplication_model->editApplication($data, $row);
                    $insertdata = (array)$application;
                    $insertdata['password'] = md5($insertdata['aadhar']);
                    unset($insertdata['id']);
                    $student_id = $this->studentapplication_model->addStudent((array)$insertdata);
                    $semester_id = $this->studentapplication_model->getFirstSemester($application->course_id);
                    $data = array(
                        'college_id' => $application->college2,
                        'semester_id' => $semester_id,
                        'course_id' => $application->course_id,
                        'discipline_id' => $application->discipline_id,
                        'student_id' => $student_id,
                        'status' => 1
                    );
                    $student_id = $this->studentapplication_model->addCollegeStudent($data);
                } elseif ($availableseats3 > 0) {
                    $data = array(
                        'status' => 3
                    );
                    $result = $this->studentapplication_model->editApplication($data, $row);
                    $insertdata = (array)$application;
                    $insertdata['password'] = md5($insertdata['aadhar']);
                    unset($insertdata['id']);
                    $student_id = $this->studentapplication_model->addStudent((array)$insertdata);
                    $semester_id = $this->studentapplication_model->getFirstSemester($application->course_id);
                    $data = array(
                        'college_id' => $application->college3,
                        'semester_id' => $semester_id,
                        'course_id' => $application->course_id,
                        'discipline_id' => $application->discipline_id,
                        'student_id' => $student_id,
                        'status' => 1
                    );
                    $student_id = $this->studentapplication_model->addCollegeStudent($data);
                }
            }
            redirect('/application/studentapplication/list3');
        }
    }
}
