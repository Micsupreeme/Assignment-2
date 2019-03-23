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
	}