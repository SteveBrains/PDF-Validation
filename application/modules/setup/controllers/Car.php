<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Car extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('car_model');

        if (!$this->checkAccess('setup.car')) {
            $this->loadAccessRestricted();
        }
    }
    function list()
    {
        $this->global['code'] = 'setup.car';
        try {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data['name'] = $name;
            $data['carRecords'] = $this->car_model->getCars($data);
            echo $data;
            $this->loadViews('car/list', $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }
    function add()
    {
        $this->global['code'] = 'setup.car';
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $data = array(
                'name' => $name,
                'status' => 1,
            );
            $this->car_model->addCar($data);
            redirect('/setup/car/list');
        }
        $this->loadViews("car/add", $this->global, $data, NULL);
    }
}