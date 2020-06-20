<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    public function getData($post)
    {
        $this->db->where('siswa_id',$post['siswa']);
        $this->db->where('pelajaran_id',$post['pelajaran']);
        $this->db->where('kd_thn_ajaran',$post['thn']);
        $this->db->where('semester_id',$post['semester']);
        $this->db->where('kategori', $post['kategori']);
        $this->db->from('nilai');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "siswa_id" => htmlspecialchars($post['siswa']),
            "pelajaran_id" => htmlspecialchars($post['pelajaran']),
            "kd_thn_ajaran" => $post['thn'],
            "semester_id" => $post['semester'],
            "kategori" => $post['kategori'],
            "nilai_angka" => $post['nilai_angka']
        ];

        $this->db->insert('nilai', $params);
    }

    public function ubah($post)
    {
        $this->db->set('pelajaran_id', $post['pelajaran']);
        $this->db->set('nilai_angka', htmlspecialchars($post['nilai']));
        $this->db->where('nilai_id', $post['id']);
        $this->db->update('nilai');
    }

    public function hapus($id)
    {
        $this->db->where('nilai_id', $id);
        $this->db->delete('nilai');
    }

    public function getBy($post)
    {
        $this->db->select('nilai.nilai_id, thn_ajaran.kd_thn_ajaran, siswa.nama, siswa.nis, kelas.nama_kelas, pelajaran.nama_pelajaran, pelajaran.kkm,nilai.kategori, nilai.nilai_angka');
        $this->db->from('nilai');
        $this->db->join('pelajaran','nilai.pelajaran_id = pelajaran.pelajaran_id');
        $this->db->join('siswa','nilai.siswa_id = siswa.siswa_id');
        $this->db->join('kelas','siswa.kelas_id = kelas.kelas_id');
        $this->db->join('thn_ajaran','nilai.kd_thn_ajaran = thn_ajaran.kd_thn_ajaran');
        $this->db->like('thn_ajaran.kd_thn_ajaran', $post['thn']);
        $this->db->like('nilai.kategori', $post['kategori']);
        $this->db->like('kelas.nama_kelas', $post['kelas']);
        $query = $this->db->get();
        return $query;
    }
}