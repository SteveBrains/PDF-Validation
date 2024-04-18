<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Index (IndexController)
 * Index class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Jobs extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('job_model');
    }

    function index()
    {
        $data['jobList'] = $this->job_model->getActiveJobs(); 
        // echo "<pre>";print_r($data);die;
        $this->load->view('jobs/index', $data);
    }
    function apply($id)
    {
        if ($this->input->post()) {
            $reg = $this->security->xss_clean($this->input->post('reg'));
            $candidate = $this->job_model->getStudent($reg);
            $job = $this->job_model->getJob($id);
            if ($candidate) {
                $data['candidate'] = $candidate;
                $data['job'] = $job;
                $this->load->view('jobs/apply', $data);
            } else {
                // $this->session->set_flashdata('error', 'Student Records Not Found');
                redirect('jobs/student/'.$id);
            }
        } else {
            $this->load->view('jobs/fetch');
        }
        // echo "<pre>";print_r($data);die;
    }
    function applyjob()
    {
        if ($this->input->post()) {
            $student_id = $this->security->xss_clean($this->input->post('student_id'));
            $job_id = $this->security->xss_clean($this->input->post('job_id'));
            $application = $this->job_model->getApplication($student_id, $job_id);
            if ($application) {
            } else {
                $insertdata = array(
                    'candidate_id' => $student_id,
                    'jobdescription_id' => $job_id,
                    'status' => 'Active'
                );
                $this->job_model->applyCandidate($insertdata);
            }

            redirect('jobs');
        }
        redirect('jobs');
    }
    function student($job_id)
    {

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

            $student_id = $this->job_model->addCandidate($data);
            $insertdata = array(
                'candidate_id' => $student_id,
                'jobdescription_id' => $job_id,
                'status' => 'Active'
            );
            $this->job_model->applyCandidate($insertdata);
            redirect('/');
        }
        $data['educations'] = $this->job_model->getEducations();
        $data['trainingcenterList'] = $this->job_model->getTrainingCenters();
        $data['jobroleList'] = $this->job_model->getJobRoles();
        $data['courseList'] = $this->job_model->getCourses();
        $data['job'] = $this->job_model->getJob($job_id);
        $this->load->view("jobs/student",  $data);
    }
    function shortterm()
    {

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

            $student_id = $this->job_model->addCandidate($data);
            
            redirect('/');
        }
        $data['educations'] = $this->job_model->getEducations();
        $data['trainingcenterList'] = $this->job_model->getTrainingCenters();
        $data['jobroleList'] = $this->job_model->getJobRoles();
        $data['courseList'] = $this->job_model->getShortCourses();
        $this->load->view("jobs/shortterm",  $data);
    }
    function getSemestersById()
    {
        $course_id = $this->security->xss_clean($this->input->post('course_id'));
        $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
        // echo $job_role_id;die;
        $semesters = $this->job_model->getSemestersById($course_id);
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
    function getSubjectsById()
    {
        $subject_id = $this->security->xss_clean($this->input->post('subject_id'));
        $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
        $course_id = $this->security->xss_clean($this->input->post('course_id'));
        // echo $job_role_id;die;
        $subjects = $this->job_model->getSubjectsById($course_id,$semester_id);
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
    function getJobrolesById()
    {
        $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
        $job_role_id = $this->security->xss_clean($this->input->post('job_role_id'));
        // echo $job_role_id;die;
        $jobroles = $this->job_model->getJobrolesById($training_center_id);
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
    function getCoursesById()
    {
        $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
        $course_id = $this->security->xss_clean($this->input->post('course_id'));
        // echo $job_role_id;die;
        $courses = $this->job_model->getCoursesById($training_center_id);
        $out_html = '<option value="">Select</option>';
        foreach ($courses as $row) {
            if ($course_id == $row->Id) {
                $out_html .= "<option value='" . $row->Id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->Id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    }       
}
