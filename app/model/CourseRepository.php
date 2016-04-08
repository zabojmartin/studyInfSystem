<?php

namespace App\Model;

use Nette;

class CourseRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;
	private $enrolmentTeacherRepository;

	public function __construct(Nette\Database\Context $database, EnrolmentTeacherRepository $enrolmentTeacherRepository) {
		$this->database = $database;
		$this->enrolmentTeacherRepository = $enrolmentTeacherRepository;
	}

	public function createCourse(Course $course, Teacher $teacher) {
		$row = $this->getTable()->insert(array(
			'title' => $course->getTitle(),
			'description' => $course->getDescription(),
			'type' => $course->getType(),
			'capacity' => $course->getCapacity(),
		));

		$id_course = $row->id_course;
		$enrolmentTeacher = new EnrolmentTeacher($id_course, $teacher->getIdTeacher());
		$this->enrolmentTeacherRepository->createEnrolmentTeacher($enrolmentTeacher);
	}

	public function pokus() {
		$book = $this->database->table('Person')->get(16);
		$book->ref('Person', 'id_person');
	}

}
