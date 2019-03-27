<?php

class Message_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_messages(){
        $query = $this->db->query("SELECT * FROM message WHERE msg_recipient = '"
            . $this->session->userdata('emailAddress'). "' ;");

        return $query;
    }
}