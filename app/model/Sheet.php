<?php

namespace App\Model;

class Sheet {

	private $numberOfHours;
	private $dateOfCreation;
	private $recordsOfSheet = array();

	public function __construct($numberOfHours, $note, $idCourse) {
		$this->dateOfCreation = date('Y-m-d h:i:s a', time());
		//dump($this->dateOfCreation);die;
		$this->numberOfHours = $numberOfHours;
		$record = new Record($numberOfHours, $note, $idCourse);

		array_push($this->recordsOfSheet, $record);
	}

	public function addRecord(Record $record) {
		array_push($this->recordsOfSheet, $record);
	}

	function getNumberOfHours() {

		return $this->numberOfHours;
	}

	function getDateOfCreation() {
		return $this->dateOfCreation;
	}

	function getRecordsOfSheet() {
		return $this->recordsOfSheet;
	}

}

class Record {

	private $numberOfHours;
	private $note;
	private $idCourse;

	public function __construct($numberOfHours, $note, $idCourse) {
		$this->numberOfHours = $numberOfHours;
		$this->note = $note;
		$this->idCourse = $idCourse;
	}

	function getIdCourse() {

		return $this->idCourse;
	}

	function setIdCourse($idCourse) {
		$this->idCourse = $idCourse;
	}

	function getNumberOfHours() {

		return $this->numberOfHours;
	}

	function setNumberOfHours($numberOfHours) {
		$this->numberOfHours = $numberOfHours;
	}

	function getNote() {

		return $this->note;
	}

	function setNote($note) {
		$this->note = $note;
	}

}
