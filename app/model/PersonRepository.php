<?php

namespace App\Model;

use Nette;

class PersonRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function createPersonFromTeacher(Teacher $teacher) {
		return $this->getTable()->insert(array(
					'name' => $teacher->getName(),
					'surname' => $teacher->getSurname(),
					'dateOfBirth' => $teacher->getDateOfBirth(),
					'email' => $teacher->getEmail()
		));
	}

	public function createPersonFromStudent(Student $student) {
		return $this->getTable()->insert(array(
					'name' => $student->getName(),
					'surname' => $student->getSurname(),
					'dateOfBirth' => $student->getDateOfBirth(),
					'email' => $student->getEmail()
		));
	}

}
