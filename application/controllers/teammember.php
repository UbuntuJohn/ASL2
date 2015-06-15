<?php


class Teammember extends CI_Controller {

	public function add() {
		$this->load->database();

		if(isset($_POST['employeeId'])) {
			$employeeId = $_POST['employeeId'];
			$managerId = $_POST['managerId'];

			if(!empty($employeeId) && !empty($managerId)) {
				//echo $employeeId."<br />".$managerId."<br />".$firstName."<br />".$lastName."<br />".$email;

				$sql = "insert into team (managerId, employeeId) values ('{$managerId}','{$employeeId}')";
				$query = $this->db->query($sql) or die("Could not insert new team member!");

				if($query) {
					header("Location: ../dashboard/");
				}
			} else {
				echo "Employee ID is blank!!";
			}

		} else {
			echo "Employee ID not mentioned.";
		}


	}


}