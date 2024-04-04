<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seatallocation extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('seatallocation_model');
        if (!$this->checkAccess('setup.seatallocation')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'setup.seatallocation';
        try {
            $academicyear_id = $this->security->xss_clean($this->input->post('academicyear_id'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $discipline_id = $this->security->xss_clean($this->input->post('discipline_id'));
            $college_id = $this->security->xss_clean($this->input->post('college_id'));
            $data['academicyear_id'] = $academicyear_id;
            $data['course_id'] = $course_id;
            $data['discipline_id'] = $discipline_id;
            $data['college_id'] = $college_id;
            $data['academicyears'] = $this->seatallocation_model->getAcademicyears();
            $data['courses'] = $this->seatallocation_model->getCourses();
            $data['disciplines'] = $this->seatallocation_model->getDisciplines();
            $data['colleges'] = $this->seatallocation_model->getColleges();

            $data['seatallocationRecords'] = $this->seatallocation_model->getSeatallocations($data);
            $this->loadViews("seatallocation/list", $this->global, $data, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    function add()
    {
        $this->global['code'] = 'setup.seatallocation';
        if ($this->input->post()) {
            //  echo "<pre>";
            // print_r($this->input->post());
            // die;
            $academicyear_id = $this->security->xss_clean($this->input->post('academicyear_id'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $discipline_id = $this->security->xss_clean($this->input->post('discipline_id'));


            $seats = $this->security->xss_clean($this->input->post('seats'));
            $type = $this->security->xss_clean($this->input->post('type'));
            foreach ($seats as $key => $value) {
                $data = array(
                    'academicyear_id' => $academicyear_id,
                    'course_id' => $course_id,
                    'discipline_id' => $discipline_id,
                    'college_id' => $key,
                    'seats' => $value,
                    'type' => $type[$key],
                    'status' => 1,
                );
                $this->seatallocation_model->addSeatallocation($data);
            }

            redirect('/setup/seatallocation/list');
        }
        $data['academicyears'] = $this->seatallocation_model->getAcademicyears();
        $data['courses'] = $this->seatallocation_model->getCourses();
        $data['disciplines'] = $this->seatallocation_model->getDisciplines();
        $data['colleges'] = $this->seatallocation_model->getColleges();

        $this->loadViews("seatallocation/add", $this->global, $data, NULL);
    }

    function edit($id = NULL)
    {
        $this->global['code'] = 'setup.seatallocation';
        if ($id == null) {
            redirect('/setup/seatallocation/list');
        }
        if ($this->input->post()) {
            //   echo "<pre>";
            // print_r($this->input->post());
            // die;

            $academicyear_id = $this->security->xss_clean($this->input->post('academicyear_id'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $discipline_id = $this->security->xss_clean($this->input->post('discipline_id'));
            $this->seatallocation_model->clearTable($academicyear_id, $course_id, $discipline_id);


            $seats = $this->security->xss_clean($this->input->post('seats'));
            $type = $this->security->xss_clean($this->input->post('type'));
            foreach ($seats as $key => $value) {
                $data = array(
                    'academicyear_id' => $academicyear_id,
                    'course_id' => $course_id,
                    'discipline_id' => $discipline_id,
                    'college_id' => $key,
                    'seats' => $value,
                    'type' => $type[$key],
                    'status' => 1,
                );
                $this->seatallocation_model->addSeatallocation($data);
            }
            redirect('/setup/seatallocation/list');
        }
        $seatallocationInfo = $this->seatallocation_model->getSeatallocation($id);
        $data['seatallocationInfo'] = $seatallocationInfo;
        $data['academicyears'] = $this->seatallocation_model->getAcademicyears();
        $data['courses'] = $this->seatallocation_model->getCourses();
        $data['disciplines'] = $this->seatallocation_model->getDisciplines();
        $data['colleges'] = $this->seatallocation_model->getCollegesDetails($seatallocationInfo->academicyear_id, $seatallocationInfo->course_id, $seatallocationInfo->discipline_id);

        $this->loadViews("seatallocation/edit", $this->global, $data, NULL);
    }
}
