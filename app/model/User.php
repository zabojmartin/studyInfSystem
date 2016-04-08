<?php

namespace App\Model;

class User {

	private $password;
	private $username;
	private $role;

	public function __construct($password, $username, $role) {
		$this->password = $password;
		$this->username = $username;
		$this->role = $role;
	}

	function getPassword() {

		return $this->password;
	}

	function getUsername() {

		return $this->username;
	}

	function getRole() {

		return $this->role;
	}

}
