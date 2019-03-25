<?php
class Timeslot extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Timeslot_model');
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	
	//For the "My Timeslots" page
	public function display($lecturerId = NULL)
	{
		$data['lecturer'] = $this->User_model->get_user($lecturerId);
		$data['timeslot_instance'] = $this->Timeslot_model->get_my_timeslots($lecturerId);
		/*if (empty($data['Timeslot_instance'])) {
			show_404();
		}*/
		$data['title'] = $data['lecturer']['usr_first_name'] . ' '. $data['lecturer']['usr_last_name'] . "'s Timeslots";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/mytimeslots', $data);
		$this->load->view('timeslot/mytimeslots', $data);
		$this->load->view('templates/footer');
	}
	
	//For the "Add Timeslot" form
	public function add($lecturerId = NULL)
	{
		$data['lecturer'] = $this->User_model->get_user($lecturerId);
		$data['title'] = 'Add Timeslot';
		$this->load->view('templates/header', $data);
		$this->load->view('pages/addtimeslot', $data);
		$this->load->view('templates/footer');
	}
}