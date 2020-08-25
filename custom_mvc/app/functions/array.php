<?php 

	function arr_layout_keypair($array , $key , $value)
	{
		$keyPair = [];

		foreach($array as $row => $val) {

			if(is_object($val)){
				$keyPair[$val->$key] = $val->$value;
			}else{
				$keyPair[$val[$key]] = $val[$value];
			}
		}

		return $keyPair;
	}
    
	function arr_to_str($array)
	{
		return implode(',', $array);
	}

	function str_to_arr($string) 
	{
		return explode(',' , $string);
	}

		
	function is_assoc($arr)
	{
	    return array_keys($arr) !== range(0, count($arr) - 1);
	}


	/*RESETS ARRAY KEYS */
	function rm_val($array , $val) 
	{
		if (($key = array_search($val, $array)) !== false) {
		    unset($array[$key]);
		}

		return array_values($array);
	}

	function rm_index($array , $index)
	{
		unset($array[$index]);
		return array_values($array);
	}


	function rm_empty($array)
	{
		$isAssoc = is_assoc($array);

		foreach($array as $key => $val){
			if(empty($val))
				unset($array[$key]);
		}

		return array_values($array);
	}

	function rm_key(){

	}

	function array_rebuild_item($items , $array)
	{
		$newArray = [];

		try{
			foreach($items as $key => $row) 
			{
				if(array_key_exists($row , $array)) {
					$newArray[$row] = $array[$row];
				}else{
					throw new Exception("key '{$row}' not found");
				}
				
			}
		}catch(Excetion $e) 
		{
			$e->getMessage();
		}

		return $newArray;
	}

	/**
	 * keys accept string and array
	 */
	function array_remove_kitem($keys , $array)
	{
		if(is_array($keys)) {

			foreach($keys as $key => $row) 
			{
				$keyExists = array_key_exists($row , $array);

				if($keyExists !== FALSE) {
					unset($array[$row]);
				}
			}
		}else{
			$keyExists = array_key_exists($keys , $array);
			
			if($keyExists !== FALSE) {
				unset($array[$keys]);
			}
		}
		return $array;
	}

	function keypair_to_str($arr)
	{
		$strArr = '';

		foreach($arr as $key => $value){
			$strArr .= " {$key} = '$value'";
		}
		
		return $strArr;
	}