<?php

class Register extends CI_Controller {


	public function manager() {
		$this->load->helper('form');
		$this->load->view('register');
	}

	public function process() {
		$this->load->database();
		$this->load->library('email');

		$this->email->initialize(array(
	     'mailtype' => 'html',
	     'validate' => TRUE,
	     'protocol' => 'mail'
    	));

		if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {
			
			if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])) {

				if($_POST['password'] == $_POST['password2']) {
					$email = $_POST['email'];
					$password = $_POST['password'];
					$salt = "fullsail";
					$hashed = crypt($password, $salt);
					$firstName = $_POST['firstName'];
					$lastName = $_POST['lastName'];
					$code = uniqid();

					$query = $this->db->query("insert into employee (email, password, manager, firstName, lastName, activationCode, activatedId) values ('$email', '$hashed', '1', '$firstName', '$lastName', '$code', '1')");
					
					if($query) {

						$this->email->from('w3philly@gmail.com', 'PigeonHole');
						$this->email->to($email);
						$this->email->subject('Activate your PigeonHole Account!');
						$this->email->message('Testing the email class!');
						if($this->email->send()) {
							echo "<p>Registered Successfully! Please visit your email to activate your account.</p>";
						} else {
							echo $this->email->print_debugger();
						}
						
						


					} else {
						echo "Account already exists!";
					}

				} else {
					echo "Passwords do not match!";
				}
				
				

			}


		} else {
			echo "Didn't work";
		}
	}

}



