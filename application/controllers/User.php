<?php
class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url_helper');

	}
	
	public function addressbook(){
		if($this->isLoggedIn()) {
			//If an "Add Student" action is requested, verify authorisation level then perform the action
			if(isset($_GET['addstudent']) && $this->session->userdata('authLevel') > 0) {
				$this->User_model->addStudent($_GET['addstudent']);
			}
			
			//If a "Delete User" action is requested, verify authorisation level then perform the action
			if(isset($_GET['deleteuser']) && $this->session->userdata('authLevel') > 1) {
				$this->User_model->deleteUser($_GET['deleteuser']);
			}
			
            $data['user_instance'] = $this->User_model->get_user();
            $data['title'] = 'Address Book';
            $this->load->view('templates/header', $data);
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
            $data['title'] = $data['user_instance']['usr_first_name'] . ' ' . $data['user_instance']['usr_last_name'] . "'s Profile";
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
            $this->form_validation->set_rules('radVisibility', 'Visibility', 'required');
            $data['user_instance'] = $this->User_model->get_user($this->session->userdata('id'));
            $data['title'] = $data['user_instance']['usr_first_name'] . "'s Profile";
            $this->load->view('templates/header', $data);
            $this->load->view('user/editprofile', $data);
            $this->load->view('templates/footer');
            if ($this->form_validation->run() === TRUE) {
                $this->User_model->editProfile();
                redirect(base_url('index.php/user/profile/') . $this->session->userdata('id'));
            }
        }
    }
	
	public function students(){
		if($this->isLoggedIn()){
			//If a "Remove Student" action is requested, verify authorisation level then perform the action
			if(isset($_GET['removestudent']) && $this->session->userdata('authLevel') > 0) {
				$this->User_model->removeStudent($_GET['removestudent']);
			}
			
			$data['lecturer'] = $this->User_model->get_user($this->session->userdata('id'));
			$data['user_instance'] = $this->User_model->get_student($this->session->userdata('id'));
			if ($this->session->userdata('authLevel') == 0) {
				show_404();
			}
			$data['title'] = 'Students Assigned to ' . $data['lecturer']['usr_first_name'] . ' ' . $data['lecturer']['usr_last_name'];
			$this->load->view('templates/header', $data);
			$this->load->view('user/mystudents', $data);
			$this->load->view('templates/footer');
		}
	}

    public function login(){
	    $data['title'] = 'Login';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('userEmail', 'Email', 'required');
        $this->form_validation->set_rules('userPassword', 'Password', 'required');

        if($this->form_validation->run()) {
            $email = $this->input->post('userEmail');
            $password = $this->input->post('userPassword');

            $result = $this->User_model->get_by_email($email);

            if (! empty($result)){ //if input email is correct
                if (password_verify($password, $result['usr_my_key'])){ //check password
                    $session_data = array(
                        'id' => $result['usr_id'],
                        'emailAddress' => $result['usr_email'],
                        'firstName' => $result['usr_first_name'],
                        'lastName' => $result['usr_last_name'],
                        'authLevel' => $result['usr_auth_level'],
                        'assLect' => $result['usr_assigned_lecturer_id']
                    );

                    $this->session->set_userdata($session_data);
                    redirect(base_url() . 'index.php/user/profile/' . $this->session->userdata('id'));
                }else {//wrong password
                    $data['heading'] = 'Login Error: ';
                    $data['message'] = 'Incorrect Password';

                    $this->load->view('/errors/cli/error_db', $data);
                    $this->load->view("user/login", $data);
                }
            } else {//wrong email
                $data['heading'] = 'Login Error: ';
                $data['message'] = 'Incorrect Email';

                $this->load->view('/errors/cli/error_db', $data);
                $this->load->view("user/login", $data);
            }

        } else {//form not submit
            $this->load->view("user/login", $data);
        }
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
            $this->load->view('user/register', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->addUser();
            $this->load->view('user/registersuccess', $data);
            $this->login();
        }
    }

    public function isLoggedIn(){
	    if($this->session->userdata('emailAddress')!=''){
            return true;
        }
	    else{
	        redirect(base_url().'index.php/user/login');
            return false;
        }
    }

    public function logout(){
	    $this->session->unset_userdata('emailAddress', 'authLevel');
	    $this->session->sess_destroy();
	    redirect(base_url() . 'index.php/user/login');
    }



}