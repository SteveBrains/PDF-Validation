<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Index (IndexController)
 * Index class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Index extends BaseController
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

                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $result = $this->login_model->loginAdmin($email, md5($password));

                if (!empty($result)) {

                    $this->setupSession($result);
                } else {
                    $this->session->set_flashdata('error', 'Email or password mismatch');
                    $this->load->view('user/index');
                }
            }
        } else {
            $this->load->view('user/index');
        }
    }
    public function setupSession($result)
    {
        $lastLogin = $this->login_model->lastLoginInfo($result->id);
        if ($lastLogin == '') {
            $applicant_login = date('Y-m-d h:i:s');
        } else {
            $applicant_login = $lastLogin->created_dt_tm;
        }
        $sessionArray = array(
            'userId' => $result->id,
            'role' => $result->role,
            'user_image' => $result->image,
            'first_name' => $result->first_name,
            'last_name' => $result->last_name,
            'trainingcenter_id' => $result->trainingcenter_id,
            'company_id' => $result->company_id,
            'last_login' => $applicant_login,
            'isLoggedIn' => TRUE
        );
        $this->session->set_userdata($sessionArray);
        unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['last_login']);
        $loginInfo = array("id_user" => $result->userId, "session_data" => json_encode($sessionArray), "machine_ip" => $_SERVER['REMOTE_ADDR'], "user_agent" => getBrowserAgent(), "agent_string" => $this->agent->agent_string(), "platform" => $this->agent->platform());
        $uniqueId = rand(0000000000, 9999999999);
        $this->session->set_userdata("my_session_id", md5($uniqueId));
        $menu = $this->login_model->getMenu($result->role);
        // echo "<pre>";print_r($menu);die;
        $this->login_model->lastLogin($loginInfo);
        redirect('/' . $menu->module . '/' . $menu->controller . '/' . $menu->action);
        // redirect('/setup/user/list'); 
    }
    function logout()
    {
        $this->session->sess_destroy();

        redirect('/');
    }
}
