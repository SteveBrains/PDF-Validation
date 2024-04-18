<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Scheme_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('*');
        $this->db->from('scheme as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getScheme($id)
    {
        $this->db->select('*');
        $this->db->from('scheme');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addScheme($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('scheme', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editScheme($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('scheme', $data);
        $this->db->trans_complete();
        return TRUE;
    }
}
