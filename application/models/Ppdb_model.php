<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb_model extends CI_Model
{
    public function tampilData()
    {
        return $this->db->get('ppdb');
    }

    public function add($post)
    {
        $params = [
            "nama_peserta" => htmlspecialchars($post['nama']),
            "gender" => $post['gender'],
            "nisn" => htmlspecialchars($post['nisn']),
            "tempat_lahir" => htmlspecialchars($post['tl']),
            "tgl_lahir" => htmlspecialchars($post['tgl']),
            "agama" => htmlspecialchars($post['agama']),
            "asal_sekolah" => htmlspecialchars($post['sekolah_asal']),
            "nilai_un" => htmlspecialchars($post['un']),
            "alamat" => htmlspecialchars($post['alamat']),
            "desa" => htmlspecialchars($post['desa']),
            "kecamatan" => htmlspecialchars($post['kecamatan']),
            "kabupaten" => htmlspecialchars($post['kabupaten']),
            "telephon" => htmlspecialchars($post['telepon']),
            "foto_peserta" => $post['image'],
            "status" => 'pending'
        ];

        $this->db->insert('ppdb', $params);
    }
}