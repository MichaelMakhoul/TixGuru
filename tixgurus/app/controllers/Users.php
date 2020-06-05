<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
    }
    
    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        
        // Sanatize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'member_name' => trim($_POST['member_name']),
          'member_email' =>  trim($_POST['member_email']),
          'member_password' =>  trim($_POST['member_password']),
          'confirm_password' =>  trim($_POST['confirm_password']),
          'member_phone' => trim($_POST['member_phone']),
          'member_dob' => trim($_POST['member_dob']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'phone_err' => '',
          'dob_err ' => ''
        ];
        
        // Validate Email
        if(empty($data['member_email'])){
          $data['email_err'] = 'Please enter email';
        } else {
          // Check email
          if($this->userModel->findMemberByEmail($data['member_email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }
        
        // Validate Name
         if(empty($data['member_name'])){
          $data['name_err'] = 'Please enter name';
        }
        
        // Validate Phone number
         if(empty($data['member_phone'])){
          $data['phone_err'] = 'Please enter phone number';
        }
        
         // Validate password
         if(empty($data['member_password'])){
          $data['password_err'] = 'Please enter password';
        } elseif(strlen($data['member_password']) < 6){
           $data['password_err'] = 'Password must be at least 6 characters';
         }
        
        // Validate Confirm_password
         if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm passsword';
        } else {
           if($data['member_password'] != $data['confirm_password']){
             $data['confirm_password_err'] = 'Password do not match'; 
           }
         }        
        
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
          
          // Hash Password
          $data['member_password'] = password_hash($data['member_password'], PASSWORD_DEFAULT);
          
          // Register User
          if($this->userModel->register($data)){
            flash('register_success', 'You are registered and can log in');
            redirect('users/login');          
          }else{
            die('Some thing went wrong');
          }
        } else {
          // Load View with errors
          $this->view('users/register', $data);
        }
        
      } else {
        // Init data
        $data =[
          'member_name' => '',
          'member_email' => '',
          'member_password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];
        
        // Load view
        $this->view('users/register', $data);
      }
    }
    
       public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        
        // Sanatize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'member_email' =>  trim($_POST['member_email']),
          'member_password' =>  trim($_POST['member_password']),
          'email_err' => '',
          'password_err' => '',
        ];
        
        // Validate Email
        if(empty($data['member_email'])){
          $data['email_err'] = 'Please enter email';
        }
        
         // Validate Password
        if(empty($data['member_password'])){
          $data['password_err'] = 'Please enter your password';
        }
        
        // Check for user/email
        if($this->userModel->findMemberByEmail($data['member_email'])){
          // User found
          
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }
        
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInMember = $this->userModel->login($data['member_email'], $data['member_password']);
                    
          if($loggedInMember){
            // Create Session
            $this->createUserSession($loggedInMember);
            
            // Redirecting Member to dashboard
            redirect('pages/dashboard/' . $_SESSION['member_id']);
            
          }else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load View with errors
          $this->view('users/login', $data);
        }
        
      } else {
        // Init data
        $data =[
          'member_email' => '',
          'member_password' => '',
          'email_err' => '',
          'password_err' => '',
        ];
        
        // Load view
        $this->view('users/login', $data);
      }
    }
    
    public function createUserSession($member){
      $_SESSION['member_id'] = $member->member_id;
      $_SESSION['member_email'] = $member->member_email;
      $_SESSION['member_name'] = $member->member_name;
      $_SESSION['member_type'] = $member->member_type;
      if(isMember()){
        redirect('');
      }else{
        redirect('events');
      }
    }
    
    public function logout(){
      unset($_SESSION['member_id']);
      unset($_SESSION['member_email']);
      unset($_SESSION['member_name']);
      unset($_SESSION['member_type']);
      session_destroy();
      redirect('');
    }
}































