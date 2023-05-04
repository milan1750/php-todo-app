<?php

namespace Todo;
/**
 *
 */
class Db
{
	function __construct()
	{
		// database Connection
		$hostname = "localhost";
		$username = "root";
		$password = "45680*millu";
		$db =  "todo";
		$conn = new \mysqli($hostname,$username,$password,$db);
		if($conn->connect_error){
			die("connection error".$conn->connect_error);
		}
		$this->conn = $conn;
		$this->current_user = isset( $_SESSION['email'] ) ? $_SESSION['email'] : '';
		$this->current_user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : '';
	}

	public function install() {
		$sql = "CREATE TABLE IF NOT EXISTS todolist(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, name VARCHAR(256),tasks VARCHAR(256) NOT NULL,created_at VARCHAR(100) NOT NULL,updated_at VARCHAR(100),status VARCHAR(100) );";
		$query = mysqli_query( $this->conn, $sql );
		if( ! $query ) {
			echo "Installation error while creating database tables 1.";
			die;
		}
		$sql = "CREATE TABLE IF NOT EXISTS users(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(256),email VARCHAR(256) NOT NULL,password VARCHAR(256) NOT NULL,created_at VARCHAR(100) NOT NULL,updated_at VARCHAR(100),status VARCHAR(100) );";
		$query = mysqli_query( $this->conn, $sql );
		if( ! $query ) {
			echo "Installation error while creating database tables 2.";
			die;
		}

	}

	public function get_user( $user = null ) {
		if( is_null( $user ) ) {
			$user = $this->current_user;
		}
        $query = mysqli_query( $this->conn, "SELECT * FROM `users` WHERE email = '$user'" );
        $row = mysqli_fetch_assoc( $query );
        return $row;
	}

	public function add_user( $username, $email, $password ) {
		return mysqli_query( $this->conn, "INSERT INTO `users`(username, email, password, created_at, updated_at) VALUES ('$username','$email','$password',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)" );
	}

	public function get_todos() {
		$query = mysqli_query( $this->conn,"SELECT * FROM `todolist` WHERE user_id = '$this->current_user_id'" );
		return mysqli_fetch_all($query, MYSQLI_ASSOC);
	}

	public function add_todo( $tasks ) {
		$insert = "INSERT INTO `todolist`(`user_id`, `tasks`, `created_at`, `updated_at`) VALUES ('$this->current_user_id','$tasks', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
        return mysqli_query($this->conn,$insert);
	}

	public function update_todo( $id, $updates ) {
		$index = 0;
		foreach( $updates as $key => $value ) {
			if( 0 === $index ) {
				$set = '`' . $key .'` = ' . '"'.$value.'"';
			} else {
				$set .= ' AND `'. $key. '` = ' . '"'.$value.'"';
			}
			$index++;
		}
		return mysqli_query( $this->conn, "UPDATE `todolist` set $set WHERE id = $id" );
	}

	public function delete_todo( $id ) {
        return mysqli_query( $this->conn, "DELETE FROM `todolist` WHERE id = $id" );
	}
}
