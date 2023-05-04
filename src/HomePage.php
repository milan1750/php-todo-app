<?php

namespace Todo;

use Todo\Auth;

class HomePage {
	public function __construct( $db ) {
		$this->db = $db;
		if( Auth::is_logged_in() ) {
			$this->loadHomePageView();
		} else {
			header("location:http://localhost:8080?page=login");
		}
	}

	public function loadHomePageView() {
		$user = $this->db->get_user();
		$todos = $this->db->get_todos();
		include 'views/homepage.php';
	}
}
