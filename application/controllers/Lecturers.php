<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Index (IndexController)
 * Index class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
require_once (APPPATH. 'libraries/vendor/autoload.php');
class Lecturers extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('lecturer_model');
    }
    // function index()
    // {
    //     $this->load->view("lecturer/close");
    // }
    function hallticket()
    {
        if ($this->input->post()) {
            $ref = $this->security->xss_clean($this->input->post('ref'));
            // echo $ref;die;
            $lecturer = $this->lecturer_model->getLecturerByRef($ref);
            $data['lecturer'] = $lecturer;
            // echo "<pre>";print_r($data);die;
        }
        $this->load->view("lecturer/hallticket",$data);
    }
    function downloadhallticket($id){
        $lecturer = $this->lecturer_model->getLecturer($id);
        $data['lecturer'] = $lecturer;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('lecturer/halltickettemplate',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); 
    }
    function index()
    {
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $mother_name = $this->security->xss_clean($this->input->post('mother_name'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $age = $this->security->xss_clean($this->input->post('age'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $address1 = $this->security->xss_clean($this->input->post('address1'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $pan = $this->security->xss_clean($this->input->post('pan'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $caste = $this->security->xss_clean($this->input->post('caste'));
            $sslc_branch = $this->security->xss_clean($this->input->post('sslc_branch'));
            $sslc_board = $this->security->xss_clean($this->input->post('sslc_board'));
            $sslc_college = $this->security->xss_clean($this->input->post('sslc_college'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $sslc_max = $this->security->xss_clean($this->input->post('sslc_max'));
            $sslc_marks = $this->security->xss_clean($this->input->post('sslc_marks'));
            $sslc_percentage = $this->security->xss_clean($this->input->post('sslc_percentage'));

            $puc_branch = $this->security->xss_clean($this->input->post('puc_branch'));
            $puc_board = $this->security->xss_clean($this->input->post('puc_board'));
            $puc_college = $this->security->xss_clean($this->input->post('puc_college'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $puc_max = $this->security->xss_clean($this->input->post('puc_max'));
            $puc_marks = $this->security->xss_clean($this->input->post('puc_marks'));
            $puc_percentage = $this->security->xss_clean($this->input->post('puc_percentage'));

            $be_branch = $this->security->xss_clean($this->input->post('be_branch'));
            $be_board = $this->security->xss_clean($this->input->post('be_board'));
            $be_college = $this->security->xss_clean($this->input->post('be_college'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $be_max = $this->security->xss_clean($this->input->post('be_max'));
            $be_marks = $this->security->xss_clean($this->input->post('be_marks'));
            $be_percentage = $this->security->xss_clean($this->input->post('be_percentage'));

            $me_branch = $this->security->xss_clean($this->input->post('me_branch'));
            $me_board = $this->security->xss_clean($this->input->post('me_board'));
            $me_college = $this->security->xss_clean($this->input->post('me_college'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $me_max = $this->security->xss_clean($this->input->post('me_max'));
            $me_marks = $this->security->xss_clean($this->input->post('me_marks'));
            $me_percentage = $this->security->xss_clean($this->input->post('me_percentage'));

            $msc_branch = $this->security->xss_clean($this->input->post('msc_branch'));
            $msc_board = $this->security->xss_clean($this->input->post('msc_board'));
            $msc_college = $this->security->xss_clean($this->input->post('msc_college'));
            $msc_year = $this->security->xss_clean($this->input->post('msc_year'));
            $msc_max = $this->security->xss_clean($this->input->post('msc_max'));
            $msc_marks = $this->security->xss_clean($this->input->post('msc_marks'));
            $msc_percentage = $this->security->xss_clean($this->input->post('msc_percentage'));

            $other_skills = $this->security->xss_clean($this->input->post('other_skills'));
            $languages_known = $this->security->xss_clean($this->input->post('languages_known'));
            $hobbies = $this->security->xss_clean($this->input->post('hobbies'));
            $achievements = $this->security->xss_clean($this->input->post('achievements'));
            $reference = $this->security->xss_clean($this->input->post('reference'));

            $sslc_copy = $this->security->xss_clean($this->input->post('sslc_copy'));
            $sslc_remarks = $this->security->xss_clean($this->input->post('sslc_remarks'));

            $puc_copy = $this->security->xss_clean($this->input->post('puc_copy'));
            $puc_remarks = $this->security->xss_clean($this->input->post('puc_remarks'));

            $diploma_copy = $this->security->xss_clean($this->input->post('diploma_copy'));
            $diploma_remarks = $this->security->xss_clean($this->input->post('diploma_remarks'));

            $diploma_certificate_copy = $this->security->xss_clean($this->input->post('diploma_certificate_copy'));
            $diploma_certificate_remarks = $this->security->xss_clean($this->input->post('diploma_certificate_remarks'));

            $be_copy = $this->security->xss_clean($this->input->post('be_copy'));
            $be_remarks = $this->security->xss_clean($this->input->post('be_remarks'));

            $be_grad_copy = $this->security->xss_clean($this->input->post('be_grad_copy'));
            $be_grad_remarks = $this->security->xss_clean($this->input->post('be_grad_remarks'));

            $me_copy = $this->security->xss_clean($this->input->post('me_copy'));
            $me_remarks = $this->security->xss_clean($this->input->post('me_remarks'));

            $msc_copy = $this->security->xss_clean($this->input->post('msc_copy'));
            $msc_remarks = $this->security->xss_clean($this->input->post('msc_remarks'));

            $pg_copy = $this->security->xss_clean($this->input->post('pg_copy'));
            $pg_remarks = $this->security->xss_clean($this->input->post('pg_remarks'));

            $pan_copy = $this->security->xss_clean($this->input->post('pan_copy'));
            $pan_remarks = $this->security->xss_clean($this->input->post('pan_remarks'));

            $aadhar_copy = $this->security->xss_clean($this->input->post('aadhar_copy'));
            $aadhar_remarks = $this->security->xss_clean($this->input->post('aadhar_remarks'));

            $experience_copy = $this->security->xss_clean($this->input->post('experience_copy'));
            $experience_remarks = $this->security->xss_clean($this->input->post('experience_remarks'));

            $photo_copy = $this->security->xss_clean($this->input->post('photo_copy'));
            $photo_remarks = $this->security->xss_clean($this->input->post('photo_remarks'));

            $other_copy = $this->security->xss_clean($this->input->post('other_copy'));
            $other_remarks = $this->security->xss_clean($this->input->post('other_remarks'));


            $config = array(
                'upload_path' => "./assets/resources/",
                'allowed_types' => '*',
                'encrypt_name' => TRUE,
            );
            $this->load->library('upload', $config);
            // if ($_FILES['photo']['tmp_name']) {
            //     if ($this->upload->do_upload('photo')) {
            //         $data = $this->upload->data();
            //         $photo = $data['file_name'];
            //     } else {
            //         $photo = '';
            //     }
            // } else {
            $photo = '';
            // }
            if ($_FILES['sslc_file']['tmp_name']) {
                if ($this->upload->do_upload('sslc_file')) {
                    $data = $this->upload->data();
                    $sslc_file = $data['file_name'];
                } else {
                    $sslc_file = '';
                }
            } else {
                $sslc_file = '';
            }
            if ($_FILES['puc_file']['tmp_name']) {
                if ($this->upload->do_upload('puc_file')) {
                    $data = $this->upload->data();
                    $puc_file = $data['file_name'];
                } else {
                    $puc_file = '';
                }
            } else {
                $puc_file = '';
            }
            if ($_FILES['diploma_file']['tmp_name']) {
                if ($this->upload->do_upload('diploma_file')) {
                    $data = $this->upload->data();
                    $diploma_file = $data['file_name'];
                } else {
                    $diploma_file = '';
                }
            } else {
                $diploma_file = '';
            }
            if ($_FILES['diploma_certificate_file']['tmp_name']) {
                if ($this->upload->do_upload('diploma_certificate_file')) {
                    $data = $this->upload->data();
                    $diploma_certificate_file = $data['file_name'];
                } else {
                    $diploma_certificate_file = '';
                }
            } else {
                $diploma_certificate_file = '';
            }
            if ($_FILES['be_file']['tmp_name']) {
                if ($this->upload->do_upload('be_file')) {
                    $data = $this->upload->data();
                    $be_file = $data['file_name'];
                } else {
                    $be_file = '';
                }
            } else {
                $be_file = '';
            }
            if ($_FILES['be_grad_file']['tmp_name']) {
                if ($this->upload->do_upload('be_grad_file')) {
                    $data = $this->upload->data();
                    $be_grad_file = $data['file_name'];
                } else {
                    $be_grad_file = '';
                }
            } else {
                $be_grad_file = '';
            }
            if ($_FILES['me_file']['tmp_name']) {
                if ($this->upload->do_upload('me_file')) {
                    $data = $this->upload->data();
                    $me_file = $data['file_name'];
                } else {
                    $me_file = '';
                }
            } else {
                $me_file = '';
            }
            if ($_FILES['msc_file']['tmp_name']) {
                if ($this->upload->do_upload('msc_file')) {
                    $data = $this->upload->data();
                    $msc_file = $data['file_name'];
                } else {
                    $msc_file = '';
                }
            } else {
                $msc_file = '';
            }
            if ($_FILES['pg_file']['tmp_name']) {
                if ($this->upload->do_upload('pg_file')) {
                    $data = $this->upload->data();
                    $pg_file = $data['file_name'];
                } else {
                    $pg_file = '';
                }
            } else {
                $pg_file = '';
            }
            if ($_FILES['pan_file']['tmp_name']) {
                if ($this->upload->do_upload('pan_file')) {
                    $data = $this->upload->data();
                    $pan_file = $data['file_name'];
                } else {
                    $pan_file = '';
                }
            } else {
                $pan_file = '';
            }
            if ($_FILES['aadhar_file']['tmp_name']) {
                if ($this->upload->do_upload('aadhar_file')) {
                    $data = $this->upload->data();
                    $aadhar_file = $data['file_name'];
                } else {
                    $aadhar_file = '';
                }
            } else {
                $aadhar_file = '';
            }
            if ($_FILES['experience_file']['tmp_name']) {
                if ($this->upload->do_upload('experience_file')) {
                    $data = $this->upload->data();
                    $experience_file = $data['file_name'];
                } else {
                    $experience_file = '';
                }
            } else {
                $experience_file = '';
            }
            if ($_FILES['photo_file']['tmp_name']) {
                if ($this->upload->do_upload('photo_file')) {
                    $data = $this->upload->data();
                    $photo_file = $data['file_name'];
                } else {
                    $photo_file = '';
                }
            } else {
                $photo_file = '';
            }
            if ($_FILES['other_file']['tmp_name']) {
                if ($this->upload->do_upload('other_file')) {
                    $data = $this->upload->data();
                    $other_file = $data['file_name'];
                } else {
                    $other_file = '';
                }
            } else {
                $other_file = '';
            }
            $acknowledge_number = substr(md5(uniqid(mt_rand(), true)), 0, 8);
            $data = array(
                'photo' => $photo,
                'acknowledge_number' => $acknowledge_number,
                'name' => $name,
                'father_name' => $father_name,
                'mother_name' => $mother_name,
                'dob' => $dob,
                'age' => $age,
                'address' => $address,
                'address1' => $address1,
                'mobile' => $mobile,
                'email' => $email,
                'pan' => $pan,
                'aadhar' => $aadhar,
                'caste' => $caste,
                'sslc_branch' => $sslc_branch,
                'sslc_board' => $sslc_board,
                'sslc_college' => $sslc_college,
                'sslc_year' => $sslc_year,
                'sslc_max' => $sslc_max,
                'sslc_marks' => $sslc_marks,
                'sslc_percentage' => $sslc_percentage,

                'puc_branch' => $puc_branch,
                'puc_board' => $puc_board,
                'puc_college' => $puc_college,
                'puc_year' => $puc_year,
                'puc_max' => $puc_max,
                'puc_marks' => $puc_marks,
                'puc_percentage' => $puc_percentage,

                'be_branch' => $be_branch,
                'be_board' => $be_board,
                'be_college' => $be_college,
                'be_year' => $be_year,
                'be_max' => $be_max,
                'be_marks' => $be_marks,
                'be_percentage' => $be_percentage,

                'me_branch' => $me_branch,
                'me_board' => $me_board,
                'me_college' => $me_college,
                'me_year' => $me_year,
                'me_max' => $me_max,
                'me_marks' => $me_marks,
                'me_percentage' => $me_percentage,

                'msc_branch' => $msc_branch,
                'msc_board' => $msc_board,
                'msc_college' => $msc_college,
                'msc_year' => $msc_year,
                'msc_max' => $msc_max,
                'msc_marks' => $msc_marks,
                'msc_percentage' => $msc_percentage,

                'other_skills' => $other_skills,
                'languages_known' => $languages_known,
                'hobbies' => $hobbies,
                'achievements' => $achievements,
                'reference' => $reference,

                'sslc_file' => $sslc_file,
                'sslc_copy' => $sslc_copy,
                'sslc_remarks' => $sslc_remarks,

                'puc_file' => $puc_file,
                'puc_copy' => $puc_copy,
                'puc_remarks' => $puc_remarks,

                'diploma_file' => $diploma_file,
                'diploma_copy' => $diploma_copy,
                'diploma_remarks' => $diploma_remarks,

                'diploma_certificate_file' => $diploma_certificate_file,
                'diploma_certificate_copy' => $diploma_certificate_copy,
                'diploma_certificate_remarks' => $diploma_certificate_remarks,

                'be_file' => $be_file,
                'be_copy' => $be_copy,
                'be_remarks' => $be_remarks,

                'be_grad_file' => $be_grad_file,
                'be_grad_copy' => $be_grad_copy,
                'be_grad_remarks' => $be_grad_remarks,

                'me_file' => $me_file,
                'me_copy' => $me_copy,
                'me_remarks' => $me_remarks,

                'msc_file' => $msc_file,
                'msc_copy' => $msc_copy,
                'msc_remarks' => $msc_remarks,

                'pg_file' => $pg_file,
                'pg_copy' => $pg_copy,
                'pg_remarks' => $pg_remarks,

                'pan_file' => $pan_file,
                'pan_copy' => $pan_copy,
                'pan_remarks' => $pan_remarks,

                'aadhar_file' => $aadhar_file,
                'aadhar_copy' => $aadhar_copy,
                'aadhar_remarks' => $aadhar_remarks,

                'experience_file' => $experience_file,
                'experience_copy' => $experience_copy,
                'experience_remarks' => $experience_remarks,

                'photo_file' => $photo_file,
                'photo_copy' => $photo_copy,
                'photo_remarks' => $photo_remarks,

                'other_file' => $other_file,
                'other_copy' => $other_copy,
                'other_remarks' => $other_remarks,

                'status' => 1,
            );

            $id = $this->lecturer_model->addLecturer($data);
            redirect('/lecturers/experience/' . $id);
        }
        $this->load->view("lecturer/index",  $data);
    }
    function experience($id)
    {
        if ($this->input->post()) {
            $organisation_name = $this->security->xss_clean($this->input->post('organisation_name'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $designation = $this->security->xss_clean($this->input->post('designation'));
            $from_date = $this->security->xss_clean($this->input->post('from_date'));
            $to_date = $this->security->xss_clean($this->input->post('to_date'));
            $salary = $this->security->xss_clean($this->input->post('salary'));
            $remarks = $this->security->xss_clean($this->input->post('remarks'));
            $data = array(
                'organisation_name' => $organisation_name,
                'address' => $address,
                'designation' => $designation,
                'from_date' => $from_date,
                'to_date' => $to_date,
                'salary' => $salary,
                'remarks' => $remarks,
                'lecturer_id' => $id,
                'status' => 1,
            );

            $this->lecturer_model->addLecturerExperience($data);
        }
        $data['experience'] = $this->lecturer_model->getExperiences($id);
        $data['id'] = $id;
        $this->load->view("lecturer/experience",  $data);
    }
    function thanks($id)
    {

        $lecturer = $this->lecturer_model->getLecturer($id);
        $message = "Name: " . $lecturer->name . "<br>" . "Email: " . $lecturer->email . "<br>" . "Phone: " . $lecturer->mobile . "<br>" . "Acknowledgement Number: " . $lecturer->acknowledge_number . "<br>";
        $data['id'] = $id;
        $data['lecturer'] = $lecturer;
        $data['message'] = $message;
        $this->load->view("lecturer/thanks",  $data);
    }
    function review($id)
    {
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $father_name = $this->security->xss_clean($this->input->post('father_name'));
            $mother_name = $this->security->xss_clean($this->input->post('mother_name'));
            $dob = $this->security->xss_clean($this->input->post('dob'));
            $age = $this->security->xss_clean($this->input->post('age'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $address1 = $this->security->xss_clean($this->input->post('address1'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $pan = $this->security->xss_clean($this->input->post('pan'));
            $aadhar = $this->security->xss_clean($this->input->post('aadhar'));
            $caste = $this->security->xss_clean($this->input->post('caste'));
            $sslc_branch = $this->security->xss_clean($this->input->post('sslc_branch'));
            $sslc_board = $this->security->xss_clean($this->input->post('sslc_board'));
            $sslc_college = $this->security->xss_clean($this->input->post('sslc_college'));
            $sslc_year = $this->security->xss_clean($this->input->post('sslc_year'));
            $sslc_max = $this->security->xss_clean($this->input->post('sslc_max'));
            $sslc_marks = $this->security->xss_clean($this->input->post('sslc_marks'));
            $sslc_percentage = $this->security->xss_clean($this->input->post('sslc_percentage'));

            $puc_branch = $this->security->xss_clean($this->input->post('puc_branch'));
            $puc_board = $this->security->xss_clean($this->input->post('puc_board'));
            $puc_college = $this->security->xss_clean($this->input->post('puc_college'));
            $puc_year = $this->security->xss_clean($this->input->post('puc_year'));
            $puc_max = $this->security->xss_clean($this->input->post('puc_max'));
            $puc_marks = $this->security->xss_clean($this->input->post('puc_marks'));
            $puc_percentage = $this->security->xss_clean($this->input->post('puc_percentage'));

            $be_branch = $this->security->xss_clean($this->input->post('be_branch'));
            $be_board = $this->security->xss_clean($this->input->post('be_board'));
            $be_college = $this->security->xss_clean($this->input->post('be_college'));
            $be_year = $this->security->xss_clean($this->input->post('be_year'));
            $be_max = $this->security->xss_clean($this->input->post('be_max'));
            $be_marks = $this->security->xss_clean($this->input->post('be_marks'));
            $be_percentage = $this->security->xss_clean($this->input->post('be_percentage'));

            $me_branch = $this->security->xss_clean($this->input->post('me_branch'));
            $me_board = $this->security->xss_clean($this->input->post('me_board'));
            $me_college = $this->security->xss_clean($this->input->post('me_college'));
            $me_year = $this->security->xss_clean($this->input->post('me_year'));
            $me_max = $this->security->xss_clean($this->input->post('me_max'));
            $me_marks = $this->security->xss_clean($this->input->post('me_marks'));
            $me_percentage = $this->security->xss_clean($this->input->post('me_percentage'));

            $msc_branch = $this->security->xss_clean($this->input->post('msc_branch'));
            $msc_board = $this->security->xss_clean($this->input->post('msc_board'));
            $msc_college = $this->security->xss_clean($this->input->post('msc_college'));
            $msc_year = $this->security->xss_clean($this->input->post('msc_year'));
            $msc_max = $this->security->xss_clean($this->input->post('msc_max'));
            $msc_marks = $this->security->xss_clean($this->input->post('msc_marks'));
            $msc_percentage = $this->security->xss_clean($this->input->post('msc_percentage'));

            $other_skills = $this->security->xss_clean($this->input->post('other_skills'));
            $languages_known = $this->security->xss_clean($this->input->post('languages_known'));
            $hobbies = $this->security->xss_clean($this->input->post('hobbies'));
            $achievements = $this->security->xss_clean($this->input->post('achievements'));
            $reference = $this->security->xss_clean($this->input->post('reference'));

            $sslc_copy = $this->security->xss_clean($this->input->post('sslc_copy'));
            $sslc_remarks = $this->security->xss_clean($this->input->post('sslc_remarks'));

            $puc_copy = $this->security->xss_clean($this->input->post('puc_copy'));
            $puc_remarks = $this->security->xss_clean($this->input->post('puc_remarks'));

            $diploma_copy = $this->security->xss_clean($this->input->post('diploma_copy'));
            $diploma_remarks = $this->security->xss_clean($this->input->post('diploma_remarks'));

            $diploma_certificate_copy = $this->security->xss_clean($this->input->post('diploma_certificate_copy'));
            $diploma_certificate_remarks = $this->security->xss_clean($this->input->post('diploma_certificate_remarks'));

            $be_copy = $this->security->xss_clean($this->input->post('be_copy'));
            $be_remarks = $this->security->xss_clean($this->input->post('be_remarks'));

            $be_grad_copy = $this->security->xss_clean($this->input->post('be_grad_copy'));
            $be_grad_remarks = $this->security->xss_clean($this->input->post('be_grad_remarks'));

            $me_copy = $this->security->xss_clean($this->input->post('me_copy'));
            $me_remarks = $this->security->xss_clean($this->input->post('me_remarks'));

            $msc_copy = $this->security->xss_clean($this->input->post('msc_copy'));
            $msc_remarks = $this->security->xss_clean($this->input->post('msc_remarks'));

            $pg_copy = $this->security->xss_clean($this->input->post('pg_copy'));
            $pg_remarks = $this->security->xss_clean($this->input->post('pg_remarks'));

            $pan_copy = $this->security->xss_clean($this->input->post('pan_copy'));
            $pan_remarks = $this->security->xss_clean($this->input->post('pan_remarks'));

            $aadhar_copy = $this->security->xss_clean($this->input->post('aadhar_copy'));
            $aadhar_remarks = $this->security->xss_clean($this->input->post('aadhar_remarks'));

            $experience_copy = $this->security->xss_clean($this->input->post('experience_copy'));
            $experience_remarks = $this->security->xss_clean($this->input->post('experience_remarks'));

            $photo_copy = $this->security->xss_clean($this->input->post('photo_copy'));
            $photo_remarks = $this->security->xss_clean($this->input->post('photo_remarks'));

            $other_copy = $this->security->xss_clean($this->input->post('other_copy'));
            $other_remarks = $this->security->xss_clean($this->input->post('other_remarks'));




            $config = array(
                'upload_path' => "./assets/resources/",
                'allowed_types' => '*',
                'encrypt_name' => TRUE,
            );
            $this->load->library('upload', $config);
            // if ($_FILES['photo']['tmp_name']) {
            //     if ($this->upload->do_upload('photo')) {
            //         $data = $this->upload->data();
            //         $photo = $data['file_name'];
            //     } else {
            //         $photo = '';
            //     }
            // } else {
            $photo = '';
            // }
            if ($_FILES['sslc_file']['tmp_name']) {
                if ($this->upload->do_upload('sslc_file')) {
                    $data = $this->upload->data();
                    $sslc_file = $data['file_name'];
                } else {
                    $sslc_file = $this->security->xss_clean($this->input->post('sslc_file_value'));
                }
            } else {
                $sslc_file = $this->security->xss_clean($this->input->post('sslc_file_value'));
            }
            if ($_FILES['puc_file']['tmp_name']) {
                if ($this->upload->do_upload('puc_file')) {
                    $data = $this->upload->data();
                    $puc_file = $data['file_name'];
                } else {
                    $puc_file = $this->security->xss_clean($this->input->post('puc_file_value'));
                }
            } else {
                $puc_file = $this->security->xss_clean($this->input->post('puc_file_value'));
            }
            if ($_FILES['diploma_file']['tmp_name']) {
                if ($this->upload->do_upload('diploma_file')) {
                    $data = $this->upload->data();
                    $diploma_file = $data['file_name'];
                } else {
                    $diploma_file = $this->security->xss_clean($this->input->post('diploma_file_value'));
                }
            } else {
                $diploma_file = $this->security->xss_clean($this->input->post('diploma_file_value'));
            }
            if ($_FILES['diploma_certificate_file']['tmp_name']) {
                if ($this->upload->do_upload('diploma_certificate_file')) {
                    $data = $this->upload->data();
                    $diploma_certificate_file = $data['file_name'];
                } else {
                    $diploma_certificate_file = $this->security->xss_clean($this->input->post('diploma_certificate_file_value'));
                }
            } else {
                $diploma_certificate_file = $this->security->xss_clean($this->input->post('diploma_certificate_file_value'));
            }
            if ($_FILES['be_file']['tmp_name']) {
                if ($this->upload->do_upload('be_file')) {
                    $data = $this->upload->data();
                    $be_file = $data['file_name'];
                } else {
                    $be_file = $this->security->xss_clean($this->input->post('be_file_value'));
                }
            } else {
                $be_file = $this->security->xss_clean($this->input->post('be_file_value'));
            }
            if ($_FILES['be_grad_file']['tmp_name']) {
                if ($this->upload->do_upload('be_grad_file')) {
                    $data = $this->upload->data();
                    $be_grad_file = $data['file_name'];
                } else {
                    $be_grad_file = $this->security->xss_clean($this->input->post('be_grad_file_value'));
                }
            } else {
                $be_grad_file = $this->security->xss_clean($this->input->post('be_grad_file_value'));
            }
            if ($_FILES['me_file']['tmp_name']) {
                if ($this->upload->do_upload('me_file')) {
                    $data = $this->upload->data();
                    $me_file = $data['file_name'];
                } else {
                    $me_file = $this->security->xss_clean($this->input->post('me_file_value'));
                }
            } else {
                $me_file = $this->security->xss_clean($this->input->post('me_file_value'));
            }
            if ($_FILES['msc_file']['tmp_name']) {
                if ($this->upload->do_upload('msc_file')) {
                    $data = $this->upload->data();
                    $msc_file = $data['file_name'];
                } else {
                    $msc_file = $this->security->xss_clean($this->input->post('msc_file_value'));
                }
            } else {
                $msc_file = $this->security->xss_clean($this->input->post('msc_file_value'));
            }
            if ($_FILES['pg_file']['tmp_name']) {
                if ($this->upload->do_upload('pg_file')) {
                    $data = $this->upload->data();
                    $pg_file = $data['file_name'];
                } else {
                    $pg_file = $this->security->xss_clean($this->input->post('pg_file_value'));
                }
            } else {
                $pg_file = $this->security->xss_clean($this->input->post('pg_file_value'));
            }
            if ($_FILES['pan_file']['tmp_name']) {
                if ($this->upload->do_upload('pan_file')) {
                    $data = $this->upload->data();
                    $pan_file = $data['file_name'];
                } else {
                    $pan_file = $this->security->xss_clean($this->input->post('pan_file_value'));
                }
            } else {
                $pan_file = $this->security->xss_clean($this->input->post('pan_file_value'));
            }
            if ($_FILES['aadhar_file']['tmp_name']) {
                if ($this->upload->do_upload('aadhar_file')) {
                    $data = $this->upload->data();
                    $aadhar_file = $data['file_name'];
                } else {
                    $aadhar_file = $this->security->xss_clean($this->input->post('aadhar_file_value'));
                }
            } else {
                $aadhar_file = $this->security->xss_clean($this->input->post('aadhar_file_value'));
            }
            if ($_FILES['experience_file']['tmp_name']) {
                if ($this->upload->do_upload('experience_file')) {
                    $data = $this->upload->data();
                    $experience_file = $data['file_name'];
                } else {
                    $experience_file = $this->security->xss_clean($this->input->post('experience_file_value'));
                }
            } else {
                $experience_file = $this->security->xss_clean($this->input->post('experience_file_value'));
            }
            if ($_FILES['photo_file']['tmp_name']) {
                if ($this->upload->do_upload('photo_file')) {
                    $data = $this->upload->data();
                    $photo_file = $data['file_name'];
                } else {
                    $photo_file = $this->security->xss_clean($this->input->post('photo_file_value'));
                }
            } else {
                $photo_file = $this->security->xss_clean($this->input->post('photo_file_value'));
            }
            if ($_FILES['other_file']['tmp_name']) {
                if ($this->upload->do_upload('other_file')) {
                    $data = $this->upload->data();
                    $other_file = $data['file_name'];
                } else {
                    $other_file = $this->security->xss_clean($this->input->post('other_file_value'));
                }
            } else {
                $other_file = $this->security->xss_clean($this->input->post('other_file_value'));
            }
            $acknowledge_number = substr(md5(uniqid(mt_rand(), true)), 0, 8);
            $data = array(
                'photo' => $photo,
                'acknowledge_number' => $acknowledge_number,
                'name' => $name,
                'father_name' => $father_name,
                'mother_name' => $mother_name,
                'dob' => $dob,
                'age' => $age,
                'address' => $address,
                'address1' => $address1,
                'mobile' => $mobile,
                'email' => $email,
                'pan' => $pan,
                'aadhar' => $aadhar,
                'caste' => $caste,
                'sslc_branch' => $sslc_branch,
                'sslc_board' => $sslc_board,
                'sslc_college' => $sslc_college,
                'sslc_year' => $sslc_year,
                'sslc_max' => $sslc_max,
                'sslc_marks' => $sslc_marks,
                'sslc_percentage' => $sslc_percentage,

                'puc_branch' => $puc_branch,
                'puc_board' => $puc_board,
                'puc_college' => $puc_college,
                'puc_year' => $puc_year,
                'puc_max' => $puc_max,
                'puc_marks' => $puc_marks,
                'puc_percentage' => $puc_percentage,

                'be_branch' => $be_branch,
                'be_board' => $be_board,
                'be_college' => $be_college,
                'be_year' => $be_year,
                'be_max' => $be_max,
                'be_marks' => $be_marks,
                'be_percentage' => $be_percentage,

                'me_branch' => $me_branch,
                'me_board' => $me_board,
                'me_college' => $me_college,
                'me_year' => $me_year,
                'me_max' => $me_max,
                'me_marks' => $me_marks,
                'me_percentage' => $me_percentage,

                'msc_branch' => $msc_branch,
                'msc_board' => $msc_board,
                'msc_college' => $msc_college,
                'msc_year' => $msc_year,
                'msc_max' => $msc_max,
                'msc_marks' => $msc_marks,
                'msc_percentage' => $msc_percentage,

                'other_skills' => $other_skills,
                'languages_known' => $languages_known,
                'hobbies' => $hobbies,
                'achievements' => $achievements,
                'reference' => $reference,

                'sslc_file' => $sslc_file,
                'sslc_copy' => $sslc_copy,
                'sslc_remarks' => $sslc_remarks,

                'puc_file' => $puc_file,
                'puc_copy' => $puc_copy,
                'puc_remarks' => $puc_remarks,

                'diploma_file' => $diploma_file,
                'diploma_copy' => $diploma_copy,
                'diploma_remarks' => $diploma_remarks,

                'diploma_certificate_file' => $diploma_certificate_file,
                'diploma_certificate_copy' => $diploma_certificate_copy,
                'diploma_certificate_remarks' => $diploma_certificate_remarks,

                'be_file' => $be_file,
                'be_copy' => $be_copy,
                'be_remarks' => $be_remarks,

                'be_grad_file' => $be_grad_file,
                'be_grad_copy' => $be_grad_copy,
                'be_grad_remarks' => $be_grad_remarks,

                'me_file' => $me_file,
                'me_copy' => $me_copy,
                'me_remarks' => $me_remarks,

                'msc_file' => $msc_file,
                'msc_copy' => $msc_copy,
                'msc_remarks' => $msc_remarks,

                'pg_file' => $pg_file,
                'pg_copy' => $pg_copy,
                'pg_remarks' => $pg_remarks,

                'pan_file' => $pan_file,
                'pan_copy' => $pan_copy,
                'pan_remarks' => $pan_remarks,

                'aadhar_file' => $aadhar_file,
                'aadhar_copy' => $aadhar_copy,
                'aadhar_remarks' => $aadhar_remarks,

                'experience_file' => $experience_file,
                'experience_copy' => $experience_copy,
                'experience_remarks' => $experience_remarks,

                'photo_file' => $photo_file,
                'photo_copy' => $photo_copy,
                'photo_remarks' => $photo_remarks,

                'other_file' => $other_file,
                'other_copy' => $other_copy,
                'other_remarks' => $other_remarks,

                'status' => 1,
            );
            // echo $id;die;
            $this->lecturer_model->updateLecturer($data, $id);
            redirect('/lecturers/thanks/' . $id);
        }
        if ($_GET['delete_id'] > 0) {
            $this->lecturer_model->removeExperience($_GET['delete_id']);
            redirect('/lecturers/review/' . $id);
        }

        $data['lecturer'] = $this->lecturer_model->getLecturer($id);
        $data['experience'] = $this->lecturer_model->getExperiences($id);
        $data['id'] = $id;
        // echo "<pre>";print_r($data);die;
        $this->load->view("lecturer/review",  $data);
    }
    function checkEmail()
    {
        $email = $_GET['email'];
        $status =  $this->lecturer_model->getLecturerByEmail($email);
        $array = ['email' => $status];
        echo json_encode($status);
    }
}
