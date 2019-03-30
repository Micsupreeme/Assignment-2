<?php
	class user_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_user($id = FALSE)
		{
			if ($id === FALSE) {
				$query = $this->db->get('user'); //No ID specified, get all users
				return $query->result_array();
			}
			$query = $this->db->get_where('user', array('usr_id' => $id)); //ID specified, get that specific user
			return $query->row_array(); //row_array only returns a single record
		}
		
		public function get_student($lecturerId = FALSE)
		{
			if ($lecturerId === FALSE) {
				$query = $this->db->get('user'); //No ID specified, get all users
				return $query->result_array();
			}
			$query = $this->db->get_where('user', array('usr_assigned_lecturer_id' => $lecturerId)); //Assigned lecturer ID specified, get students assigned to that lecturer
			return $query->result_array(); //result_array can return multiple records
		}

        public function validateLogin($email, $password){
            //$query = $this->db->get_where('user', array('usr_email' => $email) AND array('usr_my_key' => $password));
            //return $query->row_array();

            $this->db->where('usr_email', $email);
            $this->db->where('usr_my_key', $password);
            $query = $this->db->get('user');

            return $query->row_array();

        }

        public function addUser(){

            $data = array(
                'usr_email' => $this->input->post('userEmail'),
                'usr_my_key' => $this->input->post('userPassword'),
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

	}