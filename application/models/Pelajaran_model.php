<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran_model extends CI_Model
{
    public function tampilData()
    {
       $this->db->select('pelajaran.pelajaran_id , pelajaran.guru_id , pelajaran.kode_pelajaran , pelajaran.nama_pelajaran , guru.nama_guru');
       $this->db->from('pelajaran');
       $this->db->join('guru', 'pelajaran.guru_id = guru.guru_id');
       $query = $this->db->get();
       return $query;
    }

    public function add($post)
    {
        $params = [
            "kode_pelajaran" => htmlspecialchars($post['kode_pelajaran']),
            "nama_pelajaran" => htmlspecialchars($post['nama_pelajaran'])
        ];
        $this->db->insert('pelajaran', $params);
    }

    public function update($post)
    {
        $params = [
            'kode_pelajaran' => htmlspecialchars($post['kode_pelajaran']),
            'nama_pelajaran' => htmlspecialchars($post['nama_pelajaran']),
            'guru_id' => htmlspecialchars($post['guru'])
        ];
        $this->db->where('pelajaran_id', $post['id']);
        $this->db->update('pelajaran', $params);
    }

    public function hapus($id)
    {
        $this->db->where('pelajaran_id', $id);
        $this->db->delete('pelajaran');
    }
}
