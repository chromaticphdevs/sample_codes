<?php

    class Customers extends SoftwareController
    {
        public function __construct()
        {
            $this->loadModels([
                'customer' => 'CustomerModel',
                'contact'  => 'ContactModel',
                'transaction' => 'TransactionModel'
            ]);

            if(empty(Auth::get('user'))) {
                return appRedirect("accounts/login");
            }
        }

        public function index()
        {
           $account_id = Auth::get('user')->id;

           $data = [
               'title' => 'Contacts',
               'customers' => $this->customer->getAccountCustomers($account_id)
           ];
           return $this->view('customer/index' , $data);
        }

        public function create()
        {
            $formName = 'contactForm';

            $data = [
                'title' => 'Add Customers',

                'form' => [
                    'name' => $formName
                ],

                'contactTypes' => [
                    'mobile',
                    'tel',
                    'email'
                ]
            ];

            return $this->view('customer/create' , $data);
        }

        public function store()
        {
            $post = request()->posts();

            /**
             * SEARCH CONTACTS
             */
            $searchContacts = $this->contact->getContacts($post['contact']['value']);

            if($searchContacts && !empty($searchContacts)) {
                flash_err("Contacts ".implode(' , ' , $post['contact']['value'])." already saved");
                return request()->return();
            }

            $customerPersonal = array_remove_kitem(['contact' , 'submit' , 'submitAdd'] , $post);
            $customerPersonal['account_id'] = Auth::get('user')->id;

            $customer_id = $this->customer->store($customerPersonal);

            $clean_contacts = $this->contact->clean($post['contact']);

            $res = $this->contact->addMultiple($clean_contacts , $customer_id);

            Flash::set("Customer Added");

            if(!$res) {
                Flash::set("Something went wrong");
            }

            if(isset($post['submitAdd']))
                return appRedirect("customers/create");
            return appRedirect("customers/show/{$customer_id}");
        }

        public function show($id)
        {
            $customer = $this->customer->get($id);

            $data = [
                'customer' => $customer,
                'transactions' => $this->transaction->getAll($id)
            ];

            return $this->view('customer/show' , $data);
        }

        public function edit($id)
        {
            $customer = $this->customer->get($id);

            $data = [
                'customer' => $customer,

                'title' => 'Add Customers',
                'inputAttr' => [
                    'class' => 'form-control',
                    'form'    => 'edit_personal_form'
                ],

                'formPersonal' => 'edit_personal_form',

                'inputRequired' => [
                    'class' => 'form-control',
                    'required' => '',
                    'form'    => 'edit_personal_form'
                ],

                'contactTypes' => [
                    'mobile',
                    'tel',
                    'email'
                ]
            ];

            return $this->view('customer/edit' , $data);
        }

        public function updateContact()
        {
            $post = request()->posts();

            $customer_id = $post['customer_id'];

            $contacts = $post['contact'];

            $res = $this->contact->updateContact($contacts , $customer_id);

            Flash::set("Contact Updated");

            if(!$res) {
                Flash::set("Someting went wrong on contact update");
            }
            return appRedirect("customers/show/{$customer_id}");
        }

        public function updatePersonal()
        {
            $posts = request()->posts();

            $customer_id = $posts['customer_id'];

            $data = array_remove_kitem(['submit' , 'customer_id'] , $posts);

            $res = $this->customer->update($data , $customer_id);

            Flash::set("Personal Information updated");
            if(!$res) {
                Flash::set("Someting went wrong on contact update");
            }
            return appRedirect("customers/show/{$customer_id}");
        }

    }
