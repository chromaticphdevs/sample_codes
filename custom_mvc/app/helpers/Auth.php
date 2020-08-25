<?php   

    class Auth
    {
        public static $PREFIX = 'AUTH';

        public static function set($name , $value) : void {

            $name = strtolower($name);
            Session::set(self::$PREFIX.'_'.$name , $value);
        }

        public static function get($name){
            
            $name = strtolower($name);
            
            return Session::get(self::$PREFIX.'_'.$name);
        }

        public function stop($name)
        {
            Session::remove(self::$PREFIX.'_'.$name);
        }
    }