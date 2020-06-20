<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
    }

    public function index()
    {
        $data['kelas'] = $this->kelas_model->tampilData()->result();
        $this->template->load('template','kelas/kelas_data',$data);
    }

    public function add()
    {
        $this->load->model('jurusan_model');
        $data['prodi'] = $this->jurusan_model->tampilData();
        $this->template->load('template','kelas/kelas_form',$data);
    }

    public function add_kelas()
    {
        $post = $this->input->post(NULL, TRUE);    
        $this->kelas_model->add($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Disimpan');
        }
        redirect('kelas');
    }

    public function edit()
    {
        $post = $this->input->post(null, TRUE);
        $this->kelas_model->update($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Di Update');
        }
        redirect('kelas');
    }

    public function del($id)
    {
        $this->kelas_model->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('kelas');
    }
}