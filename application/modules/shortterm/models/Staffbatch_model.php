<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Staffbatch_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('a.*,m.name as courseName,t.name as tcName,s.name as schemeName');
        $this->db->from('short_batch as a');
        $this->db->join('shorttermcourse as m', 'a.course_id = m.id', 'left');
        $this->db->join('trainingcenter as t', 'a.training_center_id = t.Id', 'left');
        $this->db->join('short_scheme as s', 'a.scheme_id = s.Id', 'left');
        $this->db->where('a.type', 2);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getBatch($id)
    {
        $this->db->select('*');
        $this->db->from('short_batch');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addBatch($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('short_batch', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editBatch($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('short_batch', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function getAllCourse()
    {
        $this->db->select('*');
        $this->db->from('shorttermcourse as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllTc()
    {
        $this->db->select('*');
        $this->db->from('trainingcenter as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllShortScheme()
    {
        $this->db->select('*');
        $this->db->from('short_scheme as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function tagStudents($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('shorttermcourse_students', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    function getCourses($batch_id)
    {
        $this->db->select('a.*,b.name as training_center');
        $this->db->from('staff as a');
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        if (!empty($batch_id)) {
            $likeCriteria = "(a.Id  not in (select candidate_id from shorttermcourse_students where batch_id = " . $batch_id . " and status = 'Active'))";
            // echo $likeCriteria;die;
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function unTagStudents($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('shorttermcourse_students', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function updateMarks($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('shorttermcourse_students', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function getTaggedCandidates($batch_id)
    {
        $this->db->select('a.*,b.name,b.email,b.mobile');
        $this->db->from('shorttermcourse_students as a');
        $this->db->join('staff as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.batch_id', $batch_id);
        $this->db->where('a.status', 'Active');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
