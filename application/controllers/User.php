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
            echo '<h2> Welcome: ' . $this->session->userdata('emailAddress') . '</h2>';
            echo '<h3> Waddup! my auth level is:' . $this->session->userdata('authLevel') . '</h3>';
            echo '<label><a href="'.base_url().'user/logout">Logout</a></label>';

            $data['user_instance'] = $this->User_model->get_user($id);
            if (empty($data['user_instance'])) {
                show_404();
            }
            $data['title'] = $data['user_instance']['usr_first_name'] . "'s Profile";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/profile');
            $this->load->view('templates/footer');
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
                    'emailAddress' => $data['currentUser']['usr_email'],
                    'authLevel' => $data['currentUser']['usr_auth_level']
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'user/profile/1');  // user ID required
            } else {
                redirect(base_url().'user/login');
            }

            /*
            if($this->User_model->validateLogin($email, $password)){
                $session_data = array(
                    'emailAddress' => $email
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'user/profile/1');  // user ID required
            }
            else{
                redirect(base_url().'user/login');
            }*/
        }
        else{
            $this->login();
        }
    }

    function isLoggedIn(){
	    if($this->session->userdata('emailAddress')!=''){
            return true;
        }
	    else{
	        redirect(base_url().'user/login');
            return false;
        }
    }

    function logout(){
	    $this->session->unset_userdata('emailAddress', 'authLevel');
	    $this->session->sess_destroy();
	    redirect(base_url() . 'user/login');
    }
}