<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;

class TeacherPresenter extends BasePresenter {

	private $teacherRepository;
	private $internalTeacherRepository;
	private $externalTeacherRepository;
	private $personRepository;
	private $departmentRepository;
	private $database;
	private $enrolmentTeacherRepository;
	private $courseRepository;

	//, Model\PersonRepository $persons
	public function __construct(Nette\Database\Context $database, Model\TeacherRepository $teacherRepository, Model\InternalTeacherRepository $internalTeacherRepository, Model\ExternalTeacherRepository $externalTeacherRepository, Model\PersonRepository $personRepository, Model\DepartmentRepository $departmentRepository, Model\EnrolmentTeacherRepository $enrolmentTeacherRepository, Model\CourseRepository $courseRepository) {
		$this->database = $database;
		$this->internalTeacherRepository = $internalTeacherRepository;
		$this->externalTeacherRepository = $externalTeacherRepository;
		$this->teacherRepository = $teacherRepository;
		$this->personRepository = $personRepository;
		$this->departmentRepository = $departmentRepository;
		$this->enrolmentTeacherRepository = $enrolmentTeacherRepository;
		$this->courseRepository = $courseRepository;
	}

	protected function createComponentCreateTeacherForm() {
		$departments = $this->departmentRepository->findAll();
		$departmentsForSelect = array();

		foreach ($departments as $key => $value) {
			$departmentsForSelect = $departmentsForSelect + array($key => $value->name);
		}
		$type = array('1' => 'Internal', '2' => 'External');

		$form = new UI\Form;
		$form->addText('name', 'Name:')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addText('surname', 'Surname:')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addText('dateOfBirth', 'Date of birth:', 20, 10)
				->setAttribute('class', 'datepicker')
				->addRule(Form::PATTERN, 'Format of date should be DD.MM.RRRR', '^([0-9]{4})(\-)([0-9]{2}|[0-9]{1})(\-)([0-9]{2}|[0-9]{1})$')
				->setDefaultValue('1980-01-01')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addText('email', 'E-mail:')
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addPassword('password', 'password:')
				->setRequired('Password.');
		$form->addSelect('department', 'Department:', $departmentsForSelect)
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose department');
		$form->addSelect('type', 'Type of job:', $type)
				->addRule(Form::FILLED, 'Must be filled.');
		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'createTeacherFormSucceeded');
		return $form;
	}

	public function createTeacherFormSucceeded(UI\Form $form) {

		if ($form->values->type == 1) {

			$teacher = new Model\InternalTeacher($form->values->name, $form->values->surname, $form->values->dateOfBirth, $form->values->email, $form->values->department);
			$repository = $this->internalTeacherRepository;
		} else {
			$teacher = new Model\ExternalTeacher($form->values->name, $form->values->surname, $form->values->dateOfBirth, $form->values->email, $form->values->department);
			$repository = $this->externalTeacherRepository;
		}

		$user = new Model\User($form->values->password, $form->values->email, 'teacher');

		$repository->createTeacher($teacher, $user);

		$this->flashMessage('Teacher created');
		$this->redirect('Homepage:');
	}

	protected function createComponentRegisterTeacherForm() {
		$teachers = $this->database->query("SELECT * FROM Teacher JOIN Person ON Teacher.id_teacher=Person.id_person");
		//$teachers = $this->teacherRepository->findAll();
		$courses = $this->courseRepository->findAll();

		$teachersForSelect = array();
		$coursesForSelect = array();



		foreach ($teachers as $key => $value) {
			//dump($teachers);die;
			$teachersForSelect = $teachersForSelect + array($value->id_teacher => $value->surname);
		}


		foreach ($courses as $key => $value) {

			$coursesForSelect = $coursesForSelect + array($key => $value->title);
		}

		$form = new UI\Form;
		$form->addSelect('teacher', 'Teacher:', $teachersForSelect)
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose teacher');

		$form->addSelect('course', 'Course:', $coursesForSelect)
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose course');

		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'registerTeacherFormSucceeded');
		return $form;
	}

	public function registerTeacherFormSucceeded(UI\Form $form) {

		//dump($enrolmentTeacher);die;
		//Nette\Database\UniqueConstraintViolationException
		$enrolmentTeacher = new Model\EnrolmentTeacher($form->values->course, $form->values->teacher);
		try {
			$this->enrolmentTeacherRepository->createEnrolmentTeacher($enrolmentTeacher);
		} catch (Nette\Database\UniqueConstraintViolationException $e) {

			//echo 'Chyba: ', $e->getMessage();
			throw new UniqueConstraintViolationException("This teacher has already registered this course");
		}



		$this->flashMessage('Teacher created');
		$this->redirect('Homepage:');
	}

	public function renderDefault() {


		$this->template->teachers = $this->database->query("SELECT * FROM Teacher JOIN Person ON Teacher.id_teacher=Person.id_person");
	}

}
