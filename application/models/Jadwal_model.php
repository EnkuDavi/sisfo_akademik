<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function getBypost($post)
    {
        $this->db->select('jadwal.jadwal_id , jadwal.jam , kelas.nama_kelas , guru.nama_guru , jadwal.date , pelajaran.nama_pelajaran as pelajaran_nama , kelas.nama_kelas , jadwal.jam , thn_ajaran.tahun_ajaran , semester.smt');
        $this->db->from('jadwal');
        $this->db->join('pelajaran' , 'jadwal.kode_pelajaran = pelajaran.kode_pelajaran');
        $this->db->join('guru','jadwal.nip = guru.nip');
        $this->db->join('kelas' , 'jadwal.kode_kelas = kelas.kode_kelas');
        $this->db->join('thn_ajaran' , 'jadwal.thn_id = thn_ajaran.thn_id');
        $this->db->join('semester' , 'jadwal.kd_semester = semester.kd_semester');
        $this->db->like('thn_ajaran.tahun_ajaran', $post['thn']);
        $this->db->like('jadwal.kode_kelas', $post['kelas']);
        $this->db->like('semester.smt', $post['smt']);
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "date" => htmlspecialchars($post['hari']),
            "kode_pelajaran" => htmlspecialchars($post['pelajaran']),
            "nip" => htmlspecialchars($post['pengajar']),
            "kode_kelas" => htmlspecialchars($post['kelas']),
            "jam" => htmlspecialchars($post['jam']),
            "thn_id" => htmlspecialchars($post['thn']),
            "kd_semester" => htmlspecialchars($post['smt'])
        ];

        $this->db->insert('jadwal', $params);
    }

}
