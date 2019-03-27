<?php
	class timeslot_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		//We might not need this function
		public function get_timeslot($timeslotId = FALSE){
			if ($timeslotId === FALSE) {
				$query = $this->db->get('timeslot'); //No ID specified, get all timeslots
				return $query->result_array();
			}
			$query = $this->db->get_where('timeslot', array('tsl_id' => $timeslotId)); //ID specified, get that specific timeslot
			return $query->row_array();
		}
		
		public function get_my_timeslots($lecturerId = FALSE){
			if ($lecturerId === FALSE) {
				$query = $this->db->get('timeslot'); //No ID specified, get all timeslots
				return $query->result_array();
			}
			$query = $this->db->get_where('timeslot', array('tsl_lecturer_id' => $lecturerId)); //lecturer ID specified, get timeslots for that lecturer
			return $query->result_array();
		}
		
		//Adds a timeslot to the database, specified by POST data
		public function addTimeslot($lecturerId = FALSE){

            $addParameters = array(
                'tsl_start' => $this->input->post('dateStart'),
                'tsl_end' => $this->input->post('dateEnd'),
                'tsl_lecturer_id' => $lecturerId,
				'tsl_location' => $this->input->post('txtLocation')
            );
            $this->db->insert('timeslot', $addParameters);
        }
		
		//Deletes a specified timeslot from the database
		public function deleteTimeslot($timeslotId = FALSE){
			
			if ($timeslotId) {
				$this->db->delete('timeslot', array('tsl_id' => $timeslotId));
			}
        }
	}