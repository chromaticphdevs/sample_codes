<?php namespace classes;   

    class Customer extends \AutoProps
    {
        
        public function fullname()
        {
            return $this->first_name . ' ' .$this->last_name;
        }

        public function mobileFirst()
        {   
            foreach($this->contacts as $key => $row) 
            {
                if($row->type == 'mobile') {
                    return $row->value;
                    break;
                }
            }
        }

        public function emailFirst()
        {
            foreach($this->contacts as $key => $row) 
            {
                if($row->type == 'email') {
                    return $row->value;
                    break;
                }
            }
        }
    }