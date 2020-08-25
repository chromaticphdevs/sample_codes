<?php 	

	function crop_string($string , $length = 20)
    {
        if(strlen($string) > $length)
        {
            return substr($string, 0 , $length) . ' ...';
        }return $string;
    }

    function isEqual($subject , $toMatch)
	{
		return strtolower(trim($subject)) === strtolower(trim($toMatch));
	}

?>