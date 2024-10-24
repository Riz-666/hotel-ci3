<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('reservation_model');
        $this->load->model('room_model');
        $this->load->model('auth_model');
    }
    public function index()
{
    show_404();
}
        public function login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if($this->auth_model->login($username, $password)){
            if ($this->auth_model->current_user()->role == 'admin'){
                redirect ('admin');
            }else{
                redirect ('receptionist');
            }
        }
        $this->load->view('login');
    }
    public function logout(){
        session_destroy();
        redirect(site_url('auth/login'));
}
}