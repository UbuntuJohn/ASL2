<?php

class Register extends CI_Controller {

	//manager method showing form, template, URL, formvalidation library, and rules
	public function manager() {
		$this->load->helper('form');
		$this->load->view('register');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim'); 
		$this->form_validation->run();
	}

	//for managers
	//process method running database, email library, and registerProcess template
	public function process() {
		$this->load->database();
		$this->load->library('email');
		$this->load->view('registerProcess');

		//email configuration
		$this->email->initialize(array(
	     'mailtype' => 'html',
	     'validate' => TRUE,
	     'protocol' => 'mail'
    	));

		//check to see if POST data is set
		if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {
			//check to see if POST data is not empty
			if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])) {
				//if password is equal to the second password form, set up variables
				if($_POST['password'] == $_POST['password2']) {
					$email = $_POST['email'];
					$password = $_POST['password'];
					$salt = "fullsail";
					$hashed = crypt($password, $salt);
					$firstName = $_POST['firstName'];
					$lastName = $_POST['lastName'];
					//creates a unique ID
					$code = uniqid();

					//insert data into database
					$query = $this->db->query("insert into employee (email, password, manager, firstName, lastName, activationCode, activatedId) values ('$email', '$hashed', '1', '$firstName', '$lastName', '$code', '1')");
					
					//if successful, send email (isn't working for some reason)
					if($query) {

						$this->email->from('w3philly@gmail.com', 'PigeonHole');
						$this->email->to($email);
						$this->email->subject('Activate your PigeonHole Account!');
						$this->email->message('Testing the email class!');
						if($this->email->send()) {
							echo "Registered Successfully! Please visit your email to activate your account.";
						} else {
							//if didn't work, show debugger info
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
	//register employee page
	public function employee() {
		//load database
		$this->load->database();
		//check if data has been posted at all
		if($_POST) {
			//setting variables to those post values
			$employeeId = $_POST['employeeId'];
			$email = $_POST['email'];
			$fname = $_POST['firstName'];
			$lname = $_POST['lastName'];
			$startDate = $_POST['startDate'];
			//sql to insert that data into employee table
			$sql = "insert into employee (employeeId, firstName, lastName, startDate, manager, email) values 
			('$employeeId', '$fname', '$lname', '$startDate', '2', '$email')";
			//run the query
			$query = $this->db->query($sql);
			

			


		} 
		//send them to create team page
		header("Location: ../create/team");


	}

}



