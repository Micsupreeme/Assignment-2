<?php
	class timeslot_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		//We might not need this function
		public function get_timeslot($id = FALSE)
		{
			if ($id === FALSE) {
				$query = $this->db->get('timeslot'); //No ID specified, get all timeslots
				return $query->result_array();
			}
			$query = $this->db->get_where('timeslot', array('tsl_id' => $id)); //ID specified, get that specific timeslot
			return $query->row_array();
		}
		
		public function get_my_timeslots($lecturerId = FALSE)
		{
			if ($lecturerId === FALSE) {
				$query = $this->db->get('timeslot'); //No ID specified, get all timeslots
				return $query->result_array();
			}
			$query = $this->db->get_where('timeslot', array('tsl_lecturer_id' => $lecturerId)); //lecturer ID specified, get timeslots for that lecturer
			return $query->result_array();
		}
	}