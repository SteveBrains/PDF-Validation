<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function loginAdmin($email, $password)
    {
        $this->db->select('a.*');
        $this->db->from('users as a');
        $this->db->where('a.email', $email);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user)) {
            if ($password == $user->password) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    function loginStudent($username, $password)
    {
        $this->db->select('a.*,b.college_id,b.semester_id,b.course_id');
        $this->db->from('student as a');
        $this->db->join('college_students as b', 'b.student_id = a.id', 'left');
        $this->db->where('a.aadhar', $username);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user)) {
            if ($password == $user->password) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    function loginPartner($email, $password)
    {
        $this->db->select('a.*');
        $this->db->from('partner_list as a');
        $this->db->where('a.login', $email);
        $this->db->where('a.status_id', 1);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user)) {
            if ($password == $user->password) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    function checkAccess($roleId, $code)
    {
        $this->db->select('rp.id');
        $this->db->from('role_menus as rp');
        $this->db->join('menu as m', 'rp.id_menu = m.id', 'left');
        $this->db->where('rp.id_role', $roleId);
        $this->db->where('m.code', $code);
        $query = $this->db->get();
        if (empty($query->row())) {
            return false;
        } else {
            return true;
        }
    }
    function getUser($userId)
    {
        $this->db->select('a.*');
        $this->db->from('users as a');
        $this->db->where('a.id', $userId);
        $query = $this->db->get();
        if (empty($query->row())) {
            return false;
        } else {
            return $query->row();
        }
    }
    function addUser($data)
    {
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function editUser($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->trans_start();
        $this->db->update('users', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function lastLoginInfo($userId)
    {
        $this->db->select('usr.created_dt_tm');
        $this->db->where('usr.id_user', $userId);
        $this->db->order_by('usr.id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user_last_login as usr');

        return $query->row();
    }

    function lastLogin($loginInfo)
    {
        // $this->db->trans_start();
        try{
            $this->db->insert('user_last_login', $loginInfo);
        }catch(Throwable $e){
            echo $e;
        }
        // $this->db->trans_complete();
    }
    function getMenu($role)
    {
        $this->db->select('a.*,b.module,b.controller,b.action');
        $this->db->from('role_menus as a');
        $this->db->join('menu as b', 'a.id_menu = b.id', 'left');
        $this->db->where('a.id_role', $role);
        $this->db->where('b.parent_id != 0');
        $this->db->order_by("b.id", "asc");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
}
