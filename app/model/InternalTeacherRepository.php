<?php

namespace App\Model;

use Nette;

class InternalTeacherRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;
	private $teacherRepository;
	private $personRepository;
	private $userManager;

	public function __construct(Nette\Database\Context $database, PersonRepository $personRepository, TeacherRepository $teacherRepository, UserManager $userManager) {
		$this->database = $database;
		$this->teacherRepository = $teacherRepository;
		$this->personRepository = $personRepository;
		$this->userManager = $userManager;
	}

	public function createTeacher(InternalTeacher $teacher, User $user) {

		$row = $this->personRepository->createPersonFromTeacher($teacher);
		$teacher->setIdTeacher($row->id_person);


		$this->userManager->createUser($row->id_person, $user);


		$this->teacherRepository->createTeacher($teacher);

		$this->getTable()->insert(array(
			'id_teacher' => $row->id_person,
			'monthCharge' => '25000'
		));
	}

}
