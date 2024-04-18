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
        $this->db->select('*');
        $this->db->from('candidate as a');
        if ($_SESSION['trainingcenter_id'] > 0) {
            $this->db->where('a.training_center_id', $_SESSION['trainingcenter_id']);
        }

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
        $this->db->select('a.*,b.name as trainingCenter');
        $this->db->from('candidate as a');
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        $this->db->where('a.Id', $id); 
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
    function getSubjects($course_id, $semester_id)
    {
        $this->db->select('b.Id,b.name,b.code');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $query = $this->db->get();
        $subjects = $query->result();

        return $subjects;
    }
    function getStudentResult($course_id, $semester_id,$student_id)
    {
        $this->db->select('DISTINCT(a.student_id) as student_id,c.name as studentName,c.father_name as fatherName,c.registration_number');
        $this->db->from('marks as a');
        $this->db->join('candidate as c', 'a.student_id = c.Id', 'left');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $this->db->where('a.student_id', $student_id);
        $query = $this->db->get();
        $students = $query->result();

        foreach ($students as $key => $value) {
            $subjects = self::getSubjects($course_id,$semester_id);
            foreach($subjects as $subject){
                $marks = self::getStudentSubjectMark($course_id,$semester_id,$subject->Id,$value->student_id);
                $sub_code_s = $subject->code."_s";
                $sub_code_e = $subject->code."_e";
                $sub_code_t = $subject->code."_t";
                $value->$sub_code_s = $marks->internal_marks;
                $value->$sub_code_e = $marks->external_marks;
                $value->$sub_code_t = $marks->total_marks;
            }
            $students->$key = $value;
        }
        // echo "<pre>";print_r($students);die;
        return $students;
    }
    function getStudentSubjectMark($course_id,$semester_id,$subject_id,$student_id)
    {
        $this->db->select('a.Id,a.internal_marks,a.external_marks,a.total_marks');
        $this->db->from('marks as a');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $this->db->where('a.subject_id', $subject_id);
        $this->db->where('a.student_id', $student_id);
        $query = $this->db->get();
        return $query->row();
    }
    function getStudentSubjectMarks($course_id,$semester_id,$student_id)
    {
        $this->db->select('a.*,b.code,b.name,b.internal_max,b.external_max,b.internal_min,b.external_min');
        $this->db->from('marks as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $this->db->where('a.student_id', $student_id);
        $query = $this->db->get();
        return $query->result();
    }
}
