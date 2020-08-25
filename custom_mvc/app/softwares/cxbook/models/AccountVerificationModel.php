<?php

    class AccountVerificationModel extends Model
    {
        public $table = 'cb_account_verifications';
        private $token = null;

        public function createToken($account_id)
        {
            $token =  $this->token = $this->token();

            $tokenId =$this->tokenId = $this->store([
                'code'       => random_number(4),
                'account_id' => $account_id,
                'token'      => $token,
                'expiry'     => $this->expiry()
            ]);


            $verificationToken = parent::get($tokenId);

            /*
            *set database data
            */
            parent::dbData($verificationToken);

            return $tokenId;
        }

        public function getLink()
        {
            $token = $this->token;
            $tokenId = $this->tokenId;

            // return URL.DS.'cxbook/'."AccountVerification/verify?token={$token}&id={$tokenId}";
            return appRequest("AccountVerification/verify?token={$token}&id={$tokenId}");
        }
        private function token()
        {
            return seal(get_token_random_char());
        }

        private function expiry()
        {
            return date("Y-m-d H:i:s", strtotime('+4 hours'));
        }

        public function getToken()
        {
            return $this->token;
        }

        public function getByCode($code)
        {
          $data = [
            $this->table,
            '*',
            "code = '{$code}'"
          ];

          return $this->dbHelper->single(...$data);
        }


        public function setVerified($id)
        {
          $data = [
            $this->table,
            [
              'is_verified' => true
            ],
            "id = {$id}"
          ];

          return $this->dbHelper->update(...$data);
        }
        
        public function verifyAccount($account_id)
        {
          return $this->dbHelper->update(...[
            'cb_accounts',
            [
              'is_verified' => true
            ],
            " id = '{$account_id}'"
          ]);
        }
    }
