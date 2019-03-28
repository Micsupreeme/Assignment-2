<?php
class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	
	public function addressbook(){
		if($this->isLoggedIn()) {
            $data['user_instance'] = $this->User_model->get_user();
            $data['title'] = 'Address Book';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/addressbook');
            $this->load->view('user/addressbook', $data);
            $this->load->view('templates/footer');
        }
	}
	
	public function profile($id = NULL){
        if($this->isLoggedIn()){
            $data['user_instance'] = $this->User_model->get_user($id);
            if (empty($data['user_instance'])) {
                show_404();
            }
            $data['title'] = $data['user_instance']['usr_first_name'] . "'s Profile";
            $this->load->view('templates/header', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        }
	}

	public function editProfile(){
        if($this->isLoggedIn()){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'register';
            $this->form_validation->set_rules('taBio', 'Bio', 'required');
            $this->form_validation->set_rules('radVisibility', 'Visbility', 'required');
            $data['user_instance'] = $this->User_model->get_user($this->session->userdata('id'));
            $data['title'] = $data['user_instance']['usr_first_name'] . "'s Profile";
            $this->load->view('templates/header', $data);
            $this->load->view('user/editprofile', $data);
            $this->load->view('templates/footer');
            if ($this->form_validation->run() === TRUE) {
                $this->User_model->editProfile();
                redirect(base_url('user/profile/') . $this->session->userdata('id'));
                //$this->load->view('templates/header', $data);
                //$this->load->view('user/profile/' . $this->session->userdata('id'), $data);
                //$this->load->view('templates/footer');
            }

        }
    }
	
	public function students($lecturerId = NULL){
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

    public function login(){
	    $data['title'] = 'Login';
	    $this->load->view("user/login", $data);
    }

    public function registerUser(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'register';
        $this->form_validation->set_rules('userEmail', 'Email', 'required');
        $this->form_validation->set_rules('firstName', 'FirstName', 'required');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('userPassword', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/register');
            $this->load->view('templates/footer');
        } else {
            $this->User_model->addUser();
            $this->load->view('templates/header', $data);
            $this->load->view('user/registerSuccess');
            $this->load->view('templates/footer');
        }
    }

    public function validate_login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userEmail', 'Email', 'required');
        $this->form_validation->set_rules('userPassword', 'Password', 'required');

        if($this->form_validation->run()){
            $email = $this->input->post('userEmail');
            $password = $this->input->post('userPassword');

            $this->load->model('User_model');

            $data['currentUser']=$this->User_model->validateLogin($email, $password);

            if(isset($data['currentUser']['usr_id'])){
                $session_data = array(
                    'id' => $data ['currentUser']['usr_id'],
                    'emailAddress' => $data['currentUser']['usr_email'],
                    'firstName' => $data['currentUser']['usr_first_name'],
                    'lastName' => $data['currentUser']['usr_last_name'],
                    'authLevel' => $data['currentUser']['usr_auth_level']
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'user/profile/' . $this->session->userdata('id'));
            } else {
                redirect(base_url().'user/login');
            }
        }
        else{
            $this->login();
        }
    }

    public function isLoggedIn(){
	    if($this->session->userdata('emailAddress')!=''){
            return true;
        }
	    else{
	        redirect(base_url().'user/login');
            return false;
        }
    }

    public function logout(){
	    $this->session->unset_userdata('emailAddress', 'authLevel');
	    $this->session->sess_destroy();
	    redirect(base_url() . 'user/login');
    }
}