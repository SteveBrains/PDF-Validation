<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Application_model extends CI_Model
{

    function getStudentByAadhar($aadhar)
    {
        $this->db->select('a.*');
        $this->db->from('student_application as a');
        $this->db->where('a.aadhar', $aadhar);
        $query = $this->db->get();
        if (empty($query->row())) {
            return true;
        } else {
            return false;
        }
    }
    function getApplicationCount()
    {
        $this->db->select('count(*) as total');
        $this->db->from('student_application as a');
        $query = $this->db->get();
        if (empty($query->row())) {
            return 0;
        } else {
            $result = $query->row();
            return $result->total;
        }
    }
    
    function getAll()
    {
        $this->db->select('a.*');
        $this->db->from('student_application as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCourses()
    {
        $this->db->select('a.*');
        $this->db->from('course as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getColleges()
    {
        $this->db->select('a.*');
        $this->db->from('college as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getUniversities()
    {
        $this->db->select('a.*');
        $this->db->from('university as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getNationalities()
    {
        $this->db->select('a.*');
        $this->db->from('nationality as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getReligions()
    {
        $this->db->select('a.*');
        $this->db->from('religion as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getDistricts()
    {
        $this->db->select('a.*');
        $this->db->from('district as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCastes()
    {
        $this->db->select('a.*');
        $this->db->from('caste as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getDisciplines()
    {
        $this->db->select('a.*');
        $this->db->from('discipline as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getApplication($reg)
    {
        $this->db->select('a.*');
        $this->db->from('student_application as a');
        $this->db->where('a.application_number', $reg);
        $query = $this->db->get();
        if (empty($query->row())) {
            return false;
        } else {
            return $query->row();
        }
    }
    function getApplicationById($id)
    {
        $this->db->select('a.*');
        $this->db->from('student_application as a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        if (empty($query->row())) {
            return false;
        } else {
            return $query->row();
        }
    }
   
    function addApplication($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('student_application', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
   
    function getFee($caste,$type)
    {
        $this->db->select('a.fee');
        $this->db->from('application_fee as a');
        $this->db->where('a.caste_id', $caste);
        $this->db->where('a.type', $type);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    } 
    function getSubjectsById($course_id,$semester_id)
    {
        $this->db->select('DISTINCT(b.Id),b.name,b.code');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.semester_id', $semester_id);
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getDisciplinesById($id)
    {
        $this->db->select('a.*');
        $this->db->from('discipline as a');
        $this->db->where('a.course_id', $id);
        $this->db->or_where('a.course_id', -1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTalukById($id)
    {
        $this->db->select('a.*');
        $this->db->from('taluk as a');
        $this->db->where('a.district_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCollegeById($id)
    {
        $this->db->select('a.*');
        $this->db->from('college as a');
        $this->db->where('a.university_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
}
