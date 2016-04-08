<?php

namespace App\Model;

class Person {

	private $name;
	private $surname;
	private $dateOfBirth;
	private $email;

	public function __construct($name, $surname, $dateOfBirth, $email) {
		$this->name = $name;
		$this->surname = $surname;
		$this->dateOfBirth = $dateOfBirth;
		$this->email = $email;
	}

	function getName() {

		return $this->name;
	}

	function getSurname() {
		return $this->surname;
	}

	function getDateOfBirth() {
		return $this->dateOfBirth;
	}

	function getCourses(TeacherForCourse $TeacherForCourse) {

		return $this->dateOfBirth;
	}

	function setName($name) {
		$this->name = $name;
	}

	function setSurname($surname) {
		$this->surname = $surname;
	}

	function setDateOfBirth($dateOfBirth) {
		$this->dateOfBirth = $dateOfBirth;
	}

	function getEmail() {

		return $this->email;
	}

}
