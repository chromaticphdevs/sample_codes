<?php 
    class Flash{

        const NAME = 'flash';
        
        public static function set($message = '' , $type ='success' , $key = self::NAME){
            //set flash keyname
            if(Session::check($key)){
                Session::remove($key);
            }
            //set flash classname
            
            if(Session::check($key.'_class')){
                Session::remove($key.'_class');
            }
    
            Session::set($key ,$message);
            Session::set($key.'_class',$type);
            
        }

        public static function show($name = self::NAME){

            if(Session::check($name) && Session::check($name.'_class')){

                $className = Session::get($name.'_class');
                $message = Session::get($name);


                Session::remove($name); Session::remove($name.'_class');

                echo '
                      <div class="alert alert-'.$className.'">
                      <button class="close" data-dismiss="alert">×</button>
                      <strong>'.$message.'</strong> </div>
                ';
            }
        }


    }