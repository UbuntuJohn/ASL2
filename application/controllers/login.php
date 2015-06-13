<?php
session_start();

class Login extends CI_Controller {
	//process method accessing database functions
	public function process() {
		$this->load->database();
		
		//check to see if email and password is set
		if(isset($_POST['email']) && isset($_POST['password'])) {
			//checking to see if values are NOT empty
			if(!empty($_POST['email']) && !empty($_POST['password'])) {
				//setting up variables to values
				$email = $this->input->post('email');
				$pass = $this->input->post('password');
				//secure salt
				$salt = "fullsail";
				//password hashing
				$hashed = crypt($pass, $salt);

				//Do our database stuff here! *Bad Practice, will change later*
				$query = $this->db->query("select employeeId, firstName, lastName, startDate, manager from employee where email='{$email}' and password='{$hashed}' limit 1");

				//check to see if account exists
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
					//setting up variable for each view
					$row = $query->row();
					//create a session for each value shown
					$_SESSION['firstName'] = $row->firstName;
					$_SESSION['employeeId'] = $row->employeeId;

					//a good point here would be to store that database stuff in the array
					$array = [
						
					];
					//send user to dashboard
					header("Location: ../dashboard/");
					

				} else {
					//show login process form for error handling
					$this->load->view('loginProcess');
				}

				

				




			} else {
				echo "Form has one or more blank fields!";
			}
			
		} else {
			echo "Data has not been sent!";
		}

	}

}