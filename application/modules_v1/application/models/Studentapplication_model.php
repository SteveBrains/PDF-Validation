<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Studentapplication_model extends CI_Model
{


    function getApprove1($data)
    {
        $this->db->select('a.*,c.name as courseName,d.name as disciplineName');
        $this->db->from('student_application as a');
        $this->db->join('course as c', 'c.id = a.course_id', 'left');
        $this->db->join('discipline as d', 'd.id = a.discipline_id', 'left');
        if (!empty($data['course'])) {
            $likeCriteria = "(a.course_id  =" . $data['course'] . ")";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['discipline'])) {
            $likeCriteria = "(a.discipline_id  =" . $data['discipline'] . ")";
            $this->db->where($likeCriteria);
        }
        $this->db->where('a.status', 0);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getApprove2($data)
    {
        $this->db->select('a.*,c.name as courseName,d.name as disciplineName');
        $this->db->from('student_application as a');
        $this->db->join('course as c', 'c.id = a.course_id', 'left');
        $this->db->join('discipline as d', 'd.id = a.discipline_id', 'left');
        if (!empty($data['course'])) {
            $likeCriteria = "(a.course_id  =" . $data['course'] . ")";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['discipline'])) {
            $likeCriteria = "(a.discipline_id  =" . $data['discipline'] . ")";
            $this->db->where($likeCriteria);
        }
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getApprove3($data)
    {
        $this->db->select('a.*,c.name as courseName,d.name as disciplineName,c1.name as collegeName1,c2.name as collegeName2,c3.name as collegeName3');
        $this->db->from('student_application as a');
        $this->db->join('course as c', 'c.id = a.course_id', 'left');
        $this->db->join('discipline as d', 'd.id = a.discipline_id', 'left');
        $this->db->join('college as c1', 'c1.id = a.college1', 'left');
        $this->db->join('college as c2', 'c2.id = a.college2', 'left');
        $this->db->join('college as c3', 'c3.id = a.college3', 'left');
        if (!empty($data['course'])) {
            $likeCriteria = "(a.course_id  =" . $data['course'] . ")";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['discipline'])) {
            $likeCriteria = "(a.discipline_id  =" . $data['discipline'] . ")";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['college'])) {
            $this->db->where('a.college1', $data['college']);
            $this->db->or_where('a.college2', $data['college']);
            $this->db->or_where('a.college3', $data['college']);
        }
        $this->db->where('a.status', 2);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getApplication($id)
    {
        $this->db->select('*');
        $this->db->from('student_application');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }



    function editApplication($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->trans_start();
        $this->db->update('student_application', $data);
        $this->db->trans_complete();
        return TRUE;
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
    function getColleges()
    {
        $this->db->select('a.*');
        $this->db->from('college as a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function checkCollegeSeats($college, $course, $discipline)
    {
        $this->db->select('a.*');
        $this->db->from('seat_allocation as a');
        $this->db->where('a.college_id', $college);
        $this->db->where('a.discipline_id', $discipline);
        $this->db->where('a.course_id', $course);
        $query = $this->db->get();
        $result = $query->row();
        $totalseats = $result->seats;
       
        $this->db->select('a.*');
        $this->db->from('college_students as a');
        $this->db->where('a.college_id', $college);
        $this->db->where('a.discipline_id', $discipline);
        $this->db->where('a.course_id', $course);
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->row();
        $occupiedSeats = count($result);
        return $totalseats - $occupiedSeats;
    }
    function addStudent($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('student', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addCollegeStudent($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('college_students', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function getFirstSemester($id)
    {
        $this->db->select('a.*');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('semester as b', 'b.id = a.semester_id', 'left');
        $this->db->where('b.order', 1);
        $this->db->where('course_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->id;
    }
}
