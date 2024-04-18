<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Applicationfee_model extends CI_Model
{
    function getApplicationfees($search)
    {
        $this->db->select('ay.*, b.name as casteName');
        $this->db->from('application_fee as ay');
        $this->db->join('caste as b', 'ay.caste_id = b.id', 'left');
        if (!empty($search['type'])) {
            $likeCriteria = "(ay.type  LIKE '%" . $search['type'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($search['caste_id'])) {
            $this->db->where('ay.caste_id', $search['caste_id']);
        }
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCastes()
    {
        $this->db->select('ay.*');
        $this->db->from('caste as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $ugapplicationfee = $this->getUGApplicationfee($value->id);
            $pgapplicationfee = $this->getPGApplicationfee($value->id);
            $value->ugapplicationfee = $ugapplicationfee;
            $value->pgapplicationfee = $pgapplicationfee;
            $result[$key] = $value;
        }
        return $result;
    }
    function getUGApplicationfee($id)
    {
        $this->db->select('ay.*');
        $this->db->from('application_fee as ay');
        $this->db->where('ay.caste_id', $id);
        $this->db->where('ay.type', 'UG');
        $query = $this->db->get();
        $result = $query->row();
        return $result->fee;
    }
    function getPGApplicationfee($id)
    {
        $this->db->select('ay.*');
        $this->db->from('application_fee as ay');
        $this->db->where('ay.caste_id', $id);
        $this->db->where('ay.type', 'PG');
        $query = $this->db->get();
        $result = $query->row();
        return $result->fee;
    }
    function getApplicationfee($id)
    {
        $this->db->select('ay.*');
        $this->db->from('application_fee as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function addApplicationfee($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('application_fee', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editApplicationfee($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('application_fee', $data);
        return TRUE;
    }

    function clearTable()
    {
        $this->db->truncate('application_fee');
    }
}
