<?php
	session_start();

	

	require_once 'lib/Session.php';
	require_once 'lib/Form.php';
	require_once 'lib/FormInput.php';
	require_once 'lib/FormSession.php';
	require_once 'lib/Flash.php';
	require_once 'lib/RequestHelper.php';


	require_once 'fnc/array.php';
	require_once 'fnc/str_helper.php';
	require_once 'fnc/url.php';

	/*
	*Change to your url 
	*/
	define('URL' , 'http://localhost/php_class_helpers/form_builder');

	const API = [
		'jsonPlaceHolder' => 'https://jsonplaceholder.typicode.com/posts'
	];


	/*
	*USUALLY LOADED ON THE CONTROLLER
	*/

	$contents = file_get_contents(API['jsonPlaceHolder']);


	if(empty($contents) || is_null($contents))
		return "Invalid Request"; //throw err message

	$contents = json_decode($contents);

	$formAction = URL;
?>