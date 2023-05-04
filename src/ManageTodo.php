<?php

namespace Todo;

use Todo\Auth;

class ManageTodo {
	public function __construct($db) {
		$this->db = $db;
		if( ! Auth::is_logged_in() ) {
			header("location:http://localhost:8080?page=login");
			exit(1);
		}

		if( isset( $_POST['add-todo-btn'] ) && isset( $_GET['action'] ) && 'add-todo' === $_GET['action'] ) {
			$this->add_todo();
		}

		if( isset( $_POST['todo-todo-btn'] ) && isset( $_GET['action'] ) && 'status-todo' === $_GET['action'] ) {
			$this->status_todo();
		}

		if( isset( $_POST['inp-todo-btn'] ) && isset( $_GET['action'] ) && 'status-todo' === $_GET['action'] ) {
			$this->inp_todo();
		}

		if( isset( $_POST['complete-todo-btn'] ) && isset( $_GET['action'] ) && 'status-todo' === $_GET['action'] ) {
			$this->complete_todo();
		}

		if( isset( $_POST['dlt-todo-btn'] ) && isset( $_GET['action'] ) && 'status-todo' === $_GET['action'] ) {
			$this->dlt_todo();
		}
	}

	public function add_todo() {
		$tasks = $_POST['add-todo'];
		$todo = $this->db->add_todo( $tasks );
        if($todo){
			header("location:http://localhost:8080?page=home");
        }else{
			header("location:http://localhost:8080?page=home&error=Something went wrong");
        }
	}

	public function status_todo() {
		// ============== Todo Progress Task ===========
		if(isset($_POST['todo-todo-btn'])){
			$row_id = $_GET['id'];
			$todo = $this->db->update_todo( $row_id, [ 'status' => 'Todo' ] );
			if($todo){
				header("location:http://localhost:8080?page=home");
			}else{
				header("location:http://localhost:8080?page=home&error=Something went wrong");
			}
		}
	}

	public function inp_todo() {
		// ============== Todo Progress Task ===========
		if(isset($_POST['inp-todo-btn'])){
			$row_id = $_GET['id'];
			$todo = $this->db->update_todo( $row_id, [ 'status' => 'In Progress' ] );
			if($todo){
				header("location:http://localhost:8080?page=home");
			}else{
				header("location:http://localhost:8080?page=home&error=Something went wrong");
			}
		}
	}

	public function complete_todo() {
		// ============== Todo Progress Task ===========
		if(isset($_POST['complete-todo-btn'])){
			$row_id = $_GET['id'];
			$todo = $this->db->update_todo( $row_id, [ 'status' => 'Complete' ] );
			if($todo){
				header("location:http://localhost:8080?page=home");
			}else{
				header("location:http://localhost:8080?page=home&error=Something went wrong");
			}
		}
	}

	public function dlt_todo() {
		// ============== Todo Progress Task ===========
		if(isset($_POST['dlt-todo-btn'])){
			$row_id = $_GET['id'];
			$todo = $this->db->delete_todo( $row_id );
			if($todo){
				header("location:http://localhost:8080?page=home");
			}else{
				header("location:http://localhost:8080?page=home&error=Something went wrong");
			}
		}
	}
}
