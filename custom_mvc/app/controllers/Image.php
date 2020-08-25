<?php 	
	class Image extends Controller
	{

		public function __construct()
		{
			$this->uploadPath = PATH_UPLOAD;
			$this->savedPath  = GET_PATH_UPLOAD;
		}

		public function store()
		{
			csrfValidate();
			/*
			*FUNCTION FILE ON functions/upload.php
			*/
			$imageName = $_POST['image_name'];

			if(!empty($imageName) && strlen($imageName) < 3 ) {
				Flash::set("Invalid File name must atleast be 4 characters long" , 'warning');
				return request()->return();
			}

			$imageUpload = upload_image('image' , $this->uploadPath , $imageName);

			/*Check Status*/

			if(!isEqual($imageUpload['status'] , 'success')) 
			{
				$error = implode(',',$imageUpload['result']['err']);
				Flash::set( $error, 'danger' , 'tokenErr');
				request()->return();
			}

			$data = [
				'uploadedImage' => $imageUpload['result'],
				'savedPath'     => $this->savedPath
			];

			return $this->view('image/store' , $data);
		}
	}