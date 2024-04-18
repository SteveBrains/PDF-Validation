<?php

use Mpdf\Tag\Em;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model
{
    function getRoles($search)
    {
        $this->db->select('r.*');
        $this->db->from('roles as r');
        if (!empty($search['searchParam'])) {
            $likeCriteria = "(r.role  LIKE '%" . $search['searchParam'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by("r.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getRole($role)
    {
        $this->db->select('r.*');
        $this->db->from('roles as r');
        $this->db->where('r.id', $role);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function getAllMenus()
    {
        $this->db->select('m.*');
        $this->db->from('menu as m');
        $this->db->where('m.status', 1);
        $this->db->where('m.parent_id', 0);
        $this->db->order_by("m.order", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $parent_id = $value->id;
            $children = self::getAllChildMenus($parent_id);
            $value->submenus = $children;
            $result[$key] = $value;
        }
        return $result;
    }
    function getAllChildMenus($menu)
    {
        $this->db->select('m.*');
        $this->db->from('menu as m');
        $this->db->where('m.status', 1);
        $this->db->where('m.parent_id', $menu);
        $this->db->order_by("m.order", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getMenusByRole($role)
    {
        $this->db->select('m.*');
        $this->db->from('role_menus as rm');
        $this->db->join('menu as m', 'rm.id_menu = m.id', 'left');
        $this->db->where('rm.id_role', $role);
        $this->db->where('m.status', 1);
        $this->db->where('m.parent_id', 0);
        $this->db->order_by("m.order", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $parent_id = $value->id;
            $children = self::getChildMenus($parent_id, $role);
            $value->submenus = $children;
            $result[$key] = $value;
        }
        return $result;
    }
    function getChildMenus($menu, $role)
    {
        $this->db->select('m.*');
        $this->db->from('role_menus as rm');
        $this->db->join('menu as m', 'rm.id_menu = m.id', 'left');
        $this->db->where('rm.id_role', $role);
        $this->db->where('m.status', 1);
        $this->db->where('m.parent_id', $menu);
        $this->db->order_by("m.order", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getRolePermissions($id)
    {
        $this->db->select('ay.*');
        $this->db->from('role_menus as ay');
        $this->db->where('ay.id_role', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function addRole($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('roles', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editRole($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('roles', $data);
        return TRUE;
    }
    function clearRolePermissions($role)
    {
        $this->db->trans_start();
        $this->db->where('id_role', $role);
        $this->db->delete('role_menus');
        $this->db->trans_complete();
    }
    function addRolePermissions($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('role_menus', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function getUserInfo($user_id)
    {
        $this->db->select('r.*');
        $this->db->from('users as r');
        $this->db->where('r.id', $user_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function checkRolePermission($id_role, $id_menu)
    {
        $this->db->select('rm.*');
        $this->db->from('role_menus as rm');
        $this->db->where('rm.id_role', $id_role);
        $this->db->where('rm.id_menu', $id_menu);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function getMenu($id)
    {
        $this->db->select('ay.*');
        $this->db->from('menu as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function getMenuByModules($module) {
        $this->db->select('m.*');
        $this->db->from('menu as m');
        $this->db->where('m.status', 1);
        $this->db->where('m.parent_id', 0);
        $this->db->where('m.module', $module);
        $this->db->order_by("m.order", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $parent_id = $value->id;
            $children = self::getAllChildMenus($parent_id);
            $value->submenus = $children;
            $result[$key] = $value;
        }
        return $result;
    }
    
}
