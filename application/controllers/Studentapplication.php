<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Index (IndexController)
 * Index class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Studentapplication extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_model');
    }

    function checkAadhar()
    {
        $aadhar = $_GET['aadhar'];
        $status =  $this->application_model->getStudentByAadhar($aadhar);
        $array = ['aadhar' => $status];
        echo json_encode($status);
    }

    function index()
    {
        if ($this->input->post()) {
            $type = $this->security->xss_clean($this->input->post('type'));
            $name = $this->security->xss_clean($this->input->post('name'));
            $mother_name = $this->security->xss_clean($this->input->post('mother_name'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $nationality = $this->security->xss_clean($this->input->post('nationality'));
            $gender = $this->security->xss_clean($this->input->post('gender'));
            $caste = $this->security->xss_clean($this->input->post('caste'));
            $religion = $this->security->xss_clean($this->input->post('religion'));
            $blood_group = $this->security->xss_clean($this->input->post('blood_group'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $marital_status = $this->security->xss_clean($this->input->post('marital_status'));
            $differently_abled = $this->security->xss_clean($this->input->post('differently_abled'));
            $differently_abled_type = $this->security->xss_clean($this->input->post('differently_abled_type'));
            $house_no_p = $this->security->xss_clean($this->input->post('house_no_p'));
            $village_p = $this->security->xss_clean($this->input->post('village_p'));
            $po_p = $this->security->xss_clean($this->input->post('po_p'));
            $zip_p = $this->security->xss_clean($this->input->post('zip_p'));
            $district_p = $this->security->xss_clean($this->input->post('district_p'));
            $state_p = $this->security->xss_clean($this->input->post('state_p'));
            $taluk_p = $this->security->xss_clean($this->input->post('taluk_p'));
            $house_no_c = $this->security->xss_clean($this->input->post('house_no_c'));
            $village_c = $this->security->xss_clean($this->input->post('village_c'));
            $po_c = $this->security->xss_clean($this->input->post('po_c'));
            $zip_c = $this->security->xss_clean($this->input->post('zip_c'));
            $district_c = $this->security->xss_clean($this->input->post('district_c'));
            $state_c = $this->security->xss_clean($this->input->post('state_c'));
            $taluk_c = $this->security->xss_clean($this->input->post('taluk_c'));
            $sslc_stream = $this->security->xss_clean($this->input->post('sslc_stream'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $sslc_name = $this->security->xss_clean($this->input->post('sslc_name'));
            $puc_type = $this->security->xss_clean($this->input->post('puc_type'));
            $puc_stream = $this->security->xss_clean($this->input->post('puc_stream'));
            $puc_name = $this->security->xss_clean($this->input->post('puc_name'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $college1 = $this->security->xss_clean($this->input->post('college1'));
            $college2 = $this->security->xss_clean($this->input->post('college2'));
            $college3 = $this->security->xss_clean($this->input->post('college3'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $discipline_id = $this->security->xss_clean($this->input->post('discipline_id'));
            $sslc_percentage = $this->security->xss_clean($this->input->post('sslc_percentage'));
            $puc_percentage = $this->security->xss_clean($this->input->post('puc_percentage'));

            $applicationCount =  $this->application_model->getApplicationCount();
            $config = array(
                'upload_path' => "./assets/resources/",
                'allowed_types' => '*',
                'encrypt_name' => TRUE,
            );
            $this->load->library('upload', $config);
            if ($_FILES['sslc_proof']['tmp_name']) {
                if ($this->upload->do_upload('sslc_proof')) {
                    $data = $this->upload->data();
                    $sslc_proof = $data['file_name'];
                } else {
                    $sslc_proof = '';
                }
            } else {
                $sslc_proof = '';
            }
            if ($_FILES['puc_proof']['tmp_name']) {
                if ($this->upload->do_upload('puc_proof')) {
                    $data = $this->upload->data();
                    $puc_proof = $data['file_name'];
                } else {
                    $puc_proof = '';
                }
            } else {
                $puc_proof = '';
            }
            $data = array(
                'type' => $type,
                'name' => $name,
                'mother_name' => $mother_name,
                'father_name' => $father_name,
                'dob' => $dob,
                'nationality' => $nationality,
                'gender' => $gender,
                'caste' => $caste,
                'religion' => $religion,
                'blood_group' => $blood_group,
                'aadhar' => $aadhar,
                'email' => $email,
                'mobile' => $mobile,
                'marital_status' => $marital_status,
                'differently_abled' => $differently_abled,
                'differently_abled_type' => $differently_abled_type,
                'house_no_p' => $house_no_p,
                'village_p' => $village_p,
                'po_p' => $po_p,
                'zip_p' => $zip_p,
                'district_p' => $district_p,
                'state_p' => $state_p,
                'taluk_p' => $taluk_p,
                'house_no_c' => $house_no_c,
                'village_c' => $village_c,
                'po_c' => $po_c,
                'zip_c' => $zip_c,
                'district_c' => $district_c,
                'state_c' => $state_c,
                'taluk_c' => $taluk_c,
                'sslc_stream' => $sslc_stream,
                'sslc_year' => $sslc_year,
                'sslc_name' => $sslc_name,
                'puc_type' => $puc_type,
                'puc_stream' => $puc_stream,
                'puc_name' => $puc_name,
                'puc_year' => $puc_year,
                'college1' => $college1,
                'college2' => $college2,
                'college3' => $college3,
                'course_id' => $course_id,
                'discipline_id' => $discipline_id,
                'sslc_percentage' => $sslc_percentage,
                'puc_percentage' => $puc_percentage,
                'puc_proof' => $puc_proof,
                'sslc_proof' => $sslc_proof,
                'application_number' => 'APPL' . date('Y') . sprintf("%'.05d", $applicationCount + 1),
                'status' => 0,
            );

            $student_id = $this->application_model->addApplication($data);
            redirect('/studentapplication/thanks/' . $student_id);
        }
        $data['courses'] = $this->application_model->getCourses();
        $data['castes'] = $this->application_model->getCastes();
        $data['universities'] = $this->application_model->getUniversities();
        $data['nationalities'] = $this->application_model->getNationalities();
        $data['districts'] = $this->application_model->getDistricts();
        $data['religions'] = $this->application_model->getReligions();
        $this->load->view("application/index",  $data);
    }
    function thanks($id)
    {

        $student = $this->application_model->getApplicationById($id);
        $message = "Name: " . $student->name . "<br>" . "Email: " . $student->email . "<br>" . "Phone: " . $student->mobile . "<br>" . "Application Number: " . $student->application_number . "<br>";
        $data['id'] = $id;
        $data['student'] = $student;
        $data['message'] = $message;
        $this->load->view("application/thanks",  $data);
    }
    function getFee()
    {
        $type = $this->security->xss_clean($this->input->post('type'));
        $caste = $this->security->xss_clean($this->input->post('caste'));
        // echo $job_role_id;die;
        $feeData = $this->application_model->getFee($caste, $type);
        if ($feeData) {
            echo $feeData->fee;
        } else {
            echo 0;
        }
        die;
    }
    function getDisciplinesById()
    {
        $course_id = $this->security->xss_clean($this->input->post('course_id'));
        $discipline_id = $this->security->xss_clean($this->input->post('discipline_id'));
        // echo $job_role_id;die;
        $disciplines = $this->application_model->getDisciplinesById($course_id);
        $out_html = '<option value="">Select</option>';
        foreach ($disciplines as $row) {
            if ($discipline_id == $row->id) {
                $out_html .= "<option value='" . $row->id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    }
    function getTalukById()
    {
        $district_id = $this->security->xss_clean($this->input->post('district_id'));
        $taluk_id = $this->security->xss_clean($this->input->post('taluk_id'));
        // echo $job_role_id;die;
        $taluks = $this->application_model->getTalukById($district_id);
        $out_html = '<option value="">Select</option>';
        foreach ($taluks as $row) {
            if ($taluk_id == $row->id) {
                $out_html .= "<option value='" . $row->id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    }
    function getCollegeById()
    {
        $university_id = $this->security->xss_clean($this->input->post('university_id'));
        $college_id = $this->security->xss_clean($this->input->post('college_id'));
        // echo $job_role_id;die;
        $colleges = $this->application_model->getCollegeById($university_id);
        $out_html = '<option value="">Select</option>';
        foreach ($colleges as $row) {
            if ($college_id == $row->id) {
                $out_html .= "<option value='" . $row->id . "' selected>" . $row->name . "</option>";
            } else {
                $out_html .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
        }
        echo $out_html;
        die;
    }
}
