<?php 	
	class RequestHelper
	{
		private static $instance = null;

		public static function getInstance()
		{
			if(self::$instance == null) {
				self::$instance = new RequestHelper();
			}

			return self::$instance;
		}

		public function __construct()
		{
			$this->request = $_REQUEST;
			$this->method  = $_SERVER['REQUEST_METHOD'];
		}

		public function method()
		{
			return $this->method;
		}


		public function inputs()
		{
			$request = $this->request;

			$fields = [];

			foreach($request as $key => $row) {
				if(strtolower($key) === 'url'){
					continue;
				}else{
					$fields[$key] = $row;
				}
			}

			return $fields;
		}

		public function isPost()
		{
			if(strtolower($this->method) == 'post') 
				return true;
			return false;
		}


		public function posts()
		{

			if(! $this->isPost())
				return false;

			$fields = [];

			foreach($_POST as $key => $row) {
				if(strtolower($key) === 'url'){
					continue;
				}else{
					$fields[$key] = $row;
				}
			}

			return $fields;
			
		}
		public function post()
		{
			if(strtolower($this->method) == 'post') 
				return true;
		}
		
		public function input($name)
		{
			$method = $this->method;

			switch(strtolower($method))
			{
				case 'post':
					if(isset($_POST[$name]))
						return $_POST[$name];
				break;

				case 'get':
					if(isset($_GET[$name]))
						return $_GET[$name];
				break;
			}
		}

		public function url()
		{
			$url = $this->request['url'];

			return $url;
		}

		public function referrer()
		{
			return $_SERVER['HTTP_REFERER'];
		}

		public function return()
		{
			/*SAVE FORM FIELDS*/
			FormSession::getInstance();

			header("Location:".$this->referrer());
		}
	}