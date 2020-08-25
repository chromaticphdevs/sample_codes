<?php

    class Accounts extends SoftwareController
    {

        public function __construct()
        {
            $this->loadModels([
                'account' => 'AccountModel',
                'accountVerification' => 'AccountVerificationModel'
            ]);
        }
        public function index()
        {
            if(empty(Auth::get('user'))) {
                return appRedirect("accounts/login");
            }

            $data = [
              'account' => $this->account->get(Auth::get('user')->id)
            ];

            return $this->view('accounts/dashboard' , $data);
        }

        /*
        *Account Registration
        */
        public function store()
        {
            $post = request()->posts();

            $firstName = $post['first_name'];
            $lastName = $post['last_name'];
            $email    = $post['email'];
            $password = $post['password'];

            if(!empty($email)) {

                $user = $this->account->getByEmail($email);

                if($user) {
                    $errors[] = " Email already exists ";
                }
            }

            if(strlen($password) < 4) {
                $errors[] = " Password must atleast be 4 characters long";
            }

            if(!empty($errors)) {

                Flash::set(implode(',' , $errors) , 'danger');
                return request()->return();
            }

            $account_id = $this->account->store([
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'user_name'  => $this->account->createUsername($firstName),
                'email'      => $email,
                'password'   => password_hash($password , PASSWORD_DEFAULT)
            ]);

            if($account_id) {
                //send verification
                $this->accountVerification->createToken($account_id);

                $link = $this->accountVerification->getLink();
                $code = $this->accountVerification->getdbData('code');
                $emailSubject = "Thank your for your signing up to our ".appName();

                $emailBody = email_tmp($firstName , $emailSubject ,
                    " To start organizing your customers and start growing, verify your account first <br />
                    type this code on verification page
                    <strong> $code </strong>");

                _mail($email, appName() .' Account Verification ', $emailBody);

                Flash::set("You're one step away to setup your account , Enter the verification code that has been sent to your email {$email}");

                return appRedirect('AccountVerification/index');
            }else{
                err_service();
            }
        }

        public function create()
        {
            /**
             * Register
             */
            $data = [
                'title' => 'Mother fucker'
            ];

            return $this->view('accounts/create' , $data);
        }

        public function login()
        {
            return $this->view('accounts/login');
        }

        public function logout()
        {
            $user = Auth::get('user');
            Auth::stop('user');
            Flash::set("Logged out successfully");

            return appRedirect("/accounts/login");
        }
    }
