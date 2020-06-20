<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
    }

    public function index()
    {
        $data['guru'] = $this->guru_model->tampilData()->result();
        $this->template->load('template','guru/guru_data',$data);
    }

    public function add()
    {
        $this->template->load('template','guru/guru_form');
    }

    public function add_guru()
    {
        $post = $this->input->post(NULL,TRUE);
        $this->guru_model->add($post);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Disimpan');
        }
        redirect('guru');
    }

    public function edit()
    {
        $post = $this->input->post(NULL,TRUE);
        $this->guru_model->ubah($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Diubah');
        }
        redirect('guru');
    }

    public function del($id)
    {
        $this->guru_model->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('guru');
    }
}