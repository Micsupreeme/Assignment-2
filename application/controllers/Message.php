<?php

class Message extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->model('Message_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function inbox (){
        if($this->isLoggedIn()) {

            if (!file_exists(APPPATH . 'views/message/inbox.php')) {
                show_404();
            }

            if(isset($_GET['delete'])) {
                $this->Message_model->delete_message($_GET['delete']);
            }

            $data['title'] = ucfirst('inbox');
            $data['messages'] = $this->Message_model->get_messages();

            if ($this->session->userdata('authLevel') > 0){
                $data['announcements'] = $this->Message_model->get_authored_announcements();
            }else{
                $data['announcements'] = $this->Message_model->get_announcements();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('/message/inbox', $data);
            $this->load->view('templates/footer');
        }
    }

    public function viewMessage($msgID){
        if($this->isLoggedIn()){
            if (!file_exists(APPPATH . 'views/message/viewmessage.php')) {
                show_404();
            }
            $data['title'] = 'View Message';
            $data['message'] = $this->Message_model->get_message($msgID);

            if(empty($data['message'])){
                $data['heading'] = 'Message Not Found. ';
                $data['message'] = 'The message you are looking for is missing or belongs to someone else.';

                $this->load->view('templates/header', $data);
                $this->load->view('/errors/cli/error_db', $data);
                $this->load->view('templates/footer');
            }else {
                $this->load->view('templates/header', $data);
                $this->load->view('/message/viewmessage', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function newMessage(){
        if($this->isLoggedIn()) {

            if (!file_exists(APPPATH . 'views/message/newmessage.php')) {
                show_404();
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('newMsgEmail', 'Email', 'required');
            $this->form_validation->set_rules('newMsgSubject', 'Subject', 'required');
            $data['title'] = 'New Message';

            if($this->form_validation->run() == FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('/message/newmessage');
                $this->load->view('templates/footer');
            }
            else if ($this->form_validation->run() == TRUE
                && $this->User_model->is_email_registered($this->input->post('newMsgEmail'))){

                $this->Message_model->create_message();

                $this->load->view('templates/header', $data);
                $this->load->view('/message/messagesent'); //TODO: change to success message
                $this->load->view('/message/newmessage');
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = 'User Not Found. ';
                $data['message'] = 'The email you have supplied is not registered with us.';

                $this->load->view('templates/header', $data);
                $this->load->view('/errors/cli/error_db', $data);
                $this->load->view('/message/newmessage');
                $this->load->view('templates/footer');
            }
        }
    }
    public function myAnnouncements(){
        if($this->isLoggedIn() && $this->session->userdata('authLevel') > 0) {
            if (!file_exists(APPPATH . 'views/message/myannouncements.php')) {
                show_404();
            }

            if(isset($_GET['delete'])) {
                $this->Message_model->delete_message($_GET['delete']);
            }

            $data['title'] = 'My Announcements';
            $data['announcements'] = $this->Message_model->get_authored_announcements();

            $this->load->view('templates/header', $data);
            $this->load->view('/message/myannouncements', $data);
            $this->load->view('templates/footer');
        }
    }
    public function createAnnouncement(){
        if($this->isLoggedIn() && $this->session->userdata('authLevel') > 0) {

            if (!file_exists(APPPATH . 'views/message/createannouncement.php')) {
                show_404();
            }

            $this->form_validation->set_rules('annSubject', 'Subject', 'required');
            $this->form_validation->set_rules('annTxtArea', 'TextArea', 'required');

            $data['title'] = 'New Announcement';

            if($this->form_validation->run()){
                $this->Message_model->create_announcement();

                $this->load->view('templates/header', $data);
                $this->load->view('/message/messagesent'); //TODO: change to success message
                $this->load->view('/message/newannouncement');
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('/message/newannouncement');
                $this->load->view('templates/footer');
            }
        }
    }

    public function viewAnnouncement($msgID){
        if($this->isLoggedIn()) {
            if (!file_exists(APPPATH . 'views/message/viewannouncement.php')) {
                show_404();
            }

            $data['title'] = 'View Announcement';
            $data['announcement'] = $this->Message_model->get_announcement($msgID);

            if(empty($data['announcement'])){
                $data['heading'] = 'Announcement Not Found. ';
                $data['message'] = 'The Announcement you are looking for is missing.';

                $this->load->view('templates/header', $data);
                $this->load->view('/errors/cli/error_db', $data);
                $this->load->view('templates/footer');
            }else {
                $this->load->view('templates/header', $data);
                $this->load->view('/message/viewannouncement', $data);
                $this->load->view('templates/footer');
            }

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
}
