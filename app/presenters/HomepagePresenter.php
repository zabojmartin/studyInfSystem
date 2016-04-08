<?php

namespace App\Presenters;

use Nette;
use App\Model;

class HomepagePresenter extends BasePresenter {

	private $database;
	private $persons;

	public function __construct(Nette\Database\Context $database, Model\PersonRepository $persons) {
		$this->database = $database;
		$this->persons = $persons;
	}

	protected function startup() {
		parent::startup();

		if (!$this->getUser()->isLoggedIn() OR ! $this->user->isInRole('admin')) {
			$this->redirect('Sign:in');
		}
	}

	public function renderDefault() {
		$this->template->anyVariable = 'any value';
		// $this->template->posts = $this->database->table('person');
		//$this->template->persons = $this->persons->findAll();
	}

}
