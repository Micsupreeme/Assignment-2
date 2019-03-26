<?php
class LoginModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function validateLogin($email, $password){
        $this->db->where('usr_email', $email);
        $this->db->where('usr_password', $password);
        $query = $this->db->get('user');

        return $query->num_rows();
        
    }

}