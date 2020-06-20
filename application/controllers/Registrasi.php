<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_m');
    }

    public function index()
    {
        $this->load->view('registrasi/registrasi_form');
    }

    public function add()
    {
        $this->form_validation->set_rules('nisn','NISN','required|trim');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[6]');
        $this->form_validation->set_rules('passconf','Password Confirm','required|trim|matches[password]');
        if($this->form_validation->run() == FALSE){
            $this->load->view('registrasi/registrasi_form');
        }else{
            $post= $this->input->post(NULL, TRUE);
            if(isset($_POST['add'])){
                if($this->user_m->cek_nisn($post)->num_rows() > 0){
                    $this->user_m->add($post);
                    if($this->db->affected_rows() > 0){
                        echo "<script>
                            alert('Akun anda telah aktif! Silahkan login...'); ";
                                echo "window.location = '" .site_url('auth')."' </script>";    
                    }else{
                        echo "<script>alert('Data yang kamu masukan tidak valid!');</script>";
                    }
                }else{
                    echo "<script>
                            alert('NISN ".$post['nisn']." tidak tersedia'); ";
                        echo "window.location = '" .site_url('registrasi')."' </script>";
                }
            }
        }
    }
}