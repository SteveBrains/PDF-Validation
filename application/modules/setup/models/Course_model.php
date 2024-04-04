<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model
{
    function getCourses($search)
    {
        $this->db->select('ay.*');
        $this->db->from('course as ay');
        if (!empty($search['name'])) {
            $likeCriteria = "(ay.name  LIKE '%" . $search['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($search['code'])) {
            $likeCriteria = "(ay.code  LIKE '%" . $search['code'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getCourse($id)
    {
        $this->db->select('ay.*');
        $this->db->from('course as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function addCourse($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('course', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editCourse($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('course', $data);
        return TRUE;
    }
}
