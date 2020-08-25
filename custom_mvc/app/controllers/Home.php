<?php 	

	class Home extends Controller
	{

		public function __construct()
		{
			$this->home = $this->model('HomeModel');
		}

		public function index()
		{
			$data = [

			];
			return $this->view('home/index');
		}
	}