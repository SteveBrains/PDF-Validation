<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Discipline_model extends CI_Model
{
    function getDisciplines($search)
    {
        $this->db->select('ay.*, b.name as courseName');
        $this->db->from('discipline as ay');
        $this->db->join('course as b', 'ay.course_id = b.id', 'left');
        if (!empty($search['name'])) {
            $likeCriteria = "(ay.name  LIKE '%" . $search['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getDiscipline($id)
    {
        $this->db->select('ay.*');
        $this->db->from('discipline as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function addDiscipline($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('discipline', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editDiscipline($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('discipline', $data);
        return TRUE;
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
}
