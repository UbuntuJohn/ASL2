<?php

class Attendance extends CI_Controller {
	
	public function process() {
		$this->load->database();

		$date = $_POST['date'];
		$attCode = $_POST['attCode'];
		$description = $_POST['description'];
		$employeeId = $_POST['employeeId'];

		if($attCode == "Late") {
			$attCode = 2;
		} else {
			$attCode = 1;
		}

		$sql = "insert into attendance (date, attendanceCode, description, employeeId) values ('$date', '$attCode', '$description', '$employeeId')";
		$result = $this->db->query($sql);

		if($result) {
			header("Location: ../dashboard/");
		}

	}



}




