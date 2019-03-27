<?php
class Timeslot extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Timeslot_model');
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	public function manage($lecturerId = NULL) {
		$this->display($lecturerId);
		$this->add($lecturerId);
	}
	
	//For the "My Timeslots" page
	public function display($lecturerId = NULL)
	{
		if(isset($_GET['delete'])) {
			$this->Timeslot_model->deleteTimeslot($_GET['delete']);
		}
		
		$data['lecturer'] = $this->User_model->get_user($lecturerId);
		$data['timeslot_instance'] = $this->Timeslot_model->get_my_timeslots($lecturerId);
		if (empty($data['timeslot_instance'])) {
			show_404();
		}
		$data['title'] = $data['lecturer']['usr_first_name'] . ' '. $data['lecturer']['usr_last_name'] . "'s Timeslots";
		$this->load->view('templates/header', $data);
		$this->load->view('timeslot/mytimeslots', $data);
	}
	
	//For the "Add Timeslot" form
	public function add($lecturerId = NULL)
	{		
		$this->load->helper('form');
        $this->load->library('form_validation');
		
		$data['lecturer'] = $this->User_model->get_user($lecturerId);
        $this->form_validation->set_rules('dateStart', 'Start Date/Time', 'required');
        $this->form_validation->set_rules('dateEnd', 'Start Date/Time', 'required');
        $this->form_validation->set_rules('txtLocation', 'Location', 'required');
		
        if ($this->form_validation->run() === TRUE) {
            $this->Timeslot_model->addTimeslot($lecturerId);
			redirect(base_url() . 'timeslot/manage/' . $lecturerId, 'refresh');
        }	
		$this->load->view('timeslot/addtimeslot', $data);
		$this->load->view('templates/footer');
	}
}