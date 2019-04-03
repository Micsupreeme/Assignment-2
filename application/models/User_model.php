<?php
class user_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_user($id = FALSE){
        if ($id === FALSE) {
            $query = $this->db->get('user'); //No ID specified, get all users
            return $query->result_array();
        }
        $query = $this->db->get_where('user', array('usr_id' => $id)); //ID specified, get that specific user
        return $query->row_array(); //row_array only returns a single record
    }

    public function search_user($searchterm = FALSE) {
        if($searchterm === FALSE) {
            $query = $this->db->get('user'); //No search term specified, get all users
            return $query->result_array();
        }
        $this->db->like('usr_first_name', $searchterm); //Search term specified, get all users that match the term in first name, last name or e-mail
        $this->db->or_like('usr_last_name', $searchterm);
        $this->db->or_like('usr_email', $searchterm);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_student($lecturerId = FALSE){
        if ($lecturerId === FALSE) {
            $query = $this->db->get('user'); //No ID specified, get all users
            return $query->result_array();
        }
        $query = $this->db->get_where('user', array('usr_assigned_lecturer_id' => $lecturerId)); //Assigned lecturer ID specified, get students assigned to that lecturer
        return $query->result_array(); //result_array can return multiple records
    }

    public function validateLogin($email, $password){

        $this->db->where('usr_email', $email);
        $this->db->where('usr_my_key', $password);
        $query = $this->db->get('user');

        return $query->row_array();
    }
    public function addUser(){

        $data = array(
            'usr_email' => $this->input->post('userEmail'),
            'usr_my_key' => password_hash($this->input->post('userPassword'), PASSWORD_BCRYPT),
            'usr_first_name' => $this->input->post('firstName'),
            'usr_last_name' => $this->input->post('surname'),
            'usr_auth_level' => $this->input->post('role'),
        );
        $this->db->insert('user', $data);
    }

    public function editProfile(){
        $data = array(
            'usr_bio' => $this->input->post('taBio'),
            'usr_profile_is_private' => $this->input->post('radVisibility'),
        );
        $query = $this->db->query ("UPDATE user SET usr_bio = '" . $data['usr_bio'] . "' , usr_profile_is_private = '"
            . $data['usr_profile_is_private']. "'WHERE usr_id = '". $this->session->userdata('id') . "';");

        return $query;
    }

    //Updates the assigned lecturer for a specified student to the currently logged-in lecturer
    public function addStudent($studentId = FALSE){

        if ($studentId) {
            $this->db->where('usr_id', $studentId);
            $this->db->update('user', array('usr_assigned_lecturer_id' => $this->session->userdata('id')));
        }
    }

    public function removeStudent($studentId = FALSE){//Removes the assigned lecturer for a specified student

        if ($studentId) {
            $this->db->where('usr_id', $studentId);
            $this->db->update('user', array('usr_assigned_lecturer_id' => 'DEFAULT'));
        }
    }
    //Deletes the specified user
    public function deleteUser($userId = FALSE) {

        if ($userId) {
            $this->db->delete('user', array('usr_id' => $userId));
        }
    }

    public function is_email_registered($userEmail){ //Checks if a given email address is registered
        $query = $this->db->get_where('user', array ('usr_email' => $userEmail));
        $query->row_array();

        if ($query->num_rows() > 0){return true;}
        return false;
    }

    public function get_by_email($userEmail){
       $query = $this->db->get_where('user', array ('usr_email' => $userEmail));

       if($query->num_rows() > 0){
           $user = $query->row_array();
           return $user;
       }
    }
}