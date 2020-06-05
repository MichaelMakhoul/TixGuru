<?php
  class User {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }
    
    // Register User
    public function register($data){
      $this->db->query('INSERT INTO members (member_name, member_email, member_password, member_phone, member_dob) VALUES(:member_name, :member_email, :member_password, :member_phone, :member_dob)');
      // Bind values
      $this->db->bind(':member_name', $data['member_name']);
      $this->db->bind(':member_email', $data['member_email']);
      $this->db->bind(':member_password', $data['member_password']);
      $this->db->bind(':member_phone', $data['member_phone']);
      $this->db->bind(':member_dob', $data['member_dob']);
      
      // Excecute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    
    // Login User
    public function login($member_email, $member_password){
      $this->db->query('SELECT * FROM members WHERE member_email = :member_email');
      $this->db->bind(':member_email', $member_email);
      
      $row = $this->db->single();
      
      $hashed_password = $row->member_password;
      if(password_verify($member_password, $hashed_password)){
        return $row;
      }else{
        return false;
      }
    }
    // Find member by email
    public function findMemberByEmail($member_email){
      $this->db->query('SELECT * FROM members WHERE member_email = :member_email');
      // Bind value
      $this->db->bind(':member_email', $member_email);
      
      $row = $this->db->single();
      
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
    
    // Get User by ID
    public function getUserById($member_id){
      $this->db->query('SELECT * FROM members WHERE member_id = :member_id');
      // Bind value
      $this->db->bind(':member_id', $member_id);
      
      $row = $this->db->single();
      
     return $row;
  }
    
 
}







