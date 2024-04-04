<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    function getMenus($search)
    {
        $this->db->select('ay.*,p.menu_name as parent_name');
        $this->db->from('menu as ay');
        $this->db->join('menu as p', 'ay.parent_id = p.id', 'left');
        if (!empty($search['searchParam'])) {
            $likeCriteria = "(ay.menu_name  LIKE '%" . $search['searchParam'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($search['parent_id'])) {
            $this->db->where('ay.parent_id', $search['parent_id']);
        }
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getParentMenus()
    {
        $this->db->select('ay.*');
        $this->db->from('menu as ay');
        $this->db->where('ay.status', 1);
        $this->db->where('ay.parent_id', 0);
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
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

    function addMenu($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('menu', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editMenu($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('menu', $data);
        return TRUE;
    }
}
