<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    function getUserDetails($userId)
    {
        $this->db->select('a.*');
        $this->db->from('users as a');
        $this->db->where('a.id', $userId);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user)) {
            return $user;
        } else {
            return array();
        }
    }
    function getPartnerDetails($userId)
    {
        $this->db->select('a.*');
        $this->db->from('partner_list as a');
        $this->db->where('a.id', $userId);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user)) {
            return $user;
        } else {
            return array();
        }
    }
    function updateUser($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return TRUE;
    }
    function updatePartner($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('partner_list', $data);
        return TRUE;
    }
    function addUser($data)
    {
        $this->db->trans_start();
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}
