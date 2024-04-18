<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Semester_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('*');
        $this->db->from('semester as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getSemester($id)
    {
        $this->db->select('*');
        $this->db->from('semester');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addSemester($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('semester', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editSemester($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('semester', $data);
        $this->db->trans_complete();
        return TRUE;
    }
}
