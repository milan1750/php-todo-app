<?php
/**
 * Auth Class.
 * @package php/todo
 */
namespace Todo;

/**
 * Authenticate user.
 *
 * @since 1.0.0
 */
class Auth {

	public $validation;

	public $db;

	public function __construct( $db ) {
		$this->validation = new Validation();
		$this->db = $db;
		if( self::is_logged_in() ) {
			header("location:http://localhost:8080?page=home");
		}
		if( isset( $_POST['login-btn'] ) && isset( $_GET['action'] ) && 'login' === $_GET['action'] ) {
			$this->login_user();
		}

		if( isset( $_POST['signup-btn'] ) && isset( $_GET['action'] ) && 'register' === $_GET['action'] ) {
			$this->register_user();
		}
	}
	public static function is_logged_in() {
		if( isset( $_SESSION['username'] ) ) {
			return true;
		} else {
			return false;
		}
	}

	public function login_user() {
		$login_email = $_POST['login_email'];
		$login_password = $_POST['login_password'];
		if( $this->validation->validate_email($login_email)){
			$row = $this->db->get_user( $login_email );
			if($row){
				if($row['password'] == $login_password){
					$_SESSION['username'] = $row['username'];
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['status'] = $row['status'];
					$_SESSION['logged_in'] = true;

					header("location:http://localhost:8080?page=home");
				}else{
					header("location:http://localhost:8080?page=login&error=Password did not match");
				}
			}else{
				header("location:http://localhost:8080?page=login&error=User does not exists");
			}
		}else{
			header("location:http://localhost:8080?page=login&error=Please enter valid email");
		}
	}

	public function register_user() {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];
		if( $this->validation->validate_email($email)){
			if($password == $c_password){
				$row = $this->db->get_user($email);
				if(!$row){
					$query = $this->db->add_user($username, $email, $password);
					if($query){
						header("location:http://localhost:8080?page=register&success=User has been register successfully");
					}else{
						header("location:http://localhost:8080?page=register&error=Something went wrong, please try again");
					}
				}else{
					header("location:http://localhost:8080?page=register&error=User already exists");
				}
			}else{
				header("location:http://localhost:8080?page=register&error=Password did not match");
			}
		}else{
			header("location:http://localhost:8080?page=register&error=Please enter valid email");
		}
	}
}
