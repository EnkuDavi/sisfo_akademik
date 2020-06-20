<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PPDB extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ppdb_model');
    }

    public function index()
    {
        $data['row'] = $this->ppdb_model->tampilData()->result();
        $this->load->view('ppdb/ppdb_info',$data);   
    }

    public function daftar()
    {
        $date = date('Y');
        $query['row'] = $this->db->query("SELECT * FROM thn_ajaran WHERE tahun_ajaran = $date AND status = 1");
        $this->load->view('ppdb/ppdb_form',$query);
    }

    public function data()
    {
        check_not_login();
        $data['row'] = $this->ppdb_model->tampilData()->result();
        $this->template->load('template','ppdb/ppdb_data',$data);
    }

    public function add()
    {
        $config['upload_path']  = './uploads/siswa/';
        $config['allowed_types']= 'gif|jpg|png|jpeg';
        $config['max_size']     = 1048;
        $config['file_name']    = 'Foto-'.date('Y');
        $this->load->library('upload', $config);
        $post = $this->input->post(NULL, TRUE);

        if(isset($_POST['simpan'])){
            if(@$_FILES['image']['name'] != NULL){
                if($this->upload->do_upload('image')){
                    $post['image'] = $this->upload->data('file_name');
                    $this->ppdb_model->add($post);
                    if($this->db->affected_rows() > 0)
                    {
                        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    }
                    redirect('ppdb'); 
                }else{
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('Error',$error);
                    redirect('ppdb');
                }
            }
        }
    }
}