<?php
session_start();

class Login extends CI_Controller {
	
	public function process() {
		$this->load->database();
		
		
		if(isset($_POST['email']) && isset($_POST['password'])) {
			if(!empty($_POST['email']) && !empty($_POST['password'])) {
				$email = $this->input->post('email');
				$pass = $this->input->post('password');
				$salt = "fullsail";
				$hashed = crypt($pass, $salt);

				//Do our database stuff here!
				$query = $this->db->query("select employeeId, firstName, lastName, startDate, manager from employee where email='{$email}' and password='{$hashed}' limit 1");

				if($query->num_rows() > 0) {

					
					/* //good code if there was multiple rows
					foreach($query->result() as $row) {
						echo "ID: {$row->employeeId}<br />";
						echo "First Name: {$row->firstName}<br />";
						echo "Last Name: {$row->lastName}<br />";
						echo "Start Date: {$row->startDate}<br />";

						if($row->manager == 1) {
							echo "Manager? Yes";
						} else {
							echo "Manager? No";
						}
					
					} */

					$row = $query->row();
					$_SESSION['firstName'] = $row->firstName;
					$_SESSION['employeeId'] = $row->employeeId;

					//a good point here would be to store that database stuff in the array
					$array = [
						
					];

					header("Location: ../dashboard/");
					

				} else {
					echo "Password incorrect or account does not exist";
				}

				

				




			} else {
				echo "Form has one or more blank fields!";
			}
			
		} else {
			echo "Data has not been sent!";
		}

	}

}