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
		//load the data helper
		$this->load->helper('date');
		//$this->load->view('dashboard'); //this was causing a bug with showing template TWICE
		//load the session library
		$this->load->library('session');
		//load the template parsing library
		$this->load->library('parser');
		//load the database functions
		$this->load->database();
		//changet he default timezone to Eastern Time
		date_default_timezone_set('America/New_York');

		//SQL even though it's bad practice, I'll be changing in a future update
		$query = $this->db->query("select * from team join employee on employee.employeeId = team.managerId where managerId='{$_SESSION['employeeId']}'");

		//check if number of rows is greater than 0 (if team exists)
		if($query->num_rows() > 0) {
			//an array to hold template parsing values
			$data = array(
				'user' => $_SESSION['firstName'],
				'employeeId' => $_SESSION['employeeId'],
				'datetime' => unix_to_human(time(), TRUE, 'us'),
				'memberId' => $query->result_array(),
				'firstName' => $query->result_array(),
				'lastName' => $query->result_array(),
			);
				
		} else {
			//same as above, but if team doesn't exist
			$data = array(
				'user' => $_SESSION['firstName'],
				'employeeId' => $_SESSION['employeeId'],
				'datetime' => unix_to_human(time(), TRUE, 'us')
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

	}

	public function termed() {
		
	}

	public function settings() {
		
	}

	public function uploads() {
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */