<?php

namespace App\Model;

use Nette;

class EnrolmentTeacherRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function createEnrolmentTeacher(EnrolmentTeacher $enrolmentTeacher) {
		return $this->getTable()->insert(array(
					'id_teacher' => $enrolmentTeacher->getIdTeacher(),
					'id_course' => $enrolmentTeacher->getIdCourse()
		));
	}

	public function deleteEnrolmentTeacher($idCourse) {
		$this->findBy($idCourse)->delete();
	}

}
