<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;


class UserController extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function signup()
    {
        $validation = $this->validate([
            'username'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Username is required'
                ]
                ],
                'email'=>[
                    'rules'=>'required|valid_email|is_unique[users.email]',
                    'errors'=>[
                        'required'=>'Email is required',
                        'valid_email'=>'You must enter a valid email',
                        'is_unique'=>'Email already taken'
                    ]
                ],
                'password'=>[
                    'rules'=>'required|min_length[5]|max_length[12]',
                    'errors'=>[
                        'required'=>'Password is required',
                        'min_length'=>'Password must have atleast 5 characters in length',
                        'max_length'=>'Password must not have more than 12 characters'
                    ]
                ],
                'cpassword'=>[
                    'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
                    'errors'=>[
                        'required'=>'Confirm password is required',
                        'min_length'=>'Confirm password must have atleast 5 characters in length',
                        'max_length'=>'Confirm password must not have more than 12 characters',
                        'matches'=>'Confirm password does not match password'
                    ]
                ]
        ]);

        if(!$validation){
            return view('register', ['validation'=>$this->validator]);
        }else{
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'username'=>$username,
                'email'=>$email,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $userModel = new UserModel();
            $query = $userModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong');
            }else{
                return redirect()->to('register')->with('success', 'You are now registered successfully');
            }
        }
    }
    function check(){
        $validation = $this->validate([
            'email'=>[
                    'rules'=>'required|valid_email|is_not_unique[users.email]',
                    'errors'=>[
                        'required'=>'Email is required',
                        'valid_email'=>'Enter valid email address',
                        'is_not_unique'=>'This email is not registered'
                    ]
                ],
                'password'=>[
                    'rules'=>'required|min_length[5]|max_length[12]',
                    'errors'=>[
                        'required'=>'Password is required',
                        'min_length'=>'Password must have atleast 5 characters in length',
                        'max_length'=>'Password must not have more than 12 characters'
                    ]
                ]
        ]);
        if(!$validation){
            return view('login', ['validation'=>$this->validator]);
        }else{
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $userModel = new UserModel();
            $user_info = $userModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('admindash')->withInput();
            }else{   
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('login');
            }
        }
        
    }
}
