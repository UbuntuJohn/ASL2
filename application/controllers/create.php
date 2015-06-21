<?php
//Create class
class Create extends CI_Controller {
	//create employee method
	public function employee() {
		//create employee from scratch and give them manager ID of 2 (non-manager)
		$this->load->helper('form');
		$this->load->view('registerEmployee');
		$this->load->helper('url');

	}
	//create team method
	public function team() {
		//check for current employees and update database with logged in user
		$this->load->database();
		$this->load->helper('form');
		$this->load->view('assignTeam');
		$this->load->helper('url');


	}
	//assign team method
	public function assign() {
		session_start();
		$this->load->database();
		//employee array (empty)
		$employees = [];
		//add posted data to array
		$eids = array_push($employees, $_POST['employees']);
		//employee Email variable
		$eEmail = $employees[0];
		//sql to select all data where email exists
		$sql = "select * from employee where email = '$eEmail' limit 1";
		//displaying these details
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$sessionId = $_SESSION['employeeId'];
		$eid = $row['employeeId'];
		//echo "This users employee ID is {$row['employeeId']}";
		//insert data into team
		$sql2 = "insert into team (managerId, employeeId) values ('$sessionId', '$eid')";
		$query2 = $this->db->query($sql2);
		//send back to dashboard
		header("Location: ../dashboard/");
	}


}