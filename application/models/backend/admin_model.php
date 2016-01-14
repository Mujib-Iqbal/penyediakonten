<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function add($data) {
        return $this->db->insert('admin', $data);
    }

    function view() {
		return $this->db->get('admin')->result();
	}

	function get($id) {
		$this->db->where('admin_id', $id);
		return $this->db->get('admin')->row();
	}

	function update($id, $data) {
        $this->db->where('admin_id', $id);
        return $this->db->update('admin', $data);
    }

	function delete($id) {
		$this->db->where('admin_id', $id);
		return $this->db->delete('admin');
	}
}
