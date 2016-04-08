<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI;

class DepartmentPresenter extends BasePresenter {

	private $database;
	private $departmentRepository;

	//, Model\PersonRepository $persons
	public function __construct(Nette\Database\Context $database, Model\DepartmentRepository $departmentRepository) {
		$this->database = $database;
		$this->departmentRepository = $departmentRepository;
	}

	protected function createComponentCreateDepartmentForm() {

		// $departments = $this->departmentRepository->findAll();
		// var_dump($departments);
		$form = new UI\Form;
		$form->addText('name', 'Name:');
		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = array($this, 'departmentFormSucceeded');
		return $form;
	}

	// volá se po úspěšném odeslání formuláře
	public function departmentFormSucceeded(UI\Form $form) {
		$this->departmentRepository->createDepartment($form->values->name);

		$this->flashMessage('Byl jste úspěšně registrován.');
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
