<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Subject extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subject_model');
        $this->load->library('excel');

        // echo "hi";die;
        $this->isLoggedIn();
        if (!$this->checkAccess('examination.subject')) {
            $this->loadAccessRestricted();
        }
    }

    function list()
    {
        $this->global['code'] = 'examination.subject';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['subjectList'] = $this->subject_model->getAll();
        $this->loadViews("subject/list", $this->global, $data, NULL);
    }
    function course()
    {
        if (!$this->checkAccess('examination.tagging')) {
            $this->loadAccessRestricted();
        }
        $this->global['code'] = 'examination.tagging';
        $formData['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['courseList'] = $this->subject_model->getAllCourse();
        $this->loadViews("subject/course", $this->global, $data, NULL);
    }
    function tag($id)
    {
        $this->global['code'] = 'examination.tagging';

        if ($this->input->post()) {

            $subject = $this->security->xss_clean($this->input->post('subject'));
            $semester = $this->security->xss_clean($this->input->post('semester'));
            $data = array(
                'subject_id' => $subject,
                'semester_id' => $semester,
                'course_id' => $id,
                'status' => 1,
            );
            $result = $this->subject_model->addSubjectTagging($data);
            redirect('/examination/subject/tag/' . $id);
        }
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['semesterList'] = $this->subject_model->getAllSemester();
        $data['subjectList'] = $this->subject_model->getUntaggedSubjects($id);
        $data['taggedSubjects'] = $this->subject_model->getTaggedSemesters($id);
        $this->loadViews("subject/tag", $this->global, $data, NULL);
    }
    function add()
    {
        $this->global['code'] = 'examination.subject';
        if ($this->input->post()) {

            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $internal_min = $this->security->xss_clean($this->input->post('internal_min'));
            $internal_max = $this->security->xss_clean($this->input->post('internal_max'));
            $external_min = $this->security->xss_clean($this->input->post('external_min'));
            $external_max = $this->security->xss_clean($this->input->post('external_max'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'internal_min' => $internal_min,
                'internal_max' => $internal_max,
                'external_min' => $external_min,
                'external_max' => $external_max,
                'total_min' => $internal_min + $external_min,
                'total_max' => $internal_max + $external_max,
                'status' => $status,
            );

            $result = $this->subject_model->addSubject($data);
            redirect('/examination/subject/list');
        }

        $this->loadViews("subject/add", $this->global, $data, NULL);
    }
    function edit($id = NULL)
    {
        $this->global['code'] = 'examination.subject';
        if ($id == null) {
            redirect('/examination/subject/list');
        }
        if ($this->input->post()) {
            $name = $this->security->xss_clean($this->input->post('name'));
            $code = $this->security->xss_clean($this->input->post('code'));
            $internal_min = $this->security->xss_clean($this->input->post('internal_min'));
            $internal_max = $this->security->xss_clean($this->input->post('internal_max'));
            $external_min = $this->security->xss_clean($this->input->post('external_min'));
            $external_max = $this->security->xss_clean($this->input->post('external_max'));
            $status = $this->security->xss_clean($this->input->post('status'));
            $data = array(
                'name' => $name,
                'code' => $code,
                'internal_min' => $internal_min,
                'internal_max' => $internal_max,
                'external_min' => $external_min,
                'external_max' => $external_max,
                'total_min' => $internal_min + $external_min,
                'total_max' => $internal_max + $external_max,
                'status' => $status,
            );

            $result = $this->subject_model->editSubject($data, $id);
            redirect('/examination/subject/list');
        }
        $data['subject'] = $this->subject_model->getSubject($id);
        $this->loadViews("subject/edit", $this->global, $data, NULL);
    }
    public function removetag($id)
    {
        $this->subject_model->remove($id);
        redirect('/examination/subject/course');
    }
    function internalmarks()
    {
        $this->global['code'] = 'examination.internalmarks';
        $data = array();
        if ($this->input->post()) {
            $from = $this->security->xss_clean($this->input->post('from'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            if ($from == 'file') {
                if ($_FILES['students']['tmp_name'] != '') {
                    $objPHPExcel = PHPExcel_IOFactory::load($_FILES['students']['tmp_name']);
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    foreach ($cell_collection as $cell) {
                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = trim($objPHPExcel->getActiveSheet()->getCell($cell)->getValue());
                        if ($row == 1) {
                            $header[$row][$column] = $data_value;
                        } else {
                            $values[$row][$column] = $data_value;
                        }
                    }
                    $duplicates = array();
                    foreach ($values as $key => $row) {
                        $rno = $row['A'];
                        $scode = $row['C'];
                        $subject_id = $this->subject_model->getSubjectId(trim($scode));
                        $student_id = $this->subject_model->getStudentId(trim($rno));
                        $check1 = $this->subject_model->checkStudentTagging($student_id, $course_id, $semester_id);
                        $check2 = $this->subject_model->checkSubjectTagging($subject_id, $course_id, $semester_id);
                        if (!($check1 && $check2)) {
                            array_push($duplicates, $row);
                            unset($values[$key]);
                        }
                    }
                    $data['header'] = $header;
                    $data['studentList'] = $values;
                    $data['studentListArray'] = htmlspecialchars(serialize($values));
                    $data['duplicates'] = $duplicates;
                    $data['course_id'] = $course_id;
                    $data['semester_id'] = $semester_id;
                }
                // echo "<pre>";print_r($this->session);die;   
            } else {
                $studentArray = unserialize($this->input->post('studentArray'));
                // echo "<pre>";print_r($studentArray);die;   
                if ($studentArray) {
                    foreach ($studentArray as $key => $row) {
                        $rno = $row['A'];
                        $scode = $row['C'];
                        $subject_id = $this->subject_model->getSubjectId(trim($scode));
                        $student_id = $this->subject_model->getStudentId(trim($rno));
                        $insertdata = array(
                            "student_id" => $student_id,
                            "subject_id" => $subject_id,
                            "course_id" => $this->input->post('course_id'),
                            "semester_id" => $this->input->post('semester_id'),
                            "internal_marks" => trim($row['D']),
                            "status" => 1,
                        );
                        $this->subject_model->addInternalMarks($insertdata);
                    }
                }
                redirect('/examination/subject/internalmarks');
            }
        }
        //print_r($subjectDetails);exit;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $this->loadViews("subject/internalmarks", $this->global, $data, NULL);
    }
    function externalmarks()
    {
        $this->global['code'] = 'examination.externalmarks';
        $data = array();
        if ($this->input->post()) {
            $from = $this->security->xss_clean($this->input->post('from'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            if ($from == 'file') {
                if ($_FILES['students']['tmp_name'] != '') {
                    $objPHPExcel = PHPExcel_IOFactory::load($_FILES['students']['tmp_name']);
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    foreach ($cell_collection as $cell) {
                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = trim($objPHPExcel->getActiveSheet()->getCell($cell)->getValue());
                        $subjects = array();
                        if ($data_value != '') {
                            if ($row == 1) {
                                $header[$row][$column] = $data_value;
                            } elseif ($row > 4) {
                                $values[$row][$column] = $data_value;
                            }
                        }
                    }
                    $subject_indexes = array('E', 'H', 'K', 'N', 'Q', 'T', 'W', 'Z', 'AC', 'AF', 'AI', 'AL', 'AO');
                    foreach ($subject_indexes as $index) {
                        if (trim($header[1][$index]) == 'Total') {
                            break;
                        }
                        if (trim($header[1][$index]) != '') {
                            $tempindex = $index;
                            $sub = array(
                                's_index' => $tempindex,
                                'e_index' => ++$tempindex,
                                't_index' => ++$tempindex,
                                'value' => trim($header[1][$index]),
                            );
                            array_push($subjects, $sub);
                        }
                    }
                    $duplicates = array();


                    if ($values) {
                        foreach ($values as $key => $row1) {
                            if ($subjects) {
                                foreach ($subjects as $row) {
                                    $rno = $row1['B'];
                                    $scode = $row['value'];
                                    $subject_id = $this->subject_model->getSubjectId(trim($scode));
                                    $student_id = $this->subject_model->getStudentId(trim($rno));
                                    $check1 = $this->subject_model->checkStudentTagging($student_id, $course_id, $semester_id);
                                    $check2 = $this->subject_model->checkSubjectTagging($subject_id, $course_id, $semester_id);
                                    $check3 = $this->subject_model->checkInternalMarks(trim($row1[$row['s_index']]), $student_id, $subject_id, $course_id, $semester_id);
                                    if (!($check1 && $check2 && $check3)) {
                                        array_push($duplicates, $row1);
                                        unset($values[$key]);
                                    }
                                }
                            }
                        }
                    }

                    $data['header'] = $header;
                    $data['subjects'] = $subjects;

                    $data['studentList'] = $values;
                    $data['studentListArray'] = htmlspecialchars(serialize($values));
                    $data['subjectListArray'] = htmlspecialchars(serialize($subjects));
                    $data['duplicates'] = $duplicates;
                    $data['course_id'] = $course_id;
                    $data['semester_id'] = $semester_id;
                }
                // echo "<pre>";
                // print_r($data);
                // die;
            } else {
                $studentArray = unserialize($this->input->post('studentArray'));
                $subjectArray = unserialize($this->input->post('subjectArray'));
                // echo "<pre>";print_r($studentArray);die;   
                if ($studentArray) {
                    foreach ($studentArray as $row1) {
                        if ($subjectArray) {
                            foreach ($subjectArray as $row) {
                                $rno = $row1['B'];
                                $scode = $row['value'];
                                $subject_id = $this->subject_model->getSubjectId(trim($scode));
                                $student_id = $this->subject_model->getStudentId(trim($rno));
                                $course_id = $this->input->post('course_id');
                                $semester_id = $this->input->post('semester_id');
                                $internal_marks = trim($row1[$row['s_index']]);
                                $insertdata = array(
                                    "external_marks" => trim($row1[$row['e_index']]),
                                    "total_marks" => trim($row1[$row['t_index']]),
                                );
                                $this->subject_model->updateInternalMarks($insertdata, $student_id, $subject_id, $course_id, $semester_id, $internal_marks);
                            }
                        }
                    }
                }

                redirect('/examination/subject/externalmarks');
            }
        }
        //print_r($subjectDetails);exit;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $this->loadViews("subject/externalmarks", $this->global, $data, NULL);
    }
    function externalmarksupload()
    {
        $this->global['code'] = 'examination.exmarksupload';
        $data = array();
        if ($this->input->post()) {
            $from = $this->security->xss_clean($this->input->post('from'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $subject_id = $this->security->xss_clean($this->input->post('subject_id'));
            if ($from == 'file') {
                if ($_FILES['students']['tmp_name'] != '') {
                    $objPHPExcel = PHPExcel_IOFactory::load($_FILES['students']['tmp_name']);
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    foreach ($cell_collection as $cell) {
                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = trim($objPHPExcel->getActiveSheet()->getCell($cell)->getValue());
                        $subjects = array();
                        if ($data_value != '') {
                            if ($row == 1) {
                                $header[$row][$column] = $data_value;
                            } else {
                                $values[$row][$column] = $data_value;
                            }
                        }
                    }
                    $duplicates = array();
                    foreach ($values as $key => $row) {
                        $barcode = $row['A'];
                        $check1 = $this->subject_model->checkBarcode($course_id, $semester_id, $subject_id, $barcode);
                        if (!$check1) {
                            array_push($duplicates, $row);
                            unset($values[$key]);
                        }
                    }

                    $data['header'] = $header;
                    $data['subjects'] = $subjects;

                    $data['studentList'] = $values;
                    $data['studentListArray'] = htmlspecialchars(json_encode($values));
                    $data['duplicates'] = $duplicates;
                    $data['course_id'] = $course_id;
                    $data['semester_id'] = $semester_id;
                    $data['subject_id'] = $subject_id;
                }
                // echo "<pre>";
                // print_r($data);
                // die;
            } else {
                try {
                    $studentArray = json_decode($this->input->post('studentArray'));
                } catch (Throwable $e) {
                    echo $e;
                }
                // echo "<pre>";
                // print_r($studentArray);
                // die;
                if ($studentArray) {
                    foreach ($studentArray as $row) {
                        $insertdata = array(
                            "internal_marks" => trim($row->B),
                            "external_marks" => trim($row->C),
                            "packet_no" => trim($row->D),
                            "packet_sl_no" => trim($row->E),
                        );
                        $this->subject_model->updateExternalMarks($insertdata, $row->A, $subject_id, $course_id, $semester_id);
                        $markrow = $this->subject_model->getStudentDetailsByBarcode($row->A);
                        $externalmarkrow = $this->subject_model->checkMarks($markrow->student_id, $markrow->subject_id, $markrow->course_id, $markrow->semester_id);
                        if ($externalmarkrow) {
                            $insertdata = array(
                                "internal_marks" => $markrow->internal_marks,
                                "external_marks" => $markrow->external_marks,
                                "total_marks" => $markrow->internal_marks + $markrow->external_marks,
                            );
                            $this->subject_model->syncMarks($insertdata, $externalmarkrow->Id);
                        } else {
                            $insertdata = array(
                                "student_id" => $markrow->student_id,
                                "subject_id" => $markrow->subject_id,
                                "course_id" => $markrow->course_id,
                                "semester_id" => $markrow->semester_id,
                                "internal_marks" => $markrow->internal_marks,
                                "external_marks" => $markrow->external_marks,
                                "total_marks" => $markrow->internal_marks + $markrow->external_marks,
                                "status" => 0,
                            );
                            $this->subject_model->addInternalMarks($insertdata);
                        }
                        $student_id = $this->subject_model->getStudentIdByBarcode($row->A);
                        $marksdata = array(
                            "external_marks" => trim($row->C),
                            "total_marks" => trim($row->C) + trim($row->B),
                        );
                        $this->subject_model->updateInternalMarks($marksdata, $student_id, $subject_id, $course_id, $semester_id, trim($row->B));
                    }
                }
                redirect('/examination/subject/externalmarksupload');
            }
        }
        //print_r($subjectDetails);exit;
        $data['courseList'] = $this->subject_model->getAllCourse();
        // $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/externalmarksupload", $this->global, $data, NULL);
    }
    function externalmarksbarcode()
    {
        $this->global['code'] = 'examination.exmarksbarcode';
        $data = array();
        if ($this->input->post()) {
            $from = $this->security->xss_clean($this->input->post('from'));
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $subject_id = $this->security->xss_clean($this->input->post('subject_id'));
            if ($from == 'file') {
                if ($_FILES['students']['tmp_name'] != '') {
                    $objPHPExcel = PHPExcel_IOFactory::load($_FILES['students']['tmp_name']);
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    foreach ($cell_collection as $cell) {
                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = trim($objPHPExcel->getActiveSheet()->getCell($cell)->getValue());
                        $subjects = array();
                        if ($data_value != '') {
                            if ($row == 1) {
                                $header[$row][$column] = $data_value;
                            } else {
                                $values[$row][$column] = $data_value;
                            }
                        }
                    }
                    $duplicates = array();
                    foreach ($values as $key => $row) {
                        $rno = $row['B'];
                        $student_id = $this->subject_model->getStudentId(trim($rno));
                        // echo $student_id;die;
                        $check1 = $this->subject_model->checkExternalUpload($course_id, $semester_id, $subject_id, $student_id);
                        if ($check1 || ($student_id <= 0)) {
                            array_push($duplicates, $row);
                            unset($values[$key]);
                        }
                    }

                    $data['header'] = $header;
                    $data['subjects'] = $subjects;

                    $data['studentList'] = $values;
                    $data['studentListArray'] = htmlspecialchars(json_encode($values));
                    $data['duplicates'] = $duplicates;
                    $data['course_id'] = $course_id;
                    $data['semester_id'] = $semester_id;
                    $data['subject_id'] = $subject_id;
                }
                // echo "<pre>";
                // print_r($data);
                // die;
            } else {
                try {
                    $studentArray = json_decode($this->input->post('studentArray'));
                } catch (Throwable $e) {
                    echo $e;
                }
                // echo "<pre>";
                // print_r($studentArray);
                // die;
                if ($studentArray) {
                    foreach ($studentArray as $row) {

                        $rno = $row->B;
                        $student_id = $this->subject_model->getStudentId(trim($rno));
                        $insertdata = array(
                            "student_id" => $student_id,
                            "subject_id" => $this->input->post('subject_id'),
                            "course_id" => $this->input->post('course_id'),
                            "semester_id" => $this->input->post('semester_id'),
                            "centre" => trim($row->E),
                            "booklet_number" => trim($row->F),
                            "barcode" => trim($row->G),
                            "status" => 0,
                        );
                        $this->subject_model->addExternalMarks($insertdata);
                    }
                }
                redirect('/examination/subject/externalmarksbarcode');
            }
        }
        //print_r($subjectDetails);exit;
        $data['courseList'] = $this->subject_model->getAllCourse();
        // $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/externalmarksbarcode", $this->global, $data, NULL);
    }
    function studentresult()
    {
        $this->global['code'] = 'examination.studentresult';
        $data = array();
        if ($this->input->post()) {
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $subjects = $this->subject_model->getSubjects($course_id, $semester_id);
            $studentList = $this->subject_model->getStudentResult($course_id, $semester_id, $training_center_id);
            $data['studentList'] = $studentList;
            $data['subjects'] = $subjects;
        }
        // print_r($studentList);exit;
        $data['course_id'] = $course_id;
        $data['semester_id'] = $semester_id;
        $data['training_center_id'] = $training_center_id;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/studentresult", $this->global, $data, NULL);
    }
    function promote()
    {
        $this->global['code'] = 'examination.promote';
        $data = array();
        if ($this->input->post()) {
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $candidate_id = $this->security->xss_clean($this->input->post('candidate_id'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));

            $candidate = $this->subject_model->getStudent($candidate_id);
            // print_r($candidate);exit;
            $subjects = $this->subject_model->getSubjects($course_id, $candidate->semester_id);
            $studentList = $this->subject_model->getStudentResult1($course_id, $candidate->semester_id, $training_center_id, $candidate_id);
            $data['studentList'] = $studentList;
            $data['subjects'] = $subjects;
        }
        // print_r($studentList);exit;
        $data['course_id'] = $course_id;
        $data['candidate_id'] = $candidate_id;
        $data['training_center_id'] = $training_center_id;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/promote", $this->global, $data, NULL);
    }
    function promotion()
    {
        $data = array();
        if ($this->input->post()) {
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $candidate_id = $this->security->xss_clean($this->input->post('candidate_id'));
            $data = array(
                'semester_id' => $semester_id
            );
            $this->subject_model->editStudent($data, $candidate_id);
            redirect('/examination/subject/promote');
        }
    }
    function viewexternalmarks()
    {
        $this->global['code'] = 'externalmarks.view';
        $data = array();
        if ($this->input->post()) {
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $subjects = $this->subject_model->getSubjects($course_id, $semester_id);
            $studentList = $this->subject_model->getStudentResult($course_id, $semester_id, $training_center_id);
            $data['studentList'] = $studentList;
            $data['subjects'] = $subjects;
        }
        // print_r($studentList);exit;
        $data['course_id'] = $course_id;
        $data['semester_id'] = $semester_id;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/viewexternalmarks", $this->global, $data, NULL);
    }
    function viewbarcode()
    {
        $this->global['code'] = 'barcode.view';
        $data = array();
        if ($this->input->post()) {
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $subject_id = $this->security->xss_clean($this->input->post('subject_id'));

            $barcodeList = $this->subject_model->getBarcodes($course_id, $semester_id, $subject_id);
            $data['barcodeList'] = $barcodeList;
            // print_r($barcodeList);
            // exit;
        }
        // print_r($studentList);exit;
        $data['course_id'] = $course_id;
        $data['semester_id'] = $semester_id;
        $data['subject_id'] = $subject_id;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/viewbarcode", $this->global, $data, NULL);
    }
    function viewbarcodemarks()
    {
        $this->global['code'] = 'marks.view';
        $data = array();
        if ($this->input->post()) {
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $subject_id = $this->security->xss_clean($this->input->post('subject_id'));

            $barcodeList = $this->subject_model->getBarcodes($course_id, $semester_id, $subject_id);
            $data['barcodeList'] = $barcodeList;
            // print_r($barcodeList);
            // exit;
        }
        $data['course_id'] = $course_id;
        $data['semester_id'] = $semester_id;
        $data['subject_id'] = $subject_id;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/viewbarcodemarks", $this->global, $data, NULL);
    }
    function approvemarks1()
    {
        $this->global['code'] = 'marks.approve1';
        $data = array();

        $barcodeList = $this->subject_model->getApprovalBarcodes1();
        $data['barcodeList'] = $barcodeList;
        $this->loadViews("subject/viewapprovalmarks1", $this->global, $data, NULL);
    }
    function approvemarks2()
    {
        $this->global['code'] = 'marks.approve2';
        $data = array();

        $barcodeList = $this->subject_model->getApprovalBarcodes2();
        $data['barcodeList'] = $barcodeList;
        $this->loadViews("subject/viewapprovalmarks2", $this->global, $data, NULL);
    }

    function approve1($id = NULL)
    {
        $data = array(
            'status' => 2,
        );

        $result = $this->subject_model->updateExternalMarks1($data, $id);
        redirect('/examination/subject/approvemarks1');
    }
    function viewinternalmarks()
    {
        $this->global['code'] = 'internalmarks.view';
        $data = array();
        if ($this->input->post()) {
            $course_id = $this->security->xss_clean($this->input->post('course_id'));
            $semester_id = $this->security->xss_clean($this->input->post('semester_id'));
            $training_center_id = $this->security->xss_clean($this->input->post('training_center_id'));
            $subjects = $this->subject_model->getSubjects($course_id, $semester_id);
            $studentList = $this->subject_model->getStudentResult($course_id, $semester_id, $training_center_id);
            $data['studentList'] = $studentList;
            $data['subjects'] = $subjects;
        }
        // print_r($studentList);exit;
        $data['course_id'] = $course_id;
        $data['semester_id'] = $semester_id;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['tcList'] = $this->subject_model->getAllTC();
        $this->loadViews("subject/viewinternalmarks", $this->global, $data, NULL);
    }

    function viewmarks($id)
    {
        $this->global['code'] = 'examination.externalmarks';
        $course_id = $_GET['course_id'];
        $semester_id = $_GET['semester_id'];
        $subjectList = $this->subject_model->getStudentSubjectMarks($course_id, $semester_id, $id);
        // print_r($studentList);exit;
        $data['subjectList'] = $subjectList;
        $data['course_id'] = $course_id;
        $data['semester_id'] = $semester_id;
        $data['courseList'] = $this->subject_model->getAllCourse();
        $data['student'] = $this->subject_model->getCandidate($id);
        $this->loadViews("subject/viewmarks", $this->global, $data, NULL);
    }
    public function markscard($id)
    {
        $this->global['code'] = 'examination.externalmarks';
        $course_id = $_GET['course_id'];
        $semester_id = $_GET['semester_id'];
        $data['subjectList'] = $this->subject_model->getStudentSubjectMarks($course_id, $semester_id, $id);
        $candidate = $this->subject_model->getCandidate($id);
        $data['candidate'] = $candidate;
        $this->load->view("subject/markscard", $data);
    }
    public function log($id)
    {
        $this->load->view("subject/log");
    }

    function handleVerifyUpload()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdfFile"])) {
            $targetDirectory = '/Applications/XAMPP/xamppfiles/htdocs/college/uploaded-pdf/';
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }

            $targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);
            if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
                // echo "The file " . basename($_FILES["pdfFile"]["name"]) . " has been uploaded.";
                $pdfParser = new \Smalot\PdfParser\Parser();
                $ppdf = $pdfParser->parseFile($targetFile);
                $metadata = $ppdf->getDetails();
                $hashedContent = isset($metadata['Subject']) ? $metadata['Subject'] : 'Unknown PDF';
                if ($metadata['Subject'] == 'Unknown PDF') {
                    echo ' Document is not valid ';
                    die;
                }

                $tex = '';
                foreach ($ppdf->getPages() as $page) {
                    $tex .= $page->getText();
                }

                $tex = str_replace(" ", "", $tex);
                $tex = str_replace(" ", "", $tex);
                $pepper = "foIwUVmkKGrGucNJMOkxkvcQ79iPNzP5OKlbIdGPCMTjJcDYnR";
                $input_peppered = hash_hmac('sha256', $tex, $pepper);
                $notTemppered = password_verify($input_peppered, $hashedContent);

                if ($notTemppered) {
                    echo ' Original Document ';
                } else {
                    echo ' Document is not valid ';
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "No file uploaded.";
        }
    }
    public function markscard1($id)
    {
        $this->global['code'] = 'examination.externalmarks';
        $course_id = $_GET['course_id'];
        $semester_id = $_GET['semester_id'];
        $data['subjectList'] = $this->subject_model->getStudentSubjectMarks1($id);
        $candidate = $this->subject_model->getCandidate($id);
        $data['candidate'] = $candidate;
        ob_start();
        $this->load->view("subject/markscard", $data);
        $html = ob_get_clean();

        $this->load->library('TCPDF');
        $pdf = new TCPDF();
        $pdf->SetSubject("hash");

        // $pdf->SetFont('times', 'BI', 12);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $file_path = '/Applications/XAMPP/xamppfiles/htdocs/college/pdf/sree.pdf';

        $pdf->Output($file_path, 'F');

        $pdfParser = new \Smalot\PdfParser\Parser();
        $readPdf = $pdfParser->parseFile($file_path);
        $text = '';
        foreach ($readPdf->getPages() as $page) {
            $text .= $page->getText();
        }
        unlink($file_path);
        $text = str_replace(" ", "", $text);
        $text = str_replace(" ", "", $text);
        $pepper = "foIwUVmkKGrGucNJMOkxkvcQ79iPNzP5OKlbIdGPCMTjJcDYnR";
        $password_peppered = hash_hmac('sha256', $text, $pepper);
        $hash = password_hash($password_peppered, PASSWORD_BCRYPT);
        $pdf2 = new TCPDF();
        $pdf2->SetSubject($hash);
        $pdf2->AddPage();
        $pdf2->writeHTML($html);
        $pdf2->Output('/Applications/XAMPP/xamppfiles/htdocs/college/pdf/sree.pdf', 'I');


    }
}
