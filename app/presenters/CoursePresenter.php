<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use Nette\Database\Table\Selection;
use Nette\Database\Table\ActiveRow;

class CoursePresenter extends BasePresenter {

	private $database;
	private $teacherRepository;
	private $courseRepository;
	private $personRepository;

	//, Model\PersonRepository $persons
	public function __construct(Nette\Database\Context $database, Model\TeacherRepository $teacherRepository, Model\CourseRepository $courseRepository, Model\PersonRepository $personRepository) {
		$this->database = $database;
		$this->teacherRepository = $teacherRepository;
		$this->courseRepository = $courseRepository;
		$this->personRepository = $personRepository;
	}

	protected function createComponentCreateCourseForm() {

		$rows = $this->database->query("SELECT id_person, name, surname FROM Person JOIN Teacher ON Person.id_person=Teacher.id_teacher");


		// dump($rows);die;
		$teachers = array();

		//$prom = $rows->name;
		//dump($rows);die;


		foreach ($rows as $key => $row) {
			//dump($row);die;
			$name = $row->name . " " . $row->surname;

			$teachers = $teachers + array($row->id_person => $name);
		}
		//dump($teachers);die;
		// $arr = \Course::getArrayTypes();

		$form = new UI\Form;
		$form->addText('title', 'Title:');
		$form->addText('description', 'Description:');
		$form->addText('capacity', 'Capacity:')
				->setDefaultValue(50)
				->setType('number')
				->addRule(Form::RANGE, 'Capacity between 5-120', array(5, 120));

		$form->addSelect('type', 'Type:', Model\Student::getTypeOfStudy())
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose teacher');

		$form->addSelect('teacher', 'Teacher:', $teachers)
				->addRule(Form::FILLED, 'Must be filled.')
				->setPrompt('Choose teacher');

		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'createCOurseFormSucceeded');
		return $form;
	}

	// volá se po úspěšném odeslání formuláře
	public function createCourseFormSucceeded(UI\Form $form) {

		$course = new Model\Course($form->values->title, $form->values->description, $form->values->type, $form->values->capacity);
		// $this->personRepository->createPerson(,$form->values->surname, );

		$teacherProperties = $this->teacherRepository->findBy(array('id_teacher' => $form->values->teacher))->fetch();
		$personProperties = $this->personRepository->findBy(array('id_person' => $form->values->teacher))->fetch();

		$teacher = new Model\Teacher($personProperties->name, $personProperties->surname, $personProperties->dateOfBirth, $personProperties->email, $teacherProperties->department);
		// dump($teacher );die;
		$teacher->setIdTeacher($form->values->teacher);
		$this->courseRepository->createCourse($course, $teacher);


		$this->flashMessage('Person created');
		$this->redirect('Homepage:');
	}

	public function renderDefault() {
		$this->template->anyVariable = 'any value';
		// $this->template->posts = $this->database->table('person');
		$departments = $this->departmentRepository->findAll();
		//var_dump($departments);

		$this->template->departments = $departments;
	}

}
