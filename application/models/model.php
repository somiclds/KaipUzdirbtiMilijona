<?php

class Model extends CI_Model {

    function get_data($table){

        $query = $this->db->query("SELECT * FROM $table");

        return $query->result();
    }

    function get_imones_names ($name) {

        $query = $this->db->query("SELECT name FROM img_tbl WHERE name='".$name."'");

        return $query->result();
    }

    function insert_data ($data){
        $this->db->insert('img_tbl', $data);
    }

    function insert_data_blog ($data){
        $this->db->insert('blogas', $data);
    }

    function update_data_blog ($data, $id){
        $this->db->where('id', $id);
        $this->db->update('blogas', $data);
    }

    function delete_data($name){
        $this->db->where('name', $name);
        $this->db->where('email', $this->session->email);

        $this->db->delete('img_tbl');
    }

    function delete_from_blog($id){
        $this->db->where('id', $id);
        $this->db->delete('blogas');
    }

    function get_blog_text($id){
        $this->db->select('text');
        $this->db->where('id', $id);
        $query = $this->db->get('blogas');

        $data = $query->result();

        return $data;
    }

}