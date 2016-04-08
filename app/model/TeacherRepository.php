<?php

namespace App\Model;

use Nette;
use Nette\Database\Table\Selection;

class TeacherRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function createTeacher(Teacher $teacher) {
		return $this->getTable()->insert(array(
					'id_teacher' => $teacher->getIdTeacher(),
					'id_department' => $teacher->getDepartment()
		));
	}

}
