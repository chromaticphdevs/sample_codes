<?php 	
	
	class FormController extends Controller
	{

		public function store()
		{

			$input = request()->inputs();

			if(!isEqual($input['name'] , 'test-form')){
				Flash::set("To Proceed Name must be 'test-form'");
				Flash::set("See all your previous inputs are saved" , 'warning' , 'warning');
				return request()->return();
			}


			Flash::set("Form Submitted");


			$post = $input['post'];

			$getPost = getApi("https://jsonplaceholder.typicode.com/posts/$post");
			$getUser = getApi("https://jsonplaceholder.typicode.com/users/$getPost->userId");


			$data  = [
				'user' => $getUser,
				'post' => $getPost
			];
			
			return $this->view('form/store' , $data);
		}
	}