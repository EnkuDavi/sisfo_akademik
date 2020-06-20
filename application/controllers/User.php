<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function index()
    {
        check_not_login();
        $data['user'] = $this->user_m->tampilData()->result();
        $this->template->load('template','user/user_data',$data);
    }

    public function add()
    {
        $this->template->load('template','user/user_form');
    }

    public function add_user()
    {
        $this->form_validation->set_rules('pass','Password','required|trim|min_length[6]');
        $this->form_validation->set_rules('pasconf','Password Confirm','required|trim|matches[pass]');
        if($this->form_validation->run() == FALSE){
            $this->template->load('template','user/user_form');
        }else {
            $post = $this->input->post(NULL, TRUE);
            $this->user_m->addUser($post);
            if($this->db->affected_rows() > 0){
                echo "<script>
                    alert('Data user berhasil disimpan'); ";
                        echo "window.location = '" .site_url('user')."' </script>";    
            }else{
                echo "<script>alert('Data yang dimasukan tidak valid!');</script>";
            }
        }
    }
    
    public function edit()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->user_m->ubah($post);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success','Data User Berhasil Diubah');
        }
        redirect('user');
    }

    public function del($id)
    {
        $this->user_m->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('user');
    }
}