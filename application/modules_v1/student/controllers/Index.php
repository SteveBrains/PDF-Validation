<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Index extends BaseController
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
        $data['subjectList'] = $this->candidate_model->getSubjects($_SESSION['userId'], $_SESSION['college_id'], $_SESSION['semester_id'], $_SESSION['course_id']);
        $data['optionalSubjectList'] = $this->candidate_model->getStudentOptionalSubjects($_SESSION['userId']);
        // echo "<pre>";print_r($data);die;
        $this->loadViews("index/subjects", $this->global, $data, NULL);
    }
    function optional()
    { 
        if ($this->input->post()) {

            $subjects = $this->security->xss_clean($this->input->post('subjects'));
            foreach ($subjects as $row) {
                $data = array(
                    "subject_id" => $row,
                    "student_id" => $_SESSION['userId'],
                    "status" => 0
                );
                $this->candidate_model->addStudentSubject($data);
            }
        }
        $data['subjectList'] = $this->candidate_model->getOptionalSubjects($_SESSION['userId'], $_SESSION['college_id'], $_SESSION['semester_id'], $_SESSION['course_id']);
        // echo "<pre>";print_r($data);die;
        $this->loadViews("index/optional", $this->global, $data, NULL);
    }
    function placed()
    {
        if (!$this->checkAccess('student.placedstudent')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'student.placedstudent';
        $data['candidateList'] = $this->candidate_model->getPlacedStudents();
        $this->loadViews("candidate/candidates", $this->global, $data, NULL);
    }
    function add()
    {

        $this->global['code'] = 'student.candidate';
        if ($this->input->post()) {

            $name = $this->security->xss_clean($this->input->post('name'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $bank_name = $this->security->xss_clean($this->input->post('bank_name'));
            $account_number = $this->security->xss_clean($this->input->post('account_number'));
            $education = $this->security->xss_clean($this->input->post('education'));
            // $rv_cutoff = $this->security->xss_clean($this->input->post('rv_cutoff'));
            $me_cutoff = $this->security->xss_clean($this->input->post('me_cutoff'));
            $be_cutoff = $this->security->xss_clean($this->input->post('be_cutoff'));
            $puc_cutoff = $this->security->xss_clean($this->input->post('puc_cutoff'));
            $sslc_cutoff = $this->security->xss_clean($this->input->post('sslc_cutoff'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $me_college = $this->security->xss_clean($this->input->post('me_college'));
            $be_college = $this->security->xss_clean($this->input->post('be_college'));
            $puc_college = $this->security->xss_clean($this->input->post('puc_college'));
            $sslc_college = $this->security->xss_clean($this->input->post('sslc_college'));
            $puc_type = $this->security->xss_clean($this->input->post('puc_type'));
            $graduation_type = $this->security->xss_clean($this->input->post('graduation_type'));
            // $discipline = $this->security->xss_clean($this->input->post('discipline'));
            // $domain = $this->security->xss_clean($this->input->post('domain'));
            $caste = $this->security->xss_clean($this->input->post('caste'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $religion = $this->security->xss_clean($this->input->post('religion'));
            $disability_type = $this->security->xss_clean($this->input->post('disability_type'));
            $image = $this->security->xss_clean($this->input->post('image'));
            $resume = $this->security->xss_clean($this->input->post('resume'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $address1 = $this->security->xss_clean($this->input->post('address1'));
            $zip = $this->security->xss_clean($this->input->post('zip'));
            $country = $this->security->xss_clean($this->input->post('country'));
            $state = $this->security->xss_clean($this->input->post('state'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $job_role_id = $this->security->xss_clean($this->input->post('job_role_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $registration_number = $this->security->xss_clean($this->input->post('registration_number'));
            $fee_paid = $this->security->xss_clean($this->input->post('fee_paid'));
            // $discipline = serialize($discipline);
            // $domain = serialize($domain);
            $config = array(
                'upload_path' => "./assets/resources/",
                'allowed_types' => '*',
                'overwrite' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['image']['tmp_name']) {
                if ($this->upload->do_upload('image')) {
                    $data = $this->upload->data();
                    $image = $data['file_name'];
                } else {
                    $image = '';
                }
            } else {
                $image = '';
            }
            if ($_FILES['resume']['tmp_name']) {
                if ($this->upload->do_upload('resume')) {
                    $data = $this->upload->data();
                    $resume = $data['file_name'];
                } else {
                    $resume = '';
                }
            } else {
                $resume = '';
            }
            if ($_FILES['sslc_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('sslc_marks_card')) {
                    $data = $this->upload->data();
                    $sslc_marks_card = $data['file_name'];
                } else {
                    $sslc_marks_card = '';
                }
            } else {
                $sslc_marks_card = '';
            }
            if ($_FILES['puc_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('puc_marks_card')) {
                    $data = $this->upload->data();
                    $puc_marks_card = $data['file_name'];
                } else {
                    $puc_marks_card = '';
                }
            } else {
                $puc_marks_card = '';
            }
            if ($_FILES['be_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('be_marks_card')) {
                    $data = $this->upload->data();
                    $be_marks_card = $data['file_name'];
                } else {
                    $be_marks_card = '';
                }
            } else {
                $be_marks_card = '';
            }
            if ($_FILES['me_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('me_marks_card')) {
                    $data = $this->upload->data();
                    $me_marks_card = $data['file_name'];
                } else {
                    $me_marks_card = '';
                }
            } else {
                $me_marks_card = '';
            }
            if ($_FILES['fee_document']['tmp_name']) {
                if ($this->upload->do_upload('fee_document')) {
                    $data = $this->upload->data();
                    $fee_document = $data['file_name'];
                } else {
                    $fee_document = '';
                }
            } else {
                $fee_document = '';
            }
            $data = array(
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'dob' => $dob,
                'father_name' => $father_name,
                'bank_name' => $bank_name,
                'account_number' => $account_number,
                'education' => $education,
                // 'rv_cutoff' => $rv_cutoff,
                'me_cutoff' => $me_cutoff,
                'be_cutoff' => $be_cutoff,
                'puc_cutoff' => $puc_cutoff,
                'sslc_cutoff' => $sslc_cutoff,
                'me_year' => $me_year,
                'be_year' => $be_year,
                'puc_year' => $puc_year,
                'sslc_year' => $sslc_year,
                'me_college' => $me_college,
                'be_college' => $be_college,
                'puc_college' => $puc_college,
                'sslc_college' => $sslc_college,
                'puc_type' => $puc_type,
                'graduation_type' => $graduation_type,
                'sslc_marks_card' => $sslc_marks_card,
                'puc_marks_card' => $puc_marks_card,
                'be_marks_card' => $be_marks_card,
                'me_marks_card' => $me_marks_card,
                // 'discipline' => $discipline,
                // 'domain' => $domain,
                'caste' => $caste,
                'aadhar' => $aadhar,
                'religion' => $religion,
                'disability_type' => $disability_type,
                'image' => $image,
                'resume' => $resume,
                'address' => $address,
                'address1' => $address1,
                'zip' => $zip,
                'country' => $country,
                'state' => $state,
                'training_center_id' => $training_center_id,
                'job_role_id' => $job_role_id,
                'status' => $status,
                'course_id' => $course_id,
                'semester_id' => $semester_id,
                'registration_number' => $registration_number,
                'fee_paid' => $fee_paid,
                'fee_document' => $fee_document,
            );

            $result = $this->candidate_model->addCandidate($data);
            redirect('/placement/candidate/list');
        }
        $data['educations'] = $this->candidate_model->getEducations();
        $data['trainingcenterList'] = $this->candidate_model->getTrainingCenters();
        $data['jobroleList'] = $this->candidate_model->getJobRoles();
        $data['courseList'] = $this->candidate_model->getCourses();
        $this->loadViews("candidate/add", $this->global, $data, NULL);
    }

    function profile()
    {
        $id = $_SESSION['userId'];
        if ($id == null) {
            redirect('/');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $bank_name = $this->security->xss_clean($this->input->post('bank_name'));
            $account_number = $this->security->xss_clean($this->input->post('account_number'));
            $education = $this->security->xss_clean($this->input->post('education'));
            // $rv_cutoff = $this->security->xss_clean($this->input->post('rv_cutoff'));
            $me_cutoff = $this->security->xss_clean($this->input->post('me_cutoff'));
            $be_cutoff = $this->security->xss_clean($this->input->post('be_cutoff'));
            $puc_cutoff = $this->security->xss_clean($this->input->post('puc_cutoff'));
            $sslc_cutoff = $this->security->xss_clean($this->input->post('sslc_cutoff'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $me_college = $this->security->xss_clean($this->input->post('me_college'));
            $be_college = $this->security->xss_clean($this->input->post('be_college'));
            $puc_college = $this->security->xss_clean($this->input->post('puc_college'));
            $sslc_college = $this->security->xss_clean($this->input->post('sslc_college'));
            $puc_type = $this->security->xss_clean($this->input->post('puc_type'));
            $graduation_type = $this->security->xss_clean($this->input->post('graduation_type'));
            // $discipline = $this->security->xss_clean($this->input->post('discipline'));
            // $domain = $this->security->xss_clean($this->input->post('domain'));
            $caste = $this->security->xss_clean($this->input->post('caste'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $religion = $this->security->xss_clean($this->input->post('religion'));
            $disability_type = $this->security->xss_clean($this->input->post('disability_type'));
            $image = $this->security->xss_clean($this->input->post('image'));
            $resume = $this->security->xss_clean($this->input->post('resume'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $address1 = $this->security->xss_clean($this->input->post('address1'));
            $zip = $this->security->xss_clean($this->input->post('zip'));
            $country = $this->security->xss_clean($this->input->post('country'));
            $state = $this->security->xss_clean($this->input->post('state'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $job_role_id = $this->security->xss_clean($this->input->post('job_role_id'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $registration_number = $this->security->xss_clean($this->input->post('registration_number'));
            $fee_paid = $this->security->xss_clean($this->input->post('fee_paid'));
            $fee_paid = $this->security->xss_clean($this->input->post('fee_paid'));
            // $discipline = serialize($discipline);
            // $domain = serialize($domain);
            $image_value = $this->security->xss_clean($this->input->post('image_value'));
            $resume_value = $this->security->xss_clean($this->input->post('resume_value'));
            $sslc_marks_card_value = $this->security->xss_clean($this->input->post('sslc_marks_card_value'));
            $puc_marks_card_value = $this->security->xss_clean($this->input->post('puc_marks_card_value'));
            $be_marks_card_value = $this->security->xss_clean($this->input->post('be_marks_card_value'));
            $me_marks_card_value = $this->security->xss_clean($this->input->post('me_marks_card_value'));
            $fee_document_value = $this->security->xss_clean($this->input->post('fee_document_value'));
            $config = array(
                'upload_path' => "./assets/resources/",
                'allowed_types' => '*',
                'overwrite' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['image']['tmp_name']) {
                if ($this->upload->do_upload('image')) {
                    $data = $this->upload->data();
                    $image = $data['file_name'];
                } else {
                    $image = '';
                }
            } else {
                $image = $image_value;
            }
            if ($_FILES['resume']['tmp_name']) {
                if ($this->upload->do_upload('resume')) {
                    $data = $this->upload->data();
                    $resume = $data['file_name'];
                } else {
                    $resume = '';
                }
            } else {
                $resume = $resume_value;
            }
            if ($_FILES['sslc_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('sslc_marks_card')) {
                    $data = $this->upload->data();
                    $sslc_marks_card = $data['file_name'];
                } else {
                    $sslc_marks_card = '';
                }
            } else {
                $sslc_marks_card = $sslc_marks_card_value;
            }
            if ($_FILES['puc_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('puc_marks_card')) {
                    $data = $this->upload->data();
                    $puc_marks_card = $data['file_name'];
                } else {
                    $puc_marks_card = '';
                }
            } else {
                $puc_marks_card = $puc_marks_card_value;
            }
            if ($_FILES['be_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('be_marks_card')) {
                    $data = $this->upload->data();
                    $be_marks_card = $data['file_name'];
                } else {
                    $be_marks_card = '';
                }
            } else {
                $be_marks_card = $be_marks_card_value;
            }
            if ($_FILES['me_marks_card']['tmp_name']) {
                if ($this->upload->do_upload('me_marks_card')) {
                    $data = $this->upload->data();
                    $me_marks_card = $data['file_name'];
                } else {
                    $me_marks_card = '';
                }
            } else {
                $me_marks_card = $me_marks_card_value;
            }
            if ($_FILES['fee_document']['tmp_name']) {
                if ($this->upload->do_upload('fee_document')) {
                    $data = $this->upload->data();
                    $fee_document = $data['file_name'];
                } else {
                    $fee_document = '';
                }
            } else {
                $fee_document = $fee_document_value;
            }
            $data = array(
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'dob' => $dob,
                'father_name' => $father_name,
                'bank_name' => $bank_name,
                'account_number' => $account_number,
                'education' => $education,
                // 'rv_cutoff' => $rv_cutoff,
                'me_cutoff' => $me_cutoff,
                'be_cutoff' => $be_cutoff,
                'puc_cutoff' => $puc_cutoff,
                'sslc_cutoff' => $sslc_cutoff,
                'me_year' => $me_year,
                'be_year' => $be_year,
                'puc_year' => $puc_year,
                'sslc_year' => $sslc_year,
                'me_college' => $me_college,
                'be_college' => $be_college,
                'puc_college' => $puc_college,
                'sslc_college' => $sslc_college,
                'puc_type' => $puc_type,
                'graduation_type' => $graduation_type,
                'sslc_marks_card' => $sslc_marks_card,
                'puc_marks_card' => $puc_marks_card,
                'be_marks_card' => $be_marks_card,
                'me_marks_card' => $me_marks_card,
                // 'discipline' => $discipline,
                // 'domain' => $domain,
                'caste' => $caste,
                'aadhar' => $aadhar,
                'religion' => $religion,
                'disability_type' => $disability_type,
                'image' => $image,
                'resume' => $resume,
                'address' => $address,
                'address1' => $address1,
                'zip' => $zip,
                'country' => $country,
                'state' => $state,
                'training_center_id' => $training_center_id,
                'job_role_id' => $job_role_id,
                'status' => $status,
                'course_id' => $course_id,
                'semester_id' => $semester_id,
                'registration_number' => $registration_number,
                'fee_paid' => $fee_paid,
                'fee_document' => $fee_document,
            );

            $result = $this->candidate_model->editCandidate($data, $id);
            redirect('/student/index/profile');
        }
        $data['educations'] = $this->candidate_model->getEducations();
        $data['trainingcenterList'] = $this->candidate_model->getTrainingCenters();
        $data['jobroleList'] = $this->candidate_model->getJobRoles();
        $data['courseList'] = $this->candidate_model->getCourses();
        $candidate = $this->candidate_model->getCandidate($id);
        // if($candidate->discipline){
        //     $candidate->discipline = unserialize($candidate->discipline);
        // }else{
        //     $candidate->discipline = array();
        // }
        // if($candidate->domain){
        //     $candidate->domain = unserialize($candidate->domain);
        // }else{
        //     $candidate->domain = array();
        // }
        $data['candidate'] = $candidate;
        // echo "<pre>";print_r($candidate);die;
        $this->loadViews("index/edit", $this->global, $data, NULL);
    }

    function result()
    {
        $data = array();
        $student_id = $_SESSION['userId'];
        $course_id = $_SESSION['course_id'];
        $semester_id = $_SESSION['semester_id'];
        $subjects = $this->candidate_model->getSubjects($course_id, $semester_id);
        $studentList = $this->candidate_model->getStudentResult($course_id, $semester_id, $student_id);
        $data['studentList'] = $studentList;
        $data['subjects'] = $subjects;
        $data['course_id'] = $course_id;
        $data['semester_id'] = $semester_id;
        $this->loadViews("index/studentresult", $this->global, $data, NULL);
    }
    function resume()
    {
        $data = array();
        $this->loadViews("index/studentresume", $this->global, $data, NULL);
    }
    public function markscard($id)
    {
        $course_id = $_GET['course_id'];
        $semester_id = $_GET['semester_id'];
        $data['subjectList'] = $this->candidate_model->getStudentSubjectMarks($course_id, $semester_id, $id);
        $candidate = $this->candidate_model->getCandidate($id);
        $data['candidate'] = $candidate;
        $this->load->view("index/markscard", $data);
    }
}
