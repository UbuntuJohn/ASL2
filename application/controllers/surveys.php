<?php

class Surveys extends CI_Controller {
	
	public function process() {
		$this->load->database();

		$date = $_POST['date'];
		$score = $_POST['score'];
		$employeeId = $_POST['employeeId'];

		$sql = "insert into survey (employeeId, surveyDate, score) values ('$employeeId', '$date', '$score')";
		$result = $this->db->query($sql);

		if($result) {
			header("Location: ../dashboard/");
		}

	}



}




