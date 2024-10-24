<?php

class Room extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('room_model');
    }

    public function index()
    {
        // ambil data
        $data['rooms'] = $this->room_model->get_all();
        $data['total_kamar'] = count($data['rooms']);

        $this->load->view('room.php', $data);
    }
}
