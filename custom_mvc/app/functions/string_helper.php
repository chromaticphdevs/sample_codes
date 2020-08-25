<?php
    
    function isEqual($subject , $toMatch)
    {
        return strtolower(trim($subject)) === strtolower(trim($toMatch));
    }
    
    function is_email($string)
    {
        if(! filter_var($string , FILTER_VALIDATE_EMAIL))
            return FALSE;
        return TRUE;
    }

    function str_to_mobile($string)
    {
        $mobile = preg_replace("/[^0-9]/", "", trim($string));

        return $mobile;
    }

    function str_to_email($string)
    {
        $email = preg_replace("/[^0-9a-zA-Z@._]/", "", trim($string));
        return $email;
    }

    function str_escape($value)
    {
        $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
        $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

        return str_replace($search, $replace, $value);
    }


    function stringWrap($string , $element)
    {
      $open = "<{$element}>";
      $close = "</{$element}>";


      return "{$open}{$string}{$close}";
    }
