<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_room extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('reservation_model');
        $this->load->model('room_model');
        $this->load->model('auth_model');
    }

    public function index(){
        $data ['role'] = $this->auth_model->current_user()->role;
        //ambil data dari room
        $data ['rooms'] = $this->room_model->get_all();
        //di view folder admin
        $this->load->view('admin/list_room', $data);
    }
    public function tambah(){
            $data ['role'] = $this->auth_model->current_user()->role;
            $this->load->view('admin/create_room', $data);
    }
        public function tambah_data(){

            $tipe_kamar = $this->input->post('tipe_kamar');
            $jumlah_kamar = $this->input->post('jumlah_kamar');
            $fasilitas_kamar =  $this->input->post('fasilitas_kamar');
            $harga_sewa = $this->input->post('harga_sewa');
            $image = $this->input->post('image');

            if ($this->input->method() === 'post'){
                $file_name = uniqid('',true);
                $config['upload_path'] = FCPATH . '/upload/rooms/';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['file_name'] = str_replace('.','',$file_name);
                $config['overwrite'] = true;
                $config['max_size'] = 1024; // 1mb
                $config['max_width'] = 1080;
                $config['max_heigt'] = 1080;

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('image')) {
                    $data['error'] = $this->upload->display_error();
                }else{  
                    $uploaded_data = $this->upload->data();

            $data = array(
                'tipe_kamar' => $tipe_kamar,
                'jumlah_kamar' => $jumlah_kamar,
                'fasilitas_kamar' => $fasilitas_kamar,
                'harga_sewa' => $harga_sewa,
                'image' => $uploaded_data['file_name']
            );
            $saved = $this->room_model->input_data($data, 'rooms');

             redirect('admin/admin_room/index');
        }
    }
}

            function edit($id_kamar){
                $data ['role'] = $this->auth_model->current_user()->role;
                
                $where = array('id_kamar' => $id_kamar);

                $data ['rooms'] = $this->room_model->get_by_id($where);
            
                $this->load->view('admin/edit_kamar',$data);
            }

            function edit_data(){
            if ($this->input->post()){
                                    
                $data ['role'] = $this->auth_model->current_user()->role;

                $file_name = uniqid('',true);
                $config['upload_path'] = FCPATH . '/upload/rooms/';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['file_name'] = $file_name;
                $config['overwrite'] = true;
                $config['max_size'] = 1024; // 1mb

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    echo 'gagal upload';
                }else{

                    $id_kamar = $this->input->post('id_kamar');
                    $tipe_kamar = $this->input->post('tipe_kamar');
                    $jumlah_kamar = $this->input->post('jumlah_kamar');
                    $fasilitas_kamar = $this->input->post('fasilitas_kamar');
                    $harga_sewa = $this->input->post('harga_sewa');
                    $image = $this->input->post('image');

                    $this->room_model->update_kamar(array(
                        'tipe_kamar' => $tipe_kamar,
                        'jumlah_kamar' => $jumlah_kamar,
                        'fasilitas_kamar' => $fasilitas_kamar,
                        'harga_sewa' => $harga_sewa,
                        'image' => $image,
                        ), array('id_kamar' => $this->input->post('id_kamar')
                            )
                    );
            $data['rooms']=$this->room_model->get_by_id($id_kamar); 
            redirect ('admin');
        }
    }
}
    
        public function hapus($id){
            $where = array(
                'id_kamar' => $id
            );
            $this->room_model->hapus_data($where);
            redirect('admin/admin_room/index');
        }
}