<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Hash;
class Auth extends BaseController
{

     public function __construct(){
        helper(['url','form']);
     }


    public function index()
    {
        return view('auth/login');
    }

    public function register(){
        return view('auth/register');
    }

    public function save(){
        // $validation=$this->validate(
        //     [
        //         'name'=>'required',
        //         'email'=>'required|valid_email|is_unique[users.email]',
        //         'password'=>'required|min_length[5]|max_length[12]',
        //         'cpassword'=>'required|min_length[5]|max_length[12]|matches[password]'


        //     ]
        // );


        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You full name is required.',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                    'is_unique' => 'Email already taken.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must have atleast 5 characters in length.',
                    'max_length' => 'Password must not have characters more thant 20 in length.',
                ],
            ],
            'cpassword' => [
                'rules'  => 'matches[password]',
                'errors' => [
                    'required' => 'Confirm password is required.',
                    'min_length' => 'Confirm password must have atleast 5 characters in length.',
                    'max_length' => 'Confirm Password must not have characters more thant 20 in length.',
                    'matches' => 'Confirm Password must matches to password.',
                ],
            ],
        ]);
        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else{
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
               'name'=>$name,
               'email'=>$email,
               'password'=>Hash::make($password),
            ];
            $usersModel= new \App\Models\UsersModel();
            $query=$usersModel->insert($values);
            if( !$query ){
                 return  redirect()->back()->with('fail', 'Something went wrong.');
            }else{

                //  return  redirect()->to('auth/register')->with('success', 'Congratilation. You are now successfully registered.');
                $last_id=$usersModel->insertID();
                 session()->set('loggedUser',$last_id);
                 return redirect()->to('/dashboard');
            }

        }
    }
    public function check(){

        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This email is not registered in our server.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must have atleast 5 characters in length.',
                    'max_length' => 'Password must not have characters more thant 12 in length.',
                ],
            ],
        ]);

        if(!$validation){
            return  view('auth/login',['validation'=>$this->validator]);
        }else{
            
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $userModel = new \App\Models\UsersModel();
            $user_info = $userModel->where('email', $email)->first();
       
            $check_password = Hash::check($password, $user_info['password']);
            if( !$check_password ){
                return  redirect()->to('/auth')->with('fail', 'Incorect password.')->withInput();
            }else{
                $user_id=$user_info['id'];
                // $session_data = ['user' => $user_info];
                session()->set('loggedUser', $user_id);
                return  redirect()->to('/dashboard');

            }
            }
        }
        public function logout(){
            if(session()->has('loggedUser')){
                session()->remove('loggedUser');
                return redirect()->to('/auth?access=out')->with('fail','You are logged out!');
            }
        }
    }
