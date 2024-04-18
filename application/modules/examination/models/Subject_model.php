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


    function getAll()
    {
        $this->db->select('*');
        $this->db->from('subject as a');
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
    function getAllCourse()
    {
        $this->db->select('*');
        $this->db->from('course as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllTC()
    {
        $this->db->select('*');
        $this->db->from('trainingcenter as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllSemester()
    {
        $this->db->select('*');
        $this->db->from('semester as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTaggedSemesters($id)
    {
        $this->db->select('DISTINCT(b.Id) as Id,b.name');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('semester as b', 'a.semester_id = b.Id', 'left');
        $this->db->where('a.course_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $key => $value) {
            $subjects = self::getTaggedSubjects($value->Id);
            $value->subjects = $subjects;
            $result[$key] = $value;
        }
        // echo "<pre>";print_r($result);die;
        return $result;
    }
    function getBarcodes($course_id, $semester_id, $subject_id)
    {
        $this->db->select('a.*,b.name,b.registration_number,b.father_name');
        $this->db->from('external_marks as a');
        $this->db->join('candidate as b', 'a.student_id = b.Id', 'left');
        if ($course_id > 0) {
            $this->db->where('a.course_id', $course_id);
        }
        if ($semester_id > 0) {
            $this->db->where('a.semester_id', $semester_id);
        }
        if ($subject_id > 0) {
            $this->db->where('a.subject_id', $subject_id);
        }
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        $result = $query->result();
        // echo "<pre>";print_r($result);die;
        return $result;
    }
    function getApprovalBarcodes1()
    {
        $this->db->select('a.*,b.name,b.registration_number,b.father_name');
        $this->db->from('external_marks as a');
        $this->db->join('candidate as b', 'a.student_id = b.Id', 'left');
       
        $this->db->where('a.status', 0);
        $query = $this->db->get();
        $result = $query->result();
        // echo "<pre>";print_r($result);die;
        return $result;
    }
    function getApprovalBarcodes2()
    {
        $this->db->select('a.*,b.name,b.registration_number,b.father_name');
        $this->db->from('external_marks as a');
        $this->db->join('candidate as b', 'a.student_id = b.Id', 'left');
       
        $this->db->where('a.status', 2);
        $query = $this->db->get();
        $result = $query->result();
        // echo "<pre>";print_r($result);die;
        return $result;
    }
    function getStudentResult($course_id, $semester_id, $training_center_id)
    {
        $this->db->select('DISTINCT(a.student_id) as student_id,c.name as studentName,c.father_name as fatherName,c.registration_number');
        $this->db->from('marks as a');
        $this->db->join('candidate as c', 'a.student_id = c.Id', 'left');
        if ($_SESSION['role'] == 3) {
            $this->db->where('c.training_center_id', $_SESSION['trainingcenter_id']);
        }
        if ($training_center_id > 0) {
            $this->db->where('c.training_center_id', $training_center_id);
        }
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $query = $this->db->get();
        $students = $query->result();

        foreach ($students as $key => $value) {
            $subjects = self::getSubjects($course_id, $semester_id);
            foreach ($subjects as $subject) {
                $marks = self::getStudentSubjectMark($course_id, $semester_id, $subject->Id, $value->student_id);
                $sub_code_s = $subject->code . "_s";
                $sub_code_e = $subject->code . "_e";
                $sub_code_t = $subject->code . "_t";
                $value->$sub_code_s = $marks->internal_marks;
                $value->$sub_code_e = $marks->external_marks;
                $value->$sub_code_t = $marks->total_marks;
            }
            $students->$key = $value;
        }
        // echo "<pre>";print_r($students);die;
        return $students;
    }
    function getStudentResult1($course_id, $semester_id, $training_center_id,$candidate_id)
    {
        $this->db->select('DISTINCT(a.student_id) as student_id,c.name as studentName,c.father_name as fatherName,c.registration_number');
        $this->db->from('marks as a');
        $this->db->join('candidate as c', 'a.student_id = c.Id', 'left');
        if ($_SESSION['role'] == 3) {
            $this->db->where('c.training_center_id', $_SESSION['trainingcenter_id']);
        }
        if ($training_center_id > 0) {
            $this->db->where('c.training_center_id', $training_center_id);
        }
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $this->db->where('a.student_id', $candidate_id);
        $query = $this->db->get();
        $students = $query->result();

        foreach ($students as $key => $value) {
            $subjects = self::getSubjects($course_id, $semester_id);
            foreach ($subjects as $subject) {
                $marks = self::getStudentSubjectMark($course_id, $semester_id, $subject->Id, $value->student_id);
                $sub_code_s = $subject->code . "_s";
                $sub_code_e = $subject->code . "_e";
                $sub_code_t = $subject->code . "_t";
                $value->$sub_code_s = $marks->internal_marks;
                $value->$sub_code_e = $marks->external_marks;
                $value->$sub_code_t = $marks->total_marks;
            }
            $students->$key = $value;
        }
        // echo "<pre>";print_r($students);die;
        return $students;
    }
    function getStudentSubjectMark($course_id, $semester_id, $subject_id, $student_id)
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
    function getSubjects($course_id, $semester_id)
    {
        $this->db->select('b.Id,b.name,b.code');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $query = $this->db->get();
        $subjects = $query->result();

        // foreach ($students as $key => $value) {
        //     $student_total_marks = self::getStudentTotalMarks($value->student_id,$course_id,$semester_id);
        //     $semester_total_marks = self::getSemesterTotalMarks($course_id,$semester_id);
        //     $value->student_total_marks = $student_total_marks;
        //     $value->semester_total_marks = $semester_total_marks;
        //     $result[$key] = $value;
        // }
        // echo "<pre>";print_r($result);die;
        return $subjects;
    }
    function getStudentTotalMarks($student_id, $course_id, $semester_id)
    {
        $this->db->select('SUM(total_marks) as total_marks');
        $this->db->from('marks as a');
        $this->db->where('a.student_id', $student_id);
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_marks;
    }
    function getSemesterTotalMarks($course_id, $semester_id)
    {
        $this->db->select('SUM(b.total_min) as total_marks');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_marks;
    }
    function getTaggedSubjects($id)
    {
        $this->db->select('a.Id as mainId,b.Id,b.name,b.code');
        $this->db->from('course_semester_subject_tag as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.semester_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getSubject($id)
    {
        $this->db->select('*');
        $this->db->from('subject');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    function getCandidate($id)
    {
        $this->db->select('a.*,b.name as trainingCenter,c.name as courseName,d.name as semesterName');
        $this->db->from('candidate as a');
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        $this->db->join('course as c', 'a.course_id = c.Id', 'left');
        $this->db->join('semester as d', 'a.semester_id = d.Id', 'left');
        $this->db->where('a.Id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    function checkStudentTagging($student_id, $course_id, $semester_id)
    {
        $this->db->select('*');
        $this->db->from('candidate');
        $this->db->where('course_id', $course_id);
        $this->db->where('semester_id', $semester_id);
        $this->db->where('Id', $student_id);
        $query = $this->db->get();
        return $query->row();
    }
    function checkExternalUpload($course_id, $semester_id, $subject_id, $student_id)
    {
        $this->db->select('*');
        $this->db->from('external_marks');
        $this->db->where('course_id', $course_id);
        $this->db->where('semester_id', $semester_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('student_id', $student_id);
        $query = $this->db->get();
        return $query->row();
    }
    function checkBarcode($course_id, $semester_id, $subject_id, $barcode)
    {
        $this->db->select('*');
        $this->db->from('external_marks');
        $this->db->where('course_id', $course_id);
        $this->db->where('semester_id', $semester_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('barcode', $barcode);
        $query = $this->db->get();
        return $query->row();
    }
    function checkSubjectTagging($subject_id, $course_id, $semester_id)
    {
        $this->db->select('*');
        $this->db->from('course_semester_subject_tag');
        $this->db->where('course_id', $course_id);
        $this->db->where('semester_id', $semester_id);
        $this->db->where('subject_id', $subject_id);
        $query = $this->db->get();
        return $query->row();
    }
    function checkInternalMarks($marks, $student_id, $subject_id, $course_id, $semester_id)
    {
        $this->db->select('*');
        $this->db->from('marks');
        $this->db->where('course_id', $course_id);
        $this->db->where('semester_id', $semester_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('student_id', $student_id);
        $this->db->where('internal_marks', $marks);
        $query = $this->db->get();
        return $query->row();
    }
    function getStudentSubjectMarks($course_id, $semester_id, $student_id)
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
    function getStudentSubjectMarks1( $student_id)
    {
        $this->db->select('a.*,b.code,b.name,b.internal_max,b.external_max,b.internal_min,b.external_min');
        $this->db->from('marks as a');
        $this->db->join('subject as b', 'a.subject_id = b.Id', 'left');
        $this->db->where('a.student_id', $student_id);
        $query = $this->db->get();
        return $query->result();
    }
    function getSubjectId($code)
    {
        $this->db->select('*');
        $this->db->from('subject');
        $this->db->where('code', $code);
        $query = $this->db->get();
        $result = $query->row();
        return $result->Id;
    }
    function getStudentId($rno)
    {
        $this->db->select('*');
        $this->db->from('candidate');
        $this->db->where('registration_number', $rno);
        $query = $this->db->get();
        $result = $query->row();
        // echo "<pre>";
        //         print_r($result);
        //         die;
        return $result->Id;
    }
    function getStudent($id)
    {
        $this->db->select('*');
        $this->db->from('candidate');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        $result = $query->row();
        // echo "<pre>";
        //         print_r($result);
        //         die;
        return $result;
    }
    function getStudentIdByBarcode($barcode)
    {
        $this->db->select('*');
        $this->db->from('external_marks');
        $this->db->where('barcode', $barcode);
        $query = $this->db->get();
        $result = $query->row();
        return $result->student_id;
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
    function addInternalMarks($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('marks', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addExternalMarks($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('external_marks', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function updateInternalMarks($data, $student_id, $subject_id, $course_id, $semester_id, $internal_marks)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('student_id', $student_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('course_id', $course_id);
        $this->db->where('semester_id', $semester_id);
        $this->db->where('internal_marks', $internal_marks);
        $this->db->trans_start();
        $this->db->update('marks', $data);

        $this->db->trans_complete();
        return true;
    }
    
    function updateExternalMarks($data, $barcode, $subject_id, $course_id, $semester_id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('barcode', $barcode);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('course_id', $course_id);
        $this->db->where('semester_id', $semester_id);
        $this->db->trans_start();
        $this->db->update('external_marks', $data);

        $this->db->trans_complete();
        return true;
    }
    function updateExternalMarks1($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('external_marks', $data);

        $this->db->trans_complete();
        return true;
    }
    function getStudentDetailsByBarcode($barcode)
    {
        $this->db->select('a.*');
        $this->db->from('external_marks as a');
        $this->db->where('a.barcode', $barcode);
        $query = $this->db->get();
        return $query->row();
    }
    function checkMarks($student_id, $subject_id, $course_id, $semester_id)
    {
        $this->db->select('a.*');
        $this->db->from('marks as a');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.semester_id', $semester_id);
        $this->db->where('a.student_id', $student_id);
        $this->db->where('a.subject_id', $subject_id);
        $query = $this->db->get();
        return $query->row();
    }
    function syncMarks($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('marks', $data);

        $this->db->trans_complete();
        return true;
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
    function editSubject($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('subject', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function editStudent($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('candidate', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function remove($id)
    {
        $this->db->where('Id', $id);
        $this->db->delete('course_semester_subject_tag');
    }
}
