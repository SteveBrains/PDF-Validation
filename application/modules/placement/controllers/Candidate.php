<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Candidate extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('candidate_model');
        $this->load->library('excel');
        $this->isLoggedIn();
    }
 
    function list()
    {
        if (!$this->checkAccess('student.candidate')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'student.candidate';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['candidateList'] = $this->candidate_model->getAll();
        $this->loadViews("candidate/list", $this->global, $data, NULL); 
    } 
    function listAll()
    {
        if (!$this->checkAccess('student.candidate')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'student.candidate';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['candidateList'] = $this->candidate_model->listAll();
        $this->loadViews("candidate/list", $this->global, $data, NULL);  
    } 
    function markscard($id = NULL)
    {
        if ($id == null) {
            redirect('/placement/candidate/list');
        }
        if ($this->input->post()) {
            $config = array(
                'upload_path' => "./assets/resources/",
                'allowed_types' => '*',
                'overwrite' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['markscard']['tmp_name']) {
                if ($this->upload->do_upload('markscard')) {
                    $data = $this->upload->data();
                    $markscard = $data['file_name'];
                } else {
                    $markscard = '';
                }
            } else {
                $markscard = '';
            }
            $data = array(
                'markscard' => $markscard,
            );
        echo "<pre>";print_r($data);die;
        $result = $this->candidate_model->editCandidate($data, $id);
            redirect('/placement/candidate/list');
        }
        $data['candidate_id'] = $id;
        // echo "<pre>";print_r($jobdescription);die;
        $this->loadViews("candidate/markscard", $this->global, $data, NULL);
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
                'password' => md5($registration_number),
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

    function edit($id = NULL)
    {

        $this->global['code'] = 'student.candidate';
        if ($id == null) {
            redirect('/placement/candidate/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $bank_name = $this->security->xss_clean($this->input->post('bank_name'));
            $account_number = $this->security->xss_clean($this->input->post('account_number'));
            $religion = $this->security->xss_clean($this->input->post('religion'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $address1 = $this->security->xss_clean($this->input->post('address1'));
            $zip = $this->security->xss_clean($this->input->post('zip'));
            $registration_number = $this->security->xss_clean($this->input->post('registration_number'));
            $education = $this->security->xss_clean($this->input->post('education'));

            $sslc_college = $this->security->xss_clean($this->input->post('sslc_college'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $sslc_cutoff = $this->security->xss_clean($this->input->post('sslc_cutoff'));
            $sslc_marks_card_value = $this->security->xss_clean($this->input->post('sslc_marks_card_value'));

            $puc_type = $this->security->xss_clean($this->input->post('puc_type'));
            $puc_college = $this->security->xss_clean($this->input->post('puc_college'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $puc_cutoff = $this->security->xss_clean($this->input->post('puc_cutoff'));
            $puc_marks_card_value = $this->security->xss_clean($this->input->post('puc_marks_card_value'));
           
            $be_type = $this->security->xss_clean($this->input->post('be_type'));
            $be_college = $this->security->xss_clean($this->input->post('be_college'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $be_cutoff = $this->security->xss_clean($this->input->post('be_cutoff'));

            $me_type = $this->security->xss_clean($this->input->post('me_type'));
            $me_college = $this->security->xss_clean($this->input->post('me_college'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $me_cutoff = $this->security->xss_clean($this->input->post('me_cutoff'));
          
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));

            $image_value = $this->security->xss_clean($this->input->post('image_value'));
            $resume_value = $this->security->xss_clean($this->input->post('resume_value'));
            $caste_certificate_value = $this->security->xss_clean($this->input->post('caste_certificate_value'));
            $sslc_marks_card_value = $this->security->xss_clean($this->input->post('sslc_marks_card_value'));
            $puc_marks_card_value = $this->security->xss_clean($this->input->post('puc_marks_card_value'));
            $be_marks_card_value = $this->security->xss_clean($this->input->post('be_marks_card_value'));
            $me_marks_card_value = $this->security->xss_clean($this->input->post('me_marks_card_value'));
            $config = array(
                'upload_path' => "./assets/resources/candidates/",
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
            if ($_FILES['caste_certificate']['tmp_name']) {
                if ($this->upload->do_upload('caste_certificate')) {
                    $data = $this->upload->data();
                    $caste_certificate = $data['file_name'];
                } else {
                    $caste_certificate = '';
                }
            } else {
                $caste_certificate = $caste_certificate_value;
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
            redirect('/placement/candidate/list');
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
        $this->loadViews("candidate/edit", $this->global, $data, NULL);
    }
 
    function placements($id = NULL)
    {

        $this->global['code'] = 'student.candidate';
        $data['candidate'] = $this->candidate_model->getCandidate($id);
        $data['candidateList'] = $this->candidate_model->getCandidatePlacements($id);
        // echo "<pre>";print_r($data);die;
        $this->loadViews("candidate/placements", $this->global, $data, NULL);
    }
    function getJobrolesById()
    {
        $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
        $job_role_id = $this->security->xss_clean($this->input->post('job_role_id'));
        // echo $job_role_id;die;
        $jobroles = $this->candidate_model->getJobrolesById($training_center_id);
        $out_html = '<option value="">Select</option>';
        foreach ($jobroles as $row) {
            if ($job_role_id == $row->Id) {
                $out_html .= "<option value='" . $row->Id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->Id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    }
    function getSemestersById()
    {
        $course_id = $this->security->xss_clean($this->input->post('course_id'));
        $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
        // echo $job_role_id;die;
        $semesters = $this->candidate_model->getSemestersById($course_id);
        $out_html = '<option value="">Select</option>';
        foreach ($semesters as $row) {
            if ($semester_id == $row->Id) {
                $out_html .= "<option value='" . $row->Id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->Id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    }
    function getCandidatesById()
    {
        $course_id = $this->security->xss_clean($this->input->post('course_id'));
        $tcid = $this->security->xss_clean($this->input->post('tcid'));
        $candidate_id = $this->security->xss_clean($this->input->post('candidate_id'));
        // echo $job_role_id;die;
        $candidates = $this->candidate_model->getCandidatesById($course_id,$tcid);
        $out_html = '<option value="">Select</option>';
        foreach ($candidates as $row) {
            if ($candidate_id == $row->Id) {
                $out_html .= "<option value='" . $row->Id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->Id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    }
    function getSubjectsById()
    {
        $subject_id = $this->security->xss_clean($this->input->post('subject_id'));
        $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
        $course_id = $this->security->xss_clean($this->input->post('course_id'));
        // echo $job_role_id;die;
        $subjects = $this->candidate_model->getSubjectsById($course_id, $semester_id);
        $out_html = '<option value="">Select</option>';
        foreach ($subjects as $row) {
            if ($subject_id == $row->Id) {
                $out_html .= "<option value='" . $row->Id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->Id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    } 
    function import()
    {
        if (!$this->checkAccess('student.importstudent')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'student.importstudent';
        $data = array();
        if ($this->input->post()) {
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $from = $this->security->xss_clean($this->input->post('from'));
            if ($from == 'file') {
                if ($_FILES['students']['tmp_name'] != '') {
                    $objPHPExcel = PHPExcel_IOFactory::load($_FILES['students']['tmp_name']);
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    foreach ($cell_collection as $cell) {
                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = trim($objPHPExcel->getActiveSheet()->getCell($cell)->getValue());
                        if ($data_value != '') {
                            if ($row == 1) {
                                $header[$row][$column] = $data_value;
                            } else {
                                $values[$row][$column] = $data_value;
                            }
                        }
                    }
                    $duplicates = array();
                    foreach ($values as $key => $row) {
                        $email = $row['C'];
                        $studentrow = $this->candidate_model->getStudentByEmail($email);
                        if ($studentrow) {
                            array_push($duplicates, $row);
                            unset($values[$key]);
                        }
                    }
                    $data['header'] = $header;
                    $data['studentList'] = $values;
                    $data['studentListArray'] = htmlspecialchars(serialize($values));
                    $data['duplicates'] = $duplicates;
                    $data['course_id'] = $course_id;
                    $data['semester_id'] = $semester_id;
                }
                // echo "<pre>";print_r($this->session);die;   
            } else {
                $studentArray = unserialize($this->input->post('studentArray'));
                $course_id = $this->security->xss_clean($this->input->post('course_id'));
                $semester_id = $this->security->xss_clean($this->input->post('semester_id'));

                // echo "<pre>";print_r($studentArray);die;   
                if ($studentArray) {
                    foreach ($studentArray as $key => $row) {
                        // $state = $this->studentupload_model->searchState($row['E']);
                        // if ($state) {
                        //     $state_id = $state->id;
                        // } else {
                        //     $state_id = 0;
                        // }
                        // $district = $this->studentupload_model->searchDistrict($row['F']);
                        // if ($district) {
                        //     $district_id = $district->id;
                        // } else {
                        //     $district_id = 0;
                        // }
                        $insertdata = array(
                            "name" => $row['A'],
                            "mobile" => $row['B'],
                            "email" => $row['C'],
                            "dob" => $row['D'],
                            "father_name" => $row['E'],
                            "bank_name" => $row['F'],
                            "account_number" => $row['G'],
                            "aadhar" => $row['H'],
                            "religion" => $row['I'],
                            "caste" => $row['J'],
                            "disability_type" => $row['K'],
                            "address" => $row['L'],
                            "address1" => $row['M'],
                            "zip" => $row['N'],
                            "sslc_college" => $row['O'],
                            "sslc_year" => $row['P'],
                            "sslc_cutoff" => $row['Q'],
                            "puc_college" => $row['R'],
                            "puc_year" => $row['S'],
                            "puc_cutoff" => $row['T'],
                            "be_college" => $row['U'],
                            "be_year" => $row['V'],
                            "be_cutoff" => $row['W'],
                            "me_college" => $row['X'],
                            "me_year" => $row['Y'],
                            "me_cutoff" => $row['Z'],
                            "course_id" => $course_id,
                            "semester_id" => $semester_id,
                            "registration_number" => $row['AA'],
                            'password' => md5($row['AA']),
                            'status' => "Active",
                        );
                        if ($_SESSION['trainingcenter_id'] > 0) {
                            $insertdata['training_center_id'] = $_SESSION['trainingcenter_id'];
                        }
                        $this->candidate_model->addCandidate($insertdata);
                    }
                }
                redirect('/placement/candidate/list');
            }
        }
        $data['courseList'] = $this->candidate_model->getAllCourse();
        $this->loadViews("candidate/import", $this->global, $data, NULL);
    }
}
