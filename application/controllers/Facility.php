<?php

class Facility extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('facility_model');
    }

    public function index()
    {
        // ambil data
        $data['facilities'] = $this->facility_model->get_all();
        $data['total_facility'] = count($data['facilities']);

        $this->load->view('fasilitas.php', $data);
    }
}
