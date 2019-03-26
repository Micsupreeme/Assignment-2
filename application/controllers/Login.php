<?php
class Login extends CI_Controller
{
//Authorisation level session variable
    public function __construct()
    {
        parent::__construct();

        $this->load->model('LoginModel');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index() {
        $data['user'] = $this->LoginModel->validateLogin();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/Login', $data);
        $this->load->view('templates/footer');
    }

    public function login(){

    }

    public function logout(){

    }
}