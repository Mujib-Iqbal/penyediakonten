<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kreator_model extends CI_Model {

	function total() {
        return $this->db->count_all('kreator');
    }

	function add($data) {
        return $this->db->insert('kreator', $data);
    }

    function view() {
		return $this->db->get('kreator')->result();
	}

	function viewByCategory($category) {
		$this->db->where('kreator_konten', $category);
		return $this->db->get('kreator')->result();
	}

	function get($id) {
		$this->db->where('kreator_id', $id);
		return $this->db->get('kreator')->row();
	}

	function update($id, $data) {
        $this->db->where('kreator_id', $id);
        return $this->db->update('kreator', $data);
    }

    function removeable($id) {
        $this->db->where('kreator.kreator_id', $id);
        $this->db->join('jobs', 'jobs.kreator_id = kreator.kreator_id');
        $total = $this->db->count_all_results('kreator');
        if ($total==0) {
            return TRUE;
        }
        return FALSE;
    }

	function delete($id) {
		$this->db->where('kreator_id', $id);
		return $this->db->delete('kreator');
	}
}
