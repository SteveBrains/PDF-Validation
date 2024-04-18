<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model
{

    function getUsers($data)
    {
        $this->db->select('usr.id as userId, usr.email, usr.first_name, usr.last_name, usr.mobile,r.role as roleName');
        $this->db->from('users as usr');
        $this->db->join('roles as r', 'usr.role = r.id', 'left');
        if (!empty($data['name'])) {
            $likeCriteria = "(( usr.first_name  LIKE '%" . $data['name'] . "%' OR usr.last_name  LIKE '%" . $data['name'] . "%' ))";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['email'])) {
            $likeCriteria = "(usr.email  LIKE '%" . $data['email'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['mobile'])) {
            $likeCriteria = "(usr.mobile  LIKE '%" . $data['mobile'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('usr.id', 'DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
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
    function editUser($data, $userId)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $userId);
        $this->db->update('users', $data);
        return TRUE;
    }
    function getUser($userId)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $userId);
        $query = $this->db->get();
        return $query->row();
    }
    function getRoles()
    {
        $this->db->select('r.*');
        $this->db->from('roles as r');
        $this->db->order_by("r.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTrainingCenters()
    {
        $this->db->select('r.*');
        $this->db->from('trainingcenter as r');
        $this->db->order_by("r.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
