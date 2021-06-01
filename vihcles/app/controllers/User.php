<?php


class User extends  Controller

{
        public function __construct()
        {
         $this->postModel = $this->model('cars');
         $this->userModel = $this->model('users');

        }
        public function registration()
        {
         //Check for POST
        if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process form
                $data = [
                'full_name' => trim($_POST['full_name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'Confirm_Password' => trim($_POST['Confirm_Password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
                ];

                // Validate email
                if ( empty($data['email']) ) {
                    $data['email_err'] = 'Please inform your email';
                } else {
                    // Check email
                    if ( $this->userModel->getUserByEmail($data['email']) ) {
                        $data['email_err'] = 'Email is already in use. Choose another one!';
                    }
                }

                // Validate Name
                 if ( empty($data['full_name']) ) {
                    $data['name_err'] = 'Please inform your name';
                 }

                 // Validate Password
                 if ( empty($data['password']) ) {
                    $data['password_err'] = 'Please inform your password';
                 } elseif ( strlen($data['password']) < 6 ) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                 }

                 // Validate Confirm Password
                 if ( empty($data['Confirm_Password']) ) {
                     $data['confirm_password_err'] = 'Please inform your password';
                 } else if ( $data['password'] != $data['Confirm_Password'] ) {
                     $data['confirm_password_err'] = 'Password does not match!';
                 }

                 //Make sure errors are empty
                 if ( empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ) {
                     // Hash Password
                     $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);

                     if ($this->userModel->register($data)){
                         flash('register_success','You are now registered! You !');
                         $this->userModel->login($data['email'],$data['password']);

                         redirect('Admin/login',$data);
                     } else {
                         die ('Something wrong');
                     }
                 } else{
                     // Load view with errors
                     $this->view('Users/registration',$data);
                 }
            } else {
                // Init data
                $data = [
                    'full_name' => '',
                    'email' => '',
                    'password' => '',
                    'Confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('Users/registration', $data);
            }
        }
        public function login()
        {
            //Check for POST
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Process form
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process form
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Validate email
                if ( empty($data['email']) ) {
                    $data['email_err'] = 'Please inform your email';
                } else if (! $this->userModel->getUserByEmail($data['email']) ) {
                    // User not found
                    $data['email_err'] = 'No user found!';
                }

                // Validate password
                if ( empty($data['password']) ) {
                    $data['password_err'] = 'Please inform your password';
                }

                //Make sure are empty
                if ( empty($data['email_err']) && empty($data['password_err']) ) {
                    // Validated
                    // Check and set logged in user
                    $userAuthenticated = $this->userModel->login($data['email'], $data['password']);
                    if ($userAuthenticated) {
                        $this->createUserSession($userAuthenticated);
                        redirect('Admin/index');
                    } 
                    else{
                    $data = [
                          'email' => trim($_POST['email']),
                          'password' => '',
                          'email_err' => 'Email or Password are incorrect',
                          'password_err' => 'Email or Password are incorrect',
                      ];
                      $this->view('Users/login',$data);
                    }
                } else {
                    // Load view with errors
                    $this->view('Users/login',$data);
                }
            } else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
                // Load view
                $this->view('Users/login', $data);
            }
        }
        public function createUserSession($user)

        { 
            session_start();
            $_SESSION['log']=true;
            $_SESSION['user_email'] = $user->email;
            redirect('Admin/index');
        }
        public function logout()

        {   
            $_SESSION['log']=false;
            unset($_SESSION['user_mail']);
            session_destroy();
            redirect('User/login');
        }
        public function isLoggedIn()
        {
            if (isset($_SESSION['user_email'])){
                return true;
            } else {
                return false;
            }
        }
}