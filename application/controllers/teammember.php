<?php


class Teammember extends CI_Controller {
	//add method for adding team members
	public function add() {
		//load database details
		$this->load->database();
		//check if data has been posted
		if(isset($_POST['employeeId'])) {
			//post data variables
			$employeeId = $_POST['employeeId'];
			$managerId = $_POST['managerId'];
			//check if variables aren't empy
			if(!empty($employeeId) && !empty($managerId)) {
				//echo $employeeId."<br />".$managerId."<br />".$firstName."<br />".$lastName."<br />".$email;
				//Query for inserting employees
				$sql = "insert into team (managerId, employeeId) values ('{$managerId}','{$employeeId}')";
				$query = $this->db->query($sql) or die("Could not insert new team member!");
				//if successful, send to dashboard
				if($query) {
					header("Location: ../dashboard/");
				}
			//if they are empty
			} else {
				echo "Employee ID is blank!!";
			}
		//if data not sent at all
		} else {
			echo "Employee ID not mentioned.";
		}


	}


}