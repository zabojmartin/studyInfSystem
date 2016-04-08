<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI;
use Nette\Application\UI\Form;

class PersonPresenter extends BasePresenter {

	private $database;

	//, Model\PersonRepository $persons
	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	protected function createComponentCreatePersonForm() {

		$form = new UI\Form;
		$form->addText('name', 'Name:');
		$form->addText('surname', 'Surname:');

		$form->addText('dateOfBirth', 'Date of birth:', 20, 10)
				->setAttribute('class', 'datepicker')
				->addRule(Form::PATTERN, 'Format of date should be DD.MM.RRRR', '^([0-9]{4})(\-)([0-9]{2}|[0-9]{1})(\-)([0-9]{2}|[0-9]{1})$')
				//->addRule(Form::RANGE, 'Další číslo musí být v rozsahu od %d do %d .',array($cas,$cas1))
				->setDefaultValue('1980-01-01');

		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'createTeacherFormSucceeded');
		return $form;
	}

	// volá se po úspěšném odeslání formuláře
	public function createTeacherFormSucceeded(UI\Form $form) {

		$this->personRepository->createPerson($form->values->name, $form->values->surname, $form->values->dateOfBirth);
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
