<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subject_model extends CI_Model
{
    function getSubjects($search)
    {
        $this->db->select('ay.*');
        $this->db->from('subject as ay');
        if (!empty($search['name'])) {
            $likeCriteria = "(ay.name  LIKE '%" . $search['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($search['code'])) {
            $likeCriteria = "(ay.code  LIKE '%" . $search['code'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getSubject($id)
    {
        $this->db->select('ay.*');
        $this->db->from('subject as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function addSubject($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('subject', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function editSubject($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('subject', $data);
        return TRUE;
    }
    function getAllCourse()
    {
        $this->db->select('*');
        $this->db->from('course as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function addSubjectTagging($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('course_semester_subject_tag', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function getAllSemester()
    {
        $this->db->select('*');
        $this->db->from('semester as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getUntaggedSubjects($course_id)
    {
        $this->db->select('*');
        $this->db->from('subject as a');
        $this->db->where("a.id not in (select subject_id from course_semester_subject_tag where course_id = $course_id)");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTaggedSemesters($id)
    {
        $this->db->select('DISTINCT(b.id) as id,b.name');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('semester as b', 'a.semester_id = b.id', 'left');
        $this->db->where('a.course_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $subjects = self::getTaggedSubjects($value->id);
            $value->subjects = $subjects;
            $result[$key] = $value;
        }
        return $result;
    }
    function getTaggedSubjects($id)
    {
        $this->db->select('a.id as mainId,b.id,b.name,b.code');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('subject as b', 'a.subject_id = b.id', 'left');
        $this->db->where('a.semester_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function remove($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('course_semester_subject_tag');
    }
}
