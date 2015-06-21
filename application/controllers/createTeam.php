<?php

class Createteam extends CI_Controller {
	//create team page that detects sessions, starts databse and shows createTeam template
	public function index() {
		session_start();
		$this->load->database();
		$this->load->view('createTeam');
		



	}

}