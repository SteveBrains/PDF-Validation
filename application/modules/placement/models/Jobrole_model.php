<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Jobrole_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('*');
        $this->db->from('jobrole as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getJobrole($id)
    {
        $this->db->select('*');
        $this->db->from('jobrole');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    function getPlacedStudentsByJobRole($id)
    {
        $this->db->select('a.*,b.name,b.mobile,b.email,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('b.job_role_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function addJobrole($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('jobrole', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editJobrole($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('jobrole', $data);
        $this->db->trans_complete();
        return TRUE;
    }




    function getStatus()
    {
        $this->db->select('*');
        $this->db->from('status');
        $query = $this->db->get();
        return $query->result();
    }
}
