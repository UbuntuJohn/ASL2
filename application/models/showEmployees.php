<?php


class ShowEmployees extends CI_Model {

	public function getEmployeesById() {
		$query = $this->db->get('employee');
		return $query->result();
	}


}