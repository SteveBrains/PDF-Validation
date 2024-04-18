<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Trainingcenter_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('*');
        $this->db->from('trainingcenter as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllJobroles()
    {
        $this->db->select('*');
        $this->db->from('jobrole as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTaggedJobroles($id)
    {
        $this->db->select('b.Id,b.name as JobRole');
        $this->db->from('trainingcenter_has_jobroles as a');
        $this->db->join('jobrole as b', 'a.id_jobrole = b.Id', 'left');
        $this->db->where('a.id_trainingcenter', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getPlacedStudentsByTrainingCenter($id)
    {
        $this->db->select('a.*,b.name,b.mobile,b.email,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('b.training_center_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getTrainingcenter($id)
    {
        $this->db->select('*');
        $this->db->from('trainingcenter');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addTrainingcenter($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('trainingcenter', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function tagJobRole($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('trainingcenter_has_jobroles', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editTrainingcenter($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('trainingcenter', $data);
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
    function removeJobRole($id_jobrole, $id_trainingcenter)
    {
        $this->db->where('id_jobrole', $id_jobrole);
        $this->db->where('id_trainingcenter', $id_trainingcenter);
        $this->db->delete('trainingcenter_has_jobroles');
    }
}
