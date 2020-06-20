<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getData()
    {
        return $this->db->get('siswa');
    }

    public function tampilData()
    {
        $this->db->select('siswa.siswa_id, siswa.nis, siswa.nama, kelas.kode_kelas, siswa.gender, siswa.alamat, siswa.telp, siswa.angkatan');
        $this->db->from('siswa');
        $this->db->join('kelas','siswa.kelas_id = kelas.kelas_id');
        $query = $this->db->get();
        return $query;
    }

    public function getBy($kelas_id)
    {
        $this->db->where('kelas_id', $kelas_id);
        $this->db->order_by('nama','ASC');
        $query = $this->db->get('siswa');
        $output = '<option value="">--Pilih--</option>';
        foreach($query->result() as $row){
            $output .= '<option value="'.$row->siswa_id.'">'.$row->nama.'</option>';
        }

        return $output;
    }

    public function add($post)
    {
        $params = [
            "nis" => htmlspecialchars($post['nis']),
            "nama" => htmlspecialchars($post['nama']),
            "kode_kelas" => htmlspecialchars($post['kelas']),
            "gender" => htmlspecialchars($post['gender']),
            "alamat" => htmlspecialchars($post['alamat']),
            "telp" => htmlspecialchars($post['telp']),
            "angkatan" => htmlspecialchars($post['angkatan'])
        ];
        $this->db->insert('siswa', $params);
    }

    public function ubah($post)
    {
        $params = [
            "nis" => htmlspecialchars($post['nis']),
            "nama" => htmlspecialchars($post['nama']),
            "kode_kelas" => htmlspecialchars($post['kelas']),
            "gender" => htmlspecialchars($post['gender']),
            "alamat" => htmlspecialchars($post['alamat']),
            "telp" => htmlspecialchars($post['telp']),
            "angkatan" => htmlspecialchars($post['angkatan']),
        ];
        $this->db->where('siswa_id', $post['id']);
        $this->db->update('siswa', $params);
    }

    public function hapus($id)
    {
        $this->db->where('siswa_id', $id);
        $this->db->delete('siswa');
    }
}