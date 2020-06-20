<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
    }

    public function index()
    {
        check_not_login();
        $siswa = $this->db->get('siswa');
        $guru = $this->db->get('guru');
        $jrs = $this->db->get('jurusan');
        $usr = $this->db->get('user');

        $data = ['sis' => $siswa, 'gr' => $guru, 'jurusan' => $jrs, 'user' => $usr];
        $this->template->load('template','dashboard',$data);
    }
}