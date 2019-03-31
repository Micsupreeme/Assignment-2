<?php
	class meeting_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_meeting($meetingId = FALSE){
			if ($meetingId === FALSE) {
				$query = $this->db->get('meeting'); //No ID specified, get all meetings
				return $query->result_array();
			}
			$query = $this->db->get_where('meeting', array('met_id' => $meetingId)); //ID specified, get that specific meetings
			return $query->row_array();
		}
		
		public function get_my_meetings($userId = FALSE){
			if ($userId === FALSE) {
				$query = $this->db->get('meeting'); //No ID specified, get all meetings
				return $query->result_array();
			}
			if($this->session->userdata('authLevel') > 0) {
				$query = $this->db->get_where('meeting', array('met_lecturer_id' => $userId)); //lecturer ID specified, get meetings hosted by that lecturer
			} else {
				$query = $this->db->get_where('meeting', array('met_student_id' => $userId)); //student ID specified, get meetings arranged with that student
			}	
			return $query->result_array();
		}
		
		//Adds a meeting to the database, specified by POST data
		public function addMeeting(){

            $addParameters = array(
				'met_time_slot_id' => $this->input->post('timeslotId'),
				'met_title' => $this->input->post('title'),
				'met_lecturer_id' => $this->input->post('lecturerId'),
				'met_student_id' => $this->input->post('studentId')
            );
            $this->db->insert('meeting', $addParameters);
        }
		
		//Deletes a specified meeting from the database
		public function deleteMeeting($meetingId = FALSE){
			
			if ($meetingId) {
				$this->db->delete('meeting', array('met_id' => $meetingId));
			}
        }
	}