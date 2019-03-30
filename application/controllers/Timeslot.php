<?php
class Timeslot extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Timeslot_model');
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	public function manage() {
		if($this->isLoggedIn()){
			$this->display();
			$this->add();
		}
	}
	
	//For the "My Timeslots" list
	private function display() {
		//If a "Delete Timeslot" action is requested, verify identity then perform the action
		if(isset($_GET['deletetimeslot']) && $this->session->userdata('authLevel') > 0) {
			$this->Timeslot_model->deleteTimeslot($_GET['deletetimeslot']);
		}
		
		$data['lecturer'] = $this->User_model->get_user($this->session->userdata('id'));
		$data['timeslot_instance'] = $this->Timeslot_model->get_my_timeslots($this->session->userdata('id'));
		if ($this->session->userdata('authLevel') == 0) {
			show_404();
		}
		$data['title'] = $data['lecturer']['usr_first_name'] . ' '. $data['lecturer']['usr_last_name'] . "'s Timeslots";
		$this->load->view('templates/header', $data);
		$this->load->view('timeslot/mytimeslots', $data);
	}
	
	//For the "Add Timeslot" form
	private function add() {		
		$this->load->helper('form');
        $this->load->library('form_validation');
		
		$data['lecturer'] = $this->User_model->get_user($this->session->userdata('id'));
        $this->form_validation->set_rules('dateStart', 'Start Date/Time', 'required');
        $this->form_validation->set_rules('dateEnd', 'Start Date/Time', 'required');
        $this->form_validation->set_rules('txtLocation', 'Location', 'required');
		
        if ($this->form_validation->run() === TRUE) {
            $this->Timeslot_model->addTimeslot($this->session->userdata('id'));
			redirect(base_url() . 'timeslot/manage', 'refresh');
        }	
		$this->load->view('timeslot/addtimeslot', $data);
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