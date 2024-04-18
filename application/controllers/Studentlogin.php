<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Student (IndexController)
 * Student class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Studentlogin extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {

        $formData = $this->input->post();
        if ($formData) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {

                $email = strtolower($this->security->xss_clean($this->input->post('username')));
                $password = $this->input->post('password');
                $result = $this->login_model->loginStudent($email, md5($password));

                if (!empty($result)) {

                    $this->setupSession($result);
                } else {
                    $this->session->set_flashdata('error', 'Username or password mismatch');
                    $this->load->view('student/index');
                }
            } 
        } else {
            $this->load->view('student/index');
        }
    }
    public function setupSession($result)
    {
        
        $sessionArray = array(
            'userId' => $result->Id,
            'name' => $result->name,
            'training_center_id' => $result->training_center_id,
            'course_id' => $result->course_id,
            'semester_id' => $result->semester_id,
            'isLoggedIn' => TRUE
        );
        $this->session->set_userdata($sessionArray);
        unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['last_login']);
        $uniqueId = rand(0000000000, 9999999999);
        $this->session->set_userdata("my_session_id", md5($uniqueId));
        redirect('/student');
    }
    function logout()
    {
        $this->session->sess_destroy();

        redirect('/');
    }
}
