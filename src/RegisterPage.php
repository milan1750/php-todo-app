<?php

namespace Todo;

use Todo;

class RegisterPage {
	public function __construct() {
		if( Auth::is_logged_in() ) {
			header("location:http://localhost:8080?page=home");
		} else {
			$this->loadRegisterPageView();
		}
	}

	public function loadRegisterPageView() {
		include 'views/registerpage.php';
	}
}
