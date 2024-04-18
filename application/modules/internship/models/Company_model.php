<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Company_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('*');
        $this->db->from('internship_company as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCompanyStudents($id)
    {
        $this->db->select('a.*,b.name,b.email,b.registration_number');
        $this->db->from('internship_students as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.company_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getCompany($id)
    {
        $this->db->select('*');
        $this->db->from('internship_company');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addCompany($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('internship_company', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function tagStudents($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('internship_students', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editCompany($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('internship_company', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function getTrainingCenters()
    {
        $this->db->select('*');
        $this->db->from('trainingcenter as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCourses()
    {
        $this->db->select('*');
        $this->db->from('course as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getFailedSubjects($course_id,$candidate_id)
    {
        $this->db->select('a.*');
        $this->db->from('marks as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('(a.internal_marks < b.internal_max OR a.external_marks < b.external_max)');
        $this->db->where('a.student_id', $candidate_id);
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get();
        $result = $query->result();
        return count($result);
    }
    function filterCandidates($data)
    {
        $this->db->select('a.*,b.name as training_center,c.name as course_name');
        $this->db->from('candidate as a');
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        $this->db->join('course as c', 'a.course_id = c.Id', 'left');

        if (!empty($data['training_center_id'])) {
            $this->db->where('a.training_center_id', $data['training_center_id']);
        }
        if (!empty($data['course_id'])) {
            $this->db->where('a.course_id', $data['course_id']);
        }
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $subjectscount = self::getFailedSubjects($data['course_id'],$value->Id);
            $value->subjectscount = $subjectscount;
            $result[$key] = $value;
        }
        return $result;
    }
}
