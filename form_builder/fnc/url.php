<?php 	

	function request()
	{
		$request = $_REQUEST;

		$method  = $_SERVER['REQUEST_METHOD'];
		
		return RequestHelper::getInstance();
	}


	function redirect($location){

		header("Location:".URL.DS.$location);
	}