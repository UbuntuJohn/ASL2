<?php
//employees class
class employees extends CI_Controller {
	//main page method
	public function index() {
		header("Location: login");
	}
	//login method
	public function login() {
		session_start();
		$this->load->helper('form');
		$this->load->view('employeeLogin');
		$this->load->helper('url');
		//if session exists, send them to employees dashboard
		if($_SESSION) {
			header("Location: ../employees/dashboard");
		}
	}
	//process employee method
	public function process() {
		$this->load->database();
		//check if post data exists
		if($_POST) {
			//assign variable to that data
			$eid = $_POST['employeeId'];
			//pull data from database where employeeId is the posted value
			$sql = "select * from employee where employeeId='$eid'";
			$query = $this->db->query($sql);
			//if a value exists, assign it to a session variable
			if($query->num_rows() > 0) {

				foreach($query->result() as $row) {
					session_start();
					$_SESSION['accType'] = $row->manager;
					$_SESSION['eemployeeId'] = $row->employeeId;
					$_SESSION['efirstName'] = $row->firstName;
					$_SESSION['elastName'] = $row->lastName;

					header("Location: ../employees/dashboard");
				}
			//if not, send them back to the employee login
			} else {
				header("Location: ../employees/login");
			}

			
		}
	}

	public function dashboard() {
		session_start();
		$this->load->helper('html');
		$this->load->library('parser');
		$this->load->database();
		echo link_tag('/assets/css/edash.css');
		$this->load->view('edash_header');
		$this->load->view('edash_nav');
		$this->load->view('edash_container');
		$this->load->view('edash_attendance');

		$eemployeeId = $_SESSION['eemployeeId'];

		$sql = "select date, attendanceName, description from attendance 
		join attendanceCodes on attendanceCodes.attendanceId = attendance.attendanceCode
		where employeeId='$eemployeeId' order by date desc limit 5";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row) {

			$data = [
				'date' => $row['date'],
				'label' => $row['attendanceName'],
				'description' => $row['description']
			];

			$this->parser->parse('edash_attendance_data', $data);

		}

		
		$this->load->view('edash_sales');

		$sql2 = "select date, score, description from salesScores where employeeId='$eemployeeId' order by date desc limit 5";
		$query2 = $this->db->query($sql2);

		foreach($query2->result_array() as $row) {

			$data = [
				'date' => $row['date'],
				'score' => $row['score'],
				'description' => $row['description']
			];

			$this->parser->parse('edash_sales_data', $data);
		}

		
		$this->load->view('edash_surveys');

		$sql3 = "select surveyDate, score from survey where employeeId='$eemployeeId' order by surveyDate desc limit 5";
		$query3 = $this->db->query($sql3);

		foreach($query3->result_array() as $row) {

			$data = [
				'score' => $row['score'],
				'date' => $row['surveyDate']
			];

			$this->parser->parse('edash_surveys_data', $data);
		}

		
		$this->load->view('edash_footer');


		if(!$_SESSION) {
			header("Location: login");
		}

	}

	
	public function logout() {
		session_start();
		$this->load->view('logout');
		$this->load->library('javascript');
		//removes all session variables
		session_unset();
		//destroy the session
		session_destroy();
	
	}

}