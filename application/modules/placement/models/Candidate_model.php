<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Candidate_model extends CI_Model
{


    function getAll()
    {
        $this->db->select('a.*,b.name as TcName,c.name as CourseName,d.name as HighestEducation');
        $this->db->from('candidate as a');
        if ($_SESSION['trainingcenter_id'] > 0) {
            $this->db->where('a.training_center_id', $_SESSION['trainingcenter_id']);
        }
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        $this->db->join('shorttermcourse as c', 'a.course_id = c.Id', 'left');
        $this->db->join('highest_education as d', 'a.education = d.Id', 'left');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function listAll()
    {
        $this->db->select('a.*,b.name as TcName,c.name as CourseName,d.name as HighestEducation');
        $this->db->from('candidate as a');
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        $this->db->join('shorttermcourse as c', 'a.course_id = c.Id', 'left');
        $this->db->join('highest_education as d', 'a.education = d.Id', 'left');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllCourse()
    {
        $this->db->select('*');
        $this->db->from('course as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTrainingCenters()
    {
        $this->db->select('*');
        $this->db->from('trainingcenter as a');
        if ($_SESSION['trainingcenter_id'] > 0) {
            $this->db->where('a.Id', $_SESSION['trainingcenter_id']);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCourses()
    {
        $this->db->select('*');
        $this->db->from('course as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getPlacedStudents()
    {
        $this->db->select('a.*,b.name,b.mobile,b.email,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.placement_status', 'Selected');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getStudentByEmail($email)
    {
        $this->db->select('*');
        $this->db->from('candidate');
        $likeCriteria = "(email  LIKE '" . $email . "')";
        $this->db->where($likeCriteria);
        $query = $this->db->get();
        return $query->row();
    }
    function getJobrolesById($id)
    {
        $this->db->select('b.Id,b.name');
        $this->db->from('trainingcenter_has_jobroles as a');
        $this->db->join('jobrole as b', 'a.id_jobrole = b.Id', 'left');
        $this->db->where('a.id_trainingcenter', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getSemestersById($id)
    {
        $this->db->select('DISTINCT(b.Id),b.name');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('semester as b', 'a.semester_id = b.Id', 'left');
        $this->db->where('a.course_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } 
    function getCandidatesById($id,$tcid)
    {
        $this->db->select('a.Id,a.name');
        $this->db->from('candidate as a');
        $this->db->where('a.course_id', $id);
        $this->db->where('a.training_center_id', $tcid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } 
    function getSubjectsById($course_id,$semester_id)
    {
        $this->db->select('DISTINCT(b.Id),b.name,b.code');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.semester_id', $semester_id);
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getJobRoles()
    {
        $this->db->select('*');
        $this->db->from('jobrole as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getCandidate($id)
    {
        $this->db->select('*');
        $this->db->from('candidate');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    function getCandidatePlacements($id)
    {
        $this->db->select('a.*,b.title,b.code,c.name');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('jobdescription as b', 'a.jobdescription_id = b.Id', 'left');
        $this->db->join('company as c', 'b.company_id = c.Id', 'left');
        $this->db->where('a.candidate_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    function addCandidate($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('candidate', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    } 
    function editCandidate($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('candidate', $data);
        $this->db->trans_complete();
        return TRUE;
    }

    function getEducations()
    {
        $this->db->select('*');
        $this->db->from('highest_education');
        $query = $this->db->get();
        return $query->result();
    }
}
