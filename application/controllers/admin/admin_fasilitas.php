<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_fasilitas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('reservation_model');
        $this->load->model('room_model');
        $this->load->model('auth_model');
        $this->load->model('facility_model');
    }

    public function index(){
        $data ['role'] = $this->auth_model->current_user()->role;
        //ambil data dari room
        $data ['facilities'] = $this->facility_model->get_all();
        //di view folder admin
        $this->load->view('admin/admin_facility', $data);
    }
    public function tambah(){
            $data ['role'] = $this->auth_model->current_user()->role;
            $this->load->view('admin/tambah_faci', $data);
    }
    public function tambah_data(){

            $nama_fasilitas = $this->input->post('nama_fasilitas');
            $keterangan =  $this->input->post('keterangan');
            $image = $this->input->post('image');

            if ($this->input->method() === 'post'){
                $file_name = uniqid('',true);
                $config['upload_path'] = FCPATH . '/upload/facilities/';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['file_name'] = str_replace('.','',$file_name);
                $config['overwrite'] = true;
                $config['max_size'] = 1024; // 1mb
                $config['max_width'] = 1080;
                $config['max_heigt'] = 1080;

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('image')) {
                    $config['error'] = $this->upload->display_error();
                }else{                   
                    $uploaded_data = $this->upload->data();
                    
            $data = array(
                'nama_fasilitas' => $nama_fasilitas,
                'keterangan' => $keterangan,
                'image' => $uploaded_data['file_name']
            );
            $saved = $this->facility_model->input_data($data, 'facilities');

             redirect('admin/admin_fasilitas/index');
        }
    }
}
    public function edit($id_fasilitas){
            $data ['role'] = $this->auth_model->current_user()->role;
            $where = [
                'id_fasilitas' => $id_fasilitas
            ];
            $data ['facilities'] = $this->facility_model->get_by_id($where);

            $this->load->view('admin/edit_faci', $data);
    }
    public function edit_data(){
            if ($this->input->post()){


                $file_name = uniqid();
                $config['upload_path'] = FCPATH . '/upload/facilities/';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['file_name'] = $file_name;
                $config['overwrite'] = true;
                $config['max_size'] = 1024; // 1mb

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    echo 'gagal upload';
                }else{

                    $id_fasilitas = $this->input->post('id_fasilitas');
                    $nama_fasilitas = $this->input->post('nama_fasilitas');
                    $keterangan =  $this->input->post('keterangan');
                    $image = $this->input->post('image');

                    $this->facility_model->update_fasilitas(array(
                        'nama_fasilitas' => $nama_fasilitas,
                        'keterangan' => $keterangan,
                        'image' => $image
                        ), array('id_fasilitas' => $this->input->post('id_fasilitas')
                            )
                    );
            $data['facilities']=$this->facility_model->get_by_id($id_fasilitas); 
            redirect('admin/admin_fasilitas/index');
        }
    }
}
        public function hapus($id_fasilitas){
            $where = array(
                'id_fasilitas' => $id_fasilitas
            );
            $this->facility_model->hapus_data($where);
            redirect('admin/admin_fasilitas/index');
        }
}