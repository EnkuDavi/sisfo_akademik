<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['pelajaran_model','guru_model']);
    }

    public function index()
    {
        $data['pelajaran'] = $this->pelajaran_model->tampilData()->result();
        $data['guru'] = $this->guru_model->tampilData()->result();
        $this->template->load('template','pelajaran/pelajaran_data', $data);
    }

    public function add()
    {
        $data['guru'] = $this->guru_model->tampilData()->result();
        $this->template->load('template','pelajaran/pelajaran_form',$data);
    }

    public function add_pelajaran()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->pelajaran_model->add($post);
        if($this->db->affected_rows() > 0){
            $this->session->flashdata('success','Data Berhasil Disimpan');
        }
        redirect('pelajaran');
    }

    public function edit()
    {
        $post = $this->input->post(null, TRUE);
        $this->pelajaran_model->update($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Di Update');
        }
        redirect('pelajaran');
    }

    public function del($id)
    {
        $this->pelajaran_model->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('pelajaran');
    }
}

