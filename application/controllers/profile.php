<?php


class Profile extends CI_Controller {

	//check to see if session isn't set

	public function process() {
		$this->load->database();
		$this->load->helper('url');


		if(empty($_POST['password'])) {

			$employeeId = $_POST['employeeId'];
			$email = $_POST['email'];
			$lastName = $_POST['lastName'];

			$sql = "update employee set email='{$email}', lastName='{$lastName}' where employeeId='{$employeeId}'";
			$query = $this->db->query($sql);

			if($query) {
				header("Location: ../dashboard/");
			}

		} else {
			$employeeId = $_POST['employeeId'];
			$email = $_POST['email'];
			$password = crypt($_POST['password'], "fullsail");
			$lastName = $_POST['lastName'];

			$sql = "update employee set email='{$email}', password='{$password}', lastName='{$lastName}' where employeeId='{$employeeId}'";
			$query = $this->db->query($sql);

			if($query) {
				header("Location: ../dashboard/");
			}



		}

	}


}