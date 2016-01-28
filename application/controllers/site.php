<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index()
    {
        $this->home();
    }

    public function home(){

        $this->load->model("model");
        $data['links'] = $this->model->get_data('img_tbl');

        if ($this->session->userdata('is_logged_in')) {
            if($this->session->is_admin == TRUE) {
                $this->load->view('headers/view_main_header_admin');
            }
            else {
                $this->load->view('headers/view_main_header_loggedin');
            }
        }
        else{
            $this->load->view('headers/view_main_header');
        }
        $this->load->view('view_main_body', $data);
        $this->load->view('view_main_footer');
    }

    public function restricted(){
        $this->load->view('restricted_view');
    }

    public function login(){
        $this->load->view('login_view');
    }

    public function logout(){
        $this->session->sess_destroy();

        // Refresh current page
        $refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
        $this->session->set_userdata('url', $refering_url);
        $url=$this->session->userdata('url');
        redirect($url, 'refresh');

    }

    public function signup() {
        $this->load->view('signup_view');
    }

    public function signup_validation() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', //is_unique[table.field]
            array('required' => 'Prašome įvesti el. paštą'));
        $this->form_validation->set_rules('password', 'Password', 'required|trim',
            array('required' => 'Prašome įvesti slaptažodį'));
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]',
            array('required' => 'Prašome pakartoti slaptažodį', 'matches' => 'Pakartotas slaptažodis nesutampa'));

        $this->form_validation->set_message('is_unique', "Šis el. paštas jau užregistruotas");

        if($this->form_validation->run()){

            $this->load->model('model_users');
            if ($this->model_users->add_user()) {
                $data['response'] = 'Vartotojas pridėtas!<br>Galite prisijungti';
                $this->load->view('login_view', $data);
            }
            else {
                echo "Problema pridedant vartotoja";
            }
        }
        else{
            $this->load->view('signup_view');
        }
    }


    public function login_validation() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials',
            array('required' => 'Prašome įvesti el. paštą'));
        $this->form_validation->set_rules('password', 'Password', 'required|md5|trim',
            array('required' => 'Prašome įvesti slaptažodį'));



        if ($this->form_validation->run()) {

            if ($this->input->post('as_admin') == true){
                $data = array(
                    'email' => $this->input->post('email'),
                    'is_logged_in' => 1,
                    'is_admin' => true
                );
            }
            else{
                $data = array(
                    'email' => $this->input->post('email'),
                    'is_logged_in' => 1,
                    'is_admin' => false
                );
            }
            $this->session->set_userdata($data);
            redirect('index.php/site/home');
        }
        else {
            $this->load->view('login_view');
        }
    }

    public function validate_credentials(){
        $this->load->model('model_users');

        if ($this->model_users->can_log_in()) {
            return true;
        }
        else {
            $this->form_validation->set_message('validate_credentials', 'Neteisingas el. paštas arba slaptažodis');
            return false;
        }
    }

    public function profile() {
        if ($this->session->userdata('is_logged_in')) {

            $this->load->model("model_users");
            $data['links'] = $this->model_users->get_user_data();

            $this->load->view("headers/view_profilis_header");
            $this->load->view('view_profilis', $data);
        }
        else{
            redirect('index.php/site/restricted');
        }
    }

    public function imones(){
        if ($this->session->userdata('is_logged_in') && $this->session->is_admin == TRUE) {

            $this->load->model("model");
            $data['links'] = $this->model->get_data('img_tbl');

            $this->load->view('headers/view_imones_header');
            $this->load->view('imones_view', $data);
        }
        else{
            $this->load->view('restricted_view');
        }
    }

    public function blogas(){

        $this->load->model("model");
        $data['links'] = $this->model->get_data('blogas');

        if ($this->session->userdata('is_logged_in')) {
            if($this->session->is_admin == TRUE) {
                $this->load->view('headers/view_blogas_header_admin');
            }
            else {
                $this->load->view("headers/view_blogas_header_loggedin");
            }
        }
        else {
            $this->load->view("headers/view_blogas_header");
        }

        $this->load->view("view_blogas_body", $data);
    }

    function redaguoti_bloga(){
        if ($this->session->userdata('is_logged_in') && $this->session->is_admin == TRUE) {
            $this->load->model("model");
            $data['links'] = $this->model->get_data('blogas');

            $this->load->view('headers/view_redaguoti_header');
            $this->load->view('view_redaguoti', $data);
        }
        else {
            redirect('index.php/site/restricted');
        }
    }

    function paraiska ()
    {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('Įmonė', 'Įmonė', 'callback_imone_check|required',
                array('required' => 'Prašome įvesti įmonės pavadinimą.')
            );
            $this->form_validation->set_rules('URL', 'URL', 'required',
                array('required' => 'Prašome įvesti įmonės %s.')
            );

            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '100';
            $this->load->library('upload', $config);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('view_paraiska', array('error' => ''));
            } else if ($this->upload->do_upload()) {
                $URL = $this->input->post('URL');
                $name = $this->input->post('Įmonė');

                $data = $this->upload->data();
                $img = $data['raw_name'] . $data['file_ext'];
                $email = $this->session->email;

                $toInsert = array(
                    'name' => $name,
                    'URL' => $URL,
                    'img' => $img,
                    'email' => $email
                );

                $this->load->model("model");
                $this->model->insert_data($toInsert);

                $this->load->view('success', array('upload_data' => $this->upload->data()));
            } else {
                $this->load->view('view_paraiska', array('error' => $this->upload->display_errors()));
            }
        }
        else{
            redirect('index.php/site/restricted');
        }
    }

    public function imone_check($str)
    {
        $this->load->model("model");
        $data = $this->model->get_imones_names($str);

        if($data != null){
            if ($str == reset($data)->name)
            {
                $this->form_validation->set_message('imone_check', "Pavadinimas '" . $str . "' jau yra");

                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
        else {
            return TRUE;
        }
    }

    public function delete_user_data($name) {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->model('model');
            $this->model->delete_data($name);

            // Refresh current page
            $refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
            $this->session->set_userdata('url', $refering_url);
            $url=$this->session->userdata('url');
            redirect($url, 'refresh');
        }
        else{
            redirect('index.php/site/restricted');
        }
    }

    function delete_blog_post($id){
        if ($this->session->userdata('is_logged_in') && $this->session->is_admin == TRUE) {
            $this->load->model('model');
            $this->model->delete_from_blog($id);

            $this->redaguoti_bloga();
        }
        else{
            redirect('index.php/site/restricted');
        }
    }

    function write_blog_post(){
        if ($this->session->userdata('is_logged_in') && $this->session->is_admin == TRUE) {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('tekstas', 'tekstas', 'required',
                array('required' => 'Prašome įvesti tekstą')
            );

            $config['upload_path'] = './blog_images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->load->library('upload', $config);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('write_blog_post_view', array('error' => ''));
            } else if ($this->upload->do_upload()) {
                $text = $this->input->post('tekstas');

                $data = $this->upload->data();
                $img = $data['raw_name'] . $data['file_ext'];

                $toInsert = array(
                    'img' => $img,
                    'text' => $text
                );

                $this->load->model("model");
                $this->model->insert_data_blog($toInsert);

                $this->redaguoti_bloga();
            } else {
                $this->load->view('write_blog_post_view', array('error' => $this->upload->display_errors()));
            }
        }
        else{
            redirect('index.php/site/restricted');
        }
    }

    function edit_blog_post(){
        if ($this->session->userdata('is_logged_in') && $this->session->is_admin == TRUE) {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('tekstas', 'tekstas', 'required',
                array('required' => 'Prašome įvesti tekstą')
            );
            $this->form_validation->set_rules('id', 'id', 'required',
                array('required' => 'Prašome įvesti id')
            );

            $config['upload_path'] = './blog_images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->load->library('upload', $config);

            $this->load->model("model");

            $id = $this->input->get("id");
            $text = $this->model->get_blog_text($id);
            $data['id'] = $id;
            if(isset($id)){
                $data['text'] = reset($text)->text;
            }

            if ($this->form_validation->run() == FALSE) {
                $data['error'] = '';
                $this->load->view('edit_blog_post_view', $data);
            } else if ($this->upload->do_upload()) {
                $text = $this->input->post('tekstas');
                $id = $this->input->post('id');

                $data = $this->upload->data();
                $img = $data['raw_name'] . $data['file_ext'];

                $toInsert = array(
                    'img' => $img,
                    'text' => $text
                );

                $this->load->model("model");
                $this->model->update_data_blog($toInsert, $id);

                $this->redaguoti_bloga();
            } else {
                $text = $this->input->post('tekstas');
                $id = $this->input->post('id');

                $toInsert = array(
                    'text' => $text
                );

                $this->load->model("model");
                $this->model->update_data_blog($toInsert, $id);

                $this->redaguoti_bloga();
            }
        }
        else{
            redirect('index.php/site/restricted');
        }
    }
}