<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\DateTime;

class SheetPresenter extends BasePresenter {

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

	protected function createComponentCreateSheetForm() {

		$coursesOfTeacher = $this->externalTeacherRepository->findCoursesForTeacher($this->user->getIdentity()->id);

		// dump( $coursesOfTeacher );die;

		$coursesForSelect = array();
		foreach ($coursesOfTeacher as $key => $value) {

			$coursesForSelect = $coursesForSelect + array($value->id_course => $value->title);
		}


		$form = new UI\Form;
		$form->addSelect('course', 'Choose course:', $coursesForSelect)
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose course');
		$form->addText('numberOfHours', 'Number of hours:')
				->setType('number')
				->addRule(Form::FILLED, 'Must be filled.');

		$form->addText('note', 'Note for sheet:');


		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'createSheetFormSucceeded');
		return $form;
	}

	public function createSheetFormSucceeded(UI\Form $form) {

		$sheet = new Model\Sheet($form->values->numberOfHours, $form->values->note, $form->values->course);


		//dump($sheet);die;

		$this->sheetRepository->createSheet($sheet, $this->user->getIdentity()->id);

		//Nette\Database\UniqueConstraintViolationException


		$this->flashMessage('Teacher created');
		$this->redirect('Homepage:');
	}

	public function renderDefault() {

		$this->template->sheets = $this->sheetRepository->findSheetsOfTeacher($this->user->getIdentity()->id);
	}

	public function renderEditSheet($id) {
		$this->template->idSheet = $id;
		$this->template->records = $this->recordRepository->findBy(array('id_sheet' => $id));
	}

	public function actionGenerateSheet($idSheet) {
		//in case you downloaded mPDF separately
		//include_once(LIBS_DIR . '/MPDF/mpdf.php');
		include_once(__DIR__ . '/../../vendor/mpdf/mpdf.php');
		$mpdf = new \mPDF('utf-8');

		// Exporting prepared invoice to PDF.
		// To save the invoice into a file just use the second and the third parameter, equally as it's described in the documentation of mPDF->Output().

		$rowSheet = $this->sheetRepository->findBy(array('id_sheet' => $idSheet))->fetch();
		$sheets = $this->database->query("SELECT Sheet.id_sheet,Sheet.dateOfCreation, Record.numberOfHours, note, id_subject FROM Sheet JOIN Record ON Sheet.id_sheet = Record.id_sheet WHERE Sheet.id_sheet = '" . $idSheet . "'");

		// dump($sheets);die; 

		$html = '
<html>
<head>
<style>

</style>
</head>
<body>';

		$html = $html . 'Report number: ' . $idSheet;
		$html = $html . '<br>';
		$html = $html . 'Date of Creation: ' . date("d.m.Y H:i:s", strtotime($rowSheet['dateOfCreation']));
		$html = $html . '<br>';

		$html = $html . '<br>';

		$html = $html . '<table> 
       <thead>
  <tr>
     <th>Course</th>
     <th>Number of hours</th>
     <th>Note</th>
  </tr>
 </thead>
  <tbody>';




		$hours = 0;
		foreach ($sheets as $sheet) {
			$hours = $hours + $sheet['numberOfHours'];
			$course = $this->courseRepository->findBy(array('id_course' => $sheet['id_subject']))->fetch();

			// dump($sheet['dateOfCreation']);die; 
			$html = $html . '<tr>';
			$html = $html . '<td>' . $course['title'] . '</td>';
			$html = $html . '<td>' . $sheet['numberOfHours'] . '</td>';
			$html = $html . '<td>' . $sheet['note'] . '</td>';
			$html = $html . '</tr>';
		}

		$html = $html . ' </tbody></table>';
		$html = $html . '<br>Hours in total: ' . $hours;
		$html = $html . '
     </body>
</html>
';


		$mpdf->WriteHTML($html);
		$mpdf->Output();
		exit;
	}

}
