<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Jobdescription_model extends CI_Model
{


    function getAll($data)
    {
        $this->db->select('a.*,b.name as companyName');
        $this->db->from('jobdescription as a');
        $this->db->join('company as b', 'a.company_id = b.Id', 'left');

        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0 ) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        if ($_SESSION['company_id'] > 0 ) {
            $this->db->where('a.company_id', $_SESSION['company_id']);
        } 
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCompleted($data)
    {
        $this->db->select('*');
        $this->db->from('jobdescription as a');
        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        $this->db->where('a.status', 'Completed');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTrainingCenters()
    {
        $this->db->select('*');
        $this->db->from('trainingcenter as a');
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
    function getApprovalItems($data)
    {
        $this->db->select('*');
        $this->db->from('jobdescription as a');
        if ($_SESSION['company_id'] > 0) {
            $this->db->where('a.company_id', $_SESSION['company_id']);
        }
        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        $this->db->where('a.status', 'Active');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getApprovedItems($data)
    {
        $this->db->select('a.*,b.name as companyName');
        $this->db->from('jobdescription as a');
        $this->db->join('company as b', 'a.company_id = b.Id', 'left');
        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        $this->db->where('a.status', 'Tag Candidates');
        $query = $this->db->get();
        $result = $query->result(); 
        foreach($result as $key=>$value){
            $id = $value->Id;
            $resumeCount = self::getTaggedCandidatesCount($id);
            // echo "<pre>";print_r($resumeCount);die;
            $value->resumeCount = $resumeCount;
            // $result->$key = $value;
        }
        return $result;
    }
    function getTaggedItems($data)
    {
        $this->db->select('a.*,b.name as companyName');
        $this->db->from('jobdescription as a');
        $this->db->join('company as b', 'a.company_id = b.Id', 'left');
        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        $this->db->where('a.status', 'Shortlist');
        $query = $this->db->get();
        $result = $query->result();
        foreach($result as $key=>$value){
            $id = $value->Id;
            $resumeCount = self::getShortlistedCandidatesCount($id);
            // echo "<pre>";print_r($resumeCount);die;
            $value->resumeCount = $resumeCount;
            // $result->$key = $value;
        }
        return $result;
    }
    function getShortlistedItems($data)
    {
        $this->db->select('*');
        $this->db->from('jobdescription as a');
        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        $this->db->where('a.status', 'Finalize');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getRejectedItems($data)
    {
        $this->db->select('*');
        $this->db->from('jobdescription as a');
        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        $this->db->where('a.status', 'Rejected');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCompletedItems($data)
    {
        $this->db->select('*');
        $this->db->from('jobdescription as a');
        if (!empty($data['name'])) {
            $likeCriteria = "(a.title  LIKE '%" . $data['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        if ($data['company_id'] > 0) {
            $this->db->where('a.company_id', $data['company_id']);
        }
        $this->db->where('a.status', 'Completed');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function filterCandidates($data, $job_id)
    {
        $this->db->select('a.*,b.name as training_center,c.name as course_name');
        $this->db->from('candidate as a');
        $this->db->join('trainingcenter as b', 'a.training_center_id = b.Id', 'left');
        $this->db->join('course as c', 'a.course_id = c.Id', 'left');
        // if (!empty($data['me_cutoff'])) {
        //     $likeCriteria = "(a.me_cutoff  >= " . $data['me_cutoff'] . ")";
        //     $this->db->where($likeCriteria);
        // }
        if (!empty($data['be_cutoff'])) {
            $likeCriteria = "(a.be_cutoff  >= " . $data['be_cutoff'] . ")";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['puc_cutoff'])) {
            $likeCriteria = "(a.puc_cutoff  >= " . $data['puc_cutoff'] . ")";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['sslc_cutoff'])) {
            $likeCriteria = "(a.sslc_cutoff  >= " . $data['sslc_cutoff'] . ")";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['me_year'])) {
            $likeCriteria = "(a.me_year  = '" . $data['me_year'] . "')";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['be_year'])) {
            $likeCriteria = "(a.be_year  = '" . $data['be_year'] . "')";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['puc_year'])) {
            $likeCriteria = "(a.puc_year  = '" . $data['puc_year'] . "')";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['sslc_year'])) {
            $likeCriteria = "(a.sslc_year  = '" . $data['sslc_year'] . "')";
            $this->db->where($likeCriteria);
        }
        if (!empty($data['training_center_id'])) {
            $this->db->where('a.training_center_id', $data['training_center_id']);
        }
        if (!empty($data['course_id'])) {
            $this->db->where('a.course_id', $data['course_id']);
        }


        // if (!empty($data['education'])) {
        //     $likeCriteria = "(a.education  LIKE '%" . $data['education'] . "%')";
        //     $this->db->where($likeCriteria);
        // }
        // if (!empty($data['domain'])) {
        //     $likeCriteria = '(';
        //     foreach($data['domain'] as $domain){
        //         $likeCriteria .= " a.domain  LIKE '%" . $domain . "%' OR";
        //     }
        //     $final = rtrim($likeCriteria,'OR');
        //     $final .= ')';
        //     $this->db->where($final);
        // }
        // if (!empty($data['discipline'])) {
        //     $likeCriteria = '(';
        //     foreach($data['discipline'] as $discipline){
        //         $likeCriteria .= " a.discipline  LIKE '%" . $discipline . "%' OR";
        //     }
        //     $final = rtrim($likeCriteria,'OR');
        //     $final .= ')';
        //     // echo $final;die;
        //     $this->db->where($final);
        // }
        if (!empty($job_id)) {
            $likeCriteria = "(a.Id  not in (select candidate_id from job_tagged_resumes where jobdescription_id = " . $job_id . " and status = 'Active'))";
            // echo $likeCriteria;die;
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTaggedCandidates($job_id)
    {
        $this->db->select('a.*,b.name,b.email,b.mobile,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.jobdescription_id', $job_id);
        $this->db->where('a.status', 'Active');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getTaggedCandidatesCount($job_id)
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.jobdescription_id', $job_id);
        $this->db->where('a.status', 'Active');
        $query = $this->db->get();
        $result = $query->row();
        return $result->total;
    }

    function getSelectedCandidates($job_id)
    {
        $this->db->select('a.*,b.name,b.email,b.mobile,b.resume,c.name as training_center');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->join('trainingcenter as c', 'b.training_center_id = c.Id', 'left');
        $this->db->where('a.jobdescription_id', $job_id);
        $this->db->where('a.placement_status', 'Selected');
        // $this->db->where("a.offer_letter",null);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getNonShortlistedCandidates($job_id)
    {
        $this->db->select('a.*,b.name,b.email,b.mobile,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.jobdescription_id', $job_id);
        $this->db->where('a.status', 'Active');
        $this->db->where('a.placement_status', null);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getShortlistedCandidates($job_id)
    {
        $this->db->select('a.*,b.name,b.email,b.mobile,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.jobdescription_id', $job_id);
        $this->db->where('a.status', 'Active');
        $this->db->where('a.placement_status', 'Shortlisted');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getShortlistedCandidatesCount($job_id)
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.jobdescription_id', $job_id);
        $this->db->where('a.status', 'Active');
        $this->db->where('a.placement_status', 'Shortlisted');
        $query = $this->db->get();
        $result = $query->row();
        return $result->total;
    }
    function getFinalizedCandidates($job_id)
    {
        $this->db->select('a.*,b.name,b.email,b.mobile,b.resume');
        $this->db->from('job_tagged_resumes as a');
        $this->db->join('candidate as b', 'a.candidate_id = b.Id', 'left');
        $this->db->where('a.jobdescription_id', $job_id);
        $this->db->where('a.status', 'Active');
        $this->db->where('a.placement_status', 'Selected');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getCompanies()
    {
        $this->db->select('*');
        $this->db->from('company as a');
        if ($_SESSION['company_id'] > 0) {
            $this->db->where('a.Id', $_SESSION['company_id']);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getEducations()
    {
        $this->db->select('*');
        $this->db->from('highest_education as a');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getJobdescription($id)
    {
        $this->db->select('a.*,b.name,c.email,c.mobile');
        $this->db->from('jobdescription as a');
        $this->db->join('company as b', 'a.company_id = b.Id', 'left');
        $this->db->join('users as c', 'a.created_by = c.Id', 'left');
        
        $this->db->where('a.Id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    function addJobdescription($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('jobdescription', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function tagResumes($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_dt_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
        $this->db->insert('job_tagged_resumes', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editJobdescription($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('jobdescription', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function editJobdescriptionTag($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('job_tagged_resumes', $data);
        $this->db->trans_complete();
        return TRUE;
    }
    function unTagResumes($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('Id', $id);
        $this->db->trans_start();
        $this->db->update('job_tagged_resumes', $data);
        $this->db->trans_complete();
        return TRUE;
    }

    function getStatus()
    {
        $this->db->select('*');
        $this->db->from('status');
        $query = $this->db->get();
        return $query->result();
    }
}
