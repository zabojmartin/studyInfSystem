<?php

namespace App\Model;

use Nette;

class SheetRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;
	private $recordRepository;

	public function __construct(Nette\Database\Context $database, RecordRepository $recordRepository) {
		$this->database = $database;
		$this->recordRepository = $recordRepository;
	}

	public function createSheet(Sheet $sheet, $idTeacher) {
		$row = $this->getTable()->insert(array(
			'id_externalTeacher' => $idTeacher,
			'dateOfCreation' => $sheet->getDateOfCreation()
		));

		$idSheet = $row->id_sheet;
		//dump($sheet->getRecordsOfSheet()[0]);die;
		$this->recordRepository->createRecord($sheet->getRecordsOfSheet()[0], $idSheet);

		//$enrolmentTeacher = new EnrolmentTeacher($id_course, $teacher->getIdTeacher());
		// $this->enrolmentTeacherRepository->createEnrolmentTeacher($enrolmentTeacher);
	}

	public function findSheetsOfTeacher($idTeacher) {
		return $this->database->query("SELECT * FROM Sheet JOIN ExternalTeacher ON ExternalTeacher.id_teacher = Sheet.id_externalTeacher  WHERE ExternalTeacher.id_teacher = '" . $idTeacher . "'");
	}

}
