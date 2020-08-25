<?php 

	class Helper extends Controller
	{

		public function __construct()
		{
			$this->home = $this->model('HomeModel');
		}

		public function index()
		{
			/*Return to http referrer*/
			if(!isset($_GET['helper']))
				return request()->return();


			$data = [
				'sampleDatas' => $this->home->getStarwarsApi()
			];

			switch(strtolower($_GET['helper']))
			{
				case 'form':

					/*
					*Array Sample Datas to key as id then value as title
					*Can be found on functions/array.php
					*/
					$data['keyPairedSampleDatas'] = arr_layout_keypair($data['sampleDatas'] , 'id' , 'title');

					return $this->loadView('form' ,$data);
				break;


				case 'flash':
					Flash::set('Alert Message Primary' , 'primary' , 'primary');
					Flash::set('Alert Message Warning' , 'warning' , 'warning');
					Flash::set('Alert Message Danger' , 'danger' , 'danger');
					Flash::set('Alert Message Info' , 'info' , 'info');
					return $this->loadView('flash' , $data);
				break;

				case 'upload':
					$data = [
						'images' => scandir(PATH_UPLOAD , 1),
						'path'   => GET_PATH_UPLOAD
					];

					return $this->loadView('upload' , $data);
				break;

				case 'array':
					$data['users'] = getApi("https://jsonplaceholder.typicode.com/users");
					return $this->loadView('array' , $data);
				break;

				case 'query':
					return $this->loadView('query' , $data);
				break;
			}
		}


		public function loadView($view , $data = null){
			return $this->view("helper/{$view}" , $data);
		}
	}