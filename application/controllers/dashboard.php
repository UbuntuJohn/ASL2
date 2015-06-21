<?php 
session_start();


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{


		//check to see if session isn't set
		if(!$_SESSION) {
			//if not, send user to login page (where it is initallized after login)
			header("Location: login");
		}

		//if($_SERVER['HTTP_REFERER'] == base_url().)


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
		//URL loader
		$this->load->helper('url');
		
		if(isset($_SERVER['HTTP_REFERER'])) {
			//URL loader
			$this->load->helper('url');

			if($_SERVER['HTTP_REFERER'] == base_url()."index.php/dashboard/profile/{$_SESSION['employeeId']}") {
				echo "<p class='success'>Succeessfully Edited Profile!</p>";
			}

		} 
		//changet he default timezone to Eastern Time
		date_default_timezone_set('America/New_York');

		//SQL even though it's bad practice, I'll be changing in a future update
		//$query = $this->db->query("select employee.firstName as fn, employee.lastName as ln, team.managerId as mid, team.employeeId as eid from team join employee on employee.employeeId = team.managerId where managerId='{$_SESSION['employeeId']}' order by eid");
		
		$query = $this->db->query("select employee.employeeId as rid, employee.firstName as fn, employee.lastName as ln, 
team.managerId as mid, team.employeeId as eid from team 
join employee on employee.employeeId = team.managerId");
		$query2 = $this->db->query("select * from employee where employeeId='{$_SESSION['employeeId']}'");
		$row = $query->row();
		$row2 = $query2->row();
		//check if number of rows is greater than 0 (if team exists)
		if($query->num_rows() > 0 or $query2->num_rows > 0) {

			foreach($query->result_array() as $member) {
				$memberId[] = $member['eid'];
				$fn = $member['fn'];
				$ln = $member['ln'];
			}

			//an array to hold template parsing values
			$data = array(
				'user' => $_SESSION['firstName'],
				'employeeId' => $row2->employeeId,
				'datetime' => unix_to_human(time(), TRUE, 'us'),
				//'memberId' => $row->eid,
				'memberId' => $memberId[1],
				'firstName' => $_SESSION['firstName'],
				'lastName' => $ln,
				'attendance' => 'N/A',
				'surveyScores' => 'N/A',
				'salesScores' => 'N/A'
			);
				
		} 
		//parse the templates using the $data arrays above
		$this->parser->parse('dashboard', $data);


			
			
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

	public function settings() {
		$this->load->view('settings');
	}

	public function uploads() {
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */