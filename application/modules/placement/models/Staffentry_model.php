<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Staffentry_model extends CI_Model
{


    function getStaffs()
    {
        // echo "<pre>";
        // print_r($_SESSION);die;
        $this->db->select('a.*,b.name as TcName');
        $this->db->from('staff as a');
        if($_SESSION['role'] != 1){
        $this->db->where('training_center_id', $_SESSION['trainingcenter_id']);
        }
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        // $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    } 
    function addStaffentry($data)
    {
        $this->db->trans_start();
        $this->db->insert('staff', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function getTrainingCenters()
    {
        $this->db->select('*');
        $this->db->from('trainingcenter as a');
        if ($_SESSION['trainingcenter_id'] > 0) {
            $this->db->where('a.Id', $_SESSION['trainingcenter_id']);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    function updateStaffentry($data,$id)
    {
        $this->db->trans_start();
        $this->db->where('Id', $id);
        $this->db->update('staff', $data);
        $this->db->trans_complete();
        return ;
    }
    function getExperiences($id)
    {
        $this->db->select('*');
        $this->db->from('staff_experience');
        $this->db->where('staff_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function addStaffentryExperience($data)
    {
        $this->db->trans_start();
        $this->db->insert('staff_experience', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function updateStaffentryExperience($data,$id)
    {
        $this->db->trans_start();
        $this->db->where('Id', $id);
        $this->db->update('staff_experience', $data);
        $this->db->trans_complete();
        return ;
    }
     function updateStaffentryGraduation($data,$id)
    {
        $this->db->trans_start();
        $this->db->where('Id', $id);
        $this->db->update('staff_graduation', $data);
        $this->db->trans_complete();
        return ;
    }
    function getGraduations($id)
    {
        $this->db->select('*');
        $this->db->from('staff_graduation');
        $this->db->where('staff_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function addStaffentryGraduation($data)
    {
        $this->db->trans_start();
        $this->db->insert('staff_graduation', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function getStaffentry($id)
    {
        $this->db->select('a.*');
        $this->db->from('staff as a');
        $this->db->where('a.Id', $id);
        $query = $this->db->get();
        if (empty($query->row())) {
            return false;
        } else {
            return $query->row();
        }
    }
    function getStaffentry1($id)
    {
        $this->db->select('a.*');
        $this->db->from('staff as a');
        $this->db->join('shortlisted as b', 'a.acknowledge_number = b.acknowledge_number', 'left');
        $this->db->where('a.Id', $id);
        $query = $this->db->get();
        if (empty($query->row())) {
            return false;
        } else {
            return $query->row();
        }
    }
    function getStaffentryByEmail($email)
    {
        $this->db->select('a.*');
        $this->db->from('staff as a');
        $this->db->where('a.email', $email);
        $query = $this->db->get();
        if (empty($query->row())) {
            return true;
        } else {
            return false;
        }
    }
    function getStaffentryByRef($ref)
    {
        $this->db->select('a.*');
        $this->db->from('staff as a');
        $this->db->join('shortlisted as b', 'a.acknowledge_number = b.acknowledge_number', 'inner');
        $this->db->where('a.aadhar', trim($ref));
        $this->db->or_where('a.acknowledge_number', trim($ref));
        $query = $this->db->get();
        if (empty($query->row())) {
            return array();
        } else {
            return $query->row();
        }
    }
    function removeExperience($id)
    {
        $this->db->trans_start();
        $this->db->where('Id', $id);
        $this->db->delete('staff_experience');
        $this->db->trans_complete();
        return;
    }
}
