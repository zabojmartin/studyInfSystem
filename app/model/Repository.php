<?php

namespace App\Model;

use Nette;

/**
 * Users management.
 */
class Repository extends Nette\Object {

	/** @var Nette\Database\Connection */
	protected $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	/**
	 * Vrací objekt reprezentující databázovou tabulku.
	 * @return Nette\Database\Table\Selection
	 */
	protected function getTable() {
		// název tabulky odvodíme z názvu třídy           

		preg_match('#(\w+)Repository$#', get_class($this), $m);

		return $this->database->table(lcfirst($m[1]));
	}

	/**
	 * Vrací všechny řádky z tabulky.
	 * @return Nette\Database\Table\Selection
	 */
	public function findAll() {
		return $this->getTable();
	}

	/**
	 * Vrací řádky podle filtru, např. array('name' => 'John').
	 * @return Nette\Database\Table\Selection
	 */
	public function findBy(array $by) {
		return $this->getTable()->where($by);
	}

}
