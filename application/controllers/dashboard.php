<?php 
session_start();

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{


		//check to see if session isn't set
		if(!$_SESSION) {
			//if not, send user to login page (where it is initallized after login)
			header("Location: login");
		}


		//load the data helper
		$this->load->helper('date');
		//$this->load->view('dashboard'); //this was causing a bug with showing template TWICE
		//load the session library
		$this->load->library('session');
		//load the template parsing library
		$this->load->library('parser');
		//load the database functions
		$this->load->database();

		$this->load->helper('html');

		$this->load->library('pagination');

		

		//URL loader
		$this->load->helper('url');
		//$this->template->add_css('dashboard');
		
		if(isset($_SERVER['HTTP_REFERER'])) {
			//URL loader
			$this->load->helper('url');

			if($_SERVER['HTTP_REFERER'] == base_url()."index.php/dashboard/profile/{$_SESSION['employeeId']}") {
				echo "<p class='success'>Succeessfully Edited Profile!</p>";
			}

		} 
		//changet he default timezone to Eastern Time
		date_default_timezone_set('America/New_York');
		
		$session_employeeId = $_SESSION['employeeId'];

		$sql = "select firstName, lastName, team.employeeId from employee
		join team on team.employeeId = employee.employeeId where team.managerId = '{$session_employeeId}'";

		$query = $this->db->query($sql);

		$this->load->view('ph_header');
		echo link_tag('/assets/css/dashboard.css');
		$this->load->view('ph_nav');
		$this->load->view('ph_addteam');


		foreach ($query->result_array() as $row) {

			$data = [

				'firstName' => $row['firstName'],
				'lastName' => $row['lastName'],
				'employeeId' => $row['employeeId']

			];

			$this->parser->parse('ph_table', $data);


		}

		//parse the templates using the $data arrays above

		

		$this->load->view('ph_tablefooter');
		$this->load->view('ph_footer');

			
			
	}
	//login method for loading form, html processing, viewing login template, sessions and URL
	public function login() {
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->view('login');
		$this->load->library('session');
		$this->load->helper('url');
		//check if session exists and send user to dashboard
		if($_SESSION) {
			$base_url = base_url()."index.php/dashboard/";
			header("Location: {$base_url}");
		}

	}

	//logout method showing the logout template and allowing for javascript to run
	//also has session unsetting and destroying
	public function logout() {
		$this->load->view('logout');
		$this->load->library('javascript');

		//removes all session variables
		session_unset();
		//destroy the session
		session_destroy();
	}

	//Future methods below...
	public function profile() {
		//check to see if session isn't set
		if(!$_SESSION) {
		//if not, send user to login page (where it is initallized after login)
		header("Location: ../login");
		}
		$this->load->helper('url');
		$this->load->database();
		$this->load->helper('html');
		//$this->load->view('profile');
		$this->load->library('parser');

		//pieces of segments from the URL
		$segments = array("dashboard", "profile", $_SESSION['employeeId']);
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
			'activatedId' => $row->activatedId
		);

		$this->parser->parse('profile', $data);
		



		//echo "Editing for ".$id;

	}

	public function eprofile() {
		//check to see if session isn't set
		if(!$_SESSION) {
		//if not, send user to login page (where it is initallized after login)
		header("Location: ../login");
		}
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
			'activatedId' => $row->activatedId
		);

		$this->parser->parse('eprofile', $data);
		



		//echo "Editing for ".$id;

	}

	public function settings() {
		$this->load->helper('html');
		echo link_tag('/assets/css/dashboard.css');
		$this->load->view('ph_header');
		$this->load->view('settings');
	}

	public function uploads() {
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */