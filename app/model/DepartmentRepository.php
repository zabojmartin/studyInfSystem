<?php

namespace App\Model;

use Nette;

class DepartmentRepository extends Repository {

	/** @var Nette\Database\Connection */
	protected $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function createDepartment($name) {
		return $this->getTable()->insert(array(
					'name' => $name
		));
	}

}
