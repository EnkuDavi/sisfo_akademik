<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('jurusan_model');
    }

    public function index()
    {
        $data['jurusan'] = $this->jurusan_model->tampilData()->result();
        $this->template->load('template','jurusan/jurusan_data',$data);
    }

    public function add()
    {
        $this->template->load('template','jurusan/jurusan_form');
    }

    public function add_jurusan()
    {
        $post = $this->input->post(NULL, TRUE);    
        $this->jurusan_model->add($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Disimpan');
        }
        redirect('jurusan');
    }

    public function edit()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->jurusan_model->ubah($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Diubah');
        }
        redirect('jurusan');
    }

    public function del($id)
    {
        $this->jurusan_model->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('jurusan');
    }
}









