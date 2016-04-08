<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI;
use Nette\Application\UI\Form;

class StudentPresenter extends PersonPresenter {

	private $database;
	private $studentRepository;
	private $enrolmentStudent;
	private $personRepository;
	private $courseRepository;

	//, Model\PersonRepository $persons
	public function __construct(Nette\Database\Context $database, Model\StudentRepository $studentRepository, Model\PersonRepository $personRepository, \App\Model\EnrolmentStudentRepository $enrolmentStudentRepository, \App\Model\CourseRepository $courseRepository) {
		$this->database = $database;
		$this->studentRepository = $studentRepository;
		$this->enrolmentStudent = $enrolmentStudentRepository;
		$this->personRepository = $personRepository;
		$this->courseRepository = $courseRepository;
	}

	protected function createComponentCreateStudentForm() {






		$form = new UI\Form;
		$form->addText('name', 'Name:')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addText('surname', 'Surname:')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addText('dateOfBirth', 'Date of birth:', 20, 10)
				->setAttribute('class', 'datepicker')
				->addRule(Form::PATTERN, 'Format of date should be DD.MM.RRRR', '^([0-9]{4})(\-)([0-9]{2}|[0-9]{1})(\-)([0-9]{2}|[0-9]{1})$')
				//->addRule(Form::RANGE, 'Další číslo musí být v rozsahu od %d do %d .',array($cas,$cas1))
				->setDefaultValue('1980-01-01')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addText('email', 'E-mail:')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addPassword('password', 'password:')
				->setRequired('Password.');

		$form->addSelect('type', 'Type:', Model\Student::getTypeOfStudy())
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose typ');

		$form->addSelect('degree', 'Degree:', Model\Student::getTypeOfDegree())
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose degree');

		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'createStudentFormSucceeded');
		return $form;
	}

	// volá se po úspěšném odeslání formuláře
	public function createStudentFormSucceeded(UI\Form $form) {
		$student = new Model\Student($form->values->name, $form->values->surname, $form->values->dateOfBirth, $form->values->type, $form->values->email, $form->values->degree);
		$user = new Model\User($form->values->password, $form->values->email, 'student');

		$this->studentRepository->createStudent($student, $user);


		$this->flashMessage('Student created');
		$this->redirect('Homepage:');
	}

	protected function createComponentRegisterCourseForm() {
		$rows = $this->studentRepository->findNotRegisteredCourses($this->user->getIdentity()->id);
		//$rows = $this->courseRepository->findAll(); 
		//dump($rows);die;
		$courses = array();
		foreach ($rows as $row) {
			$courses = $courses + array($row->id_course => $row->title);
		}

		//dump($courses);die;

		$form = new UI\Form;
		$form->addCheckboxList('courses', 'Choose subjects:', $courses)
				->addRule(Form::FILLED, 'Must be filled.');

		$form->addText('semester', 'Semester:')
				->addRule(Form::FILLED, 'Must be filled.');


		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'createRegisterCourseSucceeded');
		return $form;
	}

	// volá se po úspěšném odeslání formuláře
	public function createRegisterCourseSucceeded(UI\Form $form) {

		foreach ($form->values->courses as $value) {

			$enrolmentStudent = new Model\EnrolmentStudent($value, $this->user->getIdentity()->id, $form->values->semester);
			$this->enrolmentStudent->createEnrolmentStudent($enrolmentStudent);
		}

		$this->flashMessage('Student created');
		$this->redirect('Homepage:');
	}

	public function renderDefault() {


		$this->template->students = $this->database->query("SELECT * FROM Student JOIN Person ON Student.id_student=Person.id_person");
	}

	public function renderRegisterCourses() {
		$this->template->courses = $this->studentRepository->findRegisteredCourses($this->user->getIdentity()->id);
	}

	public function handleUnregisterSubject($idCourse) {
		$array = array('id_student' => $this->user->getIdentity()->id, 'id_course' => $idCourse);
		$this->enrolmentStudent->deleteEnrolmentStudent($array);
	}

}
