<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['tahun_model','kelas_model','pelajaran_model','semester_model','jadwal_model']);
    }

    public function index()
    {
        $tahun = $this->tahun_model->tampilData()->result();
        $kelas = $this->kelas_model->tampilData()->result();
        $data = ['tahun' => $tahun , 'kelas' => $kelas];
        $this->template->load('template','jadwal/jadwal_data',$data);
    }

    public function tampil()
    {
        $post = $this->input->post();
        if(isset($post)){
            if($post != NULL){
                $jadwal = $this->jadwal_model->getBypost($post);
                $data=['jadwal' => $jadwal];
                if($this->db->affected_rows() > 0){
                    $this->template->load('template','jadwal/lihat_jadwal',$data);            
                }else{
                    echo "<script>
                    alert('Data Tidak Ditemukan !');";
                    echo "window.location= '" .site_url('jadwal'). "';
                    </script>";
                }
            }else{
                $this->template->load('template','jadwal/lihat_jadwal');            
            }
        }
        
    }

    public function add()
    {
        $this->load->model('guru_model');
        $guru = $this->guru_model->tampilData()->result();
        $pelajaran = $this->pelajaran_model->tampilData()->result();
        $tahun = $this->tahun_model->tampilData()->result();
        $kelas = $this->kelas_model->tampilData()->result();
        $semester = $this->semester_model->tampilData()->result();
        $data = ['pelajaran' => $pelajaran , 'tahun' => $tahun , 'kelas' => $kelas , 'semester' => $semester , 'guru' => $guru];
        $this->template->load('template','jadwal/jadwal_form',$data);
    }

    public function add_jadwal()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->jadwal_model->add($post);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Disimpan');
        }
        redirect('jadwal');
    }

    function print_jadwal()
    {
            $post = $this->input->post();
            if($post != NULL){
                $data['jadwal'] = $this->jadwal_model->getBypost($post);
                $html = $this->load->view('jadwal/jadwal_print',$data,true);
                $this->fungsi->PdfGenerator($html ,'Jadwal','A4','landscape');
            }else{
                echo "<script>
                        alert('Tidak Ada Data yang Ditampilkan'); ";
                    echo "window.location = '" .site_url('jadwal')."' </script>";
            }
        
    }

}



