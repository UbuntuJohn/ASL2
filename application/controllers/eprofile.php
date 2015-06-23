<?php

class Eprofile extends CI_Controller {

	public function index() {
		header("Location: ../dashboard/");
	}
	
	public function editAttendance() {
		date_default_timezone_set('America/New_York');
		$this->load->helper('url');
		$this->load->database();
		$this->load->helper('html');
		//$this->load->view('profile');
		$this->load->library('parser');

		$eid = $this->uri->segment(3, 'leading');

		//pieces of segments from the URL
		$segments = array("dashboard", "eprofile", $eid);
		//segment two is the employeeID from the session made by login
		$id = $segments[2];
		//display message for which profile you're editing
		
		//Query string for pulling users profile data
		$query = $this->db->query("select * from employee where employeeId='$id'");
		$row = $query->row();

		

		$data = array(
			'employeeId' => $row->employeeId,
			'firstName' => $row->firstName,
			'lastName' => $row->lastName,
			'startDate' => $row->startDate,
			'manager' => $row->manager,
			'email' => $row->email,
			'password' => $row->password,
			'activationCode' => $row->activationCode,
			'activatedId' => $row->activatedId,
			'date' => date('Y-m-d')
		);

		$this->parser->parse('attendance', $data);
		
	}

	public function editSales() {
		date_default_timezone_set('America/New_York');
		$this->load->helper('url');
		$this->load->database();
		$this->load->helper('html');
		//$this->load->view('profile');
		$this->load->library('parser');

		$eid = $this->uri->segment(3, 'leading');

		//pieces of segments from the URL
		$segments = array("dashboard", "eprofile", $eid);
		//segment two is the employeeID from the session made by login
		$id = $segments[2];
		//display message for which profile you're editing
		
		//Query string for pulling users profile data
		$query = $this->db->query("select * from employee where employeeId='$id'");
		$row = $query->row();

		

		$data = array(
			'employeeId' => $row->employeeId,
			'firstName' => $row->firstName,
			'lastName' => $row->lastName,
			'startDate' => $row->startDate,
			'manager' => $row->manager,
			'email' => $row->email,
			'password' => $row->password,
			'activationCode' => $row->activationCode,
			'activatedId' => $row->activatedId,
			'date' => date('Y-m-d')
		);

		$this->parser->parse('sales', $data);
	}

	public function editSurvey() {
		date_default_timezone_set('America/New_York');
		$this->load->helper('url');
		$this->load->database();
		$this->load->helper('html');
		//$this->load->view('profile');
		$this->load->library('parser');

		$eid = $this->uri->segment(3, 'leading');

		//pieces of segments from the URL
		$segments = array("dashboard", "eprofile", $eid);
		//segment two is the employeeID from the session made by login
		$id = $segments[2];
		//display message for which profile you're editing
		
		//Query string for pulling users profile data
		$query = $this->db->query("select * from employee where employeeId='$id'");
		$row = $query->row();

		

		$data = array(
			'employeeId' => $row->employeeId,
			'firstName' => $row->firstName,
			'lastName' => $row->lastName,
			'startDate' => $row->startDate,
			'manager' => $row->manager,
			'email' => $row->email,
			'password' => $row->password,
			'activationCode' => $row->activationCode,
			'activatedId' => $row->activatedId,
			'date' => date('Y-m-d')
		);

		$this->parser->parse('survey', $data);
	}


}