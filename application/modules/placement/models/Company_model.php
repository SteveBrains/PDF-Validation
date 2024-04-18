<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Company_model extends CI_Model
{


    function getAll($search)
    {
        $this->db->select('*');
        $this->db->from('company as a');
        if (!empty($search['name'])) {
            $likeCriteria = "(a.name  LIKE '%" . $search['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($search['status'])) {
        // echo $search['status'];die;
        $likeCriteria = "(a.status  LIKE '" . $search['status'] . "')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getJobDescriptionByCompany($id)
    {
        $this->db->select('*');
        $this->db->from('jobdescription as a');
        $this->db->where('company_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCandidatesByJob($id)
    {
        $this->db->select('a.*,b.name,b.mobile,b.email,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('jobdescription_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getCompany($id)
    {
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addCompany($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('company', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addUser($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editCompany($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('company', $data);
        $this->db->trans_complete();
        return TRUE;
    }

    function getEducations()
    {
        $this->db->select('*');
        $this->db->from('highest_education');
        $query = $this->db->get();
        return $query->result();
    }
}
