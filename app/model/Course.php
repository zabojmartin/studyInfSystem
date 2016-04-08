<?php

namespace App\Model;

class Course {

	private $title;
	private $description;
	private $capacity;
	private $type;

	public function __construct($title, $description, $type, $capacity) {
		$this->title = $title;
		$this->description = $description;
		$this->type = $type;
		$this->capacity = $capacity;
		//$this->teacher = $teacher;  
		// $this->arrayTeachers = [$teacher];
	}

	function getTitle() {

		return $this->title;
	}

	function getDescription() {

		return $this->description;
	}

	function getType() {

		return $this->type;
	}

	function getCapacity() {

		return $this->capacity;
	}

}
