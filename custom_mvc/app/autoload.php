<?php
	header('Access-Control-Allow-Origin: *');

	session_start();

	/** REQUIRED FUNCTIONS */
	require_multiple(FNCTNS , [
		'session',
		'debug',
		'array',
		'date',
		'token',
		'upload',
		'path',
		'template',
		'request',
		'user_interface',
		'form',
		'uncommon',
		'app_widget',
		'mailers',
		'string_helper'
	]);

	chdir('../app');

	spl_autoload_register(function($class_name)
	{
		/**CHANGE DIR */
		$file = null;
		$invalidChars = array(
        '.', '\\', '/', ':', '*', '?', '"', '<', '>', "'", '|'
		);

		$class_name = ucfirst(str_replace($invalidChars, '', $class_name));
		$extension_prefix = '.php';

		$basePath = getcwd();

		return_require($basePath.DS.'core' , $class_name);
		return_require($basePath.DS.'classes' , $class_name);
		return_require($basePath.DS.'controllers' , $class_name);
		return_require($basePath.DS.'models' , $class_name);
		return_require($basePath.DS.'helpers' , $class_name);
	});
