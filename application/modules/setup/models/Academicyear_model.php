<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Academicyear_model extends CI_Model
{
    function getAcademicyears($search)
    {
        $this->db->select('ay.*');
        $this->db->from('academicyear as ay');
        if (!empty($search['name'])) {
            $likeCriteria = "(ay.name  LIKE '%" . $search['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($search['start_date'])) {
            $likeCriteria = "(ay.start_date  LIKE '%" . $search['start_date'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($search['end_date'])) {
            $likeCriteria = "(ay.end_date  LIKE '%" . $search['end_date'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getAcademicyear($id)
    {
        $this->db->select('ay.*');
        $this->db->from('academicyear as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function addAcademicyear($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('academicyear', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editAcademicyear($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('academicyear', $data);
        return TRUE;
    }
}