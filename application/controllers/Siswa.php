<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['siswa_model','kelas_model','tahun_model']);
    }

    public function index()
    {
        $kelas = $this->kelas_model->tampilData()->result();
        $angkatan = $this->tahun_model->tampilData()->result();
        $siswa = $this->siswa_model->tampilData()->result();
        $data=['kelas' => $kelas , 'angkatan' => $angkatan , 'siswa' => $siswa];
        $this->template->load('template','siswa/siswa_data',$data);
    }

    public function add()
    {
        $kelas = $this->kelas_model->tampilData()->result();
        $angkatan = $this->tahun_model->tampilData()->result();
        $data=['kelas' => $kelas , 'angkatan' => $angkatan];
        $this->template->load('template','siswa/siswa_form',$data);
    }

    public function add_siswa()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->siswa_model->add($post);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Ditambah');
        }
        redirect('siswa');
    }

    public function edit()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->siswa_model->ubah($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Diubah');
        }
        redirect('siswa');
    }

    public function del($id)
    {
        $this->siswa_model->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('siswa');
    }
}