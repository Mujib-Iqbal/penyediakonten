<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job_model extends CI_Model {

    function totalByKreator($id) {
        $this->db->where('kreator_id', $id);
        return $this->db->count_all_results('jobs');
    }

    function add($data) {
        return $this->db->insert('jobs', $data);
    }

    function update($id, $data) {
        $this->db->where('job_id', $id);
        return $this->db->update('jobs', $data);
    }

    function view() {
    	$this->db->join('kreator', 'jobs.kreator_id = kreator.kreator_id');
    	$this->db->join('order', 'order.order_id = jobs.order_id');
    	$this->db->join('paket', 'order.paket_id = paket.paket_id');
    	$this->db->order_by('job_id', 'desc'); 
        return $this->db->get('jobs')->result();
    }

    function getJobBasedOnOrderId($id) {
        $this->db->where('order_id', $id);
        $this->db->join('kreator', 'kreator.kreator_id = jobs.kreator_id');
        return $this->db->get('jobs')->row();
    }

    function getJobBasedOnKreatorId($id) {
        $this->db->where('kreator_id', $id);
        $this->db->join('order', 'order.order_id = jobs.order_id');
        $this->db->join('paket', 'order.paket_id = paket.paket_id');
        $this->db->order_by('job_id', 'desc'); 
        return $this->db->get('jobs')->result();
    }

    function get($id, $kreator_id) {
        $this->db->where('job_id', $id);
        $this->db->where('kreator_id', $kreator_id);
        $this->db->join('order', 'order.order_id = jobs.order_id');
        $this->db->join('paket', 'order.paket_id = paket.paket_id');
        return $this->db->get('jobs')->row();
    }

    function getWithOutKreatorID($id) {
        $this->db->where('job_id', $id);
        $this->db->join('kreator', 'kreator.kreator_id = jobs.kreator_id');
        $this->db->join('order', 'order.order_id = jobs.order_id');
        $this->db->join('paket', 'order.paket_id = paket.paket_id');
        return $this->db->get('jobs')->row();
    }

    function get100PercentJobs($kreator_id) {
        $this->db->where('kreator_id', $kreator_id);
        $this->db->where('job_progress', 100);
        return $this->db->get('jobs')->result();
    }

    function terima($id, $kreator_id, $data) {
        $this->db->where('job_id', $id);
        $this->db->where('kreator_id', $kreator_id);
        return $this->db->update('jobs', $data);
    }

    function tolak($id, $kreator_id, $data) {
        $this->db->where('job_id', $id);
        $this->db->where('kreator_id', $kreator_id);
        return $this->db->update('jobs', $data);
    }

    function removeable($id) {
        $this->db->where('job_id', $id);
        $job = $this->db->get('jobs')->row();
        if ($job->job_status!='selesai') {
            return TRUE;
        }
        return FALSE;
    }

    function delete($id) {
        $this->db->where('job_id', $id);
        return $this->db->delete('jobs');
    }

}
