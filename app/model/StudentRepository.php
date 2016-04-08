<?php

namespace App\Model;

use Nette;

class StudentRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;
	private $userManager;
	private $personRepository;

	public function __construct(Nette\Database\Context $database, UserManager $userManager, PersonRepository $personRepository) {
		$this->database = $database;
		$this->userManager = $userManager;
		$this->personRepository = $personRepository;
	}

	public function createStudent(Student $student, User $user) {

		$insert = $this->personRepository->createPersonFromStudent($student);
		$id_student = $insert->id_person;

		$this->userManager->createUser($id_student, $user);



		return $this->getTable()->insert(array(
					'id_student' => $id_student,
					'type' => $student->getType(),
					'degree' => $student->getDegree()
		));
	}

	public function findRegisteredCourses($idStudent) {
		return $this->database->query("SELECT * FROM Course WHERE EXISTS (SELECT * FROM Enrolmentstudent WHERE Enrolmentstudent.id_course = Course.id_course AND Enrolmentstudent.id_student = '" . $idStudent . "')");
	}

	public function findNotRegisteredCourses($idStudent) {

		return $this->database->query("SELECT * FROM Course WHERE NOT EXISTS (SELECT * FROM Enrolmentstudent WHERE Enrolmentstudent.id_course = Course.id_course AND Enrolmentstudent.id_student = '" . $idStudent . "')");
	}

}
