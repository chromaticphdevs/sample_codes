<?php

    class AccountModel extends Model
    {
        public $table = 'cb_accounts';

        protected $publicFields = [
            'id','user_name' , 'email' , 'first_name' , 'last_name','password' ,'is_verified'
        ];

        public function createUsername($firstName)
        {
            $count = count($this->all()) ?? 0;

            return substr($firstName,0,4).$count;
        }

        public function getPublic($id)
        {
            return $this->dbHelper->single(...[
                $this->table,
                $this->publicFields,
                "id = '{$id}'"
            ]);
        }

        public function getByEmail($email)
        {
            return $this->dbHelper->single(...[
                $this->table,
                $this->publicFields,
                "email = '{$email}'"
            ]);
        }

        public function getByUsername($username)
        {
            return $this->dbHelper->single(...[
                $this->table,
                $this->publicFields,
                "username = '{$username}'"
            ]);
        }
    }
