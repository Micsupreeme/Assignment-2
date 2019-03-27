<?php

class Message extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Message_model');
        $this->load->helper('url_helper');
    }

    public function inbox (){
        if($this->isLoggedIn())
        if ( !file_exists(APPPATH.'views/message/inbox.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst('inbox');
        $data['query'] = $this->Message_model->get_messages();
        $this->load->view('templates/header', $data);
        $this->load->view('/message/inbox', $data);
        $this->load->view('templates/footer', $data);
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
}