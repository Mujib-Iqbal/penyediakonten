<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konten_model extends CI_Model {

	function totalByKreator($id) {
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->where('kreator_id', $id);
        return $this->db->count_all_results('konten');
    }

    function totalByCustomer($id) {
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->join('order', 'jobs.order_id=order.order_id');
        $this->db->where('pemesan_id', $id);
        return $this->db->count_all_results('konten');
    }

    function add($data) {
        return $this->db->insert('konten', $data);
    }

    function update($id, $data) {
        $this->db->where('konten_id', $id);
        return $this->db->update('konten', $data);
    }

    function view() {
    	$this->db->join('jobs', 'jobs.job_id=konten.job_id');
    	$this->db->join('kreator', 'kreator.kreator_id=jobs.kreator_id');
        $this->db->order_by('konten_id', 'desc'); 
        return $this->db->get('konten')->result();
    }

    function viewByCreator() {
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->join('kreator', 'kreator.kreator_id=jobs.kreator_id');
        $this->db->where('kreator.kreator_id', $this->session->userdata('kreator_id'));
        $this->db->order_by('konten_id', 'desc');
        return $this->db->get('konten')->result();
    }

    function delete($id) {
        $this->db->where('konten_id', $id);
        return $this->db->delete('konten');
    }

    function get($id) {
    	$this->db->where('konten_id', $id);
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->join('order', 'jobs.order_id=order.order_id');
        $this->db->join('customer', 'customer.customer_id=order.pemesan_id');
        $this->db->join('kreator', 'kreator.kreator_id=jobs.kreator_id');
    	return $this->db->get('konten')->row();
    }

    function getFileName($id) {
    	$this->db->where('konten_id', $id);
    	return $this->db->get('konten')->row()->konten_file;
    }

    function getContentByCustomerId($id) {
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->join('order', 'jobs.order_id=order.order_id');
        $this->db->where('pemesan_id', $id);
        $this->db->where('konten_status', 'diterima');
        $this->db->order_by('konten_id', 'desc');
        return $this->db->get('konten')->result();

    }

    function detail($id) {
        $this->db->where('konten_id', $id);
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->join('order', 'jobs.order_id=order.order_id');
        return $this->db->get('konten')->row();
    }

}
