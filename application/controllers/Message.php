<?php

class Message extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->model('Message_model');
        $this->load->model('User_model');
    }

    public function inbox (){
        if($this->isLoggedIn()) {

            if (!file_exists(APPPATH . 'views/message/inbox.php')) {
                // Whoops, we don't have a page for that!
                show_404();
            }

            if(isset($_GET['delete'])) {
                $this->Message_model->delete_message($_GET['delete']);
            }

            $data['title'] = ucfirst('inbox');
            $data['query'] = $this->Message_model->get_messages();
            $this->load->view('templates/header', $data);
            $this->load->view('/message/inbox', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function viewMessage($msgID){
        if($this->isLoggedIn()){
            if (!file_exists(APPPATH . 'views/message/viewmessage.php')) {
                show_404();
            }
            $data['title'] = '';
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
                $this->load->view('/message/messagesent');
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
