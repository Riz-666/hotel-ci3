<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

        public function __construct(){
        parent::__construct();
        $this->load->model('reservation_model');
        $this->load->model('room_model');
        $this->load->model('auth_model');
    }
    public function index(){
        $data ['role'] = $this->auth_model->current_user()->role;
        //ambil data dari room
        $data ['reservation'] = $this->reservation_model->get_all();
        $data ['rooms'] = $this->room_model->get_all();
        //di view folder admin
        $this->load->view('receptionist/reservation', $data);
    }
    public function ajaxPemesanan()
    {
        
        $getId = json_decode($this->input->post('getId'));
        
        $id = [
            'id_pemesanan' => $getId->id_reser
        ];
        $data['reser'] = $this->reservation_model->get_by_id($id);
        
        $this->load->view('receptionist/ajaxPemesanan', $data);    
    }
}