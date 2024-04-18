<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Education_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('*');
        $this->db->from('highest_education as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllLecturers()
    {
        // $query = $this->db->query("SELECT a.* FROM lecturer a INNER JOIN (SELECT email, MIN(Id) as Id FROM lecturer GROUP BY email ) AS b ON a.email = b.email AND a.Id = b.Id;");
        $this->db->select('a.*');
        $this->db->from('lecturer as a');
        // $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getExperiences($id)
    {
        $this->db->select('*');
        $this->db->from('lecturer_experience');
        $this->db->where('lecturer_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function getEducation($id)
    {
        $this->db->select('*');
        $this->db->from('highest_education');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addEducation($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('highest_education', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editEducation($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('highest_education', $data);
        $this->db->trans_complete();
        return TRUE;
    }
}
