<?php

class Create extends CI_Controller {

	public function employee() {
		//create employee from scratch and give them manager ID of 2 (non-manager)
		$this->load->helper('form');
		$this->load->view('registerEmployee');
		$this->load->helper('url');

	}

	public function team() {
		//check for current employees and update database with logged in user
		$this->load->database();
		$this->load->helper('form');
		$this->load->view('assignTeam');
		$this->load->helper('url');


	}

	public function assign() {
		session_start();
		$this->load->database();
		$employees = [];
		$eids = array_push($employees, $_POST['employees']);
		
		$eEmail = $employees[0];

		$sql = "select * from employee where email = '$eEmail' limit 1";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$sessionId = $_SESSION['employeeId'];
		$eid = $row['employeeId'];
		//echo "This users employee ID is {$row['employeeId']}";
		
		$sql2 = "insert into team (managerId, employeeId) values ('$sessionId', '$eid')";
		$query2 = $this->db->query($sql2);
		header("Location: ../dashboard/");
	}


}