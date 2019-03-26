<?php
class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	
	public function addressbook()
	{
		$data['user_instance'] = $this->User_model->get_user();
		$data['title'] = 'Address Book';
		$this->load->view('templates/header', $data);
		$this->load->view('pages/addressbook');
		$this->load->view('user/addressbook', $data);
		$this->load->view('templates/footer');
	}
	
	public function profile($id = NULL)
	{
		$data['user_instance'] = $this->User_model->get_user($id);
		if (empty($data['user_instance'])) {
			show_404();
		}
		$data['title'] = $data['user_instance']['usr_first_name'] . "'s Profile";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/profile');
		$this->load->view('templates/footer');
	}
	
	public function students($lecturerId = NULL)
	{
		$data['lecturer'] = $this->User_model->get_user($lecturerId);
		$data['user_instance'] = $this->User_model->get_student($lecturerId);
		if (empty($data['user_instance'])) {
			show_404();
		}
		$data['title'] = 'Students Assigned to ' . $data['lecturer']['usr_first_name'] . ' ' . $data['lecturer']['usr_last_name'];
		$this->load->view('templates/header', $data);
		$this->load->view('pages/mystudents');
		$this->load->view('user/mystudents', $data);
		$this->load->view('templates/footer');
	}
}