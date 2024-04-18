<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('user_model');
        if (!$this->checkAccess('setup.user')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.user';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $data['name'] = $name;
            $data['email'] = $email;
            $data['mobile'] = $mobile;
            $data['userRecords'] = $this->user_model->getUsers($data);
            $this->global['pageTitle'] = 'Inventory : User';
            $this->loadViews("user/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.user';
        if ($this->input->post()) {
            $first_name = ucwords(strtolower($this->security->xss_clean($this->input->post('first_name'))));
            $last_name = ucwords(strtolower($this->security->xss_clean($this->input->post('last_name'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');
            $roleId = $this->input->post('role');
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $userInfo = array(
                'email' => $email,
                'password' => md5($password),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile' => $mobile,
                'role' => $roleId,
                'status' => 1,
            );
            $this->user_model->addUser($userInfo);
            redirect('/setup/user/list');
        }
        $data['roleList'] = $this->user_model->getRoles();
        $this->loadViews("user/add", $this->global, $data, NULL);
        $this->loadViews("user/add", $this->global, NULL, NULL);
    }

    function edit($userId = NULL)
    {
        $this->global['code'] = 'setup.user';
        if ($userId == null) {
            redirect('/setup/user/list');
        }
        if ($this->input->post()) {
            $first_name = ucwords(strtolower($this->security->xss_clean($this->input->post('first_name'))));
            $last_name = ucwords(strtolower($this->security->xss_clean($this->input->post('last_name'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $roleId = $this->input->post('role');
            if ($password != '') {
                $userInfo = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile' => $mobile,
                    'role' => $roleId,
                    'password' => md5($password),
                );
            } else {
                $userInfo = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile' => $mobile,
                    'role' => $roleId,
                );
            }
            $this->user_model->editUser($userInfo, $userId);
            redirect('/setup/user/list');
        }
        $data['roleList'] = $this->user_model->getRoles();
        $data['userInfo'] = $this->user_model->getUser($userId);
        $this->loadViews("user/edit", $this->global, $data, NULL);
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    function uploadImage()
    {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                $target_file = 'uploads/' . date('YmdHis') . '.' . $ext;
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data = array(
                        'image' => $target_file
                    );
                    $this->user_model->editUser($data, $_SESSION['userId']);
                }
            }
        }
    }
    function profile()
    {
        if ($this->input->post()) {
            $first_name = ucwords(strtolower($this->security->xss_clean($this->input->post('first_name'))));
            $last_name = ucwords(strtolower($this->security->xss_clean($this->input->post('last_name'))));
            $email = $this->security->xss_clean($this->input->post('email'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $userInfo = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile' => $mobile,
                'email' => $email,
            );
            $this->user_model->editUser($userInfo, $_SESSION['userId']);
            redirect('/setup/user/profile');
        }
        $data['userInfo'] = $this->user_model->getUser($_SESSION['userId']);
        $this->loadViews("user/profile", $this->global, $data, NULL);
    }
    function changePassword()
    {
        if ($this->input->post()) {
            $password = $this->security->xss_clean($this->input->post('password'));
            $userInfo = array(
                'password' => md5($password),
            );
            $this->user_model->editUser($userInfo, $_SESSION['userId']);
            redirect('/setup/user/profile');
        }
        redirect('/setup/user/profile');
    }
}
