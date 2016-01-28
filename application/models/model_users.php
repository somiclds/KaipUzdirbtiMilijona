<?php

class Model_users extends CI_Model {

    public function can_log_in() {

        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = null;

        if($this->input->post('as_admin') == true) {
            $query = $this->db->get('admins');
        }
        else {
            $query = $this->db->get('users');
        }

        if($query->num_rows() == 1){
            return true;
        }
        else {
            return false;
        }
    }

    public function add_user() {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );

        $query = $this->db->insert('users', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    public function get_user_data(){

        $this->db->where('email', $this->session->email);

        $query = $this->db->get('img_tbl');

        return $query->result();

    }
}