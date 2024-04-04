<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feestructure_model extends CI_Model
{
    function getFeestructures($search)
    {
        $this->db->select('ay.*,b.name as academicyearName, c.name as courseName, d.name as disciplineName, e.name as casteName');
        $this->db->from('fee_structure as ay');
        $this->db->join('academicyear as b', 'ay.academicyear_id = b.id', 'left');
        $this->db->join('course as c', 'ay.course_id = c.id', 'left');
        $this->db->join('discipline as d', 'ay.discipline_id = d.id', 'left');
        $this->db->join('caste as e', 'ay.caste_id = e.id', 'left');
        if (!empty($search['name'])) {
            $likeCriteria = "(ay.name  LIKE '%" . $search['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getFeestructure($id)
    {
        $this->db->select('ay.*');
        $this->db->from('fee_structure as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function addFeestructure($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('fee_structure', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editFeestructure($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('fee_structure', $data);
        return TRUE;
    }
    function getFeestructureDetails($id)
    {
        $this->db->select('ay.*,b.name as feeitemName');
        $this->db->from('fee_structure_details as ay');
        $this->db->join('feeitem as b', 'ay.feeitem_id = b.id', 'left');
        $this->db->where('feestructure_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function addFeestructureItem($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('fee_structure_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editFeestructureDetails($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('fee_structure_details', $data);
        return TRUE;
    }
    function getAcademicyears()
    {
        $this->db->select('ay.*');
        $this->db->from('academicyear as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCourses()
    {
        $this->db->select('ay.*');
        $this->db->from('course as ay');
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getDisciplines()
    {
        $this->db->select('ay.*');
        $this->db->from('discipline as ay');
        $this->db->where('ay.status', 1);
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
        return $result;
    }
    function getFeeItems($id)
    {
        $this->db->select('ay.*');
        $this->db->from('feeitem as ay'); 
        $this->db->where("ay.id not in (select feeitem_id from fee_structure_details where feestructure_id = $id)");
        $this->db->where('ay.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function removeitem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fee_structure_details');
    }
}
