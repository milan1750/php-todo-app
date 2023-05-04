<?php

namespace Todo;
/**
 * Todo Main Class.
 */
class Todo {

	/**
	 * Instance of Todo.
	 *
	 * @since 1.0.0
	 * @var \Todo\Todo::class
	 */
	public static $instance = null;

	public function __construct() {
		$this->install();
		$this->loadRoutes();
	}

	public function install() {
		$db = new Db();
		$db->install();
	}

	/**
	 * Main Todo Instance.
	 *
	 * Ensures only one instance of Todo is loaded or can be loaded.
	 *
	 * @since  1.0.0
	 * @static
	 * @see    todo()
	 * @return Todo - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function loadRoutes() {
		$route = isset( $_GET['page'] ) ? $_GET['page'] : 'home';
		switch( $route ) {
			case 'todo':
				new ManageTodo( new Db() );
				break;
			case 'logout':
				session_destroy();
				new LoginPage();
			case 'auth':
				new Auth( new Db() );
				break;
			case 'home':
				new HomePage( new Db() );
				break;
			case 'login':
				new LoginPage();
				break;
			case 'register':
				new RegisterPage();
				break;
			default:
				new NotFoundPage();
				break;
		}
	}
}
