<?php

class Message {
    public function __construct(){
        parent::__construct();
        $this->load->model('Message_model');
        $this->load->helper('url_helper');
    }

    public function view (){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
    }
}