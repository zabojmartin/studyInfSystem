<?php

namespace App\Model;

class Teacher extends Person {

	private $department;
	private $idTeacher;

	public function __construct($name, $surname, $dateOfBirth, $email, $department) {

		$this->department = $department;
		parent::__construct($name, $surname, $dateOfBirth, $email);
	}

	function getDepartment() {
		return $this->department;
	}

	function getIdTeacher() {
		return $this->idTeacher;
	}

	function setIdTeacher($id) {
		$this->idTeacher = $id;
	}

}

class InternalTeacher extends Teacher {

	private $monthCharge;

	public function __construct($name, $surname, $dateOfBirth, $email, $department) {
		$this->monthCharge = 20000;

		parent::__construct($name, $surname, $dateOfBirth, $email, $department);
	}

	function getMonthCharge() {
		return $this->monthCharge;
	}

	function setMonthCharge($monthCharge) {
		$this->monthCharge = $monthCharge;
	}

}

class ExternalTeacher extends Teacher {

	private $hourCharge;

	public function __construct($name, $surname, $dateOfBirth, $email, $department) {
		$this->hourCharge = 100;

		parent::__construct($name, $surname, $dateOfBirth, $email, $department);
	}

	function getHourCharge() {
		return $this->hourCharge;
	}

	function setHourCharge($hourCharge) {
		$this->hourCharge = $hourCharge;
	}

}
