<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Index (IndexController)
 * Index class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
require APPPATH . '/libraries/BaseController.php';

class Staffentry extends BaseController
{ 
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staffentry_model');
        $this->isLoggedIn();
    }
    function list()
    {
        $data['staffs'] = $this->staffentry_model->getStaffs();
        $this->loadViews("staffentry/list",  $data);
    }
    function add()
    {
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $caste = $this->security->xss_clean($this->input->post('caste'));
            $category = $this->security->xss_clean($this->input->post('category'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $zipcode = $this->security->xss_clean($this->input->post('zipcode'));
            $designation = $this->security->xss_clean($this->input->post('designation'));
            $post = $this->security->xss_clean($this->input->post('post'));
            $registration_number = $this->security->xss_clean($this->input->post('registration_number'));
            $highest_education = $this->security->xss_clean($this->input->post('highest_education'));
            $doj = $this->security->xss_clean($this->input->post('doj'));
            $sslc_college = $this->security->xss_clean($this->input->post('sslc_college'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $sslc_percentage = $this->security->xss_clean($this->input->post('sslc_percentage'));
            $puc_college = $this->security->xss_clean($this->input->post('puc_college'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $puc_percentage = $this->security->xss_clean($this->input->post('puc_percentage'));
            $be_college = $this->security->xss_clean($this->input->post('be_college'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $be_percentage = $this->security->xss_clean($this->input->post('be_percentage'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $employment_type = $this->security->xss_clean($this->input->post('employment_type'));
            $be_percentage = $this->security->xss_clean($this->input->post('be_percentage'));

            $config = array(
                'upload_path' => "./assets/resources/staff/",
                'allowed_types' => '*',
                'encrypt_name' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['photo']['tmp_name']) {
                if ($this->upload->do_upload('photo')) {
                    $data = $this->upload->data();
                    $photo = $data['file_name'];
                } else {
                    $photo = '';
                }
            } else {
                $photo = '';
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
            if ($_FILES['joining_certificate']['tmp_name']) {
                if ($this->upload->do_upload('joining_certificate')) {
                    $data = $this->upload->data();
                    $joining_certificate = $data['file_name'];
                } else {
                    $joining_certificate = '';
                }
            } else {
                $joining_certificate = '';
            }
            $data = array(
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'dob' => $dob,
                'father_name' => $father_name,
                'caste' => $caste,
                'category' => $category,
                'aadhar' => $aadhar,
                'photo' => $photo,
                'address' => $address,
                'zipcode' => $zipcode,
                'designation' => $designation,
                'post' => $post,
                'registration_number' => $registration_number,
                'highest_education' => $highest_education,
                'doj' => $doj,
                'sslc_college' => $sslc_college,
                'sslc_year' => $sslc_year,
                'sslc_marks_card' => $sslc_marks_card,
                'sslc_percentage' => $sslc_percentage,

                'puc_college' => $puc_college,
                'puc_year' => $puc_year,
                'puc_marks_card' => $puc_marks_card,
                'puc_percentage' => $puc_percentage,
                'be_college' => $be_college,
                'be_year' => $be_year,
                'be_marks_card' => $be_marks_card,
                'be_percentage' => $be_percentage,

                'training_center_id' => $training_center_id,
                'employment_type' => $employment_type,
                'joining_certificate' => $joining_certificate,
                'status' => 1,
            );

            $id = $this->staffentry_model->addStaffentry($data);
            redirect('/placement/staffentry/edit/' . $id);
        }
        $data['trainingcenterList'] = $this->staffentry_model->getTrainingCenters();
        $this->loadViews("staffentry/add",  $data);
    }
    function edit($id)
    {
        if ($id == null) {
            redirect('/placement/staffentry/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $caste = $this->security->xss_clean($this->input->post('caste'));
            $category = $this->security->xss_clean($this->input->post('category'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $zipcode = $this->security->xss_clean($this->input->post('zipcode'));
            $designation = $this->security->xss_clean($this->input->post('designation'));
            $post = $this->security->xss_clean($this->input->post('post'));
            $registration_number = $this->security->xss_clean($this->input->post('registration_number'));
            $highest_education = $this->security->xss_clean($this->input->post('highest_education'));
            $doj = $this->security->xss_clean($this->input->post('doj'));
            $sslc_college = $this->security->xss_clean($this->input->post('sslc_college'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $sslc_percentage = $this->security->xss_clean($this->input->post('sslc_percentage'));
            $puc_college = $this->security->xss_clean($this->input->post('puc_college'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $puc_percentage = $this->security->xss_clean($this->input->post('puc_percentage'));
            $be_college = $this->security->xss_clean($this->input->post('be_college'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $be_percentage = $this->security->xss_clean($this->input->post('be_percentage'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $employment_type = $this->security->xss_clean($this->input->post('employment_type'));
            $photo_value = $this->security->xss_clean($this->input->post('photo_value'));
            $sslc_marks_card_value = $this->security->xss_clean($this->input->post('sslc_marks_card_value'));
            $puc_marks_card_value = $this->security->xss_clean($this->input->post('puc_marks_card_value'));
            $be_marks_card_value = $this->security->xss_clean($this->input->post('be_marks_card_value'));
            $joining_certificate_value = $this->security->xss_clean($this->input->post('joining_certificate_value'));
            $config = array(
                'upload_path' => "./assets/resources/staff/",
                'allowed_types' => '*',
                'encrypt_name' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['photo']['tmp_name']) {
                if ($this->upload->do_upload('photo')) {
                    $data = $this->upload->data();
                    $photo = $data['file_name'];
                } else {
                    $photo = '';
                }
            } else {
                $photo = $photo_value;
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
            if ($_FILES['joining_certificate']['tmp_name']) {
                if ($this->upload->do_upload('joining_certificate')) {
                    $data = $this->upload->data();
                    $joining_certificate = $data['file_name'];
                } else {
                    $joining_certificate = '';
                }
            } else {
                $joining_certificate = $joining_certificate_value;
            }
            $data = array(
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'dob' => $dob,
                'father_name' => $father_name,
                'caste' => $caste,
                'category' => $category,
                'aadhar' => $aadhar,
                'photo' => $photo,
                'address' => $address,
                'zipcode' => $zipcode,
                'designation' => $designation,
                'post' => $post,
                'registration_number' => $registration_number,
                'highest_education' => $highest_education,
                'doj' => $doj,
                'sslc_college' => $sslc_college,
                'sslc_year' => $sslc_year,
                'sslc_marks_card' => $sslc_marks_card,
                'sslc_percentage' => $sslc_percentage,

                'puc_college' => $puc_college,
                'puc_year' => $puc_year,
                'puc_marks_card' => $puc_marks_card,
                'puc_percentage' => $puc_percentage,
                'be_college' => $be_college,
                'be_year' => $be_year,
                'be_marks_card' => $be_marks_card,
                'be_percentage' => $be_percentage,

                'training_center_id' => $training_center_id,
                'employment_type' => $employment_type,
                'joining_certificate' => $joining_certificate,
                'status' => 1,
            );
            $this->staffentry_model->updateStaffentry($data, $id);
        }
        $data['trainingcenterList'] = $this->staffentry_model->getTrainingCenters();
        $data['experiences'] = $this->staffentry_model->getExperiences($id);
        $data['graduations'] = $this->staffentry_model->getGraduations($id);
        $data['staff'] = $this->staffentry_model->getStaffentry($id);
        $data['id'] = $id;
        $this->loadViews("staffentry/edit",  $data);
    }
    function savegraduation()
    {
        if ($this->input->post()) {
            $college_name = $this->security->xss_clean($this->input->post('college_name'));
            $year = $this->security->xss_clean($this->input->post('year'));
            $percentage = $this->security->xss_clean($this->input->post('percentage'));
            $staff_id = $this->security->xss_clean($this->input->post('staff_id'));
            $config = array(
                'upload_path' => "./assets/resources/staff/",
                'allowed_types' => '*',
                'encrypt_name' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['marks_card']['tmp_name']) {
                if ($this->upload->do_upload('marks_card')) {
                    $data = $this->upload->data();
                    $marks_card = $data['file_name'];
                } else {
                    $marks_card = '';
                }
            } else {
                $marks_card = "";
            }
            $data = array(
                'college_name' => $college_name,
                'year' => $year,
                'percentage' => $percentage,
                'marks_card' => $marks_card,
                'staff_id' => $staff_id,
                'status'=>1
            );
            $this->staffentry_model->addStaffentryGraduation($data);
            redirect('/placement/staffentry/edit/'.$staff_id);
        }
    }
    function saveexperience()
    {
        if ($this->input->post()) {
            $organisation_name = $this->security->xss_clean($this->input->post('organisation_name'));
            $designation = $this->security->xss_clean($this->input->post('designation'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $from_date = $this->security->xss_clean($this->input->post('from_date'));
            $to_date = $this->security->xss_clean($this->input->post('to_date'));
            $salary = $this->security->xss_clean($this->input->post('salary'));
            $remarks = $this->security->xss_clean($this->input->post('remarks'));
            $staff_id = $this->security->xss_clean($this->input->post('staff_id'));
            $data = array(
                'organisation_name' => $organisation_name,
                'designation' => $designation,
                'address' => $address,
                'from_date' => $from_date,
                'to_date' => $to_date,
                'salary' => $salary,
                'remarks' => $remarks,
                'staff_id' => $staff_id,
                'status'=>1
            );
            $this->staffentry_model->addStaffentryExperience($data);
            redirect('/placement/staffentry/edit/'.$staff_id);
        }
    }
    function deleteexperience($id)
    {
        $delid = $_GET['delid'];
        $data = array(
            'status'=>0
        );
        $this->staffentry_model->updateStaffentryExperience($data,$delid);
        redirect('/placement/staffentry/edit/'.$id);

    }
    function deletegraduation($id)
    {
        $delid = $_GET['delid'];
        $data = array(
            'status'=>0
        );
        $this->staffentry_model->updateStaffentryGraduation($data,$delid);
        redirect('/placement/staffentry/edit/'.$id);

    }
}
