<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI;
use Nette\Application\UI\Form;

class RecordPresenter extends BasePresenter {

	private $teacherRepository;
	private $externalTeacherRepository;
	private $database;
	private $courseRepository;
	private $sheetRepository;
	private $recordRepository;

	//, Model\PersonRepository $persons
	public function __construct(Nette\Database\Context $database, Model\TeacherRepository $teacherRepository, Model\ExternalTeacherRepository $externalTeacherRepository, Model\CourseRepository $courseRepository, Model\SheetRepository $sheetRepository, Model\RecordRepository $recordRepository) {
		$this->database = $database;

		$this->externalTeacherRepository = $externalTeacherRepository;
		$this->teacherRepository = $teacherRepository;
		$this->courseRepository = $courseRepository;
		$this->sheetRepository = $sheetRepository;
		$this->recordRepository = $recordRepository;
	}

	protected function createComponentCreateRecordForm() {
		// dump($idSheet);die;
		$coursesOfTeacher = $this->externalTeacherRepository->findCoursesForTeacher($this->user->getIdentity()->id);

		$coursesForSelect = array();
		foreach ($coursesOfTeacher as $key => $value) {

			$coursesForSelect = $coursesForSelect + array($value->id_course => $value->title);
		}

		$form = new UI\Form;
		$form->addSelect('subject', 'Choose course:', $coursesForSelect)
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose course');


		$form->addText('numberOfHours', 'Number of hours:')
				->setType('number')
				->addRule(Form::FILLED, 'Must be filled.');

		$form->addText('note', 'Note for record:');
		$form->addHidden('idSheet');


		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'createRecordFormSucceeded');
		return $form;
	}

	public function createRecordFormSucceeded(UI\Form $form) {
		// dump($form->values->idSheet);die;
		$idRecord = $this->getParameter('idRecord');
		//dump($idRecord);die;

		if ($idRecord) {
			$row = $this->recordRepository->findBy(array('id_record' => $idRecord))->fetch();

			//dump($row);die;
			$record = new Model\Record($row['numberOfHours'], $row['note'], $row['id_subject']);

			$record->setNote($form->values->note);
			$record->setNumberOfHours($form->values->numberOfHours);
			$record->setIdCourse($form->values->subject);

			$this->recordRepository->updateRecord($record, $row['id_record']);

			$this->flashMessage('Record updated');
			$this->redirect('Homepage:');
		} else {

			$record = new Model\Record($form->values->numberOfHours, $form->values->note, $form->values->subject);

			$this->recordRepository->createRecord($record, $form->values->idSheet);
			$this->flashMessage('Record created');
			$this->redirect('Homepage:');
		}
	}

	public function renderDefault() {

		$this->template->sheets = $this->sheetRepository->findSheetsOfTeacher($this->user->getIdentity()->id);
	}

	public function renderAddRecord($id) {
		$this->template->idSheet = $id;
		//$this->template->sheets = $this->sheetRepository->findSheetsOfTeacher($this->user->getIdentity()->id);
	}

	public function actionAddRecord($idSheet) {

		$this['createRecordForm']['idSheet']->setDefaultValue($idSheet);
	}

	public function actionEditRecord($idSheet, $idRecord) {
		$post = $this->database->table('record')->get($idRecord);

		// dump($post );die;


		if (!$post) {
			$this->error('Record not found');
		}

		$this['createRecordForm']->setDefaults($post->toArray());
		$this['createRecordForm']['subject']->setDefaultValue($post['id_subject']);

		$this['createRecordForm']['idSheet']->setDefaultValue($idSheet);
	}

}
