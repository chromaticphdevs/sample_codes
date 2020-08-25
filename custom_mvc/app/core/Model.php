<?php

 	abstract class Model extends DBResultWithCondition{

 		public function __construct()
 		{

 			$this->db = new Database(DBVENDOR , DBHOST , DBNAME , DBUSER , DBPASS);


 			$this->dbHelper = new DatabaseHelper( Database::getInstance() );
		 }

		 /** OVERRIDEDABLE */
		public function store($values)
		{
			$data = [
				$this->table,
				$values
			];

			return $this->dbHelper->insert(...$data);
		}

		public function update($values , $id)
		{
			$data = [
				$this->table,
				$values,
				"id = '{$id}'"
			];

			return $this->dbHelper->update(...$data);
		}

		public function delete($id)
		{
			$data = [
				$this->table,
				"id = '{$id}'"
			];

			return $this->dbHelper->delete(...$data);
		}

		public function get($id)
		{
			$data = [
				$this->table ,
				'*',
				"id = '{$id}'"
			];

			return $this->dbHelper->single(...$data);
		}

		public function all($where =null , $order_by = null , $limit = null)
		{
			$data = [
				$this->table ,
				'*',
				$where,
				$order_by,
				$limit
			];
			return $this->dbHelper->resultSet(...$data);
		}


		public function dbgetAssoc($field , $where = null)
	    {
	      $data = [
	        $this->table,
	        '*',
	        $where,
	        "$field ASC"
	      ];

	      return $this->dbHelper->resultSet(...$data);
	    }

	    public function dbgetDesc($field , $where = null)
	    {
	      $data = [
	        $this->table,
	        '*',
	        $where,
	        "$field DESC"
	      ];

	      return $this->dbHelper->resultSet(...$data);
	    }

		public function first()
		{
			$data = [
				$this->table ,
				'*',
				null,
				'id asc',
				'1'
			];

			return $this->dbHelper->single(...$data);
		}

    final public function dbData($data)
    {
      $this->data = $data;
    }

    final public function getdbData($property = null)
    {
      if(is_null($property))
        return $this->data;

      return $this->data->$property;
    }


	public function filter($filters)
	{
		$filterCondition = '';

		$counter = 0;

		$fields = array_keys($filters);
		foreach($fields as $key => $val)
		{
			if($counter < $key) {

				$filterCondition .= " AND ";
				$counter++;
			}

			$filterCondition .= " {$val} like '%{$filters[$val]}%'";
		}

		return $filterCondition;
	}

		final public function add_model($varname , $instance)
		{
			$this->$varname = $instance;
	}

 	}
