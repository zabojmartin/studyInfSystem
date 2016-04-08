<?php

namespace App\Model;

class EnrolmentStudent {

	private $idCourse;
	private $idStudent;
	private $semester;

	public function __construct($idCourse, $idStudent, $semester) {
		$this->idCourse = $idCourse;
		$this->idStudent = $idStudent;
		$this->semester = $semester;
	}

	function getIdCourse() {

		return $this->idCourse;
	}

	function getIdStudent() {
		return $this->idStudent;
	}

	function getSemester() {
		return $this->semester;
	}

}

class EnrolmentTeacher {

	private $idCourse;
	private $idTeacher;

	public function __construct($idCourse, $idTeacher) {
		$this->idCourse = $idCourse;
		$this->idTeacher = $idTeacher;
	}

	function getIdCourse() {

		return $this->idCourse;
	}

	function getidTeacher() {
		return $this->idTeacher;
	}

}
