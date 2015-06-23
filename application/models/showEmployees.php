<?php


class ShowEmployees extends CI_Model {

	public function getEmployeesById() {
		$employeeId = $_SESSION['employeeId'];
		$sql = "select firstName, lastName, team.managerId as mid, team.employeeId as eid from employee
		join team on team.employeeId = employee.employeeId where team.managerId = '{$employeeId}'";

		$query = $this->db->query($sql);

		foreach($query->result_array() as $row) {
			echo $row['firstName'];
			echo $row['lastName'];
			echo $row['eid'];
		}
		


	}


}