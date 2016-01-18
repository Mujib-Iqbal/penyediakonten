<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_model extends CI_Model {

    function total() {
        return $this->db->count_all('customer');
    }

    function add($data) {
        return $this->db->insert('customer', $data);
    }

    function view() {
		return $this->db->get('customer')->result();
	}

	function get($id) {
		$this->db->where('customer_id', $id);
		return $this->db->get('customer')->row();
	}

	function removeable($id) {
        $this->db->where('customer.customer_id', $id);
        $this->db->join('order', 'order.pemesan_id = customer.customer_id');
        $total = $this->db->count_all_results('customer');
        if ($total==0) {
            return TRUE;
        }
        return FALSE;
    }

	function delete($id) {
		$this->db->where('customer_id', $id);
		return $this->db->delete('customer');
	}
}