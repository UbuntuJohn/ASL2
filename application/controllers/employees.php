<?php

class employees extends CI_Controller {
	
	public function index() {
		header("Location: login");
	}

	public function login() {
		session_start();
		$this->load->helper('form');
		$this->load->view('employeeLogin');
		$this->load->helper('url');

		if($_SESSION) {
			header("Location: ../employees/dashboard");
		}
	}

	public function process() {
		$this->load->database();

		if($_POST) {
			$eid = $_POST['employeeId'];

			$sql = "select * from employee where employeeId='$eid'";
			$query = $this->db->query($sql);

			if($query->num_rows() > 0) {

				foreach($query->result() as $row) {
					session_start();
					$_SESSION['accType'] = $row->manager;
					$_SESSION['eemployeeId'] = $row->employeeId;
					$_SESSION['efirstName'] = $row->firstName;
					$_SESSION['elastName'] = $row->lastName;

					header("Location: ../employees/dashboard");
				}
			} else {
				header("Location: ../employees/login");
			}

			
		}
	}

	public function dashboard() {
		session_start();
		$this->load->view('edash');

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