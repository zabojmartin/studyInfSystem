<?php

namespace App\Model;

class Student extends Person {

	const TYPEOFSTUSY = array('Full-attendance' => 'Full-attendance', 'Distance' => 'Distance'),
			TYPEOFDEGREE = array('Bachelor' => 'Bachelor', 'Master' => 'Master', 'Doctorate' => 'Doctorate');

	private $type;
	private $degree;

	public function __construct($name, $surname, $dateOfBirth, $type, $email, $degree) {
		$this->degree = $degree;
		$this->type = $type;
		parent::__construct($name, $surname, $dateOfBirth, $email);
	}

	function getDegree() {
		return $this->degree;
	}

	function getType() {
		return $this->type;
	}

	public static function getTypeOfStudy() {
		return Student::TYPEOFSTUSY;
	}

	public static function getTypeOfDegree() {
		return Student::TYPEOFDEGREE;
	}

}
