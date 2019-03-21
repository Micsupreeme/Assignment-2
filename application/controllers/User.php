<?php
class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data['user_instance'] = $this->User_model->get_user();
		$data['title'] = 'Users';
		$this->load->view('templates/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}
	public function view($id = NULL)
	{
		$data['user_instance'] = $this->User_model->get_user($id);
		if (empty($data['user_instance'])) {
			show_404();
		}
		$data['title'] = $data['user_instance']['usr_first_name'];
		$this->load->view('templates/header', $data);
		$this->load->view('user/view', $data);
		$this->load->view('templates/footer');
	}
}