<?php

namespace Todo;

use Todo\Auth;

class LoginPage {
	public function __construct() {
		if( Auth::is_logged_in() ) {
			header("location:http://localhost:8080?page=home");
		} else {
			$this->loadLoginPageView();
		}
	}

	public function loadLoginPageView() {
		include 'views/loginpage.php';
	}
}
