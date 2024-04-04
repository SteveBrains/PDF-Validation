<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
require_once 'vendor/autoload.php';

class BaseController extends MX_Controller
{
    protected $isLoggedIn = '';
    protected $userId = '';
    protected $first_name = '';
    protected $last_name = '';
    protected $global = array();
    protected $user_image = '';
    protected $code = '';
    protected $last_login = '';
    protected $mpdf = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('role_model');
        $this->mpdf = new \Mpdf\Mpdf();
    }
    /**
     * Takes mixed data and optionally a status code, then creates the response
     *
     * @access public
     * @param array|NULL $data
     *        	Data to output to the user
     *        	running the script; otherwise, exit
     */
    public function response($data = NULL)
    {
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit();
    }

    function isLoggedIn()
    {
        $this->load->library('session');
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $this->logout();
        } else {
            $this->userId = $this->session->userdata('userId');
            $this->user_image = $this->session->userdata('user_image');
            $this->first_name = $this->session->userdata('first_name');
            $this->last_name = $this->session->userdata('last_name');
            $this->isLoggedIn = $this->session->userdata('isLoggedIn');
            $this->last_login = $this->session->userdata('last_login');

            $this->global['userId'] = $this->userId;
            $this->global['user_image'] = $this->user_image;
            $this->global['first_name'] = $this->first_name;
            $this->global['last_name'] = $this->last_name;
            $this->global['isLoggedIn'] = $this->isLoggedIn;
            $this->global['last_login'] = $this->last_login;
            // $this->global['user_image'] = $this->user_image;
        }
    }

    function checkAccess($code)
    {
        $id_role = $this->session->role;
        // echo $id_role;die;
        $canAccess = $this->login_model->checkAccess($id_role, $code);
        return $canAccess;
    }
    function loadAccessRestricted()
    {
        // $this->global['pageTitle'] = 'Centralized Student Placement Management : Access Denied';

        // $this->load->view('includes/header', $this->global);
        // $this->load->view('includes/sidebar', $this->global);
        // $this->load->view('user/access');
        // $this->load->view('includes/footer');
    }
    function logout()
    {
        $this->session->sess_destroy();

        redirect('/');
    }

    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
    {

        $this->load->view('includes/header', $headerInfo);
        $this->load->view('includes/sidebar', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }
    
    // function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
    // {

    //     $this->load->view('adminincludes/header', $headerInfo);
    //     $this->load->view('adminincludes/sidebar', $headerInfo);
    //     $this->load->view($viewName, $pageInfo);
    //     $this->load->view('adminincludes/footer', $footerInfo);
    // }

    function uploadFile($file, $file_tmp, $key)
    {
        if ($file) {
            $uniqueId = rand(0000000000, 9999999999);
            $upload_name = md5($uniqueId);
            $root = $_SERVER['DOCUMENT_ROOT'];
            $upload_path = $root . '/assets/uploads/';
            $fileinfo = pathinfo($file);
            $extension = $fileinfo['extension'];
            $uploaded_file_name = $upload_name . '.' . $extension;
            $file_path = $upload_path . $uploaded_file_name;
            if (move_uploaded_file($file_tmp, $file_path)) {
                return $uploaded_file_name;
            } else {
                echo "Unable To Uplaod" . $key . " Try After Some Time";
            }
        }
    }
}
