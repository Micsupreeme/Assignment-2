<?php
class Meeting extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Meeting_model');
		$this->load->model('Timeslot_model');
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	
	//For viewing meetings
	public function display() {
		//If a "Delete Meeting" action is requested then perform the action
		if(isset($_GET['deletemeeting'])) {
			$this->Meeting_model->deleteMeeting($_GET['deletemeeting']);
		}
		
		$data['current_user'] = $this->User_model->get_user($this->session->userdata('id'));
		$data['meeting_instance'] = $this->Meeting_model->get_my_meetings($this->session->userdata('id'));
		
		$data['title'] = $data['current_user']['usr_first_name'] . ' '. $data['current_user']['usr_last_name'] . "'s Meetings";
		$this->load->view('templates/header', $data);
		
		$this->load->view('meeting/meetingsheader', $data);
		foreach ($data['meeting_instance'] as $meeting):
			$this->displayIndividual($meeting['met_id'], $data);
		endforeach;
		$this->load->view('meeting/meetingsfooter');
		
		$this->load->view('templates/footer');
    }
	
	private function displayIndividual($meetingId, $data) {
		$data['current_meeting'] = $this->Meeting_model->get_meeting($meetingId);
		$data['current_timeslot'] = $this->Timeslot_model->get_timeslot($data['current_meeting']['met_time_slot_id']);
		if($this->session->userdata('authLevel') > 0) {
			$data['current_other_attendee'] = $this->User_model->get_user($data['current_meeting']['met_student_id']);
		} else {
			$data['current_other_attendee'] = $this->User_model->get_user($data['current_meeting']['met_lecturer_id']);
		}
		$this->load->view('meeting/meetingsitem', $data);
	}

    //For arranging meetings
    public function arrange() {
		
		$data['current_user'] = $this->User_model->get_user($this->session->userdata('id'));
		if($this->session->userdata('authLevel') > 0) {
			//Current user is a lecturer - get their timeslots
			$data['lecturer'] = $this->User_model->get_user($data['current_user']['usr_id']);
			$data['timeslot_instance'] = $this->Timeslot_model->get_my_timeslots($data['current_user']['usr_id']);
		} else {
			//Current user is a student - get their assigned lecturer's timeslots
			if(!empty($data['current_user']['usr_assigned_lecturer_id'])) { //We can only get the assigned lecturer's timeslots if they have an assigned lecturer
				$data['student'] = $this->User_model->get_user($data['current_user']['usr_id']);
				$data['lecturer'] = $this->User_model->get_user($data['current_user']['usr_assigned_lecturer_id']);
				$data['timeslot_instance'] = $this->Timeslot_model->get_my_timeslots($data['current_user']['usr_assigned_lecturer_id']);
			}
		}
	
        $data['title'] = "Arrange Meeting";
        $this->load->view('templates/header', $data);
		
		$this->load->view('meeting/timeslotselection', $data);
		if(isset($_GET['selecttimeslot']) && $this->session->userdata('authLevel') == 0) { //A meeting can only be arranged once a timeslot is selected
			//LECTURER ARRANGING MEETING WITH STUDENT IS NOT YET IMPLEMENTED
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('timeslotId', 'Timeslot ID', 'required');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('lecturerId', 'Lecturer ID', 'required');
			$this->form_validation->set_rules('studentId', 'Student ID', 'required');
			
			if ($this->form_validation->run() === TRUE) {
				$this->Meeting_model->addMeeting();
				//redirect(base_url() . 'timeslot/manage', 'refresh');
			}
		
			$this->load->view('meeting/arrangemeeting', $data);
		}
        	
		$this->load->view('templates/footer');
    }

    public function isLoggedIn() {
        if($this->session->userdata('emailAddress')!=''){
            return true;
        }
        else{
            redirect(base_url().'user/login');
            return false;
        }
    }
}


