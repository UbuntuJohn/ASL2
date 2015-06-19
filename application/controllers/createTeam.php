<?php

class Createteam extends CI_Controller {

	public function index() {
		session_start();
		$this->load->database();
		$this->load->view('createTeam');
		



	}

}