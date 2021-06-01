<?php


    class users
    {
       private $db;

       public function __construct()

       {
           $this->db = new Database();
       }

       public function getUserByEmail($email)
       {
           $this->db->query('SELECT * FROM admins WHERE email = :email');
           // Bind values
           $this->db->bind(':email', $email);
           $this->db->single();

           // Check row
           if ( $this->db->rowCount() > 0 ) {
               return true;
           } else {
               return false;
           }
       }
       

       public function register($data)
       {
           $this->db->query('INSERT INTO admins (full_name, email, password) values (:full_name, :email, :password)');
           // Bind values
           $this->db->bind(':full_name', $data['full_name']);
           $this->db->bind(':email', $data['email']);
           $this->db->bind(':password', $data['password']);
           // Execute
           if ( $this->db->execute() ) {
               return true;
           } else {
               return false;
           }
       }

       public function login($email,$password)
       {
           $this->db->query('SELECT * from admins where email=:email');
           $this->db->bind(':email',$email);
           $row = $this->db->single();

           $hashed_password = $row->password;
           if ( password_verify($password,$hashed_password) ) {
               return $row;
           } else {
               return false;
           }
       }
       
       public function checkPassword($email,$password)
       {
           $this->db->query('SELECT * from admins where email = :email');
           $this->db->bind(':email', $email);
           $row = $this->db->single();
   
           $hashed_password = $row->password;
           if ( password_verify($password,$hashed_password) ) {
               return $row;
           } else {
               return false;
           }
       }
    }
