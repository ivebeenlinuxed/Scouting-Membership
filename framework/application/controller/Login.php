<?php
namespace Controller;

class Login {
	public function index() {
		$_SESSION['boiler_logged_in'] = true;
		$_SESSION['user_id'] = 1;
		header("Location: /");
	}
	
	public function checkLogin() {
		
	}
}