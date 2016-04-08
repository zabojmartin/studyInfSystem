<?php

namespace App\Model;

use Nette;

class RecordRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function createRecord(Record $record, $idSheet) {
		$this->getTable()->insert(array(
			'id_sheet' => $idSheet,
			'id_subject' => $record->getIdCourse(),
			'numberOfHours' => $record->getNumberOfHours(),
			'note' => $record->getNote()
		));
	}

	public function updateRecord(Record $record, $idRecord) {
		$this->findBy(array('id_record' => $idRecord))->update(array(
			'id_subject' => $record->getIdCourse(),
			'numberOfHours' => $record->getNumberOfHours(),
			'note' => $record->getNote()
		));
	}

}
