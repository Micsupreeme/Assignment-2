<?php

class Message_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_messages(){
        $query = $this->db->query("SELECT * FROM message WHERE msg_recipient = '"
            . $this->session->userdata('emailAddress'). "' ;");

        return $query;
    }

    public function delete_message($msgID){
        if (!empty($msgID)) {
            $this->db->delete('message', array('msg_id' => $msgID));
        }
    }

    public function get_message($msgID){
        if (!empty($msgID)) {
            $query = $this->db->get_where('message', array('msg_id' => $msgID,
                'msg_recipient' => $this->session->userdata('emailAddress')));

                return $query->row_array();
        }
    }

    public function create_message(){
        $data = array(
            'msg_author' => $this->session->userdata('emailAddress'),
            'msg_subject' => $this->input->post('newMsgSubject'),
            'msg_recipient' => $this->input->post('newMsgEmail'),
            'msg_date' => date('Y-m-d H:i:s'),
            'msg_body' => $this->input->post('newMsgTxtArea'),
        );
        $this->db->insert('message', $data);
    }

    public function create_announcement(){
        $data = array(
            'msg_author' => $this->session->userdata('emailAddress'),
            'msg_subject' => $this->input->post('annSubject'),
            'msg_recipient' => 'announcement',
            'msg_date' => date('Y-m-d H:i:s'),
            'msg_body' => $this->input->post('annTxtArea'),
        );
        $this->db->insert('message', $data);
    }

    public function get_announcements(){
        //get where recipient = announcement and where author = my assigned lecturer
        $this->db->where('msg_recipient', 'announcement');
        $this->db->where('msg_author', ''); //session would make this easier
        $query = $this->db->get('message');
        return $query;
    }

    //get specific announcement

    //get authored announcements | for my announcements page
}