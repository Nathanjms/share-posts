<?php

class Users extends Controller
{
    public function __construct() {

    }

    public function register()
    {
        // Init data
        $data = [
            'name' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_error' => '',
            'email_error' => '',
            'password_error' => '',
            'confirm_password_error' => '',
        ];
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process Form

            // Sanitize POST date
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // POST data
            $data['name'] = trim($_POST['name']);
            $data['email'] = trim($_POST['email']);
            $data['password'] = trim($_POST['password']);
            $data['confirm_password'] = trim($_POST['confirm_password']);
            
            // Validations
            if (!$data['email']) {
                $data['email_error'] = 'Please Enter a valid email address';
            }
            if (!$data['name']) {
                $data['name_error'] = 'Please Enter a Name';
            }
            if (!$data['password']) {
                $data['password_error'] = 'Please Enter a valid password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'password must be larger than 6 characters';
            }
            if (!$data['confirm_password']) {
                $data['confirm_password_error'] = 'Please Enter a valid password';
            } elseif ($data['confirm_password'] != $data['password']) {
                $data['confirm_password_error'] = 'Passwords did not match';
            }

            if(!$data['email_error'] && !$data['name_error'] && !$data['password_error'] && !$data['confirm_password_error']) {
                die('success');
            }
        } 

        $this->view('users/register', $data);
    }

    public function login()
    {
        // Init data
        $data = [
            'email' => '',
            'password' => '',
            'email_error' => '',
            'password_error' => '',
        ];
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process Form

            // Sanitize POST date
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // POST data
            $data['email'] = trim($_POST['email']);
            $data['password'] = trim($_POST['password']);
            
            // Validations
            if (!$data['email']) {
                $data['email_error'] = 'Please Enter a valid email address';
            }
            if (!$data['password']) {
                $data['password_error'] = 'Please Enter a valid password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'password must be larger than 6 characters';
            }

            if(!$data['email_error'] && !$data['password_error']) {
                die('success');
            }
        }

        $this->view('users/login', $data);
    }
}
