<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    
    public function getById($id)
    {
        $this->db->from('kelas');
        $this->db->where('kelas_id', $id);
        return $this->db->single();
    }

    public function tampilData()
    {
        return $this->db->get('kelas');
    }

    public function add($post)
    {
        $params = [
            'kode_kelas' => htmlspecialchars($post['kode_kelas']),
            'nama_kelas' => htmlspecialchars($post['nama_kelas']),
            'prodi' => htmlspecialchars($post['prodi'])
        ];
        $this->db->insert('kelas', $params);
    }

    public function update($post)
    {
        $params = [
            'kode_kelas' => htmlspecialchars($post['kode_kelas']),
            'nama_kelas' => htmlspecialchars($post['nama_kelas']),
            'prodi' => htmlspecialchars($post['prodi'])
        ];
        $this->db->where('kelas_id', $post['id']);
        $this->db->update('kelas', $params);
    }
    
    public function hapus($id)
    {
        $this->db->where('kelas_id', $id);
        $this->db->delete('kelas');
    }
}