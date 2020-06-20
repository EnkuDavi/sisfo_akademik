<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tahun_model');
    }

    public function index()
    {
        $data['tahun'] = $this->tahun_model->tampilData()->result();
        $this->template->load('template','tahun/tahun_data',$data);
    }

    public function add()
    {
        $this->template->load('template','tahun/tahun_form');
    }

    public function add_tahun()
    {
        $post = $this->input->post(NULL, TRUE);    
        $this->tahun_model->add($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data Berhasil Disimpan');
        }
        redirect('tahun');
    }

    public function del($id)
    {
        $this->tahun_model->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('tahun');
    }

}