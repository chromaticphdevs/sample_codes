<?php 	


	class HomeModel extends Model
	{

		public function __construct()
		{
			parent::__construct();

			$this->api = 'https://jsonplaceholder.typicode.com/posts';
		}
		public function getStarwarsApi()
		{
			$apiDatas = file_get_contents($this->api);

			if(is_null($apiDatas))
				return false;

			$apiDatas = json_decode($apiDatas);

			if(!is_array($apiDatas))
				return false;

			return $apiDatas;
		}
	}