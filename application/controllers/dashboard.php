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

		if(!$_SESSION) {
			header("Location: login");
		}
		$this->load->helper('date');
		//$this->load->view('dashboard'); //this was causing a bug with showing template TWICE
		$this->load->library('session');
		$this->load->library('parser');
		$this->load->database();
		

		//session held data would go here!
		$data = array(
			'user' => $_SESSION['firstName'],
			'employeeId' => $_SESSION['employeeId']
		);

		$this->parser->parse('dashboard', $data);



	}

	public function login() {
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->view('login');
		$this->load->library('session');
		$this->load->helper('url');

		if($_SESSION) {
			$base_url = base_url()."index.php/dashboard/";
			header("Location: {$base_url}");
		}
	}

	public function logout() {
		$this->load->view('logout');
		$this->load->library('javascript');
		//removes all session variables
		session_unset();
		//destroy the session
		session_destroy();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */