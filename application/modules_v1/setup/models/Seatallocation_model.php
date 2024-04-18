<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seatallocation_model extends CI_Model
{
    function getSeatallocations($search)
    {
        $this->db->select('ay.* ,b.name as academicyearName, c.name as courseName, d.name as disciplineName');
        $this->db->from('seat_allocation as ay');
        $this->db->join('academicyear as b', 'ay.academicyear_id = b.id', 'left');
        $this->db->join('course as c', 'ay.course_id = c.id', 'left');
        $this->db->join('discipline as d', 'ay.discipline_id = d.id', 'left');
        if (!empty($search['academicyear_id'])) {
            $this->db->where('ay.academicyear_id', $search['academicyear_id']);
        }
        if (!empty($search['course_id'])) {
            $this->db->where('ay.course_id', $search['course_id']);
        }
        if (!empty($search['discipline_id'])) {
            $this->db->where('ay.discipline_id', $search['discipline_id']);
        }
        if (!empty($search['college_id'])) {
            $this->db->where('ay.college_id', $search['college_id']);
        }

        $this->db->group_by(array('ay.academicyear_id', 'ay.course_id', 'ay.discipline_id'));
        // $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAcademicyears()
    {
        $this->db->select('ay.*');
        $this->db->from('academicyear as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCourses()
    {
        $this->db->select('ay.*');
        $this->db->from('course as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getDisciplines()
    {
        $this->db->select('ay.*');
        $this->db->from('discipline as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getColleges()
    {
        $this->db->select('ay.*');
        $this->db->from('college as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCollegesDetails($academicyear_id, $course_id, $discipline_id)
    {
        $this->db->select('ay.*');
        $this->db->from('college as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $allocation = $this->getSeatallocationDetail($academicyear_id, $course_id, $discipline_id, $value->id);
            $value->seats = $allocation->seats;
            $value->type = $allocation->type;
            $result[$key] = $value;
        }
        return $result;
    }

    function getSeatallocationDetail($academicyear_id, $course_id, $discipline_id, $college_id)
    {
        $this->db->select('ay.*');
        $this->db->from('seat_allocation as ay');
        $this->db->where('ay.academicyear_id', $academicyear_id);
        $this->db->where('ay.course_id', $course_id);
        $this->db->where('ay.discipline_id', $discipline_id);
        $this->db->where('ay.college_id', $college_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function clearTable($academicyear_id, $course_id, $discipline_id)
    {
        $this->db->where('ay.academicyear_id', $academicyear_id);
        $this->db->where('ay.course_id', $course_id);
        $this->db->where('ay.discipline_id', $discipline_id);
        $this->db->delete('seat_allocation as ay');
    }
    function getSeatallocation($id)
    {
        $this->db->select('ay.*');
        $this->db->from('seat_allocation as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function addSeatallocation($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('seat_allocation', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editSeatallocation($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('seat_allocation', $data);
        return TRUE;
    }
}
