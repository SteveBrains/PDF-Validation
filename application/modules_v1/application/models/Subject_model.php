<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Subject_model extends CI_Model
{


    function getSubjects()
    {
        $this->db->select('a.id,b.name,b.code,b.type,c.name as studentName');
        $this->db->from('student_subjects as a');
        $this->db->join('subject as b', 'a.subject_id = b.id', 'left');
        $this->db->join('student as c', 'a.student_id = c.id', 'left');
        $this->db->where('a.status', 0);
        $query = $this->db->get();
        $subjects = $query->result();

        return $subjects;
    }
    function editStudentSubject($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->trans_start();
        $this->db->update('student_subjects', $data);
        $this->db->trans_complete();
        return TRUE;
    }

   
}
