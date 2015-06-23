<?php

class Sales extends CI_Controller {
	
	public function process() {
		$this->load->database();

		$date = $_POST['date'];
		$score = $_POST['score'];
		$description = $_POST['description'];
		$employeeId = $_POST['employeeId'];

		$sql = "insert into salesScores (employeeId, description, date, score) values ('$employeeId', '$description', '$date', '$score')";
		$result = $this->db->query($sql);

		if($result) {
			header("Location: ../dashboard/");
		}

	}



}




