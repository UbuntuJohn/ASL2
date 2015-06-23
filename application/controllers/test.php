<?php

class Test extends CI_Controller {
	public function index() {
		session_start();
		//$this->load->view('dashboard');
		$this->load->database();
		$this->load->library('parser');
		$this->load->library('session');
		//echo $_SESSION['employeeId'];

		$employeeId = $_SESSION['employeeId'];

		$sql = "select firstName, lastName, team.managerId as mid, team.employeeId as eid from employee
		join team on team.employeeId = employee.employeeId where team.managerId = '{$employeeId}'";

		$query = $this->db->query($sql);

		foreach($query->result() as $row) {
			echo $row->firstName;
			echo $row->lastName;
			echo $row->eid;
		}

		$data2 = array(
			'firstName' => $row->firstName,
			'lastName' => $row->lastName
		);

		$this->parser->parse('dashboard', $data2);


	}
}